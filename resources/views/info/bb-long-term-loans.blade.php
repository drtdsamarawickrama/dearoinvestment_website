<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Long Term Loans</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Long Term Loans</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Long Term Loans are secured loans that allow you purchase high-ticket items with the loan amount. This loan comes with significantly higher repayment tenures, and you can repay it over an extended period of time, usually ranging from 3 years to 30 years.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Why Long Term Loan?</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                <b>High Loan Amount</b> Long-term loans come with higher loan amounts since the products purchased through the loan are generally expensive. <br>

                <b>Low-Interest Rate</b> Lenders typically offer lower interest rates to loan applicants since the loan repayment tenure is higher. <br>

                <b>Collateral</b> Lenders need security or collateral on Long Term loans. Typically, you have to pledge the item purchased through the loan as collateral. The collateral enables lenders to recover their investment if a borrower defaults on loan repayment. <br>

                <b>Monthly Instalments</b> Lenders allow you to repay the loan in Equated Monthly Instalments (EMIs). Each EMIs comprises a portion of the principal amount and the interest component.
            </p>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>