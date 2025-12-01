<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>FD Details | Dearo</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-customer')

    <!-- Status Banner -->
    <div class="w-full h-auto max-h-[400px] sm:max-h-[280px] sm:h-[280px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/fd-product-banner-right.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/fd-product-banner-right.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        @include('components.inquiry-status') 
    </div>

    <!-- Fd Details -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Fixed Deposit Requirements</p>
            <p class="text-md text-theme-gray font-medium mt-2">Please provide the essential details to open a fixed deposit.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
        <form id="form-fd-essentials" method="POST" class="m-0 p-0">
            @csrf
            <input type="hidden" id="fd_essentials_inquiry_id" name="fd_essentials_inquiry_id" value="{{$inquiry_id}}" />
            
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <label for="fd_amount" class="text-theme-gray">Amount <span class="text-theme-red">*</span></label>
                    <input type="number" id="fd_amount" name="fd_amount" placeholder="Enter amount" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $inquiry_fd->amount }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="fd_period" class="text-theme-gray">Period <span class="text-theme-red">*</span></label>
                    <select id="fd_period" name="fd_period" placeholder="Select period of FD" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required>
                        @if($inquiry_fd->period == '1_MONTH') <option value="1_MONTH" selected>1 Month</option> @else <option value="1_MONTH">1 Month</option> @endif
                        @if($inquiry_fd->period == '3_MONTHS') <option value="3_MONTHS" selected>3 Months</option> @else <option value="3_MONTHS">3 Months</option> @endif
                        @if($inquiry_fd->period == '6_MONTHS') <option value="6_MONTHS" selected>6 Months</option> @else <option value="6_MONTHS">6 Months</option> @endif
                        @if($inquiry_fd->period == '1_YEAR') <option value="1_YEAR" selected>1 Year</option> @else <option value="1_YEAR">1 Year</option> @endif
                        @if($inquiry_fd->period == '2_YEARS') <option value="2_YEARS" selected>2 Years</option> @else <option value="2_YEARS">2 Years</option> @endif
                        @if($inquiry_fd->period == '3_YEARS') <option value="3_YEARS" selected>3 Years</option> @else <option value="3_YEARS">3 Years</option> @endif
                        @if($inquiry_fd->period == '4_YEARS') <option value="4_YEARS" selected>4 Years</option> @else <option value="4_YEARS">4 Years</option> @endif
                        @if($inquiry_fd->period == '5_YEARS') <option value="5_YEARS" selected>5 Years</option> @else <option value="5_YEARS">5 Years</option> @endif
                    </select>
                </div>
                <div class="w-full text-sm">
                    <label for="fd_rate" class="text-theme-gray">Preferred Insterest Rate <span class="text-theme-red">*</span></label>
                    <input type="number" step=".01" id="fd_rate" name="fd_rate" placeholder="Enter preferred interest rate" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $inquiry_fd->preferred_rate }}" required/>
                </div>
            </div>
            <div class="w-full flex justify-start mt-4 items-center">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Save</button>
                <div id="fd-success-acknowledge" class="p-0 m-0 hidden">
                    <div class="text-md text-theme-gray flex items-center ml-4">
                        <p>Saved</p>
                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                        </div>
                    </div>
                </div>
                <div id="fd-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                    <p>Saving ...</p>
                </div>
            </div>
        </form>
        </div>
    </div>  

    <!-- Next Step -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Click to Proceed to Complete and Submit</p>
            <p class="text-md text-theme-gray font-medium mt-2">Click below to submit your inquiry. Relavant Dearo branch will contact you. Your request status indicated in customer dashboard.</p>
            <a href="{{ route('inquiry.fd.detail.complete', ['inquiry_id' => $inquiry_id_encrypted]) }}">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 mt-4">Submit for Approval</button>
            </a>
        </div>
    </div>
    
    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-fd.js'])
</body>
</html>