<?php

namespace App\Http\Controllers;

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
use App\Models\PaymentLease;
use App\Models\VehicleRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class InquiryDearoController extends Controller
{
    public function viewLeaseInquiry($inquiry_id){
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::find($inquiryId);
            $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);

            if($inquiryGeneral->inquiry_type == 'LEASE'){
                $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
                $vehicleRecord = VehicleRecord::find($inquiryLease->vehicle_id);
                $bankStatements = BankStatement::getInquiryStatements($inquiryGeneral);
                $billingProof = BillingProof::where('customer_id', $inquiryGeneral->customer_id)->where('owner_type', 'CUSTOMER')->latest('id')->first();
                $guarantorDetails = GuarantorProfile::find($inquiryLease->guarantor_id);
                $guarantor2Details = GuarantorProfile::find($inquiryLease->guarantor2_id);
                $guarantorStatements = BankStatement::getGuarantorStatements($inquiryLease);
                $guarantor2Statements = BankStatement::getGuarantor2Statements($inquiryLease);
                $guarantorBillingProof = BillingProof::where('guarantor_id', $inquiryLease->guarantor_id)->where('owner_type', 'GUARANTOR')->latest('id')->first();
                $guarantor2BillingProof = BillingProof::where('guarantor_id', $inquiryLease->guarantor2_id)->where('owner_type', 'GUARANTOR')->latest('id')->first();

                return view('dearo-inquiry.inquiry-lease-manage', [
                    'inquiry_general' => $inquiryGeneral,
                    'customer_profile' => $customerProfile, 
                    'lease_details' => $inquiryLease, 
                    'vehicle_details' => $vehicleRecord, 
                    'bank_statements' => $bankStatements,
                    'billing_proof' => $billingProof,
                    'guarantor_detials' => $guarantorDetails,
                    'guarantor_statements' => $guarantorStatements,
                    'guarantor_billing_proof' => $guarantorBillingProof,
                    'guarantor2_detials' => $guarantor2Details,
                    'guarantor2_statements' => $guarantor2Statements,
                    'guarantor2_billing_proof' => $guarantor2BillingProof,
                ]);

            }else if($inquiryGeneral->inquiry_type == 'FD'){
                return redirect()->route('dearo.inquiry.fd.application.load', ['inquiry_id' => $inquiry_id]);
            }else if($inquiryGeneral->inquiry_type == 'INSURANCE'){
                return redirect()->route('dearo.inquiry.insurance.application.load', ['inquiry_id' => $inquiry_id]);
            }
            
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function updateLeaseInquiryState(Request $request){
        $request->validate([
            'lease_inquiry_status' => 'required|string|in:INQUIRY_SUBMITTED,DEARO1_INITIAL_APPROVAL,DEARO2_CUSTOMER_VISIT,DEARO3_SUBMIT_FOR_APPROVAL,DEARO4_APPLIED_FOR_MANAGER_APPROVAL,DERO5_PAYMENT_RELEASED',
            'inquiry_id' => 'required|integer'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryLease){
                $inquiryLease->inquiry_step = $request->lease_inquiry_status;
                $inquiryLease->save();
            }
        }

        return redirect()->route('dearo.inquiry.lease.application.load',['inquiry_id' => Crypt::encrypt($request->inquiry_id)]);
    }

    public function loadLeaseInquiryActionPanel($inquiry_id){
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::find($inquiryId);
            $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);

            if($inquiryGeneral->inquiry_type == 'LEASE'){
                $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
                $vehicleRecord = VehicleRecord::find($inquiryLease->vehicle_id);
                $bankStatements = BankStatement::getInquiryStatements($inquiryGeneral);
                $billingProof = BillingProof::where('customer_id', $inquiryGeneral->customer_id)->where('owner_type', 'CUSTOMER')->latest('id')->first();
                $guarantorDetails = GuarantorProfile::find($inquiryLease->guarantor_id);
                $guarantorStatements = BankStatement::getGuarantorStatements($inquiryLease);
                $guarantorBillingProof = BillingProof::where('guarantor_id', $inquiryLease->guarantor_id)->where('owner_type', 'GUARANTOR')->latest('id')->first();
                $paymentsLease = PaymentLease::where('lease_inquiry_id', $inquiryLease->id)->orderBy('id', 'DESC')->get();

                return view('dearo-inquiry.inquiry-lease-actions', [
                    'inquiry_general' => $inquiryGeneral,
                    'customer_profile' => $customerProfile, 
                    'lease_details' => $inquiryLease, 
                    'vehicle_details' => $vehicleRecord, 
                    'bank_statements' => $bankStatements,
                    'billing_proof' => $billingProof,
                    'guarantor_detials' => $guarantorDetails,
                    'guarantor_statements' => $guarantorStatements,
                    'guarantor_billing_proof' => $guarantorBillingProof,
                    'payment_records' => $paymentsLease,
                ]);

            }else if($inquiryGeneral->inquiry_type == 'FD'){
                return redirect()->route('dearo.inquiry.fd.application.load', ['inquiry_id' => $inquiry_id]);
            }else if($inquiryGeneral->inquiry_type == 'INSURANCE'){
                return redirect()->route('dearo.inquiry.insurance.application.load', ['inquiry_id' => $inquiry_id]);
            }
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function activateArrearsLeaseInquiry(Request $request){
        $request->validate([
            'inquiry_id' => 'required|integer'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryLease){
                $inquiryLease->is_arrears = true;
                $inquiryLease->save();

                return response()->json([
                    'error' => false,
                    'message' => 'Successfully marked as arrears',
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Inquiry type mismatch',
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Invalid Inquiry Reference',
            ]);
        }
    }

    public function deactivateArrearsLeaseInquiry(Request $request){
        $request->validate([
            'inquiry_id' => 'required|integer'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryLease){
                $inquiryLease->is_arrears = false;
                $inquiryLease->save();

                return response()->json([
                    'error' => false,
                    'message' => 'Successfully marked as not-arrears',
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Inquiry type mismatch',
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Invalid Inquiry Reference',
            ]);
        }
    }

    public function activateVehicleMissingLeaseInquiry(Request $request){
        $request->validate([
            'inquiry_id' => 'required|integer'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryLease){
                $inquiryLease->vehicle_missing = true;
                $inquiryLease->save();

                return response()->json([
                    'error' => false,
                    'message' => 'Successfully marked the vehicle is missing',
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Inquiry type mismatch',
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Invalid Inquiry Reference',
            ]);
        }
    }

    public function deactivateVehicleMissingLeaseInquiry(Request $request){
        $request->validate([
            'inquiry_id' => 'required|integer'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryLease){
                $inquiryLease->vehicle_missing = false;
                $inquiryLease->save();

                return response()->json([
                    'error' => false,
                    'message' => 'Successfully marked the vehicle is found',
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Inquiry type mismatch',
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Invalid Inquiry Reference',
            ]);
        }
    }

    public function newPaymentLeaseInquiry(Request $request){
        $request->validate([
            'inquiry_id' => 'required|integer',
            'input_payment_term' => 'required|date',
            'input_payment_amount' => 'required|numeric'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryLease){
                // dd($request->input_payment_term.'-01');
                PaymentLease::create([
                    'lease_inquiry_id' => $inquiryLease->id,
                    'amount' => $request->input_payment_amount,
                    'payment_term' => $request->input_payment_term.'-01',
                    'system_reference' => $request->input_system_reference,
                ]);

                return redirect()->route('dearo.inquiry.lease.application.action.panel', ['inquiry_id' => Crypt::encrypt($request->inquiry_id)]);
            }
        }

        return back();
    }

    public function editPaymentLeaseInquiry(Request $request){
        return response()->json([
            'error' => true,
            'message' => 'Being Implemented - Edit Payment',
        ]);
    }

    public function deletePaymentLeaseInquiry(Request $request){
        return response()->json([
            'error' => true,
            'message' => 'Being Implemented - Delete Payment',
        ]);
    }

    public function viewFdInquiry($inquiry_id){
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::find($inquiryId);
            $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);

            if($inquiryGeneral->inquiry_type == 'FD'){
                $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id);
                return view('dearo-inquiry.inquiry-fd-manage', [
                    'inquiry_general' => $inquiryGeneral,
                    'customer_profile' => $customerProfile, 
                    'fd_details' => $inquiryFd
                ]);
                
            }else if($inquiryGeneral->inquiry_type == 'LEASE'){
                return redirect()->route('dearo.inquiry.lease.application.load', ['inquiry_id' => $inquiry_id]);
            }else if($inquiryGeneral->inquiry_type == 'INSURANCE'){
                return redirect()->route('dearo.inquiry.insurance.application.load', ['inquiry_id' => $inquiry_id]);
            }
            
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function updateFdInquiryState(Request $request){
        $request->validate([
            'fd_inquiry_status' => 'required|string|in:INQUIRY_SUBMITTED,DEARO1_INQUIRY_REVIEWED,DEARO2_INQUIRY_APPROVED',
            'inquiry_id' => 'required|integer'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryFd){
                $inquiryFd->inquiry_step = $request->fd_inquiry_status;
                $inquiryFd->save();
            }
        }

        return redirect()->route('dearo.inquiry.fd.application.load',['inquiry_id' => Crypt::encrypt($request->inquiry_id)]);
    }

    public function viewInsuranceInquiry($inquiry_id){
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::find($inquiryId);
            $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);

            if($inquiryGeneral->inquiry_type == 'INSURANCE'){
                $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
                $vehicleRecord = VehicleRecord::find($inquiryInsurance->vehicle_id);

                return view('dearo-inquiry.inquiry-insurance-manage', [
                    'inquiry_general' => $inquiryGeneral,
                    'customer_profile' => $customerProfile, 
                    'insurance_details' => $inquiryInsurance, 
                    'vehicle_details' => $vehicleRecord
                ]);

            }else if($inquiryGeneral->inquiry_type == 'LEASE'){
                return redirect()->route('dearo.inquiry.lease.application.load', ['inquiry_id' => $inquiry_id]);
            }else if($inquiryGeneral->inquiry_type == 'FD'){
                return redirect()->route('dearo.inquiry.fd.application.load', ['inquiry_id' => $inquiry_id]);
            }
            
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function updateInsuranceInquiryState(Request $request){
        $request->validate([
            'insurance_inquiry_status' => 'required|string|in:INQUIRY_SUBMITTED,DEARO1_INQUIRY_REVIEWED,DEARO2_INQUIRY_APPROVED',
            'inquiry_id' => 'required|integer'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryInsurance){
                $inquiryInsurance->inquiry_step = $request->insurance_inquiry_status;
                $inquiryInsurance->save();
            }
        }

        return redirect()->route('dearo.inquiry.insurance.application.load',['inquiry_id' => Crypt::encrypt($request->inquiry_id)]);
    }

    public function viewPawningInquiry($inquiry_id){
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::find($inquiryId);
            $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);

            if($inquiryGeneral->inquiry_type == 'PAWNING'){
                $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id);
                $jewelleryDetails = PawningJewellery::where('pawning_inquiry_id', $inquiryPawning->id)->get();
                return view('dearo-inquiry.inquiry-pawning-manage', [
                    'inquiry_general' => $inquiryGeneral,
                    'customer_profile' => $customerProfile, 
                    'pawning_details' => $inquiryPawning,
                    'jewellery_details' => (count($jewelleryDetails) > 0)? json_encode($jewelleryDetails):null,
                ]);
                
            }else if($inquiryGeneral->inquiry_type == 'LEASE'){
                return redirect()->route('dearo.inquiry.lease.application.load', ['inquiry_id' => $inquiry_id]);
            }else if($inquiryGeneral->inquiry_type == 'FD'){
                return redirect()->route('dearo.inquiry.fd.application.load', ['inquiry_id' => $inquiry_id]);
            }else if($inquiryGeneral->inquiry_type == 'INSURANCE'){
                return redirect()->route('dearo.inquiry.insurance.application.load', ['inquiry_id' => $inquiry_id]);
            }
            
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function updatePawningInquiryState(Request $request){
        $request->validate([
            'fd_inquiry_status' => 'required|string|in:INQUIRY_SUBMITTED,DEARO1_INQUIRY_REVIEWED,DEARO2_INQUIRY_APPROVED',
            'inquiry_id' => 'required|integer'
        ]);

        $inquiryGeneral = Inquiry::find($request->inquiry_id);
        if($inquiryGeneral){
            $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id)->first();
            if($inquiryPawning){
                $inquiryPawning->inquiry_step = $request->fd_inquiry_status;
                $inquiryPawning->save();
            }
        }

        return redirect()->route('dearo.inquiry.pawning.application.load',['inquiry_id' => Crypt::encrypt($request->inquiry_id)]);
    }
}
