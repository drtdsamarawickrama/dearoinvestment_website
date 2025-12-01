<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Complete Profile | Dearo</title>
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

        @if($inquiry->inquiry_type == 'FD')
            <div class="w-full h-full sm:relative flex justify-end">
                <img src="{{ url('/assets/img/inquiry/fd-product-banner-right.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
                <img src="{{ url('/assets/img/inquiry/fd-product-banner-right.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
            </div>
        @endif

        @if($inquiry->inquiry_type == 'INSURANCE')
            <div class="w-full h-full sm:relative flex justify-end">
                <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
                <img src="{{ url('/assets/img/inquiry/insurance-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
            </div>
        @endif

        @if($inquiry->inquiry_type == 'PAWNING')
            <div class="w-full h-full sm:relative flex justify-end">
                <img src="{{ url('/assets/img/inquiry/pawning-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
                <img src="{{ url('/assets/img/inquiry/pawning-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
            </div>
        @endif

        <!-- <div class="h-auto max-h-[400px] sm:h-[280px] relative top-[-400px] sm:top-[-280px] left-0 bg-gradient-to-r from-white sm:bg-none">
            <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 pt-6 sm:pt-0">
                <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Complete Profile</p>
                <p class="text-2xl text-theme-orange font-bold mt-1">Dearo Inquiry</p>
                
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
        </div> -->
        @include('components.inquiry-status') 
    </div>

    
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Complete your Profile to Place the Inquiry</p>
            <p class="text-md text-theme-gray font-medium mt-2">Small business investing involves investors contributing funds to a small business with high growth potential through either debt or equity investing, or a combination of both.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
        <form id="form-customer-profile-details" action="{{ route('inquiry.customer.profile.details.save') }}" method="POST" class="m-0 p-0">
            @csrf
            <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}" />
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3">
                <div class="w-full text-sm">
                    <label for="date_of_birth" class="text-theme-gray">Date of birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $customer_profile->dob }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="customer_nic" class="text-theme-gray">NIC</label>
                    <input type="text" id="customer_nic" name="customer_nic" placeholder="Enter NIC number" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $customer_profile->nic }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="customer_address" class="text-theme-gray">Address</label>
                    <input type="text" id="customer_address" name="customer_address" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $customer_profile->address }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="customer_district" class="text-theme-gray">District</label>
                    @php
                        $districts = App\Models\District::all();
                    @endphp
                    <select type="text" id="customer_district" name="customer_district" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required>
                        @foreach ($districts as $district)
                            @if($customer_profile->district == $district->id)
                                <option value="{{ $district->id }}" selected>{{ $district->district_name }}</option>
                            @else
                                <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full flex justify-start mt-4 items-center">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Save</button>
                <div id="profile-essentials-success-acknowledge" class="hidden p-0 m-0">
                    <div class="text-md text-theme-gray flex items-center ml-4">
                        <p>Saved</p>
                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                        </div>
                    </div>
                </div>
                <div id="profile-essentials-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                    <p>Saving ...</p>
                </div>
            </div>
        </form>
        </div>
    </div>    

    <!-- NIC Upload -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">NIC Proof Upload</p>
            <p class="text-md text-theme-gray font-medium mt-2">Please upload front and back sides of your National Identity Card.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3">
                <!-- NIC Front -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-nic-photo-front" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}" />
                        <input type="hidden" name="nic_side" value="front" />
                        <label class="text-theme-gray font-bold">Photo Upload - NIC Front <span class="text-theme-red">*</span></label>
                        <input type="file" name="nic_file" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="nic-front-success-acknowledge" class="{{ ($customer_profile->pic_nic_front != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="nic-front-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- NIC Back -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-nic-photo-back" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}" />
                        <input type="hidden" name="nic_side" value="back" />
                        <label class="text-theme-gray font-bold">Photo Upload - NIC Back <span class="text-theme-red">*</span></label>
                        <input type="file" name="nic_file" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="nic-back-success-acknowledge" class="{{ ($customer_profile->pic_nic_back != null)?'block':'hidden' }} p-0 m-0">
                                <div class="text-md text-theme-gray flex items-center ml-4">
                                    <p>Uploaded</p>
                                    <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                        <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                    </div>
                                </div>
                            </div>
                            <div id="nic-back-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                <p>Uploading ...</p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div> 

    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Click to Proceed to Inquiry</p>
            <p class="text-md text-theme-gray font-medium mt-2">After completing your profile click below to proceed to your inquiry.</p>
            <form action="{{ route('inquiry.customer.profile.complete', ['inquiry_id' => $inquiry_id_encripted]) }}" method="post">
                @csrf
                <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}" />
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 mt-4">Continue to Inquiry</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js'])
</body>
</html>