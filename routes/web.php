<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\InquiryCustomerController;
use App\Http\Controllers\BranchManagerController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\InquiryDearoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () { return view('home'); })->name('dearo.home');
Route::get('/dearo-holdings', function () { return view('info.general-dearo-holdings'); })->name('dearo.holdings');
Route::get('/management/corporate-management', function () { return view('info.general-management-corporate'); })->name('dearo.management.corporate');
Route::get('/management/operational-management', function () { return view('info.general-management-operational'); })->name('dearo.management.operational');
Route::get('/branch-network', function () { return view('info.general-branch-network'); })->name('dearo.branch.network');
Route::get('/financial-reports', [BlogController::class, 'loadFinancialReports'])->name('info.dearo.financial.reports');
Route::get('/news/latest', [BlogController::class, 'loadGeneralArticles'])->name('dearo.news.latest');
Route::get('/careers', function () { return view('info.general-careers'); })->name('dearo.careers');
Route::get('/contact-us', function () { return view('info.general-contact-dearo'); })->name('dearo.contact.us');
Route::get('/about-us', function () { return view('info.general-about-dearo'); })->name('dearo.about.us');

Route::get('/personal-banking/personal-investments', function () { return view('info.pb-personal-investments'); })->name('dearo.pb.personal.investments');
Route::get('/personal-banking/daily-investments', function () { return view('info.pb-daily-investments'); })->name('dearo.pb.daily.investments');
Route::get('/personal-banking/short-term-investments', function () { return view('info.pb-short-term-investments'); })->name('dearo.pb.shortterm.investments');
Route::get('/personal-banking/long-term-investments', function () { return view('info.pb-long-term-investments'); })->name('dearo.pb.longterm.investments');
Route::get('/personal-banking/child-future-investments', function () { return view('info.pb-child-future-investments'); })->name('dearo.pb.child.investments');
Route::get('/personal-banking/hire-purchase', function () { return view('info.pb-hire-purchase'); })->name('dearo.pb.hire.purchase');
Route::get('/personal-banking/auto-loans', function () { return view('info.pb-auto-loan'); })->name('dearo.pb.loan.auto');

Route::get('/loans/gold-loans', function () { return view('info.loan-gold'); })->name('dearo.loan.gold');
Route::get('/loans/personal-loans', function () { return view('info.loan-personal'); })->name('dearo.loan.personal');
Route::get('/loans/housing-loans', function () { return view('info.loan-housing'); })->name('dearo.loan.housing');
Route::get('/loans/educational-loans', function () { return view('info.loan-educational'); })->name('dearo.loan.educational');
Route::get('/loans/auto-loans', function () { return view('info.loan-auto'); })->name('dearo.loan.auto');
Route::get('/loans/hire-purchase', function () { return view('info.loan-hire-purchase'); })->name('dearo.loan.hire.purchase');
Route::get('/loans/renovations-loans', function () { return view('info.loan-renovations'); })->name('dearo.loan.renovations');

Route::get('/business-banking/joint-venture-loans', function () { return view('info.bb-joint-venture-loans'); })->name('dearo.bb.joint.venture.loan');
Route::get('/business-banking/mortgage-loans', function () { return view('info.bb-mortgage-loans'); })->name('dearo.bb.mortgage.loan');
Route::get('/business-banking/project-financing-loans', function () { return view('info.bb-project-financing-loans'); })->name('dearo.bb.project.financing.loan');
Route::get('/business-banking/sme-loans', function () { return view('info.bb-sme-loans'); })->name('dearo.bb.sme.loan');
Route::get('/business-banking/msme-loans', function () { return view('info.bb-msme-loans'); })->name('dearo.bb.msme.loan');
Route::get('/business-banking/short-term-loans', function () { return view('info.bb-short-term-loans'); })->name('dearo.bb.shortterm.loan');
Route::get('/business-banking/long-term-loans', function () { return view('info.bb-long-term-loans'); })->name('dearo.bb.longterm.loan');
Route::get('/business-banking/daily-loans', function () { return view('info.bb-daily-loans'); })->name('dearo.bb.daily.loan');
Route::get('/business-banking/bulk-gold-loans', function () { return view('info.bb-bulk-gold-loans'); })->name('dearo.bb.bulk.gold.loan');
Route::get('/business-banking/auto-loans', function () { return view('info.bb-auto-loans'); })->name('dearo.bb.auto.loan');
Route::get('/business-banking/hire-purchase-loans', function () { return view('info.bb-hire-purchase-loans'); })->name('dearo.bb.hire.purchase.loan');
Route::get('/business-banking/factory-facility-loans', function () { return view('info.bb-factory-facility-loans'); })->name('dearo.bb.factory.facility.loan');
Route::get('/business-banking/working-capital-loans', function () { return view('info.bb-working-capital-loans'); })->name('dearo.bb.working.capital.loan');
Route::get('/business-banking/sms-finance', function () { return view('info.bb-sms-finance'); })->name('dearo.bb.sms.finance');
Route::get('/business-banking/msme-finance', function () { return view('info.bb-msme-finance'); })->name('dearo.bb.msme.finance');

