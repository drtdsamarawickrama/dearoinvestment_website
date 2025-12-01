<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Lease Inquiry | Dearo</title>
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
            <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-2/3 md:w-auto xl:w-[1000px] h-[280px] sm:object-cover sm:object-left md:object-cover xl:object-cover xl:object-left hidden sm:block">
            <img src="{{ url('/assets/img/inquiry/leasing-product-banner.jpg') }}" alt="" class="w-auto h-[400px] object-cover sm:hidden">
        </div>

        @include('components.inquiry-action-leasing') 
    </div>

    <!-- Action Panel -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Action Panel</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                <div class="w-full bg-theme-orange-lite px-4 py-3">
                    @if($lease_details->is_arrears)
                        <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">Payment State: <span class="font-bold">Arrears</span></p>
                        <form id="form-lease-action-arrears-activate" action="" method="POST" class="m-0 p-0 hidden">
                            @csrf
                            <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}">
                            <div class="w-full flex justify-start mt-4 items-center">
                                <button type="submit" class="h-min bg-theme-gray text-theme-orange font-bold px-4 py-2">Mark as Arrears</button>
                                <div id="lease-action-arrears-activate-success-acknowledge" class="p-0 m-0">
                                    <div class="text-md text-theme-gray flex items-center ml-4">
                                        <p>Updated</p>
                                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                        </div>
                                    </div>
                                </div>
                                <div id="lease-action-arrears-activate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                    <p>Updating ...</p>
                                </div>
                            </div>
                        </form>
                        <form id="form-lease-action-arrears-deactivate" action="" method="POST" class="m-0 p-0">
                            @csrf
                            <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}">
                            <div class="w-full flex justify-start mt-4 items-center">
                                <button type="submit" class="h-min bg-theme-gray text-theme-orange font-bold px-4 py-2">Mark as Not-Arrears</button>
                                <div id="lease-action-arrears-deactivate-success-acknowledge" class="p-0 m-0">
                                    <div class="text-md text-theme-gray flex items-center ml-4">
                                        <p>Updated</p>
                                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                        </div>
                                    </div>
                                </div>
                                <div id="lease-action-arrears-deactivate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                    <p>Updating ...</p>
                                </div>
                            </div>
                        </form>
                    @else
                        <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">Payment State: <span class="font-bold">Healthy</span></p>
                        <form id="form-lease-action-arrears-activate" action="" method="POST" class="m-0 p-0">
                            @csrf
                            <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}">
                            <div class="w-full flex justify-start mt-4 items-center">
                                <button type="submit" class="h-min bg-theme-gray text-theme-orange font-bold px-4 py-2">Mark as Arrears</button>
                                <div id="lease-action-arrears-activate-success-acknowledge" class="p-0 m-0">
                                    <div class="text-md text-theme-gray flex items-center ml-4">
                                        <p>Updated</p>
                                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                        </div>
                                    </div>
                                </div>
                                <div id="lease-action-arrears-activate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                    <p>Updating ...</p>
                                </div>
                            </div>
                        </form>
                        <form id="form-lease-action-arrears-deactivate" action="" method="POST" class="m-0 p-0 hidden">
                            @csrf
                            <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}">
                            <div class="w-full flex justify-start mt-4 items-center">
                                <button type="submit" class="h-min bg-theme-gray text-theme-orange font-bold px-4 py-2">Mark as Not-Arrears</button>
                                <div id="lease-action-arrears-deactivate-success-acknowledge" class="p-0 m-0">
                                    <div class="text-md text-theme-gray flex items-center ml-4">
                                        <p>Updated</p>
                                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                        </div>
                                    </div>
                                </div>
                                <div id="lease-action-arrears-deactivate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                    <p>Updating ...</p>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>

                <div class="w-full bg-theme-orange-lite px-4 py-3">
                    @if($lease_details->vehicle_missing)
                        <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">Vehicle State: <span class="font-bold">Missing</span></p>
                        <form id="form-lease-action-vehicle-missing-activate" action="" method="POST" class="m-0 p-0 hidden">
                            @csrf
                            <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}">
                            <div class="w-full flex justify-start mt-4 items-center">
                                <button type="submit" class="h-min bg-theme-gray text-theme-orange font-bold px-4 py-2">Mark as Missing</button>
                                <div id="lease-action-vehicle-missing-activate-success-acknowledge" class="p-0 m-0">
                                    <div class="text-md text-theme-gray flex items-center ml-4">
                                        <p>Updated</p>
                                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                        </div>
                                    </div>
                                </div>
                                <div id="lease-action-vehicle-missing-activate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                    <p>Updating ...</p>
                                </div>
                            </div>
                        </form>
                        <form id="form-lease-action-vehicle-missing-deactivate" action="" method="POST" class="m-0 p-0">
                            @csrf
                            <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}">
                            <div class="w-full flex justify-start mt-4 items-center">
                                <button type="submit" class="h-min bg-theme-gray text-theme-orange font-bold px-4 py-2">Mark as Found</button>
                                <div id="lease-action-vehicle-missing-deactivate-success-acknowledge" class="p-0 m-0">
                                    <div class="text-md text-theme-gray flex items-center ml-4">
                                        <p>Updated</p>
                                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                        </div>
                                    </div>
                                </div>
                                <div id="lease-action-vehicle-missing-deactivate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                    <p>Updating ...</p>
                                </div>
                            </div>
                        </form>
                    @else
                        <p class="h-10 mt-1 text-theme-gray text-md font-medium w-full">Vehicle State: <span class="font-bold">Healthy</span></p>
                        <form id="form-lease-action-vehicle-missing-activate" action="" method="POST" class="m-0 p-0">
                            @csrf
                            <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}">
                            <div class="w-full flex justify-start mt-4 items-center">
                                <button type="submit" class="h-min bg-theme-gray text-theme-orange font-bold px-4 py-2">Mark as Missing</button>
                                <div id="lease-action-vehicle-missing-activate-success-acknowledge" class="p-0 m-0">
                                    <div class="text-md text-theme-gray flex items-center ml-4">
                                        <p>Updated</p>
                                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                        </div>
                                    </div>
                                </div>
                                <div id="lease-action-vehicle-missing-activate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                    <p>Updating ...</p>
                                </div>
                            </div>
                        </form>
                        <form id="form-lease-action-vehicle-missing-deactivate" action="" method="POST" class="m-0 p-0 hidden">
                            @csrf
                            <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}">
                            <div class="w-full flex justify-start mt-4 items-center">
                                <button type="submit" class="h-min bg-theme-gray text-theme-orange font-bold px-4 py-2">Mark as Found</button>
                                <div id="lease-action-vehicle-missing-deactivate-success-acknowledge" class="p-0 m-0">
                                    <div class="text-md text-theme-gray flex items-center ml-4">
                                        <p>Updated</p>
                                        <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                            <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                                        </div>
                                    </div>
                                </div>
                                <div id="lease-action-vehicle-missing-deactivate-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                                    <p>Updating ...</p>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($customer_profile)
    <div class="w-full">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-gray text-2xl font-bold">Add a Payment</p>

            <form action="{{ route('dearo.inquiry.lease.application.payments.new') }}" method="POST">
                @csrf
                <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}" />
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                    <div class="w-full text-sm">
                        <label for="input_payment_term" class="text-theme-gray">Payment Term <span class="text-theme-red">*</span></label>
                        <input type="month" id="input_payment_term" name="input_payment_term" placeholder="Pick the month of the payment" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="input_payment_amount" class="text-theme-gray">Payment Amount <span class="text-theme-red">*</span></label>
                        <input type="number" step=".01" id="input_payment_amount" name="input_payment_amount" placeholder="Enter amount paid" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="input_system_reference" class="text-theme-gray">System Reference <span class="text-theme-red">*</span></label>
                        <input type="text" id="input_system_reference" name="input_system_reference" placeholder="Enter system reference" class="h-10 mt-1 border-theme-gray text-md w-full" value="" />
                    </div>
                </div>
                <div class="w-full flex justify-start mt-4 items-center">
                    <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Add Payment</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <!-- Payment History -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Payment History</p>
        </div>
    </div>

    <div class="w-full py-5 md-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full h-auto mt-5 overflow-scroll">
                <table class="w-full">
                    <thead class="h-12 bg-gray-100 px-4 py-[10px]  text-left text-theme-gray text-md font-bold">
                        <th class="pl-4 pr-2 whitespace-nowrap">Payment Id</th>
                        <th class="pr-2 whitespace-nowrap">Date Created</th>
                        <th class="pr-2 whitespace-nowrap">Payment Term</th>
                        <th class="pr-2 whitespace-nowrap">Amount</th>
                        <th class="pr-2 whitespace-nowrap">System Reference</th>
                        <th class="pr-2 whitespace-nowrap">Date Updated</th>
                        <th class="pr-4 whitespace-nowrap">Action</th>
                    </thead>
                    <tbody class="w-full text-left text-theme-gray text-md font-normal">
                        @if(isset($payment_records))
                            @foreach($payment_records as $paymentLease)
                            @php 
                                $encryptedId = Illuminate\Support\Facades\Crypt::encrypt($inquiry_general->id);
                            @endphp
                            <tr class="align-middle h-12 py-[10px] border-b-[1px] border-b-theme-gray text-left">
                                <td class="pl-4 pr-2">{{ $paymentLease->id }}</td>
                                <td class="pr-2">{{ $paymentLease->created_at }}</td>
                                <td class="pr-2">{{ $paymentLease->payment_term }}</td>
                                <td class="pr-2">{{ $paymentLease->amount }}</td>
                                <td class="pr-2">{{ $paymentLease->system_reference }}</td>
                                <td class="pr-2">{{ $paymentLease->updated_at }}</td>
                                <td class="pr-4">
                                    <div class="flex gap-6 items-center">
                                        <a href="{{ route('dearo.inquiry.lease.application.load', ['inquiry_id' => $encryptedId]) }}">
                                            <img src="{{ url('/assets/img/inquiry/icon-amin-delete-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                        </a>
                                        <a href="{{ route('dearo.inquiry.lease.application.action.panel', ['inquiry_id' => $encryptedId]) }}">
                                            <img src="{{ url('/assets/img/inquiry/icon-amin-edit-blue.svg') }}" alt="" class="w-6 h-6 object-contain">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- General Details -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">General Details</p>
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

    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/dearo-inquiry-lease-action.js'])
</body>
</html>