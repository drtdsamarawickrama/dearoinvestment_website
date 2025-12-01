<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>New Inquiries | Dearo Admin - Branch</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-admin-branch')

    <!-- Inquiries - Heading -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">New Inquiries</p>
            <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Administration</p>
        </div>
    </div>

    <!-- Table - New Inquiries -->
    <div class="w-full py-5 mb-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <!-- Search Bar -->
            <div class="w-full flex justify-end">
                <input type="text" class="w-3/4 sm:w-2/5 md:w-2/5 max-w-[300px] border-0 border-b-[1px] border-b-theme-blue text-theme-blue focus:border-0 focus:border-b-[1px] focus:ring-0" placeholder="Search Here" />
            </div>

            <div class="w-full h-auto mt-5 overflow-scroll">
                <table class="w-full">
                    <thead class="h-12 bg-theme-blue-lite px-4 py-[10px]  text-left text-theme-blue text-md font-bold">
                        <th class="pl-4 pr-2 whitespace-nowrap">Inquiry Id</th>
                        <th class="pr-2 whitespace-nowrap">Date</th>
                        <th class="pr-2 whitespace-nowrap">Customer Name</th>
                        <th class="pr-2 whitespace-nowrap">Address</th>
                        <th class="pr-2 whitespace-nowrap">District</th>
                        <th class="pr-2 whitespace-nowrap">Contact Number</th>
                        <th class="pr-4 whitespace-nowrap">Action</th>
                    </thead>
                    <tbody class="w-full text-left text-theme-gray text-md font-normal">
                        <tr class="align-middle h-12 py-[10px] border-b-[1px] border-b-theme-blue text-left">
                            <td class="pl-4 pr-2">10110</td>
                            <td class="pr-2">2024-05-23</td>
                            <td class="pr-2">Nisal Kumudesh</td>
                            <td class="pr-2">No.33, Main Road, New Town</td>
                            <td class="pr-2">Anuradhapura</td>
                            <td class="pr-2">077-125-6589</td>
                            <td class="pr-4 pr-2">
                                <div class="flex gap-6 items-center">
                                    <a href="#">
                                        <img src="{{ url('/assets/img/inquiry/icon-admin-view-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                    </a>
                                    <button>
                                        <img src="{{ url('/assets/img/inquiry/icon-admin-menu-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="align-middle h-12 py-[10px] border-b-[1px] border-b-theme-blue text-left">
                            <td class="pl-4 pr-2">10110</td>
                            <td class="pr-2">2024-05-23</td>
                            <td class="pr-2">Nisal Kumudesh</td>
                            <td class="pr-2">No.33, Main Road, New Town</td>
                            <td class="pr-2">Anuradhapura</td>
                            <td class="pr-2">077-125-6589</td>
                            <td class="pr-4 pr-2">
                                <div class="flex gap-6 items-center">
                                    <a href="#">
                                        <img src="{{ url('/assets/img/inquiry/icon-admin-view-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                    </a>
                                    <button>
                                        <img src="{{ url('/assets/img/inquiry/icon-admin-menu-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="align-middle h-12 py-[10px] border-b-[1px] border-b-theme-blue text-left">
                            <td class="pl-4 pr-2">10110</td>
                            <td class="pr-2">2024-05-23</td>
                            <td class="pr-2">Nisal Kumudesh</td>
                            <td class="pr-2">No.33, Main Road, New Town</td>
                            <td class="pr-2">Anuradhapura</td>
                            <td class="pr-2">077-125-6589</td>
                            <td class="pr-4 pr-2">
                                <div class="flex gap-6 items-center">
                                    <a href="#">
                                        <img src="{{ url('/assets/img/inquiry/icon-admin-view-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                    </a>
                                    <button>
                                        <img src="{{ url('/assets/img/inquiry/icon-admin-menu-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Page Navigation -->
            <div class="w-full flex justify-end gap-4 mt-10">
                <span class="text-theme-blue text-md font-bold">Pages</span>
                <a href="">
                    <button class="w-7 h-7 flex justify-center items-center bg-theme-blue-lite text-theme-blue font-bold">1</button>
                </a>

                <a href="">
                    <button class="w-7 h-7 flex justify-center items-center bg-theme-blue-lite text-theme-blue font-bold">2</button>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-fd.js'])
</body>
</html>