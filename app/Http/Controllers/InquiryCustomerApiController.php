<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\BankStatement;
use App\Models\BillingProof;
use App\Models\CustomerProfile;
use App\Models\GuarantorProfile;
use App\Models\Inquiry;
use App\Models\InquiryFd;
use App\Models\InquiryInsurance;
use App\Models\InquiryLease;
use App\Models\InquiryPawning;
use App\Models\PawningJewellery;
use App\Models\User;
use App\Models\VehicleRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InquiryCustomerApiController extends Controller
{
    // Login Customer
    public function customerLogin(LoginRequest $request){
        $validator = Validator::make($request->all(), [
            'identifier' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Login validation failed',
            ], 422);
        }

        $user = User::where('email', $request->identifier)->orWhere('mobile', $request->identifier)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => true,
                'message' => 'Your credentials does not match',
                'action' => '',
                'token' => null,
                'first_name' => null,
                'last_name' => null,
                'customer_profile' => null,
            ]);
        }

        if(!$user->hasRole('customer')){
            return response()->json([
                'error' => true,
                'message' => 'You are not authorised as a Dearo customer',
                'action' => '',
                'token' => null,
                'first_name' => null,
                'last_name' => null,
                'customer_profile' => null,
            ]);
        }

        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json([
            'error' => false,
            'message' => 'Authenticated',
            'action' => '',
            'token' => $token,
            'first_name' => $customerProfile->first_name,
            'last_name' => $customerProfile->last_name,
            'nic' => $customerProfile->nic,
            'customer_profile' => $customerProfile->getProfileEssentials(),
        ]);
    }

    // Register New Customer
    public function customerRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'nic' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Register validation failed',
            ], 422);
        }

        $userExisting = User::where('mobile', $request->mobile)->first();
        if($userExisting){
            return response()->json([
                'error' => true,
                'message' => 'User already exists. Please login.',
                'action' => 'LOGIN',
                'token' => null,
                'first_name' => null,
                'last_name' => null,
                'customer_profile' => null,
            ]);
        }

        $user = User::create([
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->mobile.".customer@dearoinvestment.com",
            'nic' => $request->nic,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('customer');

        $customerProfile = CustomerProfile::create([
            'user_id' => $user->id,
            'nic' => $request->nic,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile_number' => $request->mobile,
        ]);

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'error' => false,
            'message' => 'Customer account created successfully',
            'action' => 'DEFAULT',
            'token' => $token,
            'first_name' => $customerProfile->first_name,
            'last_name' => $customerProfile->last_name,
            'customer_profile' => $customerProfile->getProfileEssentials(),
        ]);
    }

    public function validateInquiryStep(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'inquiry_step' => 'required|string',
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if(!$inquiryGeneral){
            return response()->json([
                'error' => true,
                'message' => 'Incorrect inquiry id',
                'inquiry_id' => $request->inquiry_id,
                'inquiry_step' => $request->inquiry_step,
                'is_passed' => false,
            ]);
        }

        $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);
        if(!$customerProfile){
            return response()->json([
                'error' => false,
                'message' => 'Customer profile is not found',
                'inquiry_id' => $request->inquiry_id,
                'inquiry_step' => $request->inquiry_step,
                'is_passed' => false,
            ]);
        }

        if($inquiryGeneral->inquiry_type == 'LEASE'){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
            $vehicleRecord = VehicleRecord::find($inquiryLease->vehicle_id);
            switch($request->inquiry_step){
                case 'CUSTOMER_PROFILE_ASSIGNED':
                    $inquiryLease->inquiry_step = 'CUSTOMER_PROFILE_ASSIGNED';
                    $inquiryLease->save();

                    return response()->json([
                        'error' => false,
                        'message' => 'Customer profile is assigned',
                        'inquiry_id' => $request->inquiry_id,
                        'inquiry_step' => $request->inquiry_step,
                        'is_passed' => true,
                    ]);
                case 'PROFILE_COMPLETED':
                    if($customerProfile->getProfileCompletionState()){
                        return response()->json([
                            'error' => false,
                            'message' => 'Customer profile is completed',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Customer profile is incomplete',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                case 'VEHICLE_ESSENTIALS_ADDED':
                    if($vehicleRecord->isEssentialsCompleted()){
                        if($vehicleRecord->isVehicleImagesAdded()){
                            $inquiryLease->inquiry_step = 'VEHICLE_DETAILS_ADDED';
                            $inquiryLease->save();
                        }
                        return response()->json([
                            'error' => false,
                            'message' => 'Vehicle essential details added',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Vehicle essential details incomplete',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                case 'VEHICLE_IMAGES_ADDED':
                    if($vehicleRecord->isVehicleImagesAdded()){
                        if($vehicleRecord->isEssentialsCompleted()){
                            $inquiryLease->inquiry_step = 'VEHICLE_DETAILS_ADDED';
                            $inquiryLease->save();
                        }
                        return response()->json([
                            'error' => false,
                            'message' => 'Vehicle mages are added',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Vehicle images incomplete. Please upload all the necessary images.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                case 'BANK_BILLING_ADDED':
                    if(!BankStatement::isBankStatementsProvided($inquiryGeneral->created_at, $customerProfile->id)){
                        $statementMissingMessage = BankStatement::getMissingStatementsMessage($inquiryGeneral->created_at, $customerProfile->id);
                        return response()->json([
                            'error' => false,
                            'message' => 'Upload statements for '.$statementMissingMessage,
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }

                    $billingProof = BillingProof::where('owner_type', 'CUSTOMER')->where('customer_id', $customerProfile->id)->first();
                    if(!$billingProof){
                        return response()->json([
                            'error' => false,
                            'message' => 'Billing proof is not found. Please upload.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                    
                    $inquiryLease->inquiry_step = 'BANK_DETAILS_ADDED';
                    $inquiryLease->save();

                    return response()->json([
                        'error' => false,
                        'message' => 'Bank statements and billing proofs are found',
                        'inquiry_id' => $request->inquiry_id,
                        'inquiry_step' => $request->inquiry_step,
                        'is_passed' => true,
                    ]);

                case 'GUARANTOR1_DETAILS_ADDED':
                    $guarantor = GuarantorProfile::find($inquiryLease->guarantor_id);
                    if($guarantor->isEssentialsAdded()){
                        if($guarantor)
                        return response()->json([
                            'error' => false,
                            'message' => 'Essential guarantor details completed',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Guarantor details are missing. Please provide all the necessary details.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                case 'GUARANTOR1_SUPPORTING_ADDED':
                    $guarantor = GuarantorProfile::find($inquiryLease->guarantor_id);
                    if(!BankStatement::isGuarantorsBankStatementsProvided($inquiryGeneral->created_at, $guarantor->id)){
                        $statementMissingMessage = BankStatement::getGuarantorMissingStatementsMessage($inquiryGeneral->created_at, $guarantor->id);
                        return response()->json([
                            'error' => false,
                            'message' => 'Upload statements for '.$statementMissingMessage,
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }

                    $billingProof = BillingProof::where('owner_type', 'GUARANTOR')->where('guarantor_id', $guarantor->id)->first();
                    if(!$billingProof){
                        return response()->json([
                            'error' => false,
                            'message' => 'Billing proof is not found. Please upload.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }

                    $inquiryLease->inquiry_step = 'GUARANTOR_ADDED';
                    $inquiryLease->save();

                    return response()->json([
                        'error' => false,
                        'message' => 'Bank statements and billing proofs are found',
                        'inquiry_id' => $request->inquiry_id,
                        'inquiry_step' => $request->inquiry_step,
                        'is_passed' => true,
                    ]);
                case 'GUARANTOR2_DETAILS_ADDED':
                    $guarantor = GuarantorProfile::find($inquiryLease->guarantor2_id);
                    if($guarantor->isEssentialsAdded()){
                        return response()->json([
                            'error' => false,
                            'message' => 'Essential guarantor details completed',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Guarantor details are missing. Please provide all the necessary details.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                case 'GUARANTOR2_SUPPORTING_ADDED':
                    $guarantor = GuarantorProfile::find($inquiryLease->guarantor2_id);
                    if(!BankStatement::isGuarantorsBankStatementsProvided($inquiryGeneral->created_at, $guarantor->id)){
                        $statementMissingMessage = BankStatement::getGuarantorMissingStatementsMessage($inquiryGeneral->created_at, $guarantor->id);
                        return response()->json([
                            'error' => false,
                            'message' => 'Upload statements for '.$statementMissingMessage,
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }

                    $billingProof = BillingProof::where('owner_type', 'GUARANTOR')->where('guarantor_id', $guarantor->id)->first();
                    if(!$billingProof){
                        return response()->json([
                            'error' => false,
                            'message' => 'Billing proof is not found. Please upload.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }

                    $inquiryLease->inquiry_step = 'GUARANTOR2_ADDED';
                    $inquiryLease->save();

                    return response()->json([
                        'error' => false,
                        'message' => 'Bank statements and billing proofs are found',
                        'inquiry_id' => $request->inquiry_id,
                        'inquiry_step' => $request->inquiry_step,
                        'is_passed' => true,
                    ]);
            }
        }

        if($inquiryGeneral->inquiry_type == 'FD'){
            $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id);
            switch($request->inquiry_step){
                case 'CUSTOMER_PROFILE_ASSIGNED':
                    $inquiryFd->inquiry_step = 'CUSTOMER_PROFILE_ASSIGNED';
                    $inquiryFd->save();

                    return response()->json([
                        'error' => false,
                        'message' => 'Customer profile is assigned',
                        'inquiry_id' => $request->inquiry_id,
                        'inquiry_step' => $request->inquiry_step,
                        'is_passed' => true,
                    ]);

                case 'PROFILE_COMPLETED':
                    if($customerProfile->getProfileCompletionState()){
                        return response()->json([
                            'error' => false,
                            'message' => 'Customer profile is completed',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Customer profile is incomplete',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }

                case 'FD_DETAILS_ADDED':
                    if($inquiryFd->getFdDetailsCompletionState()){
                        return response()->json([
                            'error' => false,
                            'message' => 'Necessary FD details are provided.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Please provide all necessary FD details',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
            }
        }

        if($inquiryGeneral->inquiry_type == 'INSURANCE'){
            $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
            $vehicleRecord = VehicleRecord::find($inquiryInsurance->vehicle_id);
            switch($request->inquiry_step){
                case 'CUSTOMER_PROFILE_ASSIGNED':
                    $inquiryInsurance->inquiry_step = 'CUSTOMER_PROFILE_ASSIGNED';
                    $inquiryInsurance->save();

                    return response()->json([
                        'error' => false,
                        'message' => 'Customer profile is assigned',
                        'inquiry_id' => $request->inquiry_id,
                        'inquiry_step' => $request->inquiry_step,
                        'is_passed' => true,
                    ]);
                case 'PROFILE_COMPLETED':
                    if($customerProfile->getProfileCompletionState()){
                        return response()->json([
                            'error' => false,
                            'message' => 'Customer profile is completed',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Customer profile is incomplete',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                case 'VEHICLE_ESSENTIALS_ADDED':
                    if($vehicleRecord->isEssentialsCompleted()){
                        if($vehicleRecord->isVehicleImagesAdded()){
                            $inquiryInsurance->inquiry_step = 'VEHICLE_DETAILS_ADDED';
                            $inquiryInsurance->save();
                        }
                        return response()->json([
                            'error' => false,
                            'message' => 'Vehicle essential details added',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Vehicle essential details incomplete',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                case 'VEHICLE_IMAGES_ADDED':
                    if($vehicleRecord->isVehicleImagesAdded()){
                        if($vehicleRecord->isEssentialsCompleted()){
                            $inquiryInsurance->inquiry_step = 'VEHICLE_DETAILS_ADDED';
                            $inquiryInsurance->save();
                        }
                        return response()->json([
                            'error' => false,
                            'message' => 'Vehicle mages are added',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Vehicle images incomplete. Please upload all the necessary images.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                case 'BANK_BILLING_ADDED':
                    if(!BankStatement::isBankStatementsProvided($inquiryGeneral->created_at, $customerProfile->id)){
                        $statementMissingMessage = BankStatement::getMissingStatementsMessage($inquiryGeneral->created_at, $customerProfile->id);
                        return response()->json([
                            'error' => false,
                            'message' => 'Upload statements for '.$statementMissingMessage,
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }

                    $billingProof = BillingProof::where('owner_type', 'CUSTOMER')->where('customer_id', $customerProfile->id)->first();
                    if(!$billingProof){
                        return response()->json([
                            'error' => false,
                            'message' => 'Billing proof is not found. Please upload.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
                    
                    $inquiryLease->inquiry_step = 'BANK_DETAILS_ADDED';
                    $inquiryLease->save();

                    return response()->json([
                        'error' => false,
                        'message' => 'Bank statements and billing proofs are found',
                        'inquiry_id' => $request->inquiry_id,
                        'inquiry_step' => $request->inquiry_step,
                        'is_passed' => true,
                    ]);
            }
        }

        if($inquiryGeneral->inquiry_type == 'PAWNING'){
            $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id);
            switch($request->inquiry_step){
                case 'CUSTOMER_PROFILE_ASSIGNED':
                    $inquiryPawning->inquiry_step = 'CUSTOMER_PROFILE_ASSIGNED';
                    $inquiryPawning->save();

                    return response()->json([
                        'error' => false,
                        'message' => 'Customer profile is assigned',
                        'inquiry_id' => $request->inquiry_id,
                        'inquiry_step' => $request->inquiry_step,
                        'is_passed' => true,
                    ]);

                case 'PROFILE_COMPLETED':
                    if($customerProfile->getProfileCompletionState()){
                        return response()->json([
                            'error' => false,
                            'message' => 'Customer profile is completed',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Customer profile is incomplete',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }

                case 'PAWN_DETAILS_ADDED':
                    if($inquiryPawning->isPawningDetailsProvided()){
                        return response()->json([
                            'error' => false,
                            'message' => 'Necessary Gold Loan details provided.',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => true,
                        ]);
                    }else{
                        return response()->json([
                            'error' => false,
                            'message' => 'Please provide all necessary Gold Loan details',
                            'inquiry_id' => $request->inquiry_id,
                            'inquiry_step' => $request->inquiry_step,
                            'is_passed' => false,
                        ]);
                    }
            }
        }
    }

    // Customer Profile Update
    public function customerProfileUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'date_of_birth' => 'required|date',
            'customer_nic' => ['required', 'regex:/^(([0-9]{9})([A-Za-z]{1}))+$|^([0-9]{12})+$/'],
            'customer_address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'customer_district' => 'required|integer|min:1|max:24',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing or invalid information. Please try again.',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();

        $customerProfile->dob = $request->date_of_birth;
        $customerProfile->nic = $request->customer_nic;
        $customerProfile->address = $request->customer_address;
        $customerProfile->district = $request->customer_district;
        $customerProfile->save();

        return response()->json([
            'error' => false,
            'message' => 'Customer profile details updated successfully',
            'customer_profile' => $customerProfile->getProfileEssentials(),
        ]);
    }

    public function getCustomerInquiryList(Request $request){
        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();

        $inquiries = Inquiry::where('customer_id', $customerProfile->id)->get();
        $inquiriesDetailed = $inquiries->map(function ($item) {
            switch($item->inquiry_type){
                case 'LEASE':
                    $item->inquiry_info = InquiryLease::find($item->reference_inquiry_id)->apiResponse();
                    break;
                case 'FD':
                    $item->inquiry_info = InquiryFd::find($item->reference_inquiry_id)->apiResponse();
                    break;
                case 'INSURANCE':
                    $item->inquiry_info = InquiryInsurance::find($item->reference_inquiry_id);
                    break;
                case 'PAWNING':
                    $item->inquiry_info = InquiryPawning::find($item->reference_inquiry_id)->apiResponse();
                    break;
            }
            return $item;
        });

        return response()->json([
            'error' => false,
            'message' => 'Customer profile updated',
            'inquiries' => $inquiriesDetailed,
        ]);
    }

    // Initiate Inquiry
    public function initiateInquiry(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_type' => 'required|in:LEASE,FD,INSURANCE,PAWNING',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Inquiry type is required',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();

        $inquiry = null;
        switch($request->inquiry_type){
            case 'LEASE':
                $inquiry = InquiryLease::create([
                    'inquiry_step' => 'CUSTOMER_PROFILE_ASSIGNED',
                ]);

                $vehicleRecord = VehicleRecord::create([
                    'customer_id' => $customerProfile->id,
                ]);

                $guarantorProfile = GuarantorProfile::create([
                    'customer_id' => $customerProfile->id,
                    'lease_inquiry_id' => $inquiry->id,
                    'is_first' => true,
                ]);

                $guarantorProfile2 = GuarantorProfile::create([
                    'customer_id' => $customerProfile->id,
                    'lease_inquiry_id' => $inquiry->id,
                    'is_first' => false,
                ]);

                $inquiry->vehicle_id = $vehicleRecord->id;
                $inquiry->guarantor_id = $guarantorProfile->id;
                $inquiry->guarantor2_id = $guarantorProfile2->id;
                $inquiry->save();

                break;

            case 'FD':
                $inquiry = InquiryFd::create([
                    'inquiry_step' => 'CUSTOMER_PROFILE_ASSIGNED',
                ]);

                break;

            case 'INSURANCE':
                $inquiry = InquiryInsurance::create([
                    'inquiry_step' => 'CUSTOMER_PROFILE_ASSIGNED',
                ]);

                $vehicleRecord = VehicleRecord::create([
                    'customer_id' => $customerProfile->id,
                ]);

                $inquiry->vehicle_id = $vehicleRecord->id;
                $inquiry->save();

                break;

            case 'PAWNING':
                $inquiry = InquiryPawning::create([
                    'inquiry_step' => 'CUSTOMER_PROFILE_ASSIGNED',
                ]);

                break;
        }

        $inquiryGeneral = Inquiry::create([
            'customer_id' => $customerProfile->id,
            'inquiry_type' => $request->inquiry_type,
            'inquiry_status' => 'DRAFT',
            'reference_inquiry_id' => $inquiry->id,
        ]);
        
        return response()->json([
            'error' => false,
            'message' => 'Inquiry initiated successfully',
            'inquiry_id' => $inquiryGeneral->id,
            'inquiry_type' => $request->inquiry_type,
        ]);
    }

    public function storeVehicleDetailsEssentials(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'vehicle_register_state' => 'required|string|in:REGISTERED,NOT-REGISTERED',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Inquiry type is required',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        if(!$inquiryGeneral){
            return response()->json([
                'error' => true,
                'message' => 'Invalid inquiry id',
                'vehicle_record' => null,
            ]);
        }

        $vehicleRecord = null;
        if($inquiryGeneral->inquiry_type == 'LEASE'){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
            $vehicleRecord = VehicleRecord::find($inquiryLease->vehicle_id);
        }

        if($inquiryGeneral->inquiry_type == 'INSURANCE'){
            $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
            $vehicleRecord = VehicleRecord::find($inquiryInsurance->vehicle_id);
        }
        
        if(!$vehicleRecord){
            return response()->json([
                'error' => true,
                'message' => 'We could not find your vehicle inquiry record',
                'vehicle_record' => null,
            ]);
        }

        if($request->vehicle_register_state == 'REGISTERED'){
            $vehicleRecord->is_registered = true;
            $vehicleRecord->number_plate = $request->vehicle_registered_number;
            $vehicleRecord->registered_year = $request->registered_year;
        }else{
            $vehicleRecord->is_registered = false;
        }

        $vehicleRecord->make = $request->vehicle_make;
        $vehicleRecord->model = $request->vehicle_model;
        $vehicleRecord->manufactured_year = $request->manufactured_year;
        $vehicleRecord->meter_reading = $request->meter_reading;
        $vehicleRecord->engine_number = $request->engine_number;
        $vehicleRecord->chassis_number = $request->chassis_number;
        $vehicleRecord->engine_capacity = $request->engine_capacity;
        $vehicleRecord->seating_capacity = $request->seating_capacity;
        $vehicleRecord->save();

        return response()->json([
            'error' => false,
            'message' => 'Vehicle details updated successfully',
            'vehicle_record' => $vehicleRecord->getVehicleRecordEssentials(),
        ]);
    }

    public function storeVehicleImage(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'image_type' => 'required|string|in:VEHICLE-LEFT,VEHICLE-RIGHT,VEHICLE-FRONT,VEHICLE-REAR,METER-READING,LESSEE-AND-VEHICLE,CHASSIS-NUMBER,ENGINE-NUMBER,REGISTRATION-CERTIFICATE',
            'vehicle_photo' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing information. Please provide all the information',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        if(!$inquiryGeneral){
            return response()->json([
                'error' => true,
                'message' => 'Invalid inquiry id',
                'image_type' => $request->image_type,
                'vehicle_record' => null,
            ]);
        }

        $vehicleRecord = null;
        if($inquiryGeneral->inquiry_type == 'LEASE'){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
            $vehicleRecord = VehicleRecord::find($inquiryLease->vehicle_id);
        }

        if($inquiryGeneral->inquiry_type == 'INSURANCE'){
            $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
            $vehicleRecord = VehicleRecord::find($inquiryInsurance->vehicle_id);
        }

        if(!$vehicleRecord){
            return response()->json([
                'error' => true,
                'message' => 'We could not find your vehicle inquiry record',
                'image_type' => $request->image_type,
                'vehicle_record' => null,
            ]);
        }

        $fileName = null;
        $vehiclePhoto = $request->file('vehicle_photo');
        $fileName = uniqid('vehicle_'.$vehicleRecord->id.'d') . '.' . $vehiclePhoto->getClientOriginalExtension();
        $vehiclePhoto->storeAs('vehicles', $fileName);

        switch($request->image_type){
            case 'VEHICLE-LEFT':
                $vehicleRecord->pic_vehicle_left = $fileName;
                break;
            case 'VEHICLE-RIGHT':
                $vehicleRecord->pic_vehicle_right = $fileName;
                break;
            case 'VEHICLE-FRONT':
                $vehicleRecord->pic_vehicle_front = $fileName;
                break;
            case 'VEHICLE-REAR':
                $vehicleRecord->pic_vehicle_rear = $fileName;
                break;
            case 'METER-READING':
                $vehicleRecord->pic_meter_reading = $fileName;
                break;
            case 'LESSEE-AND-VEHICLE':
                $vehicleRecord->pic_lessee_and_vehicle = $fileName;
                break;
            case 'CHASSIS-NUMBER':
                $vehicleRecord->pic_chassis_number = $fileName;
                break;
            case 'ENGINE-NUMBER':
                $vehicleRecord->pic_engine_number = $fileName;
                break;
            case 'REGISTRATION-CERTIFICATE':
                $vehicleRecord->pic_registration_certificate = $fileName;
                break;
        }

        $vehicleRecord->save();

        return response()->json([
            'error' => false,
            'message' => 'Successfully uploaded the vehicle image',
            'image_type' => $request->image_type,
            'vehicle_record' => $vehicleRecord->getVehicleRecordEssentials(),
        ]);
    }

    public function storeBankStatement(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'statement_start_date' => 'required|date',
            'statement_end_date' => 'required|date',
            'statement_file' => 'required|mimes:jpeg,jpg,png,gif,pdf'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing information. Please provide all the information',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();

        $fileName = null;
        if ($request->hasFile('statement_file')) {
            $statementFile = $request->file('statement_file');

            // Generate a unique file name
            $fileName = uniqid('stmt_'.$inquiryGeneral->id.'b') . '.' . $statementFile->getClientOriginalExtension();

            // Save the file to storage
            $statementFile->storeAs('statements', $fileName);
        }

        $beginingOfStartDate = Carbon::parse($request->statement_start_date)->startOfDay();
        $endOfEndDate = Carbon::parse($request->statement_end_date)->endOfDay();

        $bankStatement = BankStatement::create([
            'owner_type' => 'CUSTOMER',
            'customer_id' => $customerProfile->id,
            'statement_start_date' => $beginingOfStartDate,
            'statement_end_date' => $endOfEndDate,
            'statement_file' => $fileName,
        ]);
        return response()->json([
            'error' => false,
            'message' => 'Bank Statement stored successfully',
            'bank_statement' => $bankStatement->getBankStatementEssentials(),
            'statements_ready' => BankStatement::isBankStatementsProvided($inquiryGeneral->created_at, $customerProfile->id),
            'missing_statements' => BankStatement::getMissingStatementsMessage($inquiryGeneral->created_at, $customerProfile->id),
        ]);
    }

    public function storeBillingProof(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'bill_name' => 'required|string',
            'bill_type' => 'required|in:ELECTRICITY_BILL,WATER_BILL,OTHER_BILL',
            'bill_file' => 'required|mimes:jpeg,jpg,png,gif,pdf'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing billing information. Please provide all the information',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();

        $fileName = null;
        if ($request->hasFile('bill_file')) {
            $billFile = $request->file('bill_file');
            $fileName = uniqid('bill_'.$inquiryGeneral->id.'c') . '.' . $billFile->getClientOriginalExtension();
            $billFile->storeAs('bills', $fileName);
        }

        $billingProof = BillingProof::create([
            'owner_type' => 'CUSTOMER',
            'customer_id' => $customerProfile->id,
            'proof_type' => $request->bill_type,
            'title' => $request->bill_name,
            'document_file' => $fileName,
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Billing proof stored successfully',
            'bill_name' => $request->bill_name,
            'bill_type' => $request->bill_type,
            'billing_proof' => $billingProof->getBillingProofEssentials(),
        ]);
    }

    public function storeNic(Request $request){
        $validator = Validator::make($request->all(), [
            'nic_side' => 'required|string|in:front,back',
            'nic_file' => 'required|mimes:jpeg,jpg,png'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing or invalid information NIC. Please try again.',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();

        $fileName = null;
        if ($request->hasFile('nic_file')) {
            $nicFile = $request->file('nic_file');

            // Generate a unique file name
            $fileName = uniqid('nic_'.$customerProfile->id.'n') . '.' . $nicFile->getClientOriginalExtension();

            // Save the file to storage
            $nicFile->storeAs('customers', $fileName);
        }

        if($request->nic_side == 'front'){
            $customerProfile->pic_nic_front = $fileName;
            $customerProfile->save();
        }else{
            $customerProfile->pic_nic_back = $fileName;
            $customerProfile->save();
        }

        return response()->json([
            'error' => false,
            'message' => 'Customer NIC uploaded successfully',
            'customer_profile' => $customerProfile->getProfileEssentials(),
            'nic_side' => $request->nic_side,
        ]);
    }

    public function createGuarantor(Request $request, $guarantor_index){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'nic_number' => 'required|string',
            'guarantor_occupation' => 'required|string',
            'guarantor_address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'guarantor_district' => 'required|integer|min:1|max:24',
            'contact_number' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing or invalid information for Guarantor. Please try again.',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();

        if($inquiryGeneral->inquiry_type == 'LEASE'){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);

            if($inquiryLease != null){
                if($guarantor_index == 1){
                    $guarantorProfile = GuarantorProfile::find($inquiryLease->guarantor_id);
                }else{
                    $guarantorProfile = GuarantorProfile::find($inquiryLease->guarantor2_id);
                }
                

                $guarantorProfile->first_name = $request->first_name;
                $guarantorProfile->last_name = $request->last_name;
                $guarantorProfile->nic = $request->nic_number;
                $guarantorProfile->occupation = $request->guarantor_occupation;
                $guarantorProfile->contact_number = $request->contact_number;
                $guarantorProfile->address = $request->guarantor_address;
                $guarantorProfile->district_id = $request->guarantor_district;
                $guarantorProfile->inquiry_id = $inquiryGeneral->id;
                $guarantorProfile->is_first = ($guarantor_index == 1)?true:false;
                $guarantorProfile->save();

                if($guarantorProfile->isGurantorDetailsCompleted() && $this->isGuarantorBankStatementsProvided($inquiryGeneral->created_at, $guarantorProfile->id)){
                    if($guarantorProfile->is_first){
                        $inquiryLease->inquiry_step = 'GUARANTOR_ADDED';
                        $inquiryLease->save();
                    }else{
                        $inquiryLease->inquiry_step = 'GUARANTOR2_ADDED';
                        $inquiryLease->save();
                    }
                }

                return response()->json([
                    'error' => false,
                    'message' => 'Guarantor profile is updated successfully',
                    'guarantor_profile' => $guarantorProfile->getGuarantorEssentials(),
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Guarantor is not supported for Leasing type',
                'guarantor_profile' => null,
            ]);
        }
    }

    public function storeGuarantorBankStatement(Request $request, $guarantor_index){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'statement_start_date' => 'required|date',
            'statement_end_date' => 'required|date',
            'statement_file' => 'required|mimes:jpeg,jpg,png,gif,pdf'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing information for Guarantor bank statement',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);

        if($guarantor_index == 1){
            $guarantorProfile = GuarantorProfile::find($inquiryLease->guarantor_id);
        }else{
            $guarantorProfile = GuarantorProfile::find($inquiryLease->guarantor2_id);
        }
        

        $fileName = null;
        if ($request->hasFile('statement_file')) {
            $statementFile = $request->file('statement_file');
            $fileName = uniqid('stmt_'.$guarantorProfile->id.'g') . '.' . $statementFile->getClientOriginalExtension();
            $statementFile->storeAs('statements', $fileName);
        }

        $beginingOfStartDate = Carbon::parse($request->statement_start_date)->startOfDay();
        $endOfEndDate = Carbon::parse($request->statement_end_date)->endOfDay();
        $bankStatement = BankStatement::create([
            'owner_type' => 'GUARANTOR',
            'guarantor_id' => $guarantorProfile->id,
            'statement_start_date' => $beginingOfStartDate,
            'statement_end_date' => $endOfEndDate,
            'statement_file' => $fileName,
        ]);

        // Gurantor management is required by leasing inquiry only
        if($inquiryGeneral->inquiry_type == 'LEASE'){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
            if($guarantorProfile->isGurantorDetailsCompleted() && $this->isGuarantorBankStatementsProvided($inquiryGeneral->created_at, $guarantorProfile->id)){
                if($guarantorProfile->is_first){
                    $inquiryLease->inquiry_step = 'GUARANTOR_ADDED';
                    $inquiryLease->save();
                }else{
                    $inquiryLease->inquiry_step = 'GUARANTOR2_ADDED';
                    $inquiryLease->save();
                }
            }
        }

        return response()->json([
            'error' => false,
            'message' => 'Stored guarantor bank statement successfully',
            'bank_statement' => $bankStatement->getBankStatementEssentials(),
            'statements_ready' => $bankStatement->isGuarantorBankStatementsProvided($inquiryGeneral->created_at, $guarantorProfile->id),
            'missing_statements' => BankStatement::getGuarantorMissingStatementsMessage($inquiryGeneral->created_at, $guarantorProfile->id),
        ]);
    }

    public function storeGuarantorBillingProof(Request $request, $guarantor_index){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'bill_name' => 'required|string',
            'bill_type' => 'required|in:ELECTRICITY_BILL,WATER_BILL,OTHER_BILL',
            'bill_file' => 'required|mimes:jpeg,jpg,png,gif,pdf'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing information for Guarantor billing proof',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        // $guarantorProfile = GuarantorProfile::find($request->bill_guarantor_id);
        $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);

        if($guarantor_index == 1){
            $guarantorProfile = GuarantorProfile::find($inquiryLease->guarantor_id);
        }else{
            $guarantorProfile = GuarantorProfile::find($inquiryLease->guarantor2_id);
        }

        $fileName = null;
        if ($request->hasFile('bill_file')) {
            $billFile = $request->file('bill_file');

            // Generate a unique file name
            $fileName = uniqid('bill_'.$guarantorProfile->id.'g') . '.' . $billFile->getClientOriginalExtension();

            // Save the file to storage
            $billFile->storeAs('bills', $fileName);
        }

        $billingProof = BillingProof::create([
            'owner_type' => 'GUARANTOR',
            'guarantor_id' => $guarantorProfile->id,
            'proof_type' => $request->bill_type,
            'title' => $request->bill_name,
            'document_file' => $fileName,
        ]);

        if($inquiryGeneral->inquiry_type == 'LEASE'){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
            if($guarantorProfile->isGurantorDetailsCompleted() && $this->isGuarantorBankStatementsProvided($inquiryGeneral->created_at, $guarantorProfile->id)){
                if($guarantorProfile->is_first){
                    $inquiryLease->inquiry_step = 'GUARANTOR_ADDED';
                    $inquiryLease->save();
                }else{
                    $inquiryLease->inquiry_step = 'GUARANTOR2_ADDED';
                    $inquiryLease->save();
                }
            }
        }

        return response()->json([
            'error' => false,
            'message' => 'Stored guarantor billing proof successfully',
            'bill_name' => $request->bill_name,
            'bill_type' => $request->bill_type,
            'billing_proof' => $billingProof->getBillingProofEssentials(),
        ]);
    }

    public function storeGuarantorNic(Request $request, $guarantor_index){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'guarantor_id' => 'required|integer',
            'nic_side' => 'required|string|in:front,back',
            'nic_file' => 'required|mimes:jpeg,jpg,png'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing information for Guarantor NIC',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();

        $guarantorProfile = GuarantorProfile::where('id', $request->guarantor_id)
                            ->where('inquiry_id', $request->inquiry_id)
                            ->where('customer_id', $customerProfile->id)->first();

        if(!$guarantorProfile){
            return response()->json([
                'error' => true,
                'message' => 'Guarantor profile invalid referrence.',
                'data' => null
            ]);
        }

        $fileName = null;
        if ($request->hasFile('nic_file')) {
            $nicFile = $request->file('nic_file');
            $fileName = uniqid('nic_'.$guarantorProfile->id.'n') . '.' . $nicFile->getClientOriginalExtension();
            $nicFile->storeAs('guarantors', $fileName);
        }

        if($request->nic_side == 'front'){
            $guarantorProfile->pic_nic_front = $fileName;
            $guarantorProfile->save();
        }else{
            $guarantorProfile->pic_nic_back = $fileName;
            $guarantorProfile->save();
        }

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral->inquiry_type == 'LEASE'){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
            if($guarantorProfile->isGurantorDetailsCompleted() && $this->isGuarantorBankStatementsProvided($inquiryGeneral->created_at, $guarantorProfile->id)){
                if($guarantorProfile->is_first){
                    $inquiryLease->inquiry_step = 'GUARANTOR_ADDED';
                    $inquiryLease->save();
                }else{
                    $inquiryLease->inquiry_step = 'GUARANTOR2_ADDED';
                    $inquiryLease->save();
                }
            }
        }

        return response()->json([
            'error' => false,
            'message' => 'Stored guarantor NIC successfully',
            'guarantor_profile' => $guarantorProfile->getGuarantorEssentials(),
            'nic_side' => $request->nic_side,
        ]);
    }

    public function storePawningDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'pawning_essentials_jewellery_details' => 'required',
            'pawning_amount' => 'required|integer',
            'pawn_status' => 'required|in:true,false'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing information for pawning essentials',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id);

        if($inquiryPawning){
            $selectedJewellery = json_decode($request->pawning_essentials_jewellery_details);

            if(count($selectedJewellery->jewellery_types) >= 1){
                PawningJewellery::where('pawning_inquiry_id', $inquiryPawning->id)->delete();
                
                foreach($selectedJewellery->jewellery_types as $jewellery){
                    PawningJewellery::create([
                        'pawning_inquiry_id' => $inquiryPawning->id,
                        'description' => $jewellery->name,
                        'jewellery_count' => $jewellery->count,
                    ]);
                }

                if($request->pawn_status == 'true'){
                    $inquiryPawning->pawned_elsewhere = true;
                }else{
                    $inquiryPawning->pawned_elsewhere = false;
                }

                $inquiryPawning->is_jewellery_added = true;
                $inquiryPawning->amount = $request->pawning_amount;
                $inquiryPawning->save();

                return response()->json([
                    'error' => false,
                    'message' => 'Successfully recorded pawning details',
                    'pawning_inquiry' => $inquiryPawning,
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Jewellery types and quantities required',
                    'pawning_inquiry' => null,
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Sorry! We could not find your pawning record.',
                'data' => null,
            ]);
        }
    }

    public function storeFdDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
            'amount' => 'required|integer',
            'period' => 'required|in:1_MONTH,3_MONTHS,6_MONTHS,1_YEAR,2_YEARS,3_YEARS,4_YEARS,5_YEARS',
            'preferred_rate' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing or invalid information for FD essentials',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id);

        if($inquiryFd){
            $inquiryFd->amount = $request->amount;
            $inquiryFd->period = $request->period;
            $inquiryFd->preferred_rate = $request->preferred_rate;
            $inquiryFd->save();

            return response()->json([
                'error' => false,
                'message' => 'Successfully recorded fd details',
                'fd_inquiry' => $inquiryFd,
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'FD inquiry was not found',
                'fd_inquiry' => null,
            ]);
        }
    }

    public function submitLeaseInquiry(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing or invalid inquiry id',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
        if($inquiryLease){
            $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
            $inquiryGeneral->save();

            $inquiryLease->inquiry_step = 'INQUIRY_SUBMITTED';
            $inquiryLease->save();

            return response()->json([
                'error' => false,
                'message' => 'Inquiry submitted successfully',
                'inquiry_lease' => $inquiryLease,
                'inquiry_info' => $inquiryGeneral
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Invalid user-inquiry combibation.',
                'inquiry_lease' => null,
                'inquiry_info' => null
            ]);
        }
    }

    public function submitFdInquiry(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing or invalid inquiry id',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id);
        if($inquiryFd){
            $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
            $inquiryGeneral->save();

            $inquiryFd->inquiry_step = 'INQUIRY_SUBMITTED';
            $inquiryFd->save();

            return response()->json([
                'error' => false,
                'message' => 'Inquiry submitted successfully',
                'inquiry_fd' => $inquiryFd,
                'inquiry_info' => $inquiryGeneral
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Invalid user-inquiry combibation.',
                'inquiry_fd' => null,
                'inquiry_info' => null
            ]);
        }
    }

    public function submitInsuranceInquiry(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing or invalid inquiry id',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
        if($inquiryInsurance){
            $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
            $inquiryGeneral->save();

            $inquiryInsurance->inquiry_step = 'INQUIRY_SUBMITTED';
            $inquiryInsurance->save();

            return response()->json([
                'error' => false,
                'message' => 'Inquiry submitted successfully',
                'inquiry_insurance' => $inquiryInsurance,
                'inquiry_info' => $inquiryGeneral
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Invalid user-inquiry combibation.',
                'inquiry_insurance' => null,
                'inquiry_info' => null
            ]);
        }
    }

    public function submitGoldLoanInquiry(Request $request){
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Missing or invalid inquiry id',
            ], 422);
        }

        $user = $request->user();
        $customerProfile = CustomerProfile::where('user_id', $user->id)->first();
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id);
        if($inquiryPawning){
            $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
            $inquiryGeneral->save();

            $inquiryPawning->inquiry_step = 'INQUIRY_SUBMITTED';
            $inquiryPawning->save();

            return response()->json([
                'error' => false,
                'message' => 'Inquiry submitted successfully',
                'inquiry_pawning' => $inquiryPawning,
                'inquiry_info' => $inquiryGeneral
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Invalid user-inquiry combibation.',
                'inquiry_pawning' => null,
                'inquiry_info' => null
            ]);
        }
    }
}
