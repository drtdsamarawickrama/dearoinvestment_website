<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Gold Loans</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Bulk Gold Loans</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">The gold loan, also referred as a loan against gold, is a secured loan taken by the borrower from a lender by pledging their gold articles within a range of 18 karats to 24 karats. The loan provided is a percentage of the gold, based on the current market value and quality of gold, repaid via monthly installments.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Benefits</h6>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                <li>Receive 50% of the first month’s interest back </li>
                <li>Highest rate of advance </li>
                <li>Faster and easier transactions </li>
                <li>Flexible repayment plans </li>
                <li>Security and insurance of gold pledged </li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>