// Route::get('/investment-plans/mega-waasi', function () { return view('info.inv-mega-waasi'); })->name('dearo.inv.mega.waasi');
Route::get('/investment-plans/mega-waasi', function () {
    abort(404);
})->name('dearo.inv.mega.waasi');
Route::get('/investment-plans/yasa-isuru', function () { abort(404); })->name('dearo.inv.yasa.isuru');
Route::get('/investment-plans/general-investment', function () { abort(404); })->name('dearo.inv.general.investment');
Route::get('/investment-plans/education-investment', function () { abort(404); })->name('dearo.inv.education.investment');
Route::get('/investment-plans/personal-investment', function () { abort(404); })->name('dearo.inv.personal');
// Route::get('/investment-plans/yasa-isuru', function () { return view('info.inv-yasa-isuru'); })->name('dearo.inv.yasa.isuru');
// Route::get('/investment-plans/general-investment', function () { return view('info.inv-general-nvestment'); })->name('dearo.inv.general.investment');
// Route::get('/investment-plans/education-investment', function () { return view('info.inv-education-investment'); })->name('dearo.inv.education.investment');
Route::get('/investment-plans/asset-pledge-investment', function () { return view('info.inv-asset-pledge'); })->name('dearo.inv.asset.pledge.investment');
// Route::get('/investment-plans/personal-investment', function () { return view('info.inv-personal'); })->name('dearo.inv.personal');

Route::get('/group-of-companies/dearo-audit-and-financial-services', function () { return view('info.group-audit'); })->name('dearo.group.audit');
Route::get('/group-of-companies/dearo-it-solutions', function () { return view('info.group-it'); })->name('dearo.group.it');
Route::get('/group-of-companies/dearo-education', function () { return view('info.group-education'); })->name('dearo.group.education');
Route::get('/group-of-companies/dcbt-campus', function () { return view('info.group-campus'); })->name('dearo.group.campus');
Route::get('/group-of-companies/dearo-food-products', function () { return view('info.group-food'); })->name('dearo.group.food');
Route::get('/group-of-companies/dearo-marketing-and-distribution', function () { return view('info.group-marketing-distribution'); })->name('dearo.group.markting.distribution');
Route::get('/group-of-companies/dearo-investment-ltd', function () { return view('info.group-investment'); })->name('dearo.group.investment.ltd');

Route::get('/privacy-policy', function () { return view('policies.privacy-policy'); })->name('dearo.policies.privacy.policy');
Route::get('/refund-policy', function () { return view('policies.refund-policy'); })->name('dearo.policies.refund.policy');
Route::get('/terms-and-conditions', function () { return view('policies.terms-conditions'); })->name('dearo.policies.terms.conditions');
Route::get('/delete-customer-data', [InquiryCustomerController::class, 'loadDeleteCustomerData'])->name('customer.data.delete.load');
Route::post('/delete-customer-data', [InquiryCustomerController::class, 'deleteCustomerDataRecord'])->name('customer.data.delete.record');
//Route::get('/group-of-companies/dearo-sealand-internationals', function () { return view('info.group-sealand'); })->name('dearo.group.sealand.internationals');

