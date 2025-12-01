<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Vehicle Details | Dearo</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-customer')

    <!-- Status Banner -->
    <div class="w-full h-auto max-h-[400px] sm:max-h-[280px] sm:h-[280px]">
        @if($inquiry->inquiry_type == 'LEASE')
            <div class="w-full h-full sm:relative flex justify-end">
                <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
                <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
            </div>
        @endif

        @if($inquiry->inquiry_type == 'INSURANCE')
            <div class="w-full h-full sm:relative flex justify-end">
                <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
                <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
            </div>
        @endif

        @include('components.inquiry-status') 
    </div>

    <!-- Vehicle Details -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Vehicle Details</p>
            <p class="text-md text-theme-gray font-medium mt-2">Essential vehicle detail collection. Please fill and save the form below.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
        <form id="form-lease-vehicle-essentials" method="POST" class="m-0 p-0">
            @csrf
            <input type="hidden" id="vehicle_essentials_inquiry_id" name="vehicle_essentials_inquiry_id" value="{{$inquiry_id}}" />
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3">
                <div class="w-full text-sm">
                    <label for="vehicle_register_state" class="text-theme-gray">Registration Status <span class="text-theme-red">*</span></label>
                    <select id="vehicle_register_state" name="vehicle_register_state" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required>
                        @if(($lease_vehicle->is_registered))
                            <option value="REGISTERED" selected>Registered</option>
                            <option value="NOT-REGISTERED">Not Registered</option>
                        @else
                            <option value="REGISTERED">Registered</option>
                            <option value="NOT-REGISTERED" selected>Not Registered</option>
                        @endif
                    </select>
                </div>
                <div id="div_vehicle_registered_number" class="w-full text-sm {{($lease_vehicle->is_registered == 0)?'hidden':''}}">
                    <label for="vehicle_registered_number" class="text-theme-gray">Registration Number / Number Plate <span class="text-theme-red">*</span></label>
                    <input type="text" id="vehicle_registered_number" name="vehicle_registered_number" placeholder="Enter registration number" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->number_plate }}" />
                </div>
                <div id="div_registered_year" class="w-full text-sm {{($lease_vehicle->is_registered == 0)?'hidden':''}}">
                    <label for="registered_year" class="text-theme-gray">Year of Registration <span class="text-theme-red">*</span></label>
                    <input type="number" id="registered_year" name="registered_year" placeholder="Enter the year of registration" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->registered_year }}" />
                </div>
            </div>
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <label for="vehicle_make" class="text-theme-gray">Vehicle Make <span class="text-theme-red">*</span></label>
                    <input type="text" id="vehicle_make" name="vehicle_make" placeholder="Enter vehicle make. Ex. Toyota" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->make }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="vehicle_model" class="text-theme-gray">Model <span class="text-theme-red">*</span></label>
                    <input type="text" id="vehicle_model" name="vehicle_model" placeholder="Enter model. Ex. Axio" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->model }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="manufactured_year" class="text-theme-gray">Year of Manufacture <span class="text-theme-red">*</span></label>
                    <input type="number" id="manufactured_year" name="manufactured_year" placeholder="Enter manufactured year" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->manufactured_year }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="meter_reading" class="text-theme-gray">Meter Reading <span class="text-theme-red">*</span></label>
                    <input type="number" id="meter_reading" name="meter_reading" placeholder="Enter meter reading" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->meter_reading }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="chassis_number" class="text-theme-gray">Chassis Number <span class="text-theme-red">*</span></label>
                    <input type="text" id="chassis_number" name="chassis_number" placeholder="Enter chassis number" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->chassis_number }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="engine_number" class="text-theme-gray">Engine Number <span class="text-theme-red">*</span></label>
                    <input type="text" id="engine_number" name="engine_number" placeholder="Enter engine number" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->engine_number }}" required/>
                </div>
            </div>
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <label for="engine_capacity" class="text-theme-gray">Engine Capacity <span class="text-theme-red">*</span></label>
                    <input type="text" id="engine_capacity" name="engine_capacity" placeholder="Enter engine capacity" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->engine_capacity }}" required />
                </div>
                <div class="w-full text-sm">
                    <label for="seating_capacity" class="text-theme-gray">Seating Capacity <span class="text-theme-red">*</span></label>
                    <input type="number" id="seating_capacity" name="seating_capacity" placeholder="Enter seating capacity" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $lease_vehicle->seating_capacity }}" required />
                </div>
            </div>
            <div class="w-full flex justify-start mt-4 items-center">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Save</button>
                <div id="vehicle-essentials-success-acknowledge" class="{{ ($lease_vehicle->pic_lessee_and_vehicle != null)?'block':'hidden' }} p-0 m-0">
                    <div class="text-md text-theme-gray flex items-center ml-4">
                        <p>Saved</p>
                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                        </div>
                    </div>
                </div>
                <div id="vehicle-essentials-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                    <p>Saving ...</p>
                </div>
            </div>
        </form>
        </div>
    </div>   
    
    <!-- Vehicle Exterior -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Vehicle Exterior Photos</p>
            <p class="text-md text-theme-gray font-medium mt-2">Please upload relevant photos of the vehicle.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3">
                <!-- Vehicle Front -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-vehicle-photo-front" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="VEHICLE-FRONT" />
                        <label class="text-theme-gray font-bold">Photo Upload - Vehicle Front <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-front-success-acknowledge" class="p-0 m-0 {{ ($lease_vehicle->pic_vehicle_front != null)?'block':'hidden' }} ">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-front-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Vehicle Rear -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-vehicle-photo-rear" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="VEHICLE-REAR" />
                        <label class="text-theme-gray font-bold">Photo Upload - Vehicle Rear <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-rear-success-acknowledge" class="{{ ($lease_vehicle->pic_vehicle_rear != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-rear-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Vehicle Left -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-vehicle-photo-left" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="VEHICLE-LEFT" />
                        <label class="text-theme-gray font-bold">Photo Upload - Vehicle Left <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-left-success-acknowledge" class="{{ ($lease_vehicle->pic_vehicle_left != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-left-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Vehicle Right -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-vehicle-photo-right" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="VEHICLE-RIGHT" />
                        <label class="text-theme-gray font-bold">Photo Upload - Vehicle Right <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-right-success-acknowledge" class="{{ ($lease_vehicle->pic_vehicle_right != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-right-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Engine Number -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-vehicle-photo-engine" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="ENGINE-NUMBER" />
                        <label class="text-theme-gray font-bold">Photo Upload - Engine Number <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-engine-success-acknowledge" class="{{ ($lease_vehicle->pic_engine_number != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-engine-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Chassis Number -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-vehicle-photo-chassis" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="CHASSIS-NUMBER" />
                        <label class="text-theme-gray font-bold">Photo Upload - Chassis Number <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-chassis-success-acknowledge" class="{{ ($lease_vehicle->pic_chassis_number != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-chassis-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 

    <!-- Vehicle Exterior -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Vehicle Information Proof Photos</p>
            <p class="text-md text-theme-gray font-medium mt-2">Please upload photos of meter-reading and a photo of you with the vehicle.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3">
                <!-- Meter Reading -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-vehicle-photo-meter" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="METER-READING" />
                        <label class="text-theme-gray font-bold">Photo Upload - Meter Reading <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-meter-success-acknowledge" class="{{ ($lease_vehicle->pic_meter_reading != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-meter-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Registration Certificate -->
                <div id="div_vehicle_registered_certificate" class="border-[1px] border-theme-blue px-4 py-4 {{ (!$lease_vehicle->is_registered)? 'hidden':'' }}">
                    <form id="form-lease-vehicle-photo-reg-certificate" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="REGISTRATION-CERTIFICATE" />
                        <label class="text-theme-gray font-bold">Photo Upload - Registration Certificate <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-reg-certificate-success-acknowledge" class="{{ ($lease_vehicle->pic_registration_certificate != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-reg-certificate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Lessee and Vehicle -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-vehicle-photo-lessee" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="image_type" value="LESSEE-AND-VEHICLE" />
                        <label class="text-theme-gray font-bold">Photo Upload - You & Vehicle <span class="text-theme-red">*</span></label>
                        <input type="file" name="vehicle_photo" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="vehicle-lessee-success-acknowledge" class="{{ ($lease_vehicle->pic_lessee_and_vehicle != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="vehicle-lessee-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 

    <!-- Next Step -->
    @if($inquiry->inquiry_type == 'LEASE')
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Click to Proceed to Bank Statement Upload</p>
            <p class="text-md text-theme-gray font-medium mt-2">During the next step you are required to upload bank statements for last 6 months and billing proofs.</p>
            <a href="{{ route('inquiry.vehicle.detail.complete', ['inquiry_id' => $inquiry_id_encrypted]) }}">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 mt-4">Next: Bank Statements</button>
            </a>
        </div>
    </div>
    @endif

    @if($inquiry->inquiry_type == 'INSURANCE')
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Click to Proceed to Submit for Approval</p>
            <p class="text-md text-theme-gray font-medium mt-2">Click below to submit your inquiry. Relavant Dearo branch will contact you. Your request status indicated in customer dashboard.</p>
            <a href="{{ route('inquiry.vehicle.detail.complete', ['inquiry_id' => $inquiry_id_encrypted]) }}">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 mt-4">Submit for Approval</button>
            </a>
        </div>
    </div>
    @endif
    
    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-lease.js'])
</body>
</html>