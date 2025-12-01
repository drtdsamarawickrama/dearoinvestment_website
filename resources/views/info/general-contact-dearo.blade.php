<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo - Contact Us</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Contact <span class="text-theme-orange">Dearo</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">You can always visit any of our brnches listed under branch network. Futher feel free to reach us via following numbers and pages.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Head office</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                We are located at 8<sup>th</sup> floor, Ceylinco House, No 69,Janadhipathi Mawatha, Colombo 01 <br>
                Call us on 074 390 8274 <br>
                Email us <a href="mailto:info@dearoinvestment.com">info@dearoinvestment.com</a>
            </p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Reach us via Social</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                <a href="https://wa.me/94702896932?text=Hi%20Can%20I%20get%20your%20assistance.%20I%20have%20a%20financial%20need." target="_blank">WhatsApp (+94702896932)</a> <br>
                <a href="https://www.facebook.com/dearoinvestmentlimited" target="_blank">Facebook</a> <br>
                <a href="https://www.instagram.com/dearoinvestmentlimited" target="_blank">Instagram</a>
            </p>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>