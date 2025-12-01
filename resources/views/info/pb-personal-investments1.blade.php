<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Personal Investments</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Personal <span class="text-theme-orange">Investment Plans</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                You have the opportunity to invest in a fixed monthly amount over a period of 2, 3, 4, 5 or 6 years. According to your requirement, you can receive any amount starting from Rs.500,000/- (in multiples of Rs.500,000/-). The monthly amount that you need to deposit will vary depending on the investment period and the amount which you expect to receive. In the event of an unexpected demise, the nominee (nominated by the account holder) will receive the amount invested to date together with accrued interest.
            </p>
            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Required Documents</h6>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                <li>Account mandate.</li>
                <li>Know Your Customer (KYC) form.</li>
                <li>National Identity Card/ Valid Driving License/ Valid Passport that carries the NIC number.</li>
                <li>Address verification documents (If the address given to the bank is different from the National Identity Card / Driving License.)</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>