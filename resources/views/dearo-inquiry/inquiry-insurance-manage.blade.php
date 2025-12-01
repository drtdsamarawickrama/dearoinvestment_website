<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Insurance Inquiry | Dearo</title>
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
            <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>

        @include('components.inquiry-action-insurance')
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
    
    <!-- Vehicle Details -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Vehicle Details</p>
        </div>
    </div>

    @if($vehicle_details)
    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Registration Status</p>
                    @if($vehicle_details->is_registered)
                        <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">Registered</p>
                    @else
                        <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">Not Registered</p>
                    @endif
                </div>
                @if($vehicle_details->is_registered)
                    <div class="w-full text-sm">
                        <p class="text-theme-blue text-sm font-medium">Registration Number</p>
                        <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->number_plate }}</p>
                    </div>
                    <div class="w-full text-sm">
                        <p class="text-theme-blue text-sm font-medium">Year of Registration</p>
                        <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->registered_year }}</p>
                    </div>
                @endif
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Vehicle Make</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->make }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Model</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->model }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Year of Manufacture</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->manufactured_year }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Meter Reading</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->meter_reading }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Chassis Number</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->chassis_number }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Engine Number</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->engine_number }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Engine Capacity</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->engine_capacity }}</p>
                </div>
                <div class="w-full text-sm">
                    <p class="text-theme-blue text-sm font-medium">Seating Capacity</p>
                    <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">{{ $vehicle_details->seating_capacity }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Vehicle Pictures -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Vehicle Exterior Pictures</p>
        </div>
    </div>

    @if($vehicle_details)
    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                @if($vehicle_details->pic_vehicle_front)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Vehicle - Front</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_vehicle_front}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
                @if($vehicle_details->pic_vehicle_rear)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Vehicle - Rear</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_vehicle_rear}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
                @if($vehicle_details->pic_vehicle_left)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Vehicle - Left</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_vehicle_left}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
                @if($vehicle_details->pic_vehicle_right)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Vehicle - Right</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_vehicle_right}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
                @if($vehicle_details->pic_engine_number)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Engine Number</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_engine_number}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
                @if($vehicle_details->pic_chassis_number)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Chassis Number</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_chassis_number}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    <!-- Vehicle Other Pictured -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Vehicle Other Pictures</p>
        </div>
    </div>

    @if($vehicle_details)
    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                @if($vehicle_details->pic_meter_reading)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Meter Reading</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_meter_reading}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
                @if($vehicle_details->pic_lessee_and_vehicle)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Vehicle & Lessee</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_lessee_and_vehicle}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
                @if($vehicle_details->is_registered && $vehicle_details->pic_registration_certificate)
                <div class="w-full max-h-[450px] h-[450px] bg-theme-gray-lite">
                    <div class="w-full bg-theme-blue-lite px-4 py-3">Registration Certificate</div>
                    <img src="{{ url('/uploads/vehicles/') }}/{{$vehicle_details->pic_registration_certificate}}" alt="" class="w-full max-h-[400px] h-auto object-contain">
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-lease.js'])
</body>
</html>