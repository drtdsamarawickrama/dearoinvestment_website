<?php

namespace App\Http\Controllers;

use App\Exports\InquiryFdExport;
use App\Exports\InquiryInsuranceExport;
use App\Exports\InquiryLeaseExport;
use App\Exports\InquiryPawningExport;
use App\Models\Branch;
use App\Models\BranchManager;
use App\Models\CustomerProfile;
use App\Models\District;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BranchManagerController extends Controller
{
    public function loadBranchManagerDashboard(){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();
        $districts = District::whereIn('id', $districtIds)->get();

        $stats = array();
        $stats['total_inquiries'] = Inquiry::getStatTotalInquiriesOfDistricts($districtIds);
        $stats['total_lease'] = Inquiry::getStatTotalLeasingInquiriesOfDistricts($districtIds);
        $stats['total_fd'] = Inquiry::getStatTotalFdInquiriesOfDistricts($districtIds);
        $stats['total_pawning'] = Inquiry::getStatTotalPawningInquiriesOfDistricts($districtIds);
        $stats['total_insurance'] = Inquiry::getStatTotalInsuranceInquiriesOfDistricts($districtIds);
        $stats['total_customers'] = CustomerProfile::getStatTotalCustomersOfDistricts($districtIds);

        return view('branch-manager.dashboard', ['stats' => $stats, 'branch' => $branch, 'manager' => $manager, 'districts' => $districts]);
    }

    public function loadBranchLeasingInquiries(){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiries = Inquiry::where('inquiry_type', 'LEASE')->where('inquiry_status','!=', 'DRAFT')->whereHas('customer', function ($query) use ($districtIds) {
            $query->whereIn('district', $districtIds);
        })->latest('updated_at')->paginate(10);

        return view('branch-manager.inquiries-leasing', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function searchBranchLeasingInquiries(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $searchNic = $request->nic;
        $searchInquiryNo = $request->inquiry_no;
        $searchCusomerName = $request->customer_name;

        if($searchInquiryNo > 0){
            $inquiries = Inquiry::where('inquiry_type', 'LEASE')->where('inquiry_status','!=', 'DRAFT')
                ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                $query->where('nic', $searchNic)
                    ->orWhere('first_name', 'like', $searchCusomerName.'%')
                    ->orWhere('last_name', 'like', '%'.$searchCusomerName);
            })->where('id', $searchInquiryNo)->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->paginate(10);
        }else{
            if($searchCusomerName != null)
                $inquiries = Inquiry::where('inquiry_type', 'LEASE')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic)
                        ->orWhere('first_name', 'like', $searchCusomerName.'%')
                        ->orWhere('last_name', 'like', '%'.$searchCusomerName);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
            else
                $inquiries = Inquiry::where('inquiry_type', 'LEASE')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
        }

        return view('branch-manager.inquiries-leasing', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function filterBranchLeasingInquiries($criteria){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiries = null;
        switch($criteria){
            case 'payment-arrears':
                $inquiries = Inquiry::where('inquiry_type', 'LEASE')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('inquiry_lease', function ($query) use ($criteria) {
                    $query->where('is_arrears', true);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
                break;
            case 'vehicle-missing':
                $inquiries = Inquiry::where('inquiry_type', 'LEASE')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('inquiry_lease', function ($query) use ($criteria) {
                    $query->where('vehicle_missing', true);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
                break;
        }

        return view('branch-manager.inquiries-leasing', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function filterBranchLeasingInquiriesByState(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiryStatus = $request->inquiry_status;
        $inquiries = Inquiry::where('inquiry_type', 'LEASE')->where('inquiry_status','!=', 'DRAFT')
        ->whereHas('inquiry_lease', function ($query) use ($inquiryStatus) {
            $query->where('inquiry_step', $inquiryStatus);
        })->whereHas('customer', function ($query) use ($districtIds) {
            $query->whereIn('district', $districtIds);
        })->latest('updated_at')->paginate(10);

        return view('branch-manager.inquiries-leasing', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function exportLeaseInquiries(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiryState = $request->inquiry_status;
        return Excel::download(new InquiryLeaseExport($inquiryState, false, $districtIds), 'leasing-records.xlsx');
    }

    public function loadBranchFdInquiries(){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiries = Inquiry::where('inquiry_type', 'FD')->where('inquiry_status','!=', 'DRAFT')->whereHas('customer', function ($query) use ($districtIds) {
            $query->whereIn('district', $districtIds);
        })->latest('updated_at')->paginate(10);

        return view('branch-manager.inquiries-fd', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function searchBranchFdInquiries(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $searchNic = $request->nic;
        $searchInquiryNo = $request->inquiry_no;
        $searchCusomerName = $request->customer_name;

        if($searchInquiryNo > 0){
            $inquiries = Inquiry::where('inquiry_type', 'FD')->where('inquiry_status','!=', 'DRAFT')
                ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                $query->where('nic', $searchNic)
                    ->orWhere('first_name', 'like', $searchCusomerName.'%')
                    ->orWhere('last_name', 'like', '%'.$searchCusomerName);
            })->where('id', $searchInquiryNo)->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->paginate(10);
        }else{
            if($searchCusomerName != null)
                $inquiries = Inquiry::where('inquiry_type', 'FD')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic)
                        ->orWhere('first_name', 'like', $searchCusomerName.'%')
                        ->orWhere('last_name', 'like', '%'.$searchCusomerName);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
            else
                $inquiries = Inquiry::where('inquiry_type', 'FD')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
        }

        return view('branch-manager.inquiries-fd', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function filterBranchFdInquiries($criteria){
        // Implement if needed
    }

    public function filterBranchFdInquiriesByState(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiryStatus = $request->inquiry_status;
        $inquiries = Inquiry::where('inquiry_type', 'FD')->where('inquiry_status','!=', 'DRAFT')
            ->whereHas('inquiry_fd', function ($query) use ($inquiryStatus) {
            $query->where('inquiry_step', $inquiryStatus);
        })->whereHas('customer', function ($query) use ($districtIds) {
            $query->whereIn('district', $districtIds);
        })->latest('updated_at')->paginate(10);

        return view('branch-manager.inquiries-fd', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function exportFdInquiries(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiryState = $request->inquiry_status;
        return Excel::download(new InquiryFdExport($inquiryState, false, $districtIds), 'fd-records.xlsx');
    }

    public function loadBranchInsuranceInquiries(){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->where('inquiry_status','!=', 'DRAFT')->whereHas('customer', function ($query) use ($districtIds) {
            $query->whereIn('district', $districtIds);
        })->latest('updated_at')->paginate(10);

        return view('branch-manager.inquiries-insurance', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function searchBranchInsuranceInquiries(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $searchNic = $request->nic;
        $searchInquiryNo = $request->inquiry_no;
        $searchCusomerName = $request->customer_name;

        if($searchInquiryNo > 0){
            $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->where('inquiry_status','!=', 'DRAFT')
                ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                $query->where('nic', $searchNic)
                    ->orWhere('first_name', 'like', $searchCusomerName.'%')
                    ->orWhere('last_name', 'like', '%'.$searchCusomerName);
            })->where('id', $searchInquiryNo)->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->paginate(10);
        }else{
            if($searchCusomerName != null)
                $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic)
                        ->orWhere('first_name', 'like', $searchCusomerName.'%')
                        ->orWhere('last_name', 'like', '%'.$searchCusomerName);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
            else
                $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
        }

        return view('branch-manager.inquiries-insurance', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function filterBranchInsuranceInquiries($criteria){
        // Implement if needed
    }

    public function filterBranchInsuranceInquiriesByState(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiryStatus = $request->inquiry_status;
        $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->where('inquiry_status','!=', 'DRAFT')
            ->whereHas('inquiry_insurance', function ($query) use ($inquiryStatus) {
            $query->where('inquiry_step', $inquiryStatus);
        })->whereHas('customer', function ($query) use ($districtIds) {
            $query->whereIn('district', $districtIds);
        })->latest('updated_at')->paginate(10);

        return view('branch-manager.inquiries-insurance', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function exportInsuranceInquiries(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiryState = $request->inquiry_status;
        return Excel::download(new InquiryInsuranceExport($inquiryState, false, $districtIds), 'insurance-records.xlsx');
    }
    
    public function loadBranchPawningInquiries(){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->where('inquiry_status','!=', 'DRAFT')->whereHas('customer', function ($query) use ($districtIds) {
            $query->whereIn('district', $districtIds);
        })->latest('updated_at')->paginate(10);

        return view('branch-manager.inquiries-pawning', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function searchBranchPawningInquiries(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $searchNic = $request->nic;
        $searchInquiryNo = $request->inquiry_no;
        $searchCusomerName = $request->customer_name;

        if($searchInquiryNo > 0){
            $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->where('inquiry_status','!=', 'DRAFT')
                ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                $query->where('nic', $searchNic)
                    ->orWhere('first_name', 'like', $searchCusomerName.'%')
                    ->orWhere('last_name', 'like', '%'.$searchCusomerName);
            })->where('id', $searchInquiryNo)->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->paginate(10);
        }else{
            if($searchCusomerName != null)
                $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic)
                        ->orWhere('first_name', 'like', $searchCusomerName.'%')
                        ->orWhere('last_name', 'like', '%'.$searchCusomerName);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
            else
                $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->where('inquiry_status','!=', 'DRAFT')
                    ->whereHas('customer', function ($query) use ($searchNic, $searchInquiryNo, $searchCusomerName) {
                    $query->where('nic', $searchNic);
                })->whereHas('customer', function ($query) use ($districtIds) {
                    $query->whereIn('district', $districtIds);
                })->latest('updated_at')->paginate(10);
        }

        return view('branch-manager.inquiries-pawning', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function filterBranchPawningInquiries($criteria){
        // Implement if needed
    }

    public function filterBranchPawningInquiriesByState(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiryStatus = $request->inquiry_status;
        $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->where('inquiry_status','!=', 'DRAFT')
            ->whereHas('inquiry_pawning', function ($query) use ($inquiryStatus) {
            $query->where('inquiry_step', $inquiryStatus);
        })->whereHas('customer', function ($query) use ($districtIds) {
            $query->whereIn('district', $districtIds);
        })->latest('updated_at')->paginate(10);

        return view('branch-manager.inquiries-pawning', ['inquiries' => $inquiries, 'branch' => $branch, 'manager' => $manager]);
    }

    public function exportPawningInquiries(Request $request){
        if(!Auth::user()->hasRole('branch-manager')){
            return redirect()->route('user.dashboard.load');
        }

        $manager = BranchManager::where('user_id', Auth::id())->first();
        $branch = Branch::find($manager->branch_id);
        $districtIds = $branch->getDistrictIds();

        $inquiryState = $request->inquiry_status;
        return Excel::download(new InquiryPawningExport($inquiryState, false, $districtIds), 'pawning-records.xlsx');
    }
}
