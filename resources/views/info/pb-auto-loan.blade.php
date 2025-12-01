<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Auto Loans - Personal Finance</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Auto Loans</span></h3>
            
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

            <!-- <div class="mt-6 w-full bg-theme-blue-lite rounded-lg px-4 md:px-8 py-2">
                <h6 class="text-theme-gray text-2xl font-bold text-left mt-4">Request Auto Loan</h6>
                <form action="" method="post" class="w-full">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="full-name" class="text-theme-gray">Full Name</label>
                            <input type="text" id="customer_name" name="customer_name" class="mt-1 border-theme-gray-lite w-full"/>
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="address" class="text-theme-gray">Address</label>
                            <input type="text" id="address" name="address" class="mt-1 border-theme-gray-lite w-full"/>
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="mobile-number" class="text-theme-gray">Mobile Number</label>
                            <input type="text" id="mobile_number" name="mobile_number" class="mt-1 border-theme-gray-lite w-full"/>
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="message" class="text-theme-gray">Message</label>
                            <input type="text" id="message" name="message" class="mt-1 border-theme-gray-lite w-full"/>
                        </div>
                        <div class="w-full mt-2 flex justify-end">
                            <button class="bg-theme-blue text-white font-bold px-4 py-2">Request Loan</button>
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>