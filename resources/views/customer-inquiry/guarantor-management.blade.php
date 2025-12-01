<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Guarantor Details | Dearo</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-customer')

    <!-- Status Banner -->
    <div class="w-full h-auto max-h-[400px] sm:max-h-[280px] sm:h-[280px]">
        <div class="w-full h-full sm:relative flex justify-end">
            <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>
        @include('components.inquiry-status') 
    </div>

    <!-- Guarantor Details -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Guarantor Details</p>
            <p class="text-md text-theme-gray font-medium mt-2">Please provide essential guarantor details and click save.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
        <form id="form-guarantor-details" method="POST" class="m-0 p-0">
            @csrf
            <input type="hidden" id="guarantor_id" name="guarantor_id" value="{{ $guarantor->id }}" />
            <input type="hidden" id="guarantor_inquiry_id" name="guarantor_inquiry_id" value="{{ $inquiry_id }}" />
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full text-sm">
                    <label for="first_name" class="text-theme-gray">First Name <span class="text-theme-red">*</span></label>
                    <input type="text" id="first_name" name="first_name" placeholder="Enter first name" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $guarantor->first_name }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="last_name" class="text-theme-gray">Last Name <span class="text-theme-red">*</span></label>
                    <input type="text" id="last_name" name="last_name" placeholder="Enter last name" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $guarantor->last_name }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="nic_number" class="text-theme-gray">NIC Number <span class="text-theme-red">*</span></label>
                    <input type="text" id="nic_number" name="nic_number" placeholder="Enter NIC number"
                    class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $guarantor->nic }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="guarantor_address" class="text-theme-gray">Address <span class="text-theme-red">*</span></label>
                    <input type="text" id="guarantor_address" name="guarantor_address" placeholder="Enter your address" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $guarantor->address }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="guarantor_district" class="text-theme-gray">District <span class="text-theme-red">*</span></label>
                    @php
                        $districts = App\Models\District::all();
                    @endphp
                    <select type="text" id="guarantor_district" name="guarantor_district" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required>
                        @foreach ($districts as $district)
                            @if($district->id == $guarantor->district_id)
                                <option value="{{ $district->id }}" selected>{{ $district->district_name }}</option>
                            @else
                                <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="w-full text-sm">
                    <label for="guarantor_occupation" class="text-theme-gray">Occupation <span class="text-theme-red">*</span></label>
                    <input type="text" id="guarantor_occupation" name="guarantor_occupation" placeholder="Enter occupation" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $guarantor->occupation }}" required/>
                </div>
                <div class="w-full text-sm">
                    <label for="contact_number" class="text-theme-gray">Contact Number <span class="text-theme-red">*</span></label>
                    <input type="text" id="contact_number" name="contact_number" placeholder="Enter contact number" class="h-10 mt-1 border-theme-gray text-md w-full" value="{{ $guarantor->contact_number }}" required/>
                </div>
            </div>
            <div class="w-full flex justify-start mt-4 items-center">
                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Save</button>
                <div id="guarantor-details-inprogress" class="text-theme-gray hidden ml-4">Saving.. Please Wait</div>
                <div id="guarantor-details-success-acknowledge" class="hidden p-0 m-0">
                    <div class="text-md text-theme-gray flex items-center ml-4">
                        <p>Saved</p>
                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                        </div>
                    </div>
                </div>
            </div>
        </form>

            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-6">
                <!-- NIC Front -->
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <form id="form-lease-nic-photo-front" method="POST" enctype="multipart/form-data" class="w-full m-0 p-0">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="guarantor_id" value="{{$guarantor->id}}" />
                        <input type="hidden" name="nic_side" value="front" />
                        <label class="text-theme-gray font-bold">Photo Upload - NIC Front <span class="text-theme-red">*</span></label>
                        <input type="file" name="nic_file" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="nic-front-success-acknowledge" class="{{ ($guarantor->pic_nic_front != null)?'block':'hidden' }} p-0 m-0">
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
                        <input type="hidden" name="inquiry_id" value="{{$inquiry_id}}" />
                        <input type="hidden" name="guarantor_id" value="{{$guarantor->id}}" />
                        <input type="hidden" name="nic_side" value="back" />
                        <label class="text-theme-gray font-bold">Photo Upload - NIC Back <span class="text-theme-red">*</span></label>
                        <input type="file" name="nic_file" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                        <div class="w-full flex justify-start mt-4 items-center">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload</button>
                            <div id="nic-back-success-acknowledge" class="{{ ($guarantor->pic_nic_back != null)?'block':'hidden' }} p-0 m-0">
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

    <!-- Bank Statements -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Bank Statements</p>
            <p class="text-md text-theme-gray font-medium mt-2">Please upload bank statements of past 6 months of the guarantor. You can add multiple statements.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
        @if(isset($missing_statments_message))
            <p id="statement-message" class="text-md text-theme-red font-medium">Missing statements: {{ $missing_statments_message }}</p>
        @else
            <p id="statement-message" class="text-md text-theme-gray font-medium">Missing statements: </p>
        @endif
            <form id="form-gurantor-bank-statment" method="POST" class="mt-2 p-0">
                @csrf
                <input type="hidden" id="statement_inquiry_id" name="statement_inquiry_id" value="{{ $inquiry_id }}" />
                <input type="hidden" id="statement_guarantor_id" name="statement_guarantor_id" value="{{ $guarantor->id }}" />
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3">
                    <div class="w-full text-sm">
                        <label for="statement_start_date" class="text-theme-gray">From: <span class="text-theme-red">*</span></label>
                        <input type="date" id="statement_start_date" name="statement_start_date" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="statement_end_date" class="text-theme-gray">To: <span class="text-theme-red">*</span></label>
                        <input type="date" id="statement_end_date" name="statement_end_date" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                </div>
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                    <div class="w-full text-sm">
                        <label for="statement_file" class="text-theme-gray">Statement <span class="text-theme-red">*</span></label>
                        <input type="file" id="statement_file" name="statement_file" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                    </div>
                </div>
                <div class="w-full flex justify-start mt-4 items-center">
                    <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload Statement</button>
                    <div id="bank-statement-inprogress" class="text-theme-gray hidden">Uploading Please Wait</div>
                    <div id="bank-statement-success-acknowledge" class="hidden p-0 m-0">
                        <div class="text-md text-theme-gray flex items-center ml-4">
                            <p>Uploaded</p>
                            <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 mt-6 lg:mt-10">
            <p class="text-theme-gray text-2xl font-bold">Uploaded Bank Statements</p>

            @if(isset($uploaded_statements))
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-6">
                @foreach($uploaded_statements as $statement)
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <label for="pic_vehicle_front" class="text-theme-gray font-bold">Statements from {{ $statement->statement_start_date }} to {{ $statement->statement_end_date }}</label>
                    
                    <div class="w-full flex justify-start mt-2">
                        <div class="text-md text-theme-gray flex items-center">
                            <p>Successfully Uploaded</p>
                            <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div> 

    <!-- Billing Proof -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Billing Proof for Proofing Address</p>
            <p class="text-md text-theme-gray font-medium mt-2">Please upload a billing proof that has the same address of guarantor's NIC.</p>
        </div>
    </div>

    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <form id="form-guarantor-billing-proof" method="POST" class="mt-2 p-0">
                @csrf
                <input type="hidden" id="bill_inquiry_id" name="bill_inquiry_id" value="{{ $inquiry_id }}" />
                <input type="hidden" id="bill_guarantor_id" name="bill_guarantor_id" value="{{ $guarantor->id }}" />
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                    <div class="w-full text-sm">
                        <label for="bill_type" class="text-theme-gray">Bill Type <span class="text-theme-red">*</span></label>
                        <select id="bill_type" name="bill_type" placeholder="Enter what is the bill" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required>
                            <option value="ELECTRICITY_BILL">Electricity Bill</option>
                            <option value="WATER_BILL">Water Bill</option>
                            <option value="OTHER_BILL">Other Bill</option>
                        </select>
                    </div>
                    <div class="w-full text-sm">
                        <label for="bill_name" class="text-theme-gray">Bill Name <span class="text-theme-red">*</span></label>
                        <input type="text" id="bill_name" name="bill_name" placeholder="Enter what is the bill" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                </div>
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                    <div class="w-full text-sm">
                        <label for="bill_file" class="text-theme-gray">Bill <span class="text-theme-red">*</span></label>
                        <input type="file" id="bill_file" name="bill_file" class="h-10 mt-2 border-theme-gray border-[1px] text-md w-full file:bg-theme-gray file:h-10 file:text-white file:border-theme-gray" />
                    </div>
                </div>
                <div class="w-full flex justify-start mt-4">
                    <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Upload Billing Proof</button>
                    <div id="bill-inprogress" class="text-theme-gray hidden">Uploading Please Wait</div>
                    <div id="bill-success-acknowledge" class="hidden p-0 m-0">
                        <div class="text-md text-theme-gray flex items-center ml-4">
                            <p>Uploaded</p>
                            <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 mt-6">
            <p class="text-md text-theme-gray font-medium mt-2">Your have  uploaded the following billing proof(s)</p>

            
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-6">
            @if(isset($billing_proofs))
                @foreach($billing_proofs as $billingProof)
                <div class="border-[1px] border-theme-blue px-4 py-4">
                    <label for="pic_vehicle_front" class="text-theme-gray font-bold">{{ $billingProof->title }}</label>
                    @switch($billingProof->proof_type)
                        @case ('WATER_BILL')
                            <p>Water Bill</p>
                        @break

                        @case ('ELECTRICITY_BILL')
                            <p>Electricity Bill</p>
                        @break

                        @case ('OTHER_BILL')
                            <p>Other Bill</p>
                        @break
                    @endswitch
                    <div class="w-full flex justify-start mt-2">
                        <div class="text-md text-theme-gray flex items-center">
                            <p>Successfully Uploaded</p>
                            <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div> 

    <!-- Next Step -->
    @if($guarantor->is_first)
        <div class="w-full py-6">
            <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <p class="text-theme-blue text-2xl font-bold">Click to Proceed to Second Guarantor</p>
                <p class="text-md text-theme-gray font-medium mt-2">Two guarantors are required for the inquiry. Click below to add the second guarantor.</p>
                <div class="flex justify-start items-center gap-4">
                    <!-- <button type="submit" class="h-min bg-white border-[1px] border-theme-blue text-theme-blue font-bold px-4 py-2 mt-4">Inquiry Summary</button> -->
                    <form action="{{ route('inquiry.next.step.load') }}" method="POST">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{ $inquiry_id }}" />
                        <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 mt-4">Add Second Guarantor</button>
                    </form>
                </div>            
            </div>
        </div>
    @else
        <div class="w-full py-6">
            <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <p class="text-theme-blue text-2xl font-bold">Click to Proceed to Complete and Submit</p>
                <p class="text-md text-theme-gray font-medium mt-2">Click below to submit your inquiry. Relavant Dearo branch will contact you. Your request status indicated in customer dashboard.</p>
                <div class="flex justify-start items-center gap-4">
                    <!-- <button type="submit" class="h-min bg-white border-[1px] border-theme-blue text-theme-blue font-bold px-4 py-2 mt-4">Inquiry Summary</button> -->
                    <form action="{{ route('inquiry.next.step.load') }}" method="POST">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{ $inquiry_id }}" />
                        <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 mt-4">Submit for Approval</button>
                    </form>
                </div>            
            </div>
        </div>
    @endif

    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js','resources/js/customer-guarantor.js'])
</body>
</html>