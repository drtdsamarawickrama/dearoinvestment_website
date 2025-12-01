<?php

namespace App\Http\Controllers;

use App\Models\BankStatement;
use App\Models\BillingProof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\CustomerProfile;
use App\Models\DataDeletionRequest;
use App\Models\GuarantorProfile;
use App\Models\User;
use App\Models\Inquiry;
use App\Models\InquiryLease;
use App\Models\InquiryFd;
use App\Models\InquiryInsurance;
use App\Models\InquiryPawning;
use App\Models\PawningJewellery;
use App\Models\VehicleRecord;
use Carbon\Carbon;
use Exception;
use PhpParser\Node\Stmt\Break_;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class InquiryCustomerController extends Controller
{
    public function loadDashboard(){
        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $inquiries = Inquiry::where('customer_id', $customerProfile->id)->get();

        return view('customer-inquiry.dashboard', [
            "customer_profile" => $customerProfile,
            "inquiries" => $inquiries,
        ]);
    }

    public function loadDeleteCustomerData(){
        return view('customer-inquiry.delete-data');
    }

    public function deleteCustomerDataRecord(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'reason' => 'required|string',
            'specifics' => 'required|string',
        ]);

        DataDeletionRequest::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'reason' => $request->reason,
            'specifics' => $request->specifics,
            'is_deleted' => false,
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Deletion request recorded successfully',
        ]);
    }

    public function loadProductListing(){
        return view('customer-inquiry.product-listing', [
            'is_logged' => Auth::check()
        ]);
    }

    public function goToNextAction($inquiry_id){
        // if inquiry completed take to inquiry sumary page

        // put a switch to each inquiry type
        // a nested switch to redirect based on current status
        $inquiryGeneral = Inquiry::find($inquiry_id);
        if($inquiryGeneral->inquiry_type == 'LEASE'){

            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
            echo "Lease inquiry found ".$inquiryLease->id." with state ".$inquiryLease->inquiry_step;
            
            switch($inquiryLease->inquiry_step){
                case 'CUSTOMER_PROFILE_ASSIGNED':
                    $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);
                    if($customerProfile->is_completed){
                        // Load collect vehicle details
                        return redirect()->route('inquiry.vehicle.detail.collection.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    }else{
                        // Load complete profile
                        return redirect()->route('inquiry.customer.profile.completion.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    }
                    break;
                
                case 'VEHICLE_DETAILS_ADDED':
                    return redirect()->route('inquiry.bank.proof.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    break;

                case 'BANK_DETAILS_ADDED':
                    return redirect()->route('inquiry.guarantor.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    break;

                case 'GUARANTOR_ADDED':
                    return redirect()->route('inquiry.guarantor2.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    break;

                case 'GUARANTOR2_ADDED';
                    $inquiryLease->inquiry_step = 'INQUIRY_SUBMITTED';
                    $inquiryLease->save();
                    
                    $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
                    $inquiryGeneral->save();
                    
                    return redirect()->route('customer.dashboard.load');
                    break;

                case 'INQUIRY_SUBMITTED':
                    break;
            }
        }

        if($inquiryGeneral->inquiry_type == 'FD'){
            $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id);
            switch($inquiryFd->inquiry_step){
                case 'CUSTOMER_PROFILE_ASSIGNED':
                    $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);
                    if($customerProfile->is_completed){
                        // Load collect vehicle details
                        echo "Profile is completed";
                        return redirect()->route('inquiry.fd.detail.collection.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    }else{
                        // Load complete profile
                        echo "Profile incomplete";
                        return redirect()->route('inquiry.customer.profile.completion.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    }
                    break;

                case 'FD_DETAILS_ADDED':
                    // Mark as submit and route to dashboard - In future show summary page
                    $inquiryFd->inquiry_step = 'INQUIRY_SUBMITTED';
                    $inquiryFd->save();
                    
                    $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
                    $inquiryGeneral->save();
                    
                    return redirect()->route('customer.dashboard.load');
                    break;

                case 'INQUIRY_SUBMITTED':
                    break;
            }
        }

        if($inquiryGeneral->inquiry_type == 'INSURANCE'){
            $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
            switch($inquiryInsurance->inquiry_step){
                case 'CUSTOMER_PROFILE_ASSIGNED':
                    $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);
                    if($customerProfile->is_completed){
                        // Load collect vehicle details
                        echo "Profile is completed";
                        return redirect()->route('inquiry.vehicle.detail.collection.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    }else{
                        // Load complete profile
                        echo "Profile incomplete";
                        return redirect()->route('inquiry.customer.profile.completion.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    }
                    break;

                case 'VEHICLE_DETAILS_ADDED':
                    $inquiryInsurance->inquiry_step = 'INQUIRY_SUBMITTED';
                    $inquiryInsurance->save();
                    
                    $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
                    $inquiryGeneral->save();
                    
                    return redirect()->route('customer.dashboard.load');
                    break;

                case 'INQUIRY_SUBMITTED':
                    break;
            }
        }

        if($inquiryGeneral->inquiry_type == 'PAWNING'){
            $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id);
            switch($inquiryPawning->inquiry_step){
                case 'CUSTOMER_PROFILE_ASSIGNED':
                    $customerProfile = CustomerProfile::find($inquiryGeneral->customer_id);
                    if($customerProfile->is_completed){
                        return redirect()->route('inquiry.pawning.detail.collection.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    }else{
                        return redirect()->route('inquiry.customer.profile.completion.load', ['inquiry_id' => Crypt::encrypt($inquiry_id)]);
                    }

                case 'PAWN_DETAILS_ADDED':
                    $inquiryPawning->inquiry_step = 'INQUIRY_SUBMITTED';
                    $inquiryPawning->save();
                    
                    $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
                    $inquiryGeneral->save();
                    
                    return redirect()->route('customer.dashboard.load');

                case 'INQUIRY_SUBMITTED':
                    break;
            }
        }
    }

    public function proceedToNextStep(Request $request){
        $request->validate([
            'inquiry_id' => 'required|integer',
        ]);

        $user_id = Auth::id();
        $user = User::find($user_id);

        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $inquiryGeneral = Inquiry::where('id', $request->inquiry_id)->where('customer_id', $customerProfile->id)->first();
        if($inquiryGeneral){
            return $this->goToNextAction($inquiryGeneral->id);
        }else{
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function loadInquiryInitiation($inquiry_type){
        switch($inquiry_type){
            case 'lease':
                return view('customer-inquiry.inquiry-lease-begin', ['is_logged' => Auth::check()]);
                break;
            case 'fixed-deposit':
                return view('customer-inquiry.inquiry-fd-begin', ['is_logged' => Auth::check()]);
                break;
            case 'insurance':
                return view('customer-inquiry.inquiry-insurance-begin', ['is_logged' => Auth::check()]);
                break;
            case 'pawning':
                return view('customer-inquiry.inquiry-pawning-begin', ['is_logged' => Auth::check()]);
                break;
            default:
                break;
        }
    }

    public function initiateInquiry(Request $request, $inquiry_type){
        $request->validate([
            'input_inquiry_type' => 'required|in:LEASE,FD,INSURANCE,PAWNING',
        ]);

        $customerProfile = null;
        if(Auth::check()){
            // Check for customer profile
            $user_id = Auth::id();
            $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
            if(empty($customerProfile)){
                // Logout the user. System user attempting to make an inquiry
            }
        }else{
            // Create customer profile
            $request->validate([
                'input_mobile' => 'required|digits:10',
                'input_password' => 'required',
                'input_first_name' => 'required',
                'input_last_name' => 'required',
            ]);

            if((User::where('mobile',$request->input_mobile))->exists()){
                return redirect()->route('login');
            }

            $user = User::create([
                'name' => $request->input_first_name.' '.$request->input_last_name,
                'email' => $request->input_mobile.".customer@dearoinvestment.com",
                'mobile' => $request->input_mobile,
                'password' => bcrypt($request->input_password),
            ]);

            $user->assignRole('customer');
            
            Auth::login($user);

            $customerProfile = CustomerProfile::create([
                'user_id' => $user->id,
                'first_name' => $request->input_first_name,
                'last_name' => $request->input_last_name,
                'mobile_number' => $request->input_mobile,
            ]);
        }

        // Initiate inquiry
        $inquiry = null;
        switch($request->input_inquiry_type){
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
            'inquiry_type' => $request->input_inquiry_type,
            'inquiry_status' => 'DRAFT',
            'reference_inquiry_id' => $inquiry->id,
        ]);

        return $this->goToNextAction($inquiryGeneral->id);
    }

    public function loadCustomerProfileCompletion($inquiry_id){
        try {
            $inquiryIdEncrypted = $inquiry_id;
            $inquiryId = Crypt::decrypt($inquiry_id);
            $user_id = Auth::id();
            $user = User::find($user_id);

            // If user login found
            $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
            $inquiryGeneral = Inquiry::find($inquiryId);

            $inquiryStatus = array();
            $inquiryStatus['inquiry_id'] = $inquiryId;
            $inquiryStatus['status'] = $inquiryGeneral->inquiry_status;
            $inquiryStatus['title'] = 'Complete Profile';

            switch($inquiryGeneral->inquiry_type){
                case 'LEASE':
                    $inquiryStatus['sub_title'] = 'Own your dream vehicle';
                    $inquiryStatus['total_steps'] = 5;
                    $inquiryStatus['current_step'] = 1;
                    break;

                case 'FD':
                    $inquiryStatus['sub_title'] = 'Invest today for tomorrow';
                    $inquiryStatus['total_steps'] = 2;
                    $inquiryStatus['current_step'] = 1;
                    break;

                case 'INSURANCE':
                    $inquiryStatus['sub_title'] = 'Protected by Dearo';
                    $inquiryStatus['total_steps'] = 2;
                    $inquiryStatus['current_step'] = 1;
                    break;

                case 'PAWNING':
                    $inquiryStatus['sub_title'] = 'Invest today for tomorrow';
                    $inquiryStatus['total_steps'] = 2;
                    $inquiryStatus['current_step'] = 1;
                    break;

            }

            return view('customer-inquiry.customer-profile-create', ['user' => $user, 'customer_profile' => $customerProfile, 'inquiry_id_encripted' => $inquiryIdEncrypted, 'inquiry' => $inquiryGeneral, 'state' => $inquiryStatus]);
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    // 1.1 Check customer profile availability
    public function checkCustomerProfileAvailability($customer_mobile){
        // Find profile with the given email
        $user = User::where('mobile', $customer_mobile)->first();
        if($user){
            return response()->json([
                'error' => false,
                'mobile_available' => false,
                'message' => 'Customer mobile account is already created',
            ]);
        }else{
            return response()->json([
                'error' => false,
                'mobile_available' => true,
                'message' => 'No customer account is found for the mobile',
            ]);
        }
    }

    // 1.2 Login while making an inquiry
    public function loginDuringInquiry(Request $request, $inquiry_type){
        // Login and redirect to inquiry initiation
    }

    // 2. Complete profile an redirect to relevant inquiry create page - The user has to be logged in by now
    public function saveCustomerProfileDetails(Request $request){
        $request->validate([
            'date_of_birth' => 'required|date',
            'customer_nic' => ['required', 'regex:/^(([0-9]{9})([A-Za-z]{1}))+$|^([0-9]{12})+$/'],//'required|regex:/((([0-9]{9})([A-Za-z]{1}))|([0-9]{12}))/',
            'customer_address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'customer_district' => 'required|integer|min:1|max:24',
            'inquiry_id' => 'required|integer'
        ]);

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $inquiryGeneral = Inquiry::where('id', $request->inquiry_id)->where('customer_id', $customerProfile->id)->first();

        $customerProfile->dob = $request->date_of_birth;
        $customerProfile->nic = $request->customer_nic;
        $customerProfile->address = $request->customer_address;
        $customerProfile->district = $request->customer_district;
        $customerProfile->save();

        return response()->json([
            'error' => false,
            'message' => 'Profile details updated successfully',
            'profile_status' => $customerProfile->getProfileCompletionState(),
        ]);
    }

    public function uploadCustomerNic(Request $request){
        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();

        $request->validate([
            'nic_side' => 'required|string|in:front,back',
            'nic_file' => 'required|mimes:jpeg,jpg,png'
        ]);

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
            'message' => 'Successfully uploaded the NIC',
            'profile_status' => $customerProfile->getProfileCompletionState(),
        ]);
    }

    public function completeCustomerProfile(Request $request, $inquiry_id){
        try{
            $inquiryId = Crypt::decrypt($inquiry_id);
            echo "Validating";
            $request->validate([
                'inquiry_id' => 'required|integer',
            ]);
    
            $user_id = Auth::id();
            $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
            $inquiryGeneral = Inquiry::where('id', $inquiryId)->where('customer_id', $customerProfile->id)->first();
            
            if(!$inquiryGeneral){
                return redirect()->route('customer.dashboard.load');
            }

            if($customerProfile->getProfileCompletionState()){
                return $this->goToNextAction($inquiryGeneral->id);
            }

            return redirect()->route('inquiry.customer.profile.completion.load',['inquiry_id' => $inquiry_id]);

        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    // 3. Load customer profile
    public function loadCustomerProfile($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        return view('customer-inquiry.customer-profile-view');
    }

    // 4.1 Load vehicle details form
    public function loadVehicleDetailsCollection($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();
            if(empty($inquiryGeneral)){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            $inquiryStatus = array();
            $inquiryStatus['inquiry_id'] = $inquiryId;
            $inquiryStatus['status'] = $inquiryGeneral->inquiry_status;

            if($inquiryGeneral->inquiry_type == 'LEASE'){
                $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
                $vehicleRecord = VehicleRecord::find($inquiryLease->vehicle_id);
                $inquiryStatus['title'] = 'Vehicle Details';
                $inquiryStatus['sub_title'] = 'Own your dream vehicle';
                $inquiryStatus['total_steps'] = 5;
                $inquiryStatus['current_step'] = 2;
                return view('customer-inquiry.inquiry-lease-vehicle-details', ['inquiry_id' => $inquiryId, 'inquiry_id_encrypted' => $inquiry_id, 'inquiry' => $inquiryGeneral, 'lease_vehicle' => $vehicleRecord, 'state' => $inquiryStatus]);
            }

            if($inquiryGeneral->inquiry_type == 'INSURANCE'){
                $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
                $vehicleRecord = VehicleRecord::find($inquiryInsurance->vehicle_id);
                $inquiryStatus['title'] = 'Vehicle Details';
                $inquiryStatus['sub_title'] = 'Protected by Dearo';
                $inquiryStatus['total_steps'] = 2;
                $inquiryStatus['current_step'] = 2;
                return view('customer-inquiry.inquiry-lease-vehicle-details', ['inquiry_id' => $inquiryId, 'inquiry_id_encrypted' => $inquiry_id, 'inquiry' => $inquiryGeneral, 'lease_vehicle' => $vehicleRecord, 'state' => $inquiryStatus]);
            }
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    // 4.2 Record vehicle details - Text Data
    public function recordEssentialVehicleDetails(Request $request){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $request->validate([
            'inquiry_id' => 'required|integer',
            'vehicle_register_state' => 'required|string|in:REGISTERED,NOT-REGISTERED',
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
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

        try{
            $vehicleRecord->save();
        }catch(Exception $e){
            return response()->json([
                'error' => true,
                'message' => 'Exception '.$e,
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'Vehicle details updated successfully',
        ]);
    }

    // 4.3 Record vehicle image - Will be called for each image type
    public function uploadVehicleImage(Request $request){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $request->validate([
            'inquiry_id' => 'required|integer',
            'image_type' => 'required|string|in:VEHICLE-LEFT,VEHICLE-RIGHT,VEHICLE-FRONT,VEHICLE-REAR,METER-READING,LESSEE-AND-VEHICLE,CHASSIS-NUMBER,ENGINE-NUMBER,REGISTRATION-CERTIFICATE',
            'vehicle_photo' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->inquiry_id)->first();
        
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
            ]);
        }

        $fileName = null;
        if ($request->hasFile('vehicle_photo')) {
            $vehiclePhoto = $request->file('vehicle_photo');

            // Generate a unique file name
            $fileName = uniqid('vehicle_'.$vehicleRecord->id.'d') . '.' . $vehiclePhoto->getClientOriginalExtension();

            // Save the file to storage
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
                'message' => 'Successfully uploaded as '.$fileName,
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Photo not found',
            ]);
        }
    }

    // 4.4 Check Vecicle details - and move to next step
    public function completeVehicleDetails($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();
            if(empty($inquiryGeneral)){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            $vehicleRecord = null;
            $inquiryLease = null;
            $inquiryInsurance = null;

            if($inquiryGeneral->inquiry_type == 'LEASE'){
                $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
                $vehicleRecord = VehicleRecord::find($inquiryLease->vehicle_id);
            }

            if($inquiryGeneral->inquiry_type == 'INSURANCE'){
                $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
                $vehicleRecord = VehicleRecord::find($inquiryInsurance->vehicle_id);
            }
            
            if($vehicleRecord->is_registered){
                if(is_null($vehicleRecord->number_plate)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
                if(is_null($vehicleRecord->registered_year)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
                if(is_null($vehicleRecord->pic_registration_certificate)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            }

            if(is_null($vehicleRecord->chassis_number)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->engine_number)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->engine_capacity)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->make)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);

            if(is_null($vehicleRecord->model)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->manufactured_year)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->meter_reading)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->seating_capacity)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);

            if(is_null($vehicleRecord->pic_vehicle_front)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->pic_vehicle_rear)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->pic_vehicle_left)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->pic_vehicle_right)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);                    ;
            
            if(is_null($vehicleRecord->pic_lessee_and_vehicle)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->pic_meter_reading)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->pic_engine_number)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);
            if(is_null($vehicleRecord->pic_chassis_number)) return redirect()->route('inquiry.vehicle.detail.collection.load', [$inquiry_id]);

            $vehicleRecord->is_completed = true;
            $vehicleRecord->save();

            if($inquiryLease){
                $inquiryLease->inquiry_step = 'VEHICLE_DETAILS_ADDED';
                $inquiryLease->save();
            }
            
            if($inquiryInsurance){
                $inquiryInsurance->inquiry_step = 'VEHICLE_DETAILS_ADDED';
                $inquiryInsurance->save();
            }

            return $this->goToNextAction($inquiryGeneral->id);

        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    // FD Details Collection
    public function loadFdDetailsCollection($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();
            if(!$inquiryGeneral){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id);

            $inquiryStatus = array();
            $inquiryStatus['inquiry_id'] = $inquiryId;
            $inquiryStatus['status'] = $inquiryGeneral->inquiry_status;
            $inquiryStatus['title'] = 'Fixed Deposit Details';
            $inquiryStatus['sub_title'] = 'Invest today for tomorrow';
            $inquiryStatus['total_steps'] = 2;
            $inquiryStatus['current_step'] = 2;

            return view('customer-inquiry.inquiry-fd-details', ['inquiry_id' => $inquiryId, 'inquiry_id_encrypted' => $inquiry_id, 'inquiry_fd' => $inquiryFd, 'state' => $inquiryStatus]);
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function recordEssentialFdDetails(Request $request){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $request->validate([
            'fd_essentials_inquiry_id' => 'required|integer',
            'fd_amount' => 'required|integer',
            'fd_period' => 'required|string|in:1_MONTH,3_MONTHS,6_MONTHS,1_YEAR,2_YEARS,3_YEARS,4_YEARS,5_YEARS',
            'fd_rate' => 'required|numeric|between:0,99.99',
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->fd_essentials_inquiry_id)->first();
        $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id);
        
        if($inquiryFd){
            $inquiryFd->amount = $request->fd_amount;
            $inquiryFd->period = $request->fd_period;
            $inquiryFd->preferred_rate = $request->fd_rate;
            $inquiryFd->is_completed = true;
            
            $inquiryFd->save();

            return response()->json([
                'error' => false,
                'message' => 'Fixed Deposit details updated successfully',
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'We could not find your inquiry record',
            ]);
        }
    }

    public function completeFdDetails($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();

            if(!$inquiryGeneral){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            $inquiryFd = InquiryFd::find($inquiryGeneral->reference_inquiry_id);
            
            if(!$inquiryFd){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            if($inquiryFd->is_completed){
                $inquiryFd->inquiry_step = 'FD_DETAILS_ADDED';
                $inquiryFd->save();

                return $this->goToNextAction($inquiryGeneral->id);
            }else{
                return redirect()->route('inquiry.fd.detail.collection.load', ['inquiry_id' => $inquiry_id]);
            }

        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    // Insurance Details Collection
    public function loadInsuranceDetailsCollection($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();
            if(!$inquiryGeneral){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            $inquiryInsurance = InquiryInsurance::find($inquiryGeneral->reference_inquiry_id);
            return view('customer-inquiry.inquiry-insurance-details', ['inquiry_id' => $inquiryId, 'inquiry_id_encrypted' => $inquiry_id, 'inquiry_insurance' => $inquiryInsurance]);
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function recordEssentialInsuranceDetails(Request $request){

    }

    public function completeInsuranceDetails($inquiry_id){

    }

    // Pawning Details Collection
    public function loadPawningDetailsCollection($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();
            if(!$inquiryGeneral){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id);
            $jewelleryDetails = PawningJewellery::where('pawning_inquiry_id', $inquiryPawning->id)->get();

            $inquiryStatus = array();
            $inquiryStatus['inquiry_id'] = $inquiryId;
            $inquiryStatus['status'] = $inquiryGeneral->inquiry_status;
            $inquiryStatus['title'] = 'Gold Details Collection';
            $inquiryStatus['sub_title'] = 'Dearo Gold Loans';
            $inquiryStatus['total_steps'] = 2;
            $inquiryStatus['current_step'] = 2;

            return view('customer-inquiry.inquiry-pawning-details', [
                'inquiry_id' => $inquiryId, 
                'inquiry_id_encrypted' => $inquiry_id, 
                'inquiry_pawning' => $inquiryPawning, 
                'state' => $inquiryStatus, 
                'jewellery_details' => (count($jewelleryDetails) > 0)? json_encode($jewelleryDetails):null,
            ]);

        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function recordEssentialPawningDetails(Request $request){
        if(!Auth::check()){
            return response()->json([
                'error' => true,
                'message' => 'Sorry! You must be logged in to store billing proof.',
            ]);
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $request->validate([
            'pawning_essentials_jewellery_details' => 'required',
            'pawning_essentials_inquiry_id' => 'required|integer',
            'pawning_amount' => 'required|numeric',
            'pawn_status' => 'required|in:true,false'
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->pawning_essentials_inquiry_id)->first();
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
                    'message' => 'Successfully recorded.',
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Jewellery types and quantities required',
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Sorry! We could not find your pawning record.',
            ]);
        }
    }

    public function uploadPawningReceipt(Request $request){
        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();

        $request->validate([
            'inquiry_id' => 'required|integer',
            'pawning_receipt' => 'required|mimes:jpeg,jpg,png'
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('inquiry_type', 'PAWNING')->where('id', $request->inquiry_id)->first();
        
        if(!$inquiryGeneral){
            return response()->json([
                'error' => true,
                'message' => 'Invalid inquiry referrence.',
            ]);
        }

        $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id);
        if(!$inquiryPawning){
            return response()->json([
                'error' => true,
                'message' => 'Invalid pawning inquiry referrence.',
            ]);
        }
        
        $fileName = null;
        if ($request->hasFile('pawning_receipt')) {
            $receiptFile = $request->file('pawning_receipt');

            // Generate a unique file name
            $fileName = uniqid('receipt_'.$inquiryPawning->id.'p') . '.' . $receiptFile->getClientOriginalExtension();

            // Save the file to storage
            $receiptFile->storeAs('pawning', $fileName);
        }

        $inquiryPawning->pic_pawned_receipt_elsewhere = $fileName;
        $inquiryPawning->save();

        return response()->json([
            'error' => false,
            'message' => 'Successfully uploaded the pawning receipt',
        ]);
    }

    public function completePawningDetails($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        
        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('inquiry_type', 'PAWNING')->where('id', $inquiryId)->first();

            if(!$inquiryGeneral){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            $inquiryPawning = InquiryPawning::find($inquiryGeneral->reference_inquiry_id);
            
            if(!$inquiryPawning){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            if($inquiryPawning->isCompleted()){
                $inquiryPawning->inquiry_step = 'PAWN_DETAILS_ADDED';
                $inquiryPawning->save();

                return $this->goToNextAction($inquiryGeneral->id);
            }else{
                return redirect()->route('inquiry.pawning.detail.collection.load', ['inquiry_id' => $inquiry_id]);
            }

        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    // 6. Load bank proof management page - After checking all the necessary details are provided user is taken to bank details section
    public function loadBankProofManagement($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $user_id = Auth::id();
            $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();

            $dateStatementsFrom = Carbon::now()->subMonths(6)->startOfMonth();
            $bankStatements = BankStatement::where('customer_id', $customerProfile->id)->where('statement_start_date', '>=', $dateStatementsFrom)->get();
            $billingProofs = BillingProof::where('customer_id', $customerProfile->id)->get();
            // $this->getMissingStatementsMessage($customerProfile->id);

            $inquiryStatus = array();
            $inquiryStatus['inquiry_id'] = $inquiryId;
            $inquiryStatus['status'] = $inquiryGeneral->inquiry_status;
            $inquiryStatus['title'] = 'Document Proofs';

            switch($inquiryGeneral->inquiry_type){
                case 'LEASE':
                    $inquiryStatus['sub_title'] = 'Own your dream vehicle';
                    $inquiryStatus['total_steps'] = 5;
                    $inquiryStatus['current_step'] = 3;
                    break;

                case 'FD':
                    $inquiryStatus['sub_title'] = 'Invest today for tomorrow';
                    $inquiryStatus['total_steps'] = 4;
                    $inquiryStatus['current_step'] = 3;
                    break;

                case 'INSURANCE':
                    $inquiryStatus['sub_title'] = 'Protected by Dearo';
                    $inquiryStatus['total_steps'] = 4;
                    $inquiryStatus['current_step'] = 3;
                    break;
            }

            return view('customer-inquiry.bank-proof-management', [
                'inquiry_id' => $inquiryId, 
                'inquiry_id_encrypted' => $inquiry_id, 
                'inquiry_type' => $inquiryGeneral->inquiry_type,
                'uploaded_statements' => $bankStatements,
                'missing_statments_message' => $this->getMissingStatementsMessage($inquiryGeneral->created_at, $customerProfile->id),
                'billing_proofs' => $billingProofs,
                'state' => $inquiryStatus
            ]);

        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    private function getMissingStatementsMessage($currentDate, $customerId){
        $missingStatements = null;
        
        for($i=6; $i>0; $i--){
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('customer_id', $customerId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                if($missingStatements == null){
                    $missingStatements = $dateStatementsFrom->year.'-'.$dateStatementsFrom->month;
                }else{
                    $missingStatements = $missingStatements.', '.$dateStatementsFrom->year.'-'.$dateStatementsFrom->month;
                }
            }
        }

        return $missingStatements;
    }

    private function isBankStatementsProvided($currentDate, $customerId){
        $statementsProvided = true;
        
        for($i=6; $i>0; $i--){
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('customer_id', $customerId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                $statementsProvided = false;
                break;
            }
        }

        return $statementsProvided;
    }

    // 7.1 Create bank proof
    public function createBankProof(Request $request){
        if(!Auth::check()){
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $request->validate([
            'statement_inquiry_id' => 'required|integer',
            'statement_start_date' => 'required|date',
            'statement_end_date' => 'required|date',
            'statement_file' => 'required|mimes:jpeg,jpg,png,gif,pdf'
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->statement_inquiry_id)->first();
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

        BankStatement::create([
            'owner_type' => 'CUSTOMER',
            'customer_id' => $customerProfile->id,
            'statement_start_date' => $beginingOfStartDate,
            'statement_end_date' => $endOfEndDate,
            'statement_file' => $fileName,
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Successfully added the bank statement',
        ]);
    }

    
    // 7.2 Create Billing Proof
    public function createBillingProof(Request $request){
        if(!Auth::check()){
            return response()->json([
                'error' => true,
                'message' => 'Sorry! You must be logged in to store billing proof.',
            ]);
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $request->validate([
            'bill_inquiry_id' => 'required|integer',
            'bill_name' => 'required|string',
            'bill_type' => 'required|in:ELECTRICITY_BILL,WATER_BILL,OTHER_BILL',
            'bill_file' => 'required|mimes:jpeg,jpg,png,gif,pdf'
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->bill_inquiry_id)->first();
        $fileName = null;
        if ($request->hasFile('bill_file')) {
            $billFile = $request->file('bill_file');

            // Generate a unique file name
            $fileName = uniqid('bill_'.$inquiryGeneral->id.'c') . '.' . $billFile->getClientOriginalExtension();

            // Save the file to storage
            $billFile->storeAs('bills', $fileName);
        }

        BillingProof::create([
            'customer_id' => $customerProfile->id,
            'proof_type' => $request->bill_type,
            'title' => $request->bill_name,
            'document_file' => $fileName,
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Successfully added the billing proof',
        ]);
    }

    public function createGuarantorBillingProof(Request $request){
        if(!Auth::check()){
            return response()->json([
                'error' => true,
                'message' => 'Sorry! You must be logged in to store billing proof.',
            ]);
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $request->validate([
            'bill_inquiry_id' => 'required|integer',
            'bill_guarantor_id' => 'required|integer',
            'bill_name' => 'required|string',
            'bill_type' => 'required|in:ELECTRICITY_BILL,WATER_BILL,OTHER_BILL',
            'bill_file' => 'required|mimes:jpeg,jpg,png,gif,pdf'
        ]);

        $guarantorProfile = GuarantorProfile::find($request->bill_guarantor_id);
        $fileName = null;
        if ($request->hasFile('bill_file')) {
            $billFile = $request->file('bill_file');

            // Generate a unique file name
            $fileName = uniqid('bill_'.$guarantorProfile->id.'g') . '.' . $billFile->getClientOriginalExtension();

            // Save the file to storage
            $billFile->storeAs('bills', $fileName);
        }

        BillingProof::create([
            'owner_type' => 'GUARANTOR',
            'guarantor_id' => $guarantorProfile->id,
            'proof_type' => $request->bill_type,
            'title' => $request->bill_name,
            'document_file' => $fileName,
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->bill_inquiry_id)->first();
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
            'message' => 'Successfully added the billing proof',
        ]);
    }

    // 7.3 Complete bank proof details
    public function completeBankProofDetails($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();

        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();
            if(empty($inquiryGeneral)){
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'Sorry! We could not find your inquiry. Please revisit the dashboad and try again.';

                return response()->view('errors.404', $data, 404);
            }

            if(!$this->isBankStatementsProvided($inquiryGeneral->created_at, $customerProfile->id)){
                return redirect()->route('inquiry.bank.proof.load', ['inquiry_id' => $inquiry_id]);
            }

            switch($inquiryGeneral->inquiry_type){
                case 'LEASE':
                    if(!(BillingProof::where('customer_id', $customerProfile->id))->exists()){
                        return redirect()->route('inquiry.bank.proof.load', ['inquiry_id' => $inquiry_id]);
                    }

                    $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
                    $inquiryLease->inquiry_step = 'BANK_DETAILS_ADDED';
                    $inquiryLease->save();

                    return $this->goToNextAction($inquiryId);
                    break;
                case 'FD':
                    break;
                case 'INSURANCE':
                    break;
            }

        } catch (DecryptException $e) {
            
        }
    }

    // 8. Load guarantor management page
    public function loadGuarantorManagement($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $user_id = Auth::id();
            $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();
            // Gurantor management is required by leasing inquiry only
            if($inquiryGeneral->inquiry_type == 'LEASE'){
                $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
                $guarantorProfile = GuarantorProfile::find($inquiryLease->guarantor_id);

                $dateStatementsFrom = Carbon::parse($inquiryGeneral->created_at)->subMonths(6)->startOfMonth();
                $dateStatementsTo = Carbon::parse($inquiryGeneral->created_at)->subMonths(1)->endOfMonth();
                $bankStatements = BankStatement::where('owner_type', 'GUARANTOR')
                                            ->where('guarantor_id', $guarantorProfile->id)
                                            ->where('statement_start_date', '>=', date('Y-m-d', strtotime($dateStatementsFrom)))
                                            ->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsTo)))->get();
                $billingProofs = BillingProof::where('owner_type', 'GUARANTOR')->where('guarantor_id', $guarantorProfile->id)->get();

                $inquiryStatus = array();
                $inquiryStatus['inquiry_id'] = $inquiryId;
                $inquiryStatus['status'] = $inquiryGeneral->inquiry_status;
                $inquiryStatus['title'] = 'Guarantor Details';

                switch($inquiryGeneral->inquiry_type){
                    case 'LEASE':
                        $inquiryStatus['sub_title'] = 'Own your dream vehicle';
                        $inquiryStatus['total_steps'] = 5;
                        $inquiryStatus['current_step'] = 4;
                        break;

                    case 'FD':
                        $inquiryStatus['sub_title'] = 'Invest today for tomorrow';
                        $inquiryStatus['total_steps'] = 4;
                        $inquiryStatus['current_step'] = 4;
                        break;

                    case 'INSURANCE':
                        $inquiryStatus['sub_title'] = 'Protected by Dearo';
                        $inquiryStatus['total_steps'] = 4;
                        $inquiryStatus['current_step'] = 4;
                        break;
                }

                // echo $this->getGuarantorMissingStatementsMessage($inquiryGeneral->created_at, $guarantorProfile->id);
                return view('customer-inquiry.guarantor-management', [
                    'inquiry_id' => $inquiryId, 
                    'inquiry_id_encrypted' => $inquiry_id, 
                    'inquiry_type' => $inquiryGeneral->inquiry_type,
                    'guarantor' => $guarantorProfile,
                    'uploaded_statements' => $bankStatements,
                    'is_bankproof_provided' => $this->isGuarantorBankStatementsProvided($inquiryGeneral->created_at, $guarantorProfile->id),
                    'missing_statments_message' => $this->getGuarantorMissingStatementsMessage($inquiryGeneral->created_at, $guarantorProfile->id),
                    'billing_proofs' => $billingProofs,
                    'state' => $inquiryStatus
                ]);
            }
            
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function loadGuarantor2Management($inquiry_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        try {
            $inquiryId = Crypt::decrypt($inquiry_id);
            $user_id = Auth::id();
            $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
            $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $inquiryId)->first();
            // Gurantor management is required by leasing inquiry only
            if($inquiryGeneral->inquiry_type == 'LEASE'){
                $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
                $guarantorProfile = GuarantorProfile::find($inquiryLease->guarantor2_id);

                $dateStatementsFrom = Carbon::parse($inquiryGeneral->created_at)->subMonths(6)->startOfMonth();
                $dateStatementsTo = Carbon::parse($inquiryGeneral->created_at)->subMonths(1)->endOfMonth();
                $bankStatements = BankStatement::where('owner_type', 'GUARANTOR')
                                            ->where('guarantor_id', $guarantorProfile->id)
                                            ->where('statement_start_date', '>=', date('Y-m-d', strtotime($dateStatementsFrom)))
                                            ->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsTo)))->get();
                $billingProofs = BillingProof::where('owner_type', 'GUARANTOR')->where('guarantor_id', $guarantorProfile->id)->get();

                $inquiryStatus = array();
                $inquiryStatus['inquiry_id'] = $inquiryId;
                $inquiryStatus['status'] = $inquiryGeneral->inquiry_status;
                $inquiryStatus['title'] = 'Guarantor Details';

                switch($inquiryGeneral->inquiry_type){
                    case 'LEASE':
                        $inquiryStatus['sub_title'] = 'Own your dream vehicle';
                        $inquiryStatus['total_steps'] = 5;
                        $inquiryStatus['current_step'] = 5;
                        break;

                    case 'FD':
                        $inquiryStatus['sub_title'] = 'Invest today for tomorrow';
                        $inquiryStatus['total_steps'] = 4;
                        $inquiryStatus['current_step'] = 4;
                        break;

                    case 'INSURANCE':
                        $inquiryStatus['sub_title'] = 'Protected by Dearo';
                        $inquiryStatus['total_steps'] = 4;
                        $inquiryStatus['current_step'] = 4;
                        break;
                }

                // echo $this->getGuarantorMissingStatementsMessage($inquiryGeneral->created_at, $guarantorProfile->id);
                return view('customer-inquiry.guarantor-management', [
                    'inquiry_id' => $inquiryId, 
                    'inquiry_id_encrypted' => $inquiry_id, 
                    'inquiry_type' => $inquiryGeneral->inquiry_type,
                    'guarantor' => $guarantorProfile,
                    'uploaded_statements' => $bankStatements,
                    'is_bankproof_provided' => $this->isGuarantorBankStatementsProvided($inquiryGeneral->created_at, $guarantorProfile->id),
                    'missing_statments_message' => $this->getGuarantorMissingStatementsMessage($inquiryGeneral->created_at, $guarantorProfile->id),
                    'billing_proofs' => $billingProofs,
                    'state' => $inquiryStatus
                ]);
            }
            
        } catch (DecryptException $e) {
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have reqested a inquiry page with incorrect parameters.';

            return response()->view('errors.404', $data, 404);
        }
    }

    public function createGuarantorBankProof(Request $request){
        if(!Auth::check()){
            return response()->json([
                'error' => true,
                'message' => 'Sorry! You must be logged in to create a bank statement for a gurantor',
            ]);
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();
        $request->validate([
            'statement_inquiry_id' => 'required|integer',
            'statement_guarantor_id' => 'required|integer',
            'statement_start_date' => 'required|date',
            'statement_end_date' => 'required|date',
            'statement_file' => 'required|mimes:jpeg,jpg,png,gif,pdf'
        ]);

        $guarantorProfile = GuarantorProfile::find($request->statement_guarantor_id);
        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->statement_inquiry_id)->first();
        $fileName = null;
        if ($request->hasFile('statement_file')) {
            $statementFile = $request->file('statement_file');

            // Generate a unique file name
            $fileName = uniqid('stmt_'.$guarantorProfile->id.'g') . '.' . $statementFile->getClientOriginalExtension();

            // Save the file to storage
            $statementFile->storeAs('statements', $fileName);
        }

        $beginingOfStartDate = Carbon::parse($request->statement_start_date)->startOfDay();
        $endOfEndDate = Carbon::parse($request->statement_end_date)->endOfDay();

        BankStatement::create([
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
            'message' => 'Successfully added the bank statement',
            'is_bankproof_provided' => $this->isGuarantorBankStatementsProvided($inquiryGeneral->created_at, $guarantorProfile->id),
            'missing_statments_message' => $this->getGuarantorMissingStatementsMessage($inquiryGeneral->created_at, $guarantorProfile->id),
        ]);
    }

    private function getGuarantorMissingStatementsMessage($currentDate, $guarantorId){
        $missingStatements = null;
        for($i=6; $i>0; $i--){
            
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('guarantor_id', $guarantorId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                if($missingStatements == null){
                    $missingStatements = $dateStatementsFrom->year.'-'.$dateStatementsFrom->month;
                }else{
                    $missingStatements = $missingStatements.', '.$dateStatementsFrom->year.'-'.$dateStatementsFrom->month;
                }
            }
        }

        return $missingStatements;
    }

    private function isGuarantorBankStatementsProvided($currentDate, $guarantorId){
        $statementsProvided = true;
        
        for($i=6; $i>0; $i--){
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('guarantor_id', $guarantorId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                $statementsProvided = false;
                break;
            }
        }

        return $statementsProvided;
    }

    // 9.1 Create a guarantor
    public function createGuarantor(Request $request){
        if(!Auth::check()){
            return response()->json([
                'error' => true,
                'message' => 'Sorry! You must be logged in to store billing proof.',
            ]);
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();

        $request->validate([
            'guarantor_id' => 'required|integer',
            'guarantor_inquiry_id' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'nic_number' => 'required|string',
            'guarantor_occupation' => 'required|string',
            'guarantor_address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'guarantor_district' => 'required|integer|min:1|max:24',
            'contact_number' => 'required|string',
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->guarantor_inquiry_id)->first();
        if($inquiryGeneral->inquiry_type == 'LEASE'){
            $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);

            if($inquiryLease != null){

                $guarantorProfile = GuarantorProfile::find($request->guarantor_id);

                $guarantorProfile->first_name = $request->first_name;
                $guarantorProfile->last_name = $request->last_name;
                $guarantorProfile->nic = $request->nic_number;
                $guarantorProfile->occupation = $request->guarantor_occupation;
                $guarantorProfile->contact_number = $request->contact_number;
                $guarantorProfile->address = $request->guarantor_address;
                $guarantorProfile->district_id = $request->guarantor_district;
                $guarantorProfile->inquiry_id = $inquiryGeneral->id;

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
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Guarantor is not supported for Leasing type',
            ]);
        }
    }

    public function uploadGuarantorNic(Request $request){
        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();

        $request->validate([
            'inquiry_id' => 'required|integer',
            'guarantor_id' => 'required|integer',
            'nic_side' => 'required|string|in:front,back',
            'nic_file' => 'required|mimes:jpeg,jpg,png'
        ]);

        $guarantorProfile = GuarantorProfile::where('id', $request->guarantor_id)
                            ->where('inquiry_id', $request->inquiry_id)
                            ->where('customer_id', $customerProfile->id)->first();

        if(!$guarantorProfile){
            return response()->json([
                'error' => true,
                'message' => 'Guarantor profile invalid referrence.',
            ]);
        }

        $fileName = null;
        if ($request->hasFile('nic_file')) {
            $nicFile = $request->file('nic_file');

            // Generate a unique file name
            $fileName = uniqid('nic_'.$guarantorProfile->id.'n') . '.' . $nicFile->getClientOriginalExtension();

            // Save the file to storage
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
            'message' => 'Successfully uploaded the NIC',
        ]);
    }

    // Submit Inquiry
    public function submitInquiryToManager(Request $request){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $customerProfile = CustomerProfile::where('user_id', $user_id)->first();

        $request->validate([
            'inquiry_id' => 'required|integer',
        ]);

        $inquiryGeneral = Inquiry::where('customer_id', $customerProfile->id)->where('id', $request->guarantor_inquiry_id)->first();
        // To Do
        switch($inquiryGeneral->inquiry_type){
            case 'LEASE':
                $inquiryLease = InquiryLease::find($inquiryGeneral->reference_inquiry_id);
                $inquiryLease->inquiry_step = 'INQUIRY_SUBMITTED';
                $inquiryLease->save();

                break;
            case 'FD':
                break;
            case 'INSURANCE':
                break;
        }
        $inquiryGeneral->inquiry_status = 'PENDING_RESPONSE';
        $inquiryGeneral->save();
    }

    // 10. Load Inquiry Summary
    public function loadInquirySummary($inquiry_id){
        return view('customer-inquiry.inquiry-lease-summary');
    }

    // 11. List Inquiries made by the user
    public function loadInquiryListOfUser($inquiry_type, $inquiry_id){

    }
}
