<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Food Products</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Food Products (Pvt) Ltd.</span></h3>
            
            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Our Vision</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">Being one of Sri Lanka’s leading manufacturing and marketing company of Spices & Condiment Products in Sri Lanka, we strive to become a world renowned Manufacture, Distributor & Exporter in the main items we produce.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Our Mission</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">We always believe that we are the business & happy because of our esteemed customer’s satisfaction through feedback. We are always committed to improving the quality of our products by introducing the state of the art technology, skilled employees, and encouraging them to challenge themselves.</p>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>