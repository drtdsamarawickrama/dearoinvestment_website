<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Insurance Inquiries | Dearo Super Admin</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-admin')

    <!-- Inquiries - Heading -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Insurance Inquiries</p>
            <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Super Admin</p>
        </div>
    </div>

    <!-- Table - New Inquiries -->
    <div class="w-full py-5 mb-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <!-- Search Bar -->
            <div class="w-full flex justify-between">
                <div class="w-auto">
                    <form action="{{ route('admin.inquiries.insurance.search') }}" method="GET" class="p-0 m-0">
                        <div class="w-auto flex items-center justify-start gap-4">
                            <input type="text" id="search_input_nic" name="nic" placeholder="NIC No." class="h-10 mt-1 border-b-theme-blue border-0 border-b-[1px] text-sm w-full" value="" />
                            <input type="text" id="search_input_inquiry_no" name="inquiry_no" placeholder="Inquiry No." class="h-10 mt-1 border-b-theme-blue border-0 border-b-[1px] text-sm w-full" value="" />
                            <input type="text" id="search_input_customer_name" name="customer_name" placeholder="Customer Name" class="h-10 mt-1 border-b-theme-blue border-0 border-b-[1px] text-sm w-full" value="" />
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="w-auto flex items-center justify-end gap-4">
                    <div class="w-auto">
                        <form action="{{ route('admin.inquiries.insurance.filter.by.state') }}" method="GET" class="p-0 m-0">
                            <div class="w-auto flex items-center justify-start gap-4">
                                <select id="search_inquiry_status" name="inquiry_status" class="h-10 mt-1 border-b-theme-blue border-0 border-b-[1px] text-sm w-full">
                                    <option value="INQUIRY_SUBMITTED">Inquiry Submitted</option>
                                    <option value="DEARO1_INQUIRY_REVIEWED">Inquiry Reviewed</option>
                                    <option value="DEARO2_INQUIRY_APPROVED">Inquiry Approved</option>
                                </select>
                                <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="w-full h-auto mt-5 overflow-scroll">
                <table class="w-full">
                    <thead class="h-12 bg-theme-blue-lite px-4 py-[10px]  text-left text-theme-blue text-md font-bold">
                        <th class="pl-4 pr-2 whitespace-nowrap">Inquiry Id</th>
                        <th class="pr-2 whitespace-nowrap">Date</th>
                        <th class="pr-2 whitespace-nowrap">Status</th>
                        <th class="pr-2 whitespace-nowrap">Type</th>
                        <th class="pr-2 whitespace-nowrap">Customer Name</th>
                        <th class="pr-2 whitespace-nowrap">Address</th>
                        <th class="pr-2 whitespace-nowrap">District</th>
                        <th class="pr-2 whitespace-nowrap">Contact Number</th>
                        <th class="pr-4 whitespace-nowrap">Action</th>
                    </thead>
                    <tbody class="w-full text-left text-theme-gray text-md font-normal">
                        @if(isset($inquiries))
                            @foreach($inquiries as $inquiry)
                            @php 
                                $customer = App\Models\CustomerProfile::find($inquiry->customer_id);
                                if($customer->district){
                                    $district = (App\Models\District::find($customer->district))->district_name;
                                }else{
                                    $district = 'N/A';
                                }
                                $encryptedId = Illuminate\Support\Facades\Crypt::encrypt($inquiry->id);
                                
                            @endphp
                            <tr class="align-middle h-12 py-[10px] border-b-[1px] border-b-theme-blue text-left">
                                <td class="pl-4 pr-2">{{ $inquiry->id }}</td>
                                <td class="pr-2">{{ $inquiry->created_at }}</td>
                                <td class="pr-2">{{ $inquiry->inquiry_status }}</td>
                                <td class="pr-2">{{ $inquiry->inquiry_type }}</td>
                                <td class="pr-2">{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                <td class="pr-2">{{ $customer->address }}</td>
                                <td class="pr-2">{{ $district }}</td>
                                <td class="pr-2">{{ $customer->mobile_number }}</td>
                                <td class="pr-4">
                                    <div class="flex gap-6 items-center">
                                        <a href="{{ route('dearo.inquiry.insurance.application.load', ['inquiry_id' => $encryptedId]) }}">
                                            <img src="{{ url('/assets/img/inquiry/icon-admin-view-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                        </a>
                                        <!-- <button>
                                            <img src="{{ url('/assets/img/inquiry/icon-admin-menu-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                        </button> -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Page Navigation -->
            <div class="w-full flex justify-end items-center gap-4 mt-5">
                {{ $inquiries->links() }}
            </div>

            <!-- Export to Excel -->
            <div class="w-full flex mt-5">
                <div class="w-auto flex items-center justify-end gap-4">
                    <div class="w-auto mt-8">
                        <form action="{{ route('admin.inquiry.insurance.export') }}" method="GET" class="p-0 m-0">
                            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                                <div class="w-full text-sm">
                                    <label for="excel_inquiry_status" class="text-theme-gray">Inquiry Status <span class="text-theme-red">*</span></label>
                                    <select id="excel_inquiry_status" name="inquiry_status" class="h-10 mt-1 border-b-theme-blue border-0 border-b-[1px] text-sm w-full">
                                        <option value="ANY_STATE">Any State</option>
                                        <option value="INQUIRY_SUBMITTED">Inquiry Submitted</option>
                                        <option value="DEARO1_INQUIRY_REVIEWED">Inquiry Reviewed</option>
                                        <option value="DEARO2_INQUIRY_APPROVED">Inquiry Approved</option>
                                    </select>
                                </div>

                                <div class="w-full flex items-end">
                                    <button type="submit" class="h-min w-auto bg-theme-blue text-white font-bold px-4 py-2">Export Excel</button>
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

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-fd.js'])
</body>
</html>