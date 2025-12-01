<?php

namespace App\Http\Controllers;

use App\Exports\InquiryFdExport;
use App\Exports\InquiryInsuranceExport;
use App\Models\BankStatement;
use App\Models\Branch;
use App\Models\BranchDistrict;
use App\Models\BranchManager;
use App\Models\CustomerProfile;
use App\Models\District;
use App\Models\Inquiry;
use App\Models\InquiryFd;
use App\Models\InquiryInsurance;
use App\Models\InquiryLease;
use App\Exports\InquiryLeaseExport;
use App\Exports\InquiryPawningExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\VehicleRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function loadUserDashboard(){
        $user = Auth::user();
        
        if($user->hasRole('super-admin')){
            return redirect()->route('admin.dashboard.load');
        }

        if($user->hasRole('branch-manager')){
            return redirect()->route('branch.dashboard.load');
        }

        return redirect()->route('login');
    }

    public function loadAdminDashboard(){
        $stats = array();
        $stats['total_inquiries'] = Inquiry::getStatTotalInquiries();
        $stats['total_lease'] = Inquiry::getStatTotalLeasingInquiries();
        $stats['total_fd'] = Inquiry::getStatTotalFDInquiries();
        $stats['total_insurance'] = Inquiry::getStatTotalInsuranceInquiries();
        $stats['total_pawning'] = Inquiry::getStatTotalPawningInquiries();

        $stats['total_branches'] = Branch::getStatTotalBranches();
        $stats['total_managers'] = BranchManager::getStatTotalManagers();
        $stats['total_customers'] = CustomerProfile::getStatTotalCustomers();
        
        return view('super-admin.dashboard', ['stats' => $stats]);
    }

    public function loadAllLeasingInquiries(){
        $inquiries = Inquiry::where('inquiry_type', 'LEASE')->latest('updated_at')->paginate(10);
        return view('super-admin.inquiries-leasing', ['inquiries' => $inquiries]);
    }

    public function searchLeasingInquiries(Request $request){
        $searchNic = $request->nic;
        $searchInquiryNo = $request->inquiry_no;
        $searchCusomerName = $request->customer_name;

        if($searchInquiryNo > 0){
            $inquiries = Inquiry::where('inquiry_type', 'LEASE')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                $query->where('nic', $searchNic)
                    ->orWhere('first_name', 'like', $searchCusomerName.'%')
                    ->orWhere('last_name', 'like', '%'.$searchCusomerName);
            })->where('id', $searchInquiryNo)->latest('updated_at')->paginate(10);
        }else{
            if($searchCusomerName != null)
                $inquiries = Inquiry::where('inquiry_type', 'LEASE')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic)
                        ->orWhere('first_name', 'like', $searchCusomerName.'%')
                        ->orWhere('last_name', 'like', '%'.$searchCusomerName);
                })->latest('updated_at')->paginate(10);
            else
                $inquiries = Inquiry::where('inquiry_type', 'LEASE')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic);
                })->latest('updated_at')->paginate(10);
        }

        return view('super-admin.inquiries-leasing', ['inquiries' => $inquiries]);
    }

    public function filterLeasingInquiries($criteria){
        $inquiries = null;
        switch($criteria){
            case 'payment-arrears':
                $inquiries = Inquiry::where('inquiry_type', 'LEASE')->whereHas('inquiry_lease', function ($query) use ($criteria) {
                    $query->where('is_arrears', true);
                })->latest('updated_at')->paginate(10);
                break;
            case 'vehicle-missing':
                $inquiries = Inquiry::where('inquiry_type', 'LEASE')->whereHas('inquiry_lease', function ($query) use ($criteria) {
                    $query->where('vehicle_missing', true);
                })->latest('updated_at')->paginate(10);
                break;
        }
        
        return view('super-admin.inquiries-leasing', ['inquiries' => $inquiries]);
    }

    public function filterLeasingInquiriesByState(Request $request){
        $inquiryStatus = $request->inquiry_status;
        $inquiries = Inquiry::where('inquiry_type', 'LEASE')->whereHas('inquiry_lease', function ($query) use ($inquiryStatus) {
            $query->where('inquiry_step', $inquiryStatus);
        })->latest('updated_at')->paginate(10);

        return view('super-admin.inquiries-leasing', ['inquiries' => $inquiries]);
    }

    public function exportLeaseInquiries(Request $request){
        $inquiryState = $request->inquiry_status;
        return Excel::download(new InquiryLeaseExport($inquiryState, true, null), 'leasing-records.xlsx');
    }

    public function loadAllFdInquiries(){
        $inquiries = Inquiry::where('inquiry_type', 'FD')->latest('updated_at')->paginate(10);
        return view('super-admin.inquiries-fd', ['inquiries' => $inquiries]);
    }

    public function searchFdInquiries(Request $request){
        $searchNic = $request->nic;
        $searchInquiryNo = $request->inquiry_no;
        $searchCusomerName = $request->customer_name;

        $inquiries = null;
        if($searchInquiryNo > 0){
            $inquiries = Inquiry::where('inquiry_type', 'FD')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                $query->where('nic', $searchNic)
                    ->orWhere('first_name', 'like', $searchCusomerName.'%')
                    ->orWhere('last_name', 'like', '%'.$searchCusomerName);
            })->where('id', $searchInquiryNo)->latest('updated_at')->paginate(10);
        }else{
            if($searchCusomerName != null)
                $inquiries = Inquiry::where('inquiry_type', 'FD')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic)
                        ->orWhere('first_name', 'like', $searchCusomerName.'%')
                        ->orWhere('last_name', 'like', '%'.$searchCusomerName);
                })->latest('updated_at')->paginate(10);
            else
                $inquiries = Inquiry::where('inquiry_type', 'FD')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic);
                })->latest('updated_at')->paginate(10);
        }

        return view('super-admin.inquiries-fd', ['inquiries' => $inquiries]);
    }

    public function filterFdInquiries($criteria){
        // Implement if required
    }

    public function filterFdInquiriesByState(Request $request){
        $inquiryStatus = $request->inquiry_status;
        $inquiries = Inquiry::where('inquiry_type', 'FD')->whereHas('inquiry_fd', function ($query) use ($inquiryStatus) {
            $query->where('inquiry_step', $inquiryStatus);
        })->latest('updated_at')->paginate(10);

        return view('super-admin.inquiries-fd', ['inquiries' => $inquiries]);
    }

    public function exportFdInquiries(Request $request){
        $inquiryState = $request->inquiry_status;
        return Excel::download(new InquiryFdExport($inquiryState, true, null), 'fd-records.xlsx');
    }

    public function loadAllInsuranceInquiries(){
        $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->latest('updated_at')->paginate(10);
        return view('super-admin.inquiries-insurance', ['inquiries' => $inquiries]);
    }

    public function searchInsuranceInquiries(Request $request){
        $searchNic = $request->nic;
        $searchInquiryNo = $request->inquiry_no;
        $searchCusomerName = $request->customer_name;

        $inquiries = null;
        if($searchInquiryNo > 0){
            $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                $query->where('nic', $searchNic)
                    ->orWhere('first_name', 'like', $searchCusomerName.'%')
                    ->orWhere('last_name', 'like', '%'.$searchCusomerName);
            })->where('id', $searchInquiryNo)->latest('updated_at')->paginate(10);
        }else{
            if($searchCusomerName != null)
                $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic)
                        ->orWhere('first_name', 'like', $searchCusomerName.'%')
                        ->orWhere('last_name', 'like', '%'.$searchCusomerName);
                })->latest('updated_at')->paginate(10);
            else
                $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic);
                })->latest('updated_at')->paginate(10);
        }

        return view('super-admin.inquiries-insurance', ['inquiries' => $inquiries]);
    }

    public function filterInsuranceInquiries($criteria){
        // Implement if required
    }

    public function filterInsuranceInquiriesByState(Request $request){
        $inquiryStatus = $request->inquiry_status;
        $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->whereHas('inquiry_insurance', function ($query) use ($inquiryStatus) {
            $query->where('inquiry_step', $inquiryStatus);
        })->latest('updated_at')->paginate(10);

        return view('super-admin.inquiries-insurance', ['inquiries' => $inquiries]);
    }

    public function exportInsuranceInquiries(Request $request){
        $inquiryState = $request->inquiry_status;
        return Excel::download(new InquiryInsuranceExport($inquiryState, true, null), 'insurance-records.xlsx');
    }

    public function loadAllPawningInquiries(){
        $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->latest('updated_at')->paginate(10);
        return view('super-admin.inquiries-pawning', ['inquiries' => $inquiries]);
    }

    public function searchPawningInquiries(Request $request){
        $searchNic = $request->nic;
        $searchInquiryNo = $request->inquiry_no;
        $searchCusomerName = $request->customer_name;

        $inquiries = null;
        if($searchInquiryNo > 0){
            $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                $query->where('nic', $searchNic)
                    ->orWhere('first_name', 'like', $searchCusomerName.'%')
                    ->orWhere('last_name', 'like', '%'.$searchCusomerName);
            })->where('id', $searchInquiryNo)->latest('updated_at')->paginate(10);
        }else{
            if($searchCusomerName != null)
                $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic)
                        ->orWhere('first_name', 'like', $searchCusomerName.'%')
                        ->orWhere('last_name', 'like', '%'.$searchCusomerName);
                })->latest('updated_at')->paginate(10);
            else
                $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic);
                })->latest('updated_at')->paginate(10);
        }

        return view('super-admin.inquiries-pawning', ['inquiries' => $inquiries]);
    }

    public function filterPawningInquiries($criteria){
        // Implement if required
    }

    public function filterPawningInquiriesByState(Request $request){
        $inquiryStatus = $request->inquiry_status;
        $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->whereHas('inquiry_pawning', function ($query) use ($inquiryStatus) {
            $query->where('inquiry_step', $inquiryStatus);
        })->latest('updated_at')->paginate(10);

        return view('super-admin.inquiries-pawning', ['inquiries' => $inquiries]);
    }

    public function exportPawningInquiries(Request $request){
        $inquiryState = $request->inquiry_status;
        return Excel::download(new InquiryPawningExport($inquiryState, true, null), 'pawning-records.xlsx');
    }

    // Branch Management
    public function loadBranches(){
        $branches = Branch::all();
        return view('super-admin.branches', ['branches' => $branches]);
    }

    public function createBranch(Request $request){
        $request->validate([
            'branch_name' => 'required|string',
            'districts.*' => 'required|integer|min:1|max:24',
        ]);

        $branch = Branch::create([
            'branch_name' => $request->branch_name,
        ]);

        $districtIds = $request->input('districts');
        foreach($districtIds as $district_id){
            BranchDistrict::create([
                'branch_id' => $branch->id,
                'district_id' => $district_id,
            ]);
        }

        return redirect()->route('admin.branches.load');
    }

    public function updateBranch(Request $request){

    }

    public function loadManagers(){
        $managers = BranchManager::all();
        $branches = Branch::all();
        return view('super-admin.branch-managers', ['branches' => $branches, 'managers' => $managers]);
    }

    public function createBranchManager(Request $request){
        $request->validate([
            'manager_name' => 'required|string',
            'branch_id' => 'required|integer',
            'mobile_number' => 'required|digits:10',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $branch = Branch::find($request->branch_id);
        if(!$branch){
            return back();
        }

        if(User::where('email', $request->email)->first() || User::where('mobile', $request->mobile_number)->first()){
            return back();
        }

        $user = User::create([
            "name" => $request->manager_name,
            "email" => $request->email,
            "mobile" => $request->mobile_number,
            "password" => bcrypt($request->password),
        ]);

        $user->assignRole('branch-manager'); 

        BranchManager::create([
            'manager_name' => $user->name,
            'branch_id' => $branch->id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.branches.managers.load');
    }

    public function loadBranchDashboard($branch_id){
        $branch = Branch::find($branch_id);

        if(!$branch){
            return redirect()->route('admin.dashboard.load');
        }
        $managers = BranchManager::where('branch_id', $branch->id);
        $districtIds = $branch->getDistrictIds();
        $districts = District::whereIn('id', $districtIds)->get();

        $stats = array();
        $stats['total_inquiries'] = Inquiry::getStatTotalInquiriesOfDistricts($districtIds);
        $stats['total_lease'] = Inquiry::getStatTotalLeasingInquiriesOfDistricts($districtIds);
        $stats['total_fd'] = Inquiry::getStatTotalFdInquiriesOfDistricts($districtIds);
        $stats['total_insurance'] = Inquiry::getStatTotalInsuranceInquiriesOfDistricts($districtIds);
        $stats['total_customers'] = CustomerProfile::getStatTotalCustomersOfDistricts($districtIds);

        return view('super-admin.branch-dashboard', ['branch' => $branch, 'stats' => $stats, 'districts' => $districts]);
    }
}
