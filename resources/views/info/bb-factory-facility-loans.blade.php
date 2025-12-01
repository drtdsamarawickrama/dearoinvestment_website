<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Factory Facility Loans</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Factoring Facility Loans</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">
                Domestic Factoring enables you to release the money tied up in your outstanding credit invoices, to fund your business or just to meet your day –to-day routine payments. <br>
                Customers who have a large Trade Debtor / Receivables portfolio in the fields of manufacturing, wholesale, trade, transport, services  etc.. can apply for Domestic Factoring facilities. 
            </p>

            <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                <li>Flexible and cost effective.</li>
                <li>Up to 85% advance on your outstanding invoices.</li>
                <li>As your sales increase, so does the cash available for you.</li>
                <li>Island wide coverage through our branch network.</li>
                <li>We ensure simple process that can operate alongside with your existing systems.</li>
                <li>Contact your nearest branch for a customized working capital solution.</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>