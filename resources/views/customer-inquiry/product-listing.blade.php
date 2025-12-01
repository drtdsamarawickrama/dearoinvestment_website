<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Product Listing | Dearo</title>
</head>
<body class="font-lato h-screen bg-white">
    <!-- Navigation -->
    @if($is_logged)
        @include('layouts.navigation-customer')
    @else
        @include('layouts.navigation-guest')
    @endif

    <!-- Leasing Banner -->
    <div class="w-full h-auto max-h-[750px] sm:max-h-[400px] sm:h-[400px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[400px] sm:object-cover sm:object-left md:object-contain xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        <div class="h-[400px] relative top-[-550px] sm:top-[-400px] left-0">
            <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <div class="w-full h-full sm:w-2/3 md:w-1/2">
                    <p class="text-3xl sm:text-4xl text-theme-blue font-bold mt-10">Own your Dream Vehicle</p>
                    <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Leasing</p>
                    <p class="text-md text-theme-gray font-medium mt-3">We offer a diverse fleet of modern cars and trucks with personalized leasing plans to fit your needs and budget. Drive with confidence—experience the difference with Dearo</p>
                    <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'lease']) }}">
                        <button class="bg-theme-blue text-white font-bold px-4 py-2 mt-4">Get a Leasing</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FD Banner -->
    <div class="w-full h-auto max-h-[750px] sm:max-h-[400px] sm:h-[400px]">
        <div class="w-full h-full sm:relative flex justify-start">
            <img src="{{ url('/assets/img/inquiry/fd-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[400px] sm:object-cover sm:object-right md:object-contain xl:object-cover xl:object-right hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/fd-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        <div class="h-[400px] relative top-[-550px] sm:top-[-400px] left-0">
            <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 flex justify-end">
                <div class="w-full h-full sm:w-2/3 md:w-1/2">
                    <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Invest Today for Tomorrow</p>
                    <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Fixed Deposits</p>
                    <p class="text-md text-theme-gray font-medium mt-3">Your savings grow securely with Dearo fixed deposit accounts. Our fixed deposits offer a reliable and rewarding way to invest your money with guaranteed returns and competitive interest rates.</p>
                    
                    <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'fixed-deposit']) }}">
                        <button class="bg-theme-blue text-white font-bold px-4 py-2 mt-4">Invest in FD</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Insurance Banner -->
    <div class="w-full h-auto max-h-[750px] sm:max-h-[400px] sm:h-[400px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[400px] sm:object-cover sm:object-left md:object-contain xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        <div class="h-[400px] relative top-[-550px] sm:top-[-400px] left-0">
            <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <div class="w-full h-full sm:w-2/3 md:w-1/2">
                    <p class="text-3xl sm:text-4xl text-theme-blue font-bold mt-10">Your Insurance Parner</p>
                    <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Insurance</p>
                    <p class="text-md text-theme-gray font-medium mt-3">We understand that your vehicle is more than just a mode of transportation. We're committed to providing you with comprehensive, reliable, and affordable vehicle insurance solutions tailored to meet your unique needs.</p>
                    
                    <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'insurance']) }}">
                        <button class="bg-theme-blue text-white font-bold px-4 py-2 mt-4">Get a General Insurance</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pawning Banner -->
    <div class="w-full h-auto max-h-[750px] sm:max-h-[400px] sm:h-[400px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/pawning-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[400px] sm:object-cover sm:object-left md:object-contain xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/pawning-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        <div class="h-[400px] relative top-[-550px] sm:top-[-400px] left-0">
            <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <div class="w-full h-full sm:w-2/3 md:w-1/2">
                    <p class="text-3xl sm:text-4xl text-theme-blue font-bold mt-10">Cash in Clutter Out</p>
                    <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Gold Loans</p>
                    <p class="text-md text-theme-gray font-medium mt-3">We offer secure and hassle-free gold loans to meet your urgent financial needs. With quick approvals and flexible repayment options, we provide a seamless way to unlock the value of your gold assets.</p>
                    
                    <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'pawning']) }}">
                        <button class="bg-theme-blue text-white font-bold px-4 py-2 mt-4">Get a Gold Loan</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-customer')
</body>
</html>