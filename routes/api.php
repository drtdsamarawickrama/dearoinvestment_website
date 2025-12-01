<?php

use App\Http\Controllers\InquiryCustomerApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1/')->group(function(){
    Route::post('login', [InquiryCustomerApiController::class, 'customerLogin']); // Done
    Route::post('register', [InquiryCustomerApiController::class, 'customerRegister']); // Done

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('customer/profile/update', [InquiryCustomerApiController::class, 'customerProfileUpdate']); // To Do: profile-completed:true/false
        Route::post('customer/profile/nic', [InquiryCustomerApiController::class, 'storeNic']); // To Do: profile-completed:true/false

        Route::get('inquiries', [InquiryCustomerApiController::class, 'getCustomerInquiryList']);
        Route::post('inquiries/new-inquiry', [InquiryCustomerApiController::class, 'initiateInquiry']); // Done
        Route::post('inquiries/vehicle/essentials', [InquiryCustomerApiController::class, 'storeVehicleDetailsEssentials']); // Done
        Route::post('inquiries/vehicle/image', [InquiryCustomerApiController::class, 'storeVehicleImage']); // To Do: Each photo-provided:true/false
        Route::post('inquiries/bank-statement', [InquiryCustomerApiController::class, 'storeBankStatement']); // Done
        Route::post('inquiries/billing-proof', [InquiryCustomerApiController::class, 'storeBillingProof']); // Done

        Route::post('inquiries/guarantor/{guarantor_index}', [InquiryCustomerApiController::class, 'createGuarantor']); // Done
        Route::post('inquiries/guarantor/{guarantor_index}/bank-statement', [InquiryCustomerApiController::class, 'storeGuarantorBankStatement']); // Done
        Route::post('inquiries/guarantor/{guarantor_index}/billing-proof', [InquiryCustomerApiController::class, 'storeGuarantorBillingProof']); // Done
        Route::post('inquiries/guarantor/{guarantor_index}/nic', [InquiryCustomerApiController::class, 'storeGuarantorNic']); // Done

        Route::post('inquiries/gold-details', [InquiryCustomerApiController::class, 'storePawningDetails']); // Done
        Route::post('inquiries/fd-details', [InquiryCustomerApiController::class, 'storeFdDetails']); // Done
        Route::post('inquiries/lease/submit', [InquiryCustomerApiController::class, 'submitLeaseInquiry']);
        Route::post('inquiries/fd/submit', [InquiryCustomerApiController::class, 'submitFdInquiry']);
        Route::post('inquiries/insurance/submit', [InquiryCustomerApiController::class, 'submitInsuranceInquiry']);
        Route::post('inquiries/gold-loan/submit', [InquiryCustomerApiController::class, 'submitGoldLoanInquiry']);

        Route::post('inquiries/validate-step', [InquiryCustomerApiController::class, 'validateInquiryStep']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
