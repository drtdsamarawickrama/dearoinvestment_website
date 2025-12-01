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
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo Gold <span class="text-theme-orange">Loans</span></h3>
            <div class="mt-6 w-full">
                <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                    Our Gold Loan solutions offer you a speedy solution to get cash in a hurry. Besides providing the highest value for your gold jewellery, you can rest assured that your precious jewellery is in secure hands.
                </p>

                <p class="text-theme-gray text-md font-semibold text-left w-full mt-2">You will also be provided with a range of benefits such as:</p>
                <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                    <li>Low interest rates </li>
                    <li>Complete privacy and confidentiality </li>
                    <li>Fast and friendly service </li>
                    <li>Valuation with latest technology</li>
                    <li>Convenient repayment plans </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>