// Blog Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/blogs', [BlogController::class, 'loadBlogs'])->name('admin-blogs-list-load')->middleware('can:manage-articles');
    Route::get('/admin/blogs/new', [BlogController::class, 'loadCreateBlog'])->name('admin-blogs-new-load')->middleware('can:manage-articles');
    Route::post('/admin/blogs/new', [BlogController::class, 'createBlog'])->name('admin-blog-create')->middleware('can:manage-articles');
    Route::get('/admin/blogs/{blog_id}', [BlogController::class, 'loadEditBlog'])->name('admin-blog-update-load')->middleware('can:manage-articles');
    Route::post('/admin/blogs/{blog_id}', [BlogController::class, 'updateBlog'])->name('admin-blog-update')->middleware('can:manage-articles');
    Route::post('/admin/blogs/{blog_id}/content', [BlogController::class, 'createBlogContent'])->name('admin-blog-content-create')->middleware('can:manage-articles');
    Route::post('/admin/blogs/{blog_id}/content-update', [BlogController::class, 'updateBlogContent'])->name('admin-blog-content-update')->middleware('can:manage-articles');
    Route::get('/admin/blogs/{blog_id}/content/{content_id}/move-up', [BlogController::class, 'moveUpBlogContent'])->name('admin-blog-content-moveup')->middleware('can:manage-articles');
    Route::get('/admin/blogs/{blog_id}/content/{content_id}/move-down', [BlogController::class, 'moveDownBlogContent'])->name('admin-blog-content-movedown')->middleware('can:manage-articles');
    Route::get('/admin/blogs/{blog_id}/content/{content_id}/delete', [BlogController::class, 'deleteBlogContent'])->name('admin-blog-content-delete')->middleware('can:manage-articles');
});
Route::get('/articles/{slug}', [BlogController::class, 'readBlogPostByPublic'])->name('customer.blog.post.read');


