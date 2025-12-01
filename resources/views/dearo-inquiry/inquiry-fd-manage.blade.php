<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>FD Inquiry | Dearo</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @if(Auth::user()->hasRole('super-admin'))
        @include('layouts.navigation-admin')
    @elseif(Auth::user()->hasRole('branch-manager'))
        @include('layouts.navigation-admin-branch')
    @endif

    <!-- Status Banner -->
    <div class="w-full h-auto max-h-[400px] sm:max-h-[280px] sm:h-[280px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/fd-product-banner-right.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/fd-product-banner-right.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>

        @include('components.inquiry-action-fd') 
    </div>

    <!-- Customer Profile -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Customer Profile</p>
        </div>
    </div>

    @if($customer_profile)
    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">First Name</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $customer_profile->first_name }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Last Name</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $customer_profile->last_name }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">NIC Number</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $customer_profile->nic }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Email</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $customer_profile->email }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Mobile Number</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $customer_profile->mobile_number }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Date of Birth</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $customer_profile->dob }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Address</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $customer_profile->address }}</p>
                </div>
                @php 
                    if($customer_profile->district){
                        $district = (App\Models\District::find($customer_profile->district))->district_name;
                    }else{
                        $district = 'N/A';
                    }
                @endphp
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">District</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $district }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Identity Proofs -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Identitiy Proofs</p>
        </div>
    </div>

    
    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                
                @if($customer_profile->pic_nic_front)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">NIC - Front Side</div>
                    <img src="{{ url('/uploads/customers/') }}/{{$customer_profile->pic_nic_front}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif

                @if($customer_profile->pic_nic_back)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">NIC - Back Side</div>
                    <img src="{{ url('/uploads/customers/') }}/{{$customer_profile->pic_nic_back}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif

            </div>
        </div>
    </div>
    
    <!-- FD Details -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Fixed Deposit Details</p>
        </div>
    </div>

    @if($fd_details)
    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Amount</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $fd_details->amount }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Period</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $fd_details->period }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Preferred Rate</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $fd_details->preferred_rate }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-lease.js'])
</body>
</html>