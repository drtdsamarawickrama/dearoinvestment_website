<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Short Term Loans</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Short Term Loans</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">We grant short term loans to finance working capital requirements of your business and to meet any urgent financial needs.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Special Notes</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                Repayment not to exceed 12 months. <br>
                Could be granted as Bridging Finance. <br>
                Could be granted against Progress Bills of construction companies.
            </p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Why Short Term Lons?</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                Affordable rates of interest based on market rates. <br>
                Flexible and convenient. <br>
                No early repayment fee.
            </p>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>