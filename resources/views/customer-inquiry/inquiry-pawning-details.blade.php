<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Pawning Details | Dearo</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-customer')

    <!-- Status Banner -->
    <div class="w-full h-auto max-h-[400px] sm:max-h-[280px] sm:h-[280px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/pawning-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/pawning-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        @include('components.inquiry-status') 
    </div>

    <!-- Pawning Details -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Jewellery Details</p>
            <p class="text-md text-theme-gray font-medium mt-2">Please provide the essential details to apply for a gold loan.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-md text-theme-gray font-medium mt-2">Please select the jewelley and provide the quantities below</p>
            <div class="w-full flex justify-start items-center gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <select id="input-jewellery-type" placeholder="Select Jewellery" class="h-10 border-theme-gray text-md w-auto">
                    <option value="Headband">Headband</option>
                    <option value="Hairclip">Hairclip</option>
                    <option value="Bangle">Bangle</option>
                    <option value="Bracelet">Bracelet</option>
                    <option value="Cuff links">Cuff links</option>
                    <option value="Ring">Ring</option>
                    <option value="Earring">Earring</option>
                    <option value="Necklace">Necklace</option>
                    <option value="Anklet">Anklet</option>
                    <option value="Pendant">Pendant</option>
                    <option value="Other">Other</option>
                </select>
                <input type="number" id="input-jewellery-count" value="">
                <button id="btn-add-jewellery" type="button" class="h-min bg-theme-gray text-white font-bold px-4 py-2">Add</button>
            </div>
            <div class="w-full mt-3">
                <div id="div-jewellery-chip-holder" class="w-full flex justify-start items-center gap-x-3 xl:gap-x-4 gap-y-3 flex-wrap"></div>
                <p class="text-md text-theme-gray font-medium mt-2">Your jewellery for the Gold Loan.</p>
            </div>
            @if($jewellery_details != null)
                <input type="hidden" id="initial_jewellery_list" value="{{ $jewellery_details }}" />
            @else
                <input type="hidden" id="initial_jewellery_list" value="NA" />
            @endif

            <form id="form-pawning-jewelry-details" method="POST" class="m-0 p-0">
                @csrf
                <input type="hidden" id="pawning_essentials_jewellery_details" name="pawning_essentials_jewellery_details" value="" />
                <input type="hidden" id="pawning_essentials_inquiry_id" name="pawning_essentials_inquiry_id" value="{{$inquiry_id}}" />
                
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                    <div class="w-full text-sm">
                        <label for="pawning_amount" class="text-theme-gray">Amount <span class="text-theme-red">*</span></label>
                        <input type="number" id="pawning_amount" name="pawning_amount" placeholder="Enter amount" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $inquiry_pawning->amount }}" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="pawning_amount" class="text-theme-gray">Already pawned somewhere? <span class="text-theme-red">*</span></label>
                        <div class="flex items-center justify-start h-10">
                            @if($inquiry_pawning->pawned_elsewhere)
                                <input type="radio" id="pawn-status-yes" name="pawn_status" value="true" checked />
                                <label for="html" class="ml-2">Yes</label>
                                <input type="radio" id="pawn-status-no" name="pawn_status" value="false" class="ml-4" />
                                <label for="css" class="ml-2">No</label>
                            @else
                                <input type="radio" id="pawn-status-yes" name="pawn_status" value="true" />
                                <label for="html" class="ml-2">Yes</label>
                                <input type="radio" id="pawn-status-no" name="pawn_status" value="false" checked class="ml-4" />
                                <label for="css" class="ml-2">No</label>
                            @endif
                            
                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-start mt-4 items-center">
                    <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Save</button>
                    <div id="pawning-success-acknowledge" class="p-0 m-0 hidden">
                        <div class="text-md text-theme-gray flex items-center ml-4">
                            <p>Saved</p>
                            <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                            </div>
                        </div>
                    </div>
                    <div id="pawning-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                        <p>Saving ...</p>
                    </div>
                </div>

            </form>
        </div>
    </div>  

    <!-- Receipt Upload -->
    <div id="div-pawning-receipt" class="w-full py-6 {{ ($inquiry_pawning->pawned_elsewhere)?'':'hidden' }}">
        <div class="w-full bg-theme-blue-lite py-6">
            <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <p class="text-theme-blue text-2xl font-bold">Pawning Receipt</p>
                <p class="text-md text-theme-gray font-medium mt-2">Please upload the receipt from the pawning center.</p>
            </div>
        </div>

        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-pawning-receipt" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{ $inquiry_id }}" />
                        <label class="text-theme-gray font-bold">Photo Upload - Pawning Receipt <span class="text-theme-red">*</span></label>
                        <input type="file" name="pawning_receipt" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="receipt-success-acknowledge" class="{{ ($inquiry_pawning->pic_pawned_receipt_elsewhere == null)?'hidden':'' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="receipt-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Next Step -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Click to Proceed to Complete and Submit</p>
            <p class="text-md text-theme-gray font-medium mt-2">Click below to submit your inquiry. Relavant Dearo branch will contact you. Your request status indicated in customer dashboard.</p>
            <a href="{{ route('inquiry.pawning.detail.complete', ['inquiry_id' => $inquiry_id_encrypted]) }}">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 mt-4">Submit for Approval</button>
            </a>
        </div>
    </div>
    
    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-pawning.js'])
</body>
</html>