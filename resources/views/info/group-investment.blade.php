<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Investment Limited</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Investment Ltd.</span></h3>
            
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Dearo Investment Limited, a subsidiary of Dearo Holdings has strategically diversified into key economic growth sectors across financial services, leisure, agriculture and plantations, construction and real estate, manufacturing and trading, technology, research and innovation and strategic investments.</p>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">Dearo Investment Limited duly incorporated in the Democratic Socialist Republic of Sri Lanka and registered under the Companies Act No. 07 of 2007 as a public liability Limited Company.</p>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">The Dearo Investment Limited is on an accelerated growth trajectory and is inspired by the quest to nurture and shape the future of individuals and communities across the Sri Lanka. As a leading player in the SME and MSME sector, the Dearo Investment Limited has been a catalyst in facilitating, whilst striving to maximize environmental benefits through green financing, promoting financial independence for women and uplifting customers from poverty through financial inclusion in global markets.</p>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">While being Sri Lanka’s Non-Banking Financial Institution, we forge ahead with simple fundamentals – providing responsible financial services to all, empowering people and communities, and enabling economic progress.</p>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>