// Inquiry System - Customer Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/customer-dashboard', [InquiryCustomerController::class, 'loadDashboard'])->name('customer.dashboard.load')->middleware('can:customer-activity');
    Route::post('/inquiry/next', [InquiryCustomerController::class, 'proceedToNextStep'])->name('inquiry.next.step.load')->middleware('can:customer-activity');

    Route::get('/inquiries/{inquiry_id}/customer-profile/completion', [InquiryCustomerController::class, 'loadCustomerProfileCompletion'])->name('inquiry.customer.profile.completion.load')->middleware('can:customer-activity');
    Route::post('/inquiries/customer-profile/profile-details', [InquiryCustomerController::class, 'saveCustomerProfileDetails'])->name('inquiry.customer.profile.details.save')->middleware('can:customer-activity');
    Route::post('/inquiries/customer-profile/nic', [InquiryCustomerController::class, 'uploadCustomerNic'])->name('inquiry.customer.profile.nic.upload')->middleware('can:customer-activity');
    Route::post('/inquiries/{inquiry_id}/customer-profile', [InquiryCustomerController::class, 'completeCustomerProfile'])->name('inquiry.customer.profile.complete')->middleware('can:customer-activity');
    Route::get('/inquiries/{inquiry_id}/customer-profile', [InquiryCustomerController::class, 'loadCustomerProfile'])->name('inquiry.customer.profile.load')->middleware('can:customer-activity');

    Route::get('/inquiries/{inquiry_id}/vehicle-details/new', [InquiryCustomerController::class, 'loadVehicleDetailsCollection'])->name('inquiry.vehicle.detail.collection.load')->middleware('can:customer-activity');
    Route::post('/inquiries/vehicle-detials/essentials', [InquiryCustomerController::class, 'recordEssentialVehicleDetails'])->name('inquiry.vehicle.detail.essential.update')->middleware('can:customer-activity');
    Route::post('/inquiries/vehicle-detials/photo', [InquiryCustomerController::class, 'uploadVehicleImage'])->name('inquiry.vehicle.detail.photo.upload')->middleware('can:customer-activity');
    Route::get('/inquiries/{inquiry_id}/vehicle-detials/complete', [InquiryCustomerController::class, 'completeVehicleDetails'])->name('inquiry.vehicle.detail.complete')->middleware('can:customer-activity');

    Route::get('/inquiries/{inquiry_id}/fd-details/new', [InquiryCustomerController::class, 'loadFdDetailsCollection'])->name('inquiry.fd.detail.collection.load')->middleware('can:customer-activity');
    Route::post('/inquiries/fd-detials/essentials', [InquiryCustomerController::class, 'recordEssentialFdDetails'])->name('inquiry.fd.detail.essential.update')->middleware('can:customer-activity');
    Route::get('/inquiries/{inquiry_id}/fd-detials/complete', [InquiryCustomerController::class, 'completeFdDetails'])->name('inquiry.fd.detail.complete')->middleware('can:customer-activity');

    Route::get('/inquiries/{inquiry_id}/insurance-details/new', [InquiryCustomerController::class, 'loadInsuranceDetailsCollection'])->name('inquiry.insurance.detail.collection.load')->middleware('can:customer-activity');
    Route::post('/inquiries/insurance-detials/essentials', [InquiryCustomerController::class, 'recordEssentialInsuranceDetails'])->name('inquiry.insurance.detail.essential.update')->middleware('can:customer-activity');
    Route::get('/inquiries/{inquiry_id}/insurance-detials/complete', [InquiryCustomerController::class, 'completeInsuranceDetails'])->name('inquiry.insurance.detail.complete')->middleware('can:customer-activity');

    Route::get('/inquiries/{inquiry_id}/pawning-details/new', [InquiryCustomerController::class, 'loadPawningDetailsCollection'])->name('inquiry.pawning.detail.collection.load')->middleware('can:customer-activity');
    Route::post('/inquiries/pawning-details/essentials', [InquiryCustomerController::class, 'recordEssentialPawningDetails'])->name('inquiry.pawning.detail.essential.update')->middleware('can:customer-activity');
    Route::post('/inquiries/pawning-details/receipt/new', [InquiryCustomerController::class, 'uploadPawningReceipt'])->name('inquiry.pawning.receipt.upload')->middleware('can:customer-activity');
    Route::get('/inquiries/{inquiry_id}/pawning-details/complete', [InquiryCustomerController::class, 'completePawningDetails'])->name('inquiry.pawning.detail.complete')->middleware('can:customer-activity');

    Route::get('/inquiries/{inquiry_id}/bank-proof', [InquiryCustomerController::class, 'loadBankProofManagement'])->name('inquiry.bank.proof.load')->middleware('can:customer-activity');
    Route::post('/inquiries/bank-proof/new', [InquiryCustomerController::class, 'createBankProof'])->name('inquiry.bank.proof.create')->middleware('can:customer-activity');
    Route::post('/inquiries/{inquiry_id}/bank-proof/select', [InquiryCustomerController::class, 'selectBankProof'])->name('inquiry.bank.proof.select')->middleware('can:customer-activity');
    Route::post('/inquiries/billing-proof/new', [InquiryCustomerController::class, 'createBillingProof'])->name('inquiry.billing.proof.create')->middleware('can:customer-activity');
    Route::get('/inquiries/{inquiry_id}/billing-proof/complete', [InquiryCustomerController::class, 'completeBankProofDetails'])->name('inquiry.billing.proof.complete')->middleware('can:customer-activity');

    Route::get('/inquiries/{inquiry_id}/guarantor', [InquiryCustomerController::class, 'loadGuarantorManagement'])->name('inquiry.guarantor.load')->middleware('can:customer-activity');
    Route::get('/inquiries/{inquiry_id}/guarantor-2', [InquiryCustomerController::class, 'loadGuarantor2Management'])->name('inquiry.guarantor2.load')->middleware('can:customer-activity');
    Route::post('/inquiries/guarantor/new', [InquiryCustomerController::class, 'createGuarantor'])->name('inquiry.guarantor.create')->middleware('can:customer-activity');
    Route::post('/inquiries/guarantor/bank-proof/new', [InquiryCustomerController::class, 'createGuarantorBankProof'])->name('inquiry.guarantor.bank.proof.create')->middleware('can:customer-activity');
    Route::post('/inquiries/guarantor/billing-proof/new', [InquiryCustomerController::class, 'createGuarantorBillingProof'])->name('inquiry.guarantor.billing.proof.create')->middleware('can:customer-activity');
    Route::post('/inquiries/guarantor/nic', [InquiryCustomerController::class, 'uploadGuarantorNic'])->name('inquiry.guarantor.nic.upload')->middleware('can:customer-activity');

    Route::get('/inquiries/{inquiry_id}/summary', [InquiryCustomerController::class, 'loadInquirySummary'])->name('inquiry.summary.load')->middleware('can:customer-activity');
    Route::post('/inquiry/submit-to-manager', [InquiryCustomerController::class, 'submitInquiryToManager'])->name('inquiry.submit.to.manager')->middleware('can:customer-activity');
    Route::get('/inquiries', [InquiryCustomerController::class, 'loadInquiryListOfUser'])->name('inquiry.list.load')->middleware('can:customer-activity');
});

