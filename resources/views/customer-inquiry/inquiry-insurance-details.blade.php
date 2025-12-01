<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Insurance Details | Dearo</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-customer')

    <!-- Status Banner -->
    <div class="w-full h-auto max-h-[400px] sm:max-h-[280px] sm:h-[280px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        <div class="h-auto max-h-[400px] sm:h-[280px] relative top-[-400px] sm:top-[-280px] left-0 bg-gradient-to-r from-white sm:bg-none">
            <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 pt-6 sm:pt-0">
                <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Insurance Details</p>
                <p class="text-2xl text-theme-orange font-bold mt-1">Dearo Insurance</p>
                
                <div class="w-full h-auto sm:w-2/3 md:w-1/2 mt-5">
                    <div class="w-full lg:w-2/3">
                        <p class="text-md text-theme-gray font-bold">Inquiry Id: 1254563</p>
                        <p class="text-md text-theme-gray font-bold mt-1">Status: Draft</p>
                        <p class="text-md text-theme-gray font-bold mt-3 sm:mt-1">Progress</p>

                        <div class="flex justify-start items-center mt-1 sm:mt-0 gap-4">
                            <div class="w-8 h-8 bg-theme-orange border-2 border-theme-orange rounded-full flex justify-center items-center text-white text-md font-bold">1</div>
                            <div class="w-8 h-8 bg-white border-2 border-theme-orange rounded-full flex justify-center items-center text-theme-orange text-md font-bold">2</div>
                            <div class="w-8 h-8 bg-white border-2 border-theme-orange rounded-full flex justify-center items-center text-theme-orange text-md font-bold">3</div>
                            <div class="w-8 h-8 bg-white border-2 border-theme-orange rounded-full flex justify-center items-center text-theme-orange text-md font-bold">4</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fd Details -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Fixed Deposit Requirements</p>
            <p class="text-md text-theme-gray font-medium mt-2">Small business investing involves investors contributing funds to a small business.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
        <form id="form-lease-vehicle-essentials" method="POST" class="m-0 p-0">
            @csrf
            <input type="hidden" id="vehicle_essentials_inquiry_id" name="vehicle_essentials_inquiry_id" value="{{$inquiry_id}}" />
            
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <label for="vehicle_make" class="text-theme-gray">Vehicle Make <span class="text-theme-red">*</span></label>
                    <input type="text" id="vehicle_make" name="vehicle_make" placeholder="Enter vehicle make. Ex. Toyota" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="vehicle_model" class="text-theme-gray">Model <span class="text-theme-red">*</span></label>
                    <input type="text" id="vehicle_model" name="vehicle_model" placeholder="Enter model. Ex. Axio" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="manufactured_year" class="text-theme-gray">Year of Manufacture <span class="text-theme-red">*</span></label>
                    <input type="number" id="manufactured_year" name="manufactured_year" placeholder="Enter manufactured year" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="meter_reading" class="text-theme-gray">Meter Reading <span class="text-theme-red">*</span></label>
                    <input type="number" id="meter_reading" name="meter_reading" placeholder="Enter meter reading" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="chassis_number" class="text-theme-gray">Chassis Number <span class="text-theme-red">*</span></label>
                    <input type="text" id="chassis_number" name="chassis_number" placeholder="Enter chassis number" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="engine_number" class="text-theme-gray">Engine Number <span class="text-theme-red">*</span></label>
                    <input type="text" id="engine_number" name="engine_number" placeholder="Enter engine number" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                </div>
            </div>
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <label for="engine_capacity" class="text-theme-gray">Engine Capacity <span class="text-theme-red">*</span></label>
                    <input type="text" id="engine_capacity" name="engine_capacity" placeholder="Enter engine capacity" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required />
                </div>
                <div class="w-full text-sm">
                    <label for="seating_capacity" class="text-theme-gray">Seating Capacity <span class="text-theme-red">*</span></label>
                    <input type="number" id="seating_capacity" name="seating_capacity" placeholder="Enter seating capacity" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required />
                </div>
            </div>
            <div class="w-full flex justify-start mt-4">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Save</button>
            </div>
        </form>
        </div>
    </div>  

    <!-- Next Step -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Click to Proceed to Bank Statement Upload</p>
            <p class="text-md text-theme-gray font-medium mt-2">Small business investing involves investors contributing funds to a small business.</p>
            <a href="{{ route('inquiry.vehicle.detail.complete', ['inquiry_id' => $inquiry_id_encrypted]) }}">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 mt-4">Next: Bank Statements</button>
            </a>
        </div>
    </div>
    
    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-insurance.js'])
</body>
</html>