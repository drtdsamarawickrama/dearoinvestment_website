<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo IT Solutions</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">IT Solution (Pvt) Ltd.</span></h3>
            
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Dearo IT is an IT solutions and services provider based in Sri Lanka. Starting as a Fintech provider who developed and offered our own IT products to the banking and finance sector, Covered All Industry's we soon grew to expand our presence in other industries such as e-commerce, retail, and logistics. We are all about being process-driven and developing the best quality software solutions, which have won several accolades over the years.</p>
            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Product and Services</h6>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                <li>Digital Core Banking System</li>
                <li>Field Agent Mobile app</li>
                <li>Web Development and Application solution</li>
                <li>Software Solution</li>
                <li>Retail Order Management & Forecasting Solution</li>
                <li>E-commerce</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>