Route::get('/products/dearo-products-and-services', [InquiryCustomerController::class, 'loadProductListing'])->name('inquiry.product.listing.load');
Route::get('/inquiry/{inquiry_type}/new', [InquiryCustomerController::class, 'loadInquiryInitiation'])->name('inquiry.initiate.load');
Route::get('/inquiry/customer-profile/check/{customer_mobile}', [InquiryCustomerController::class, 'checkCustomerProfileAvailability'])->name('inquiry.customer.profile.check.availability');
Route::post('/inquiry/{inquiry_type}/new', [InquiryCustomerController::class, 'initiateInquiry'])->name('inquiry.initiate');

// Temp Routes
// Route::get('/ui/branch/inquiries/new', function () { return view('branch-manager.inquiries-new'); });

// Branch Manager Routes
Route::middleware('auth')->group(function(){
    Route::get('/branch/dashboard', [BranchManagerController::class, 'loadBranchManagerDashboard'])->name('branch.dashboard.load')->middleware('can:branch-manager-activity');
    
    Route::get('/branch/inquiries/leasing', [BranchManagerController::class, 'loadBranchLeasingInquiries'])->name('branch.inquiries.lease.load')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/leasing/search', [BranchManagerController::class, 'searchBranchLeasingInquiries'])->name('branch.inquiries.lease.search')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/leasing/filter/{criteria}', [BranchManagerController::class, 'filterBranchLeasingInquiries'])->name('branch.inquiries.lease.filter')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/leasing/filter', [BranchManagerController::class, 'filterBranchLeasingInquiriesByState'])->name('branch.inquiries.lease.filter.by.state')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/lease/export', [BranchManagerController::class, 'exportLeaseInquiries'])->name('branch.inquiry.lease.export')->middleware('can:branch-manager-activity');
    
    Route::get('/branch/inquiries/fd', [BranchManagerController::class, 'loadBranchFdInquiries'])->name('branch.inquiries.fd.load')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/fd/search', [BranchManagerController::class, 'searchBranchFdInquiries'])->name('branch.inquiries.fd.search')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/fd/filter/{criteria}', [BranchManagerController::class, 'filterBranchFdInquiries'])->name('branch.inquiries.fd.filter')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/fd/filter', [BranchManagerController::class, 'filterBranchFdInquiriesByState'])->name('branch.inquiries.fd.filter.by.state')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/fd/export', [BranchManagerController::class, 'exportFdInquiries'])->name('branch.inquiry.fd.export')->middleware('can:branch-manager-activity');
    
    Route::get('/branch/inquiries/insurance', [BranchManagerController::class, 'loadBranchInsuranceInquiries'])->name('branch.inquiries.insurance.load')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/insurance/search', [BranchManagerController::class, 'searchBranchInsuranceInquiries'])->name('branch.inquiries.insurance.search')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/insurance/filter/{criteria}', [BranchManagerController::class, 'filterBranchInsuranceInquiries'])->name('branch.inquiries.insurance.filter')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/insurance/filter', [BranchManagerController::class, 'filterBranchInsuranceInquiriesByState'])->name('branch.inquiries.insurance.filter.by.state')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/insurance/export', [BranchManagerController::class, 'exportInsuranceInquiries'])->name('branch.inquiry.insurance.export')->middleware('can:branch-manager-activity');

    Route::get('/branch/inquiries/pawning', [BranchManagerController::class, 'loadBranchPawningInquiries'])->name('branch.inquiries.pawning.load')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/pawning/search', [BranchManagerController::class, 'searchBranchPawningInquiries'])->name('branch.inquiries.pawning.search')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/pawning/filter/{criteria}', [BranchManagerController::class, 'filterBranchPawningInquiries'])->name('branch.inquiries.pawning.filter')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/pawning/filter', [BranchManagerController::class, 'filterBranchPawningInquiriesByState'])->name('branch.inquiries.pawning.filter.by.state')->middleware('can:branch-manager-activity');
    Route::get('/branch/inquiries/pawning/export', [BranchManagerController::class, 'exportPawningInquiries'])->name('branch.inquiry.pawning.export')->middleware('can:branch-manager-activity');
});
// Route::get('/manager/dashboard', [BranchManagerController::class, 'loadBranchManagerDashboard'])->name('manager.dashboard.load');

