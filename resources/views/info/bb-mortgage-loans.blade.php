<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Mortgage Loans</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Mortgage Loans</span></h3>
            <div class="mt-6 w-full">
                <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                    Sometimes, you may find yourself in need of assistance in making your dream come true – be it a new home, a dream vehicle, or even debt consolidation or business expansion. Whatever your needs may be, our comprehensive Loan facilities offer you a solution, be it personal or commercial in nature, including Pledges, Quick Cash, Term Loans, Personal Loans, Motor Loans, Business Loans against Investments and Micro Loans.
                </p>

                <p class="text-theme-gray text-md font-semibold text-left w-full mt-2">We offer you:</p>
                <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                    <li>Loans from Rs. 50,000/- upwards.</li>
                    <li>Convenient repayment periods.</li>
                    <li>Ability to procure your Loan in 2 – 3 working days</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>