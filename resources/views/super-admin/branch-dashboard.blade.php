<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Branch Dashboard | Dearo Super Admin</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-admin')

    <!-- Branches - Heading -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Branch Dashboard - <span class="font-light">{{ $branch->branch_name }}</span></p>
            <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Super Admin</p>
            <p class="text-2xl text-theme-gray font-light mt-2">Districts Covered: @foreach($districts as $district) * {{ $district->district_name }} @endforeach</p>
        </div>
    </div>

    <!-- Contents -->
    <div class="w-full py-5 mb-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <!-- Search Bar -->
            <!-- <div class="w-full flex justify-end">
                <input type="text" class="w-3/4 sm:w-2/5 md:w-2/5 max-w-[300px] border-0 border-b-[1px] border-b-theme-blue text-theme-blue focus:border-0 focus:border-b-[1px] focus:ring-0" placeholder="Search Here" />
            </div> -->

            <div class="w-full flex flex-wrap gap-x-6 gap-y-6">
                <div class="w-full sm:w-auto h-auto">
                    <div class="bg-theme-blue-lite px-4 py-3 text-theme-blue ">
                        <p class="text-md font-light">Number of</p>
                        <p class="text-2xl font-medium">Total Inquiries</p>
                    </div>
                    <div class="bg-theme-blue text-white py-3">
                        <p class="text-center text-2xl">{{ $stats['total_inquiries'] }}</p>
                    </div>
                </div>

                <div class="w-full sm:w-auto h-auto">
                    <div class="bg-theme-blue-lite px-4 py-3 text-theme-blue ">
                        <p class="text-md font-light">Number of</p>
                        <p class="text-2xl font-medium">Leasing Inquiries</p>
                    </div>
                    <div class="bg-theme-blue text-white py-3">
                        <p class="text-center text-2xl">{{ $stats['total_lease'] }}</p>
                    </div>
                </div>

                <div class="w-full sm:w-auto h-auto">
                    <div class="bg-theme-blue-lite px-4 py-3 text-theme-blue ">
                        <p class="text-md font-light">Number of</p>
                        <p class="text-2xl font-medium">FD Inquiries</p>
                    </div>
                    <div class="bg-theme-blue text-white py-3">
                        <p class="text-center text-2xl">{{ $stats['total_fd'] }}</p>
                    </div>
                </div>

                <div class="w-full sm:w-auto h-auto">
                    <div class="bg-theme-blue-lite px-4 py-3 text-theme-blue ">
                        <p class="text-md font-light">Number of</p>
                        <p class="text-2xl font-medium">Insurance Inquiries</p>
                    </div>
                    <div class="bg-theme-blue text-white py-3">
                        <p class="text-center text-2xl">{{ $stats['total_insurance'] }}</p>
                    </div>
                </div>

                <div class="w-full sm:w-auto h-auto">
                    <div class="bg-theme-blue-lite px-4 py-3 text-theme-blue ">
                        <p class="text-md font-light">Number of</p>
                        <p class="text-2xl font-medium">Customers</p>
                    </div>
                    <div class="bg-theme-blue text-white py-3">
                        <p class="text-center text-2xl">{{ $stats['total_customers'] }}</p>
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