// Admin and Branch Manager - Shared Functions
Route::middleware('auth')->group(function(){
    Route::get('/dearo/inquiries/lease/application/{inquiry_id}', [InquiryDearoController::class, 'viewLeaseInquiry'])->name('dearo.inquiry.lease.application.load')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/lease/application/state/update', [InquiryDearoController::class, 'updateLeaseInquiryState'])->name('dearo.inquiry.lease.application.state.update')->middleware('can:branch-manager-activity');
    Route::get('/dearo/inquiries/lease/application/{inquiry_id}/action-panel', [InquiryDearoController::class, 'loadLeaseInquiryActionPanel'])->name('dearo.inquiry.lease.application.action.panel')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/lease/application/arrears/activate', [InquiryDearoController::class, 'activateArrearsLeaseInquiry'])->name('dearo.inquiry.lease.application.arrears.activate')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/lease/application/arrears/deactivate', [InquiryDearoController::class, 'deactivateArrearsLeaseInquiry'])->name('dearo.inquiry.lease.application.arrears.deactivate')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/lease/application/vehicle-missing/activate', [InquiryDearoController::class, 'activateVehicleMissingLeaseInquiry'])->name('dearo.inquiry.lease.application.vehicle.missing.activate')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/lease/application/vehicle-missing/deactivate', [InquiryDearoController::class, 'deactivateVehicleMissingLeaseInquiry'])->name('dearo.inquiry.lease.application.vehicle.missing.deactivate')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/lease/application/payments/new-payment', [InquiryDearoController::class, 'newPaymentLeaseInquiry'])->name('dearo.inquiry.lease.application.payments.new')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/lease/application/payments/edit-payment', [InquiryDearoController::class, 'editPaymentLeaseInquiry'])->name('dearo.inquiry.lease.application.payments.edit')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/lease/application/payments/delete-payment', [InquiryDearoController::class, 'deletePaymentLeaseInquiry'])->name('dearo.inquiry.lease.application.payments.delete')->middleware('can:branch-manager-activity');

    Route::get('/dearo/inquiries/fd/application/{inquiry_id}', [InquiryDearoController::class, 'viewFdInquiry'])->name('dearo.inquiry.fd.application.load')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/fd/application/state/update', [InquiryDearoController::class, 'updateFdInquiryState'])->name('dearo.inquiry.fd.application.state.update')->middleware('can:branch-manager-activity');
    
    Route::get('/dearo/inquiries/insurance/application/{inquiry_id}', [InquiryDearoController::class, 'viewInsuranceInquiry'])->name('dearo.inquiry.insurance.application.load')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/insurance/application/state/update', [InquiryDearoController::class, 'updateInsuranceInquiryState'])->name('dearo.inquiry.insurance.application.state.update')->middleware('can:branch-manager-activity');
    
    Route::get('/dearo/inquiries/pawning/application/{inquiry_id}', [InquiryDearoController::class, 'viewPawningInquiry'])->name('dearo.inquiry.pawning.application.load')->middleware('can:branch-manager-activity');
    Route::post('/dearo/inquiries/pawning/application/state/update', [InquiryDearoController::class, 'updatePawningInquiryState'])->name('dearo.inquiry.pawning.application.state.update')->middleware('can:branch-manager-activity');
});

