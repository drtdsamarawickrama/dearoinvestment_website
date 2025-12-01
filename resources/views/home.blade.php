<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Investment | Welcome to Dearo</title>
</head>
<body class="font-lato h-screen bg-white">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <!-- Hero Banner -->
    <div class="w-full max-h-[500px] h-[500px] flex flex-col" onmouseenter="hideExpandableMenus();">
        <div class="w-full h-[500px] relative">
            <img src="{{ url('/assets/img/hero-banner.jpg') }}" alt="" class="w-full h-[500px] absolute top-0 left-0 object-cover">
        </div>
        <!-- <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[500px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div> -->
        
        <div class="relative w-full h-[500px] top-0 left-0 bg-gradient-to-r from-theme-orange-lite">
            <div class="relative h-[500px] top-0 left-0">
                <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                    <div class="bg-white rounded-b-lg w-48 flex justify-center drop-shadow-sm">
                        <img src="{{ url('/assets/img/logo-dearo.png') }}" alt="" class="w-full max-w-40 h-auto object-fill mt-2 mb-1">
                    </div>

                    <!-- <div id="slider-1" class="hero-slider mt-10">
                        <h3 class="text-4xl text-theme-blue">ඔබේ සිහින වාහනය හිමි කරගන්න</h3>
                        <h3 class="text-3xl text-theme-blue mt-4">Own your Dream Vehicle</h3>
                        <p class="text-theme-gray mt-5">Click here to proceed. පහතින් click කරන්න.</p>
                        <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'lease']) }}" class="">
                            <button class="mt-4 h-min max-w-fit bg-theme-blue text-white font-bold px-4 py-2">Get a Dearo Lease</button>
                        </a>
                        <div class="flex gap-3 mt-5">
                            <div class="w-4 h-4 bg-theme-blue rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                        </div>
                    </div>

                    <div id="slider-2" class="hero-slider mt-10 hidden">
                        <h3 class="text-4xl text-theme-blue">හෙට වෙනුවෙන් අද ආයෝජනය කරමු</h3>
                        <h3 class="text-3xl text-theme-blue mt-4">Invest Today for a Better Tomorrow</h3>
                        <p class="text-theme-gray mt-5">Click here to proceed. පහතින් click කරන්න.</p>
                        <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'fixed-deposit']) }}" class="">
                            <button class="mt-4 h-min max-w-fit bg-theme-blue text-white font-bold px-4 py-2">Dearo Fixed Deposits</button>
                        </a>
                        <div class="flex gap-3 mt-5">
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                        </div>
                    </div>

                    <div id="slider-3" class="hero-slider mt-10 hidden">
                        <h3 class="text-4xl text-theme-blue">ඔබේ වාහන රක්ෂණ සහකරු</h3>
                        <h3 class="text-3xl text-theme-blue mt-4">Your General Insurance Partner</h3>
                        <p class="text-theme-gray mt-5">Click here to proceed. පහතින් click කරන්න.</p>
                        <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'insurance']) }}" class="">
                            <button class="mt-4 h-min max-w-fit bg-theme-blue text-white font-bold px-4 py-2">Dearo Insurance</button>
                        </a>
                        <div class="flex gap-3 mt-5">
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                        </div>
                    </div>

                    <div id="slider-4" class="hero-slider mt-10 hidden">
                        <h3 class="text-4xl text-theme-blue">ඉක්මනින් රන් ණයක් ඔබටත්</h3>
                        <h3 class="text-3xl text-theme-blue mt-4">Cash in Clutter Out</h3>
                        <p class="text-theme-gray mt-5">Click here to proceed. පහතින් click කරන්න.</p>
                        <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'pawning']) }}" class="">
                            <button class="mt-4 h-min max-w-fit bg-theme-blue text-white font-bold px-4 py-2">Dearo Gold Loans</button>
                        </a>
                        <div class="flex gap-3 mt-5">
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue-lite rounded-full border-[1px] border-theme-gray"></div>
                            <div class="w-4 h-4 bg-theme-blue rounded-full border-[1px] border-theme-gray"></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Title and Para -->
    <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
        <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">About Our <span class="text-theme-orange">Company</span></h3>
        <p class="text-theme-gray text-md font-normal text-left w-full mt-6">
            Dearo investment limited Company duly incorporated in the Democratic Socialist Republic of Sri Lanka and registered under the Companies Act no 07 of 2007  public limited  company.Dearoinvestment Limited  provide  to  Financial services and digital financial solutions in sri lanka  develop the SME and MSME  sectors dearo investment limited subsidiaries of Dearo Investment Limited has strategically diversified into key economic growth sectors across financial services, leisure, agriculture and plantations, construction and real estate, manufacturing and trading, technology, research and innovation and strategic investments.
        </p>
    </div>

    <!-- Inquiry -->
    <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
        <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Agriculture Project Loans</span></h3>
        <p class="text-theme-gray text-md font-normal text-left w-full mt-6">We offer agriculture project loans, facilities.</p>
    </div>

    <div class="w-full sm:max-w-screen-2xl mx-auto flex justify-start mt-10 px-4 sm:px-10 md:px-20">
        <div class="w-auto h-auto flex overflow-x-auto gap-7">
            <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'lease']) }}">
                <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-blue-lite pb-2">
                    <img src="{{ url('/') }}/assets/img/inquiry/inquiry-thumb-lease.JPEG" alt="dearo-lease" class="w-72 h-52 object-cover rounded-t-lg">
                    <hr class="border-[2px] border-theme-blue">
                    <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Dearo Vehicle Loans</p>
                    <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Own your Dream Vehicle</p>
                </div>
            </a>

            <!-- <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'fixed-deposit']) }}">
                <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-blue-lite pb-2">
                    <img src="{{ url('/') }}/assets/img/inquiry/inquiry-thumb-fd.JPEG" alt="dearo-fd" class="w-72 h-52 object-cover rounded-t-lg">
                    <hr class="border-[2px] border-theme-blue">
                    <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Dearo Fixed Deposits</p>
                    <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Invest Today for Tomorrow</p>
                </div>
            </a> -->

            <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'insurance']) }}">
                <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-blue-lite pb-2">
                    <img src="{{ url('/') }}/assets/img/inquiry/inquiry-thumb-insurance.JPEG" alt="dearo-insurance" class="w-72 h-52 object-cover rounded-t-lg">
                    <hr class="border-[2px] border-theme-blue">
                    <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Dearo Insurance</p>
                    <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Your Insurance Parner</p>
                </div>
            </a>

            <a href="{{ route('inquiry.initiate.load', ['inquiry_type' => 'pawning']) }}">
                <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-blue-lite pb-2">
                    <img src="{{ url('/') }}/assets/img/inquiry/inquiry-thumb-pawning.jpg" alt="dearo-pawning" class="w-72 h-52 object-cover rounded-t-lg">
                    <hr class="border-[2px] border-theme-blue">
                    <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Cash in Clutter Out</p>
                    <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo Gold Loans</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Business Industries -->
    <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
        <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Business <span class="text-theme-orange">Sectors</span></h3>
        <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Our group of companies is diveresed in variety of business sectors.</p>
    </div>

    <!-- Sectors -->
    <div class="w-full sm:max-w-screen-2xl mx-auto flex justify-start mt-10 px-4 sm:px-10 md:px-20">
        <div class="w-auto h-auto flex overflow-x-auto gap-7">
            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-finance.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Finance Services</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo Investment (Pvt) Ltd.</p>
            </div>

            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-business.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Business and Legal Services</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo Audit and Sectary Services</p>
            </div>

            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-invest.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Investments</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo Investment Ltd.</p>
            </div>

            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-food-beverage.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Food and Beverage</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo Foods Products</p>
            </div>

            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-tourism.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Tourism Services</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Sealand Internationals (Pvt) Ltd.</p>
            </div>

            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-education.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Education Services</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo Education (Pvt) Ltd.</p>
            </div>

            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-it.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Software & IT</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo IT Solution (Pvt) Ltd.</p>
            </div>

            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-automobile.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Automobile</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo Auto</p>
            </div>

            <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                <img src="{{ url('/') }}/assets/img/sector-agriculture.JPEG" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                <hr class="border-[2px] border-theme-orange">
                <p class="mt-3 text-md text-theme-gray font-semibold w-auto pl-4">Agriculture & Plantation</p>
                <p class="mt-2 text-md text-theme-gray font-medium w-auto pl-4">Dearo Agri</p>
            </div>
        </div>
    </div>

    <!-- Highlighted Section -->
    <div class="w-full bg-theme-blue-lite flex py-10 mt-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Customer Service</span></h3>
            <div class="flex items-center justify-start mt-8">
                <div class="min-w-9 min-h-9 w-9 h-9 flex justify-center items-center bg-theme-blue rounded-lg">
                    <p class="text-2xl text-white font-bold">1</p>
                </div>
                <p class="text-theme-gray text-md font-normal text-left ml-4">We offer a wide range of services tailored to meet the unique needs of each client.</p>
            </div>
            <div class="flex items-center justify-start mt-2">
                <div class="min-w-9 min-h-9 w-9 h-9 flex justify-center items-center bg-theme-blue rounded-lg">
                    <p class="text-2xl text-white font-bold">2</p>
                </div>
                <p class="text-theme-gray text-md font-normal text-left ml-4">Our experienced team provides high-quality services with a focus on innovation and efficiency.</p>
            </div>
            <div class="flex items-center justify-start mt-2">
                <div class="min-w-9 min-h-9 w-9 h-9 flex justify-center items-center bg-theme-blue rounded-lg">
                    <p class="text-2xl text-white font-bold">3</p>
                </div>
                <p class="text-theme-gray text-md font-normal text-left ml-4">Our customer service team is available 24/7 to provide timely and effective support to our clients.</p>
            </div>
        </div>
    </div>
    
    <!-- Legal Status -->
    <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
        <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Legal Status</h3>
        <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Company duly incorporated in the Democratic Socialist Republic of Sri Lanka and registered under the Companies Act no 07 of 2007  public limited  company</p>
        <p class="text-theme-gray text-md font-normal text-left w-full mt-6">
            We are a registered Loans and Hire purchase<br>
            Company with the Act No 29 of 1982 Consumer Credit. Law of Contract<br>
            Small Claims Procedure Act No. 33 of 2022 Registration of Documents<br>
            Act 2022 No. 32 as amended Debt Recovery Act ,Mortgage Act, Bills of<br>
            Exchange Ordinance Act , Stamp Duty Act<br>
        </p>
    </div>

     
    <!-- Dearo Holdings -->
    <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
        <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo Investment Limited</h3>
        <p class="text-theme-gray text-md font-normal text-left w-full mt-6">
            The Dearo Investment Limited is on an accelerated growth trajectory and is inspired by the quest to nurture and shape the future of individuals and communities across the world. As a leading player in the International MSME sector, the Dearo Group has been a catalyst in facilitating, whilst striving to maximize environmental benefits through green financing, promoting financial independence for women and uplifting customers from poverty through financial inclusion in global markets.
        </p>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')

    @vite(['resources/js/app.js','resources/js/home.js'])
</body>
</html>