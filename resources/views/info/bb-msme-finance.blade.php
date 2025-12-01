<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>MSME Finance</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">MSME Finance</span></h3>
            <div class="mt-6 w-full">
                <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                    Prospective micro, small and medium scale entrepreneurs at village level who want to commence new businesses or to expand existing businesses. Entrepreneurs with new ideas based on village resources, IT based products and Eco- friendly economics activities etc. Youth, women, young graduates, skilled and differently able people.
                </p>

                <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Benefits for MSMEs</h6>
                <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                    <li>Reasonable rate of interest with a suitable grace period</li>
                    <li>Loan values to suit business requirements with a flexible repayment schedule aligned with income pattern and payment capacity</li>
                    <li>Business guidance and consultancy services</li>
                </ul>

                <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Documents Required</h6>
                <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                    <li>A duly filled loan application</li>
                    <li>Copy of the national identity card / passport / driver’s license for identification</li>
                    <li>Address verification document (i.e. copy of fixed utility bill, bank statement, etc) if current postal address differs from the national identity card or identification document</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>