// Super Admin Routes
Route::middleware('auth')->group(function(){
    Route::get('/user/dashboard', [SuperAdminController::class, 'loadUserDashboard'])->name('user.dashboard.load'); // To route to relavant dashboard
    Route::get('/admin/dashboard', [SuperAdminController::class, 'loadAdminDashboard'])->name('admin.dashboard.load')->middleware('can:super-admin-activity');
    Route::post('/admin/branch/new', [SuperAdminController::class, 'createBranch'])->name('admin.branch.create')->middleware('can:super-admin-activity');
    Route::post('/admin/branch/manager/new', [SuperAdminController::class, 'createBranchManager'])->name('admin.branch.manager.create')->middleware('can:super-admin-activity');
    Route::get('/admin/branches', [SuperAdminController::class, 'loadBranches'])->name('admin.branches.load')->middleware('can:super-admin-activity');
    Route::get('/admin/branches/branch/{branch_id}/dashboard', [SuperAdminController::class, 'loadBranchDashboard'])->name('admin.branches.branch.dashboard.load')->middleware('can:super-admin-activity');
    Route::get('/admin/branches/managers', [SuperAdminController::class, 'loadManagers'])->name('admin.branches.managers.load')->middleware('can:super-admin-activity');

    Route::get('/admin/inquiries/leasing', [SuperAdminController::class, 'loadAllLeasingInquiries'])->name('admin.inquiries.lease.load')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/leasing/search', [SuperAdminController::class, 'searchLeasingInquiries'])->name('admin.inquiries.lease.search')->middleware('can:branch-manager-activity');
    Route::get('/admin/inquiries/leasing/filter/{criteria}', [SuperAdminController::class, 'filterLeasingInquiries'])->name('admin.inquiries.lease.filter')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/leasing/filter', [SuperAdminController::class, 'filterLeasingInquiriesByState'])->name('admin.inquiries.lease.filter.by.state')->middleware('can:branch-manager-activity');
    Route::get('/admin/inquiries/lease/export', [SuperAdminController::class, 'exportLeaseInquiries'])->name('admin.inquiry.lease.export')->middleware('can:branch-manager-activity');
    
    Route::get('/admin/inquiries/fd', [SuperAdminController::class, 'loadAllFdInquiries'])->name('admin.inquiries.fd.load')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/fd/search', [SuperAdminController::class, 'searchFdInquiries'])->name('admin.inquiries.fd.search')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/fd/filter/{criteria}', [SuperAdminController::class, 'filterFdInquiries'])->name('admin.inquiries.fd.filter')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/fd/filter', [SuperAdminController::class, 'filterFdInquiriesByState'])->name('admin.inquiries.fd.filter.by.state')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/fd/export', [SuperAdminController::class, 'exportFdInquiries'])->name('admin.inquiry.fd.export')->middleware('can:branch-manager-activity');
    
    Route::get('/admin/inquiries/insurance', [SuperAdminController::class, 'loadAllInsuranceInquiries'])->name('admin.inquiries.insurance.load')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/insurance/search', [SuperAdminController::class, 'searchInsuranceInquiries'])->name('admin.inquiries.insurance.search')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/insurance/filter/{criteria}', [SuperAdminController::class, 'filterInsuranceInquiries'])->name('admin.inquiries.insurance.filter')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/insurance/filter', [SuperAdminController::class, 'filterInsuranceInquiriesByState'])->name('admin.inquiries.insurance.filter.by.state')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/insurance/export', [SuperAdminController::class, 'exportInsuranceInquiries'])->name('admin.inquiry.insurance.export')->middleware('can:branch-manager-activity');

    Route::get('/admin/inquiries/pawning', [SuperAdminController::class, 'loadAllPawningInquiries'])->name('admin.inquiries.pawning.load')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/pawning/search', [SuperAdminController::class, 'searchPawningInquiries'])->name('admin.inquiries.pawning.search')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/pawning/filter/{criteria}', [SuperAdminController::class, 'filterPawningInquiries'])->name('admin.inquiries.pawning.filter')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/pawning/filter', [SuperAdminController::class, 'filterPawningInquiriesByState'])->name('admin.inquiries.pawning.filter.by.state')->middleware('can:super-admin-activity');
    Route::get('/admin/inquiries/pawning/export', [SuperAdminController::class, 'exportPawningInquiries'])->name('admin.inquiry.pawning.export')->middleware('can:branch-manager-activity');

    // Route::get('/admin/inquiries/filter/all', [SuperAdminController::class, 'listAllInquiries'])->name('admin.inquiries.all.load')->middleware('can:super-admin-activity');
    // Route::get('/admin/inquiries/lease/{inquiry_id}/application', [SuperAdminController::class, 'viewLeaseInquiry'])->name('admin.inquiries.lease.view.load')->middleware('can:super-admin-activity');
    // Route::get('/admin/inquiries/fd/{inquiry_id}/application', [SuperAdminController::class, 'viewFdInquiry'])->name('admin.inquiries.fd.view.load')->middleware('can:super-admin-activity');
    // Route::get('/admin/inquiries/insurance/{inquiry_id}/application', [SuperAdminController::class, 'viewInsuranceInquiry'])->name('admin.inquiries.insurance.view.load')->middleware('can:super-admin-activity');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
