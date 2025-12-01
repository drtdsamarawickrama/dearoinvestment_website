<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Hire Purchase</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Hire Purchase</span></h3>
            <div class="mt-6 w-full">
                <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                    Everybody's aim is to own their dream car one day. Dearo Investment Limited Hire Purchase makes your dream come true by providing fast, tailor-made solutions for any type of new, used or pre-owned vehicle of your choice, with the lowest interest rates to enhance your investment, along with assistance for insuring your vehicle.
                </p>

                <p class="text-theme-gray text-md font-semibold text-left w-full mt-2">We provide Hire Purchase facility for:</p>
                <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                    <li>Passenger vehicles (Cars, Vans, SUVs, Motorbikes etc.) </li>
                    <li>Commercial vehicles (Buses, Lorries, Trucks, Trailers etc.) </li>
                    <li>Machinery and construction equipment</li>
                    <li>Agricultural equipment</li>
                </ul>
            </div>

            <div class="mt-6 w-full">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Additional benefits that we offer include:</h6>
                <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                    <li>Ability to process with or without personal guarantors or down payments.</li>
                    <li>Registered or unregistered vehicles categories considered.</li>
                    <li>Finance facilities up to the applicable limits of the value of the vehicle.</li>
                    <li>Payment options of reducing balance or on equated installment basis.</li>
                    <li>In-house insurance packages and special rates on insurance.</li>
                </ul>
            </div>

            <div class="mt-6 w-full">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Documents required</h6>
                <p class="text-theme-gray text-md font-semibold text-left w-full mt-2">Basic Documents</p>
                <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                    <li>Proof of Identity (Copy of National Identity Card OR Driving License OR Pass Port)</li>
                    <li>Billing proof</li>
                    <li>Business Registration</li>
                    <li>Bank statements at least for last 3 months</li>
                    <li>Additional income proof documents- Payment Bills, Invoices (if available)</li>
                    <li>Photo graphs for the Customer selfie and vehicle and premises.</li>
                    <li>System Ledger Report for existing Facilities</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>