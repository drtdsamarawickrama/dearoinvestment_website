<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Housing Loans</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Housing Loans</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">You should have a regular monthly net income (Minimum Rs. 40,000/-), individually or jointly with your spouse. This income should be sufficient to meet the monthly loan commitment as well as living and other expenses.</p>

            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                Employees who earn a salary above Rs. 200,000/- and Professionals will receive a 0.50% reduction from the standard interest rate applicable for Home Loans. <br>
                Loan approval within 3 days. <br>
                Discounts on building materials. <br>
                Loans to build, purchase,  renovate or settle an existing Home Loan. <br>
                NRFC account holders can obtain foreign currency Home Loans. <br>
            </p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Special Benefits with Dearo</h6>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                <li>Loan approval in 3 days without any additional charges</li>
                <li>Longer repayment period</li>
                <li>Flexible approach and fast approval</li>
                <li>Attractive and competitive low interest rates</li>
                <li>Convenience of our island wide branch network </li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>