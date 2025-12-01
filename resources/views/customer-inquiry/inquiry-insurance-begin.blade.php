<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Your Insurance Partner | Dearo</title>
</head>
<body class="font-lato h-screen bg-white">
    <!-- Navigation -->
    @if($is_logged)
        @include('layouts.navigation-customer')
    @else
        @include('layouts.navigation-guest')
    @endif

    <!-- Leasing Banner -->
    <div class="w-full h-auto max-h-[900px] sm:max-h-[500px] sm:h-[500px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[500px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        <div class="h-[400px] relative top-[-550px] sm:top-[-500px] left-0">
            <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Your Insurance Partner</p>
                <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Insurance</p>
                
                <div class="w-full h-full sm:w-2/3 md:w-1/2">
                    <div class="mt-6 w-full lg:w-2/3">
                        <form id="form-make-inquiry" action="{{ route('inquiry.initiate', ['inquiry_type' => 'lease']) }}" method="POST" class="m-0 p-0">
                            @csrf
                            <input type="hidden" id="input_inquiry_type" name="input_inquiry_type" value="INSURANCE">
                            <div class="w-full flex flex-col gap-2">
                                @if(!$is_logged)
                                <input type="hidden" id="input_is_logged" name="input_is_logged" value="0">
                                <div class="w-full text-sm">
                                    <label for="input_mobile" class="text-theme-gray">Mobile Number <span id="msg-mobile-validation" class="text-theme-red">*</span></label>
                                    <input type="text" id="new_inquiry_input_mobile" name="input_mobile" placeholder="Insert mobile number in 10 digits" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                                </div>
                                <div class="non-mobile w-full text-sm">
                                    <label for="input_password" class="text-theme-gray">Password <span class="text-theme-red">*</span></label>
                                    <input type="password" id="input_password" name="input_password" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                                </div>
                                <div class="non-mobile w-full text-sm">
                                    <label for="input_first_name" class="text-theme-gray">First Name <span class="text-theme-red">*</span></label>
                                    <input type="text" id="input_first_name" name="input_first_name" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                                </div>
                                <div class="non-mobile w-full text-sm">
                                    <label for="input_last_name" class="text-theme-gray">Last Name <span class="text-theme-red">*</span></label>
                                    <input type="text" id="input_last_name" name="input_last_name" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                                </div>
                                @else
                                <input type="hidden" id="input_is_logged" name="input_is_logged" value="1">
                                <div class="w-full text-sm">
                                    <p>To start making your inquiry please click below.</p>
                                </div>
                                @endif
                                <div class="w-full flex justify-start mt-2">
                                    <button id="btn-make-inquiry" type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Make Inquiry</button>
                                    <p id="msg-existing-user" class="hidden">An account is already created for the number provided. Please <a href="{{ route('login') }}" class="text-theme-blue font-bold underline">Click here to Login</a>. Or you can use a different number to create a not accout.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js'])
</body>
</html>