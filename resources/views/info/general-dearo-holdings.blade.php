<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Holdings - Dearo Group of Companies</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">We are <span class="text-theme-orange">Dearo Holdings</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Dearo Holdings has strategically diversified into key economic growth sectors across financial services, leisure, agriculture and plantations, construction and real estate, manufacturing and trading, technology, research and innovation and strategic investments.</p>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">The Dearo Group is on an accelerated growth trajectory and is inspired by the quest to nurture and shape the future of individuals and communities across the world. As a leading player in the International MSME sector, the Dearo Group has been a catalyst in facilitating, whilst striving to maximize environmental benefits through green financing, promoting financial independence for women and uplifting customers from poverty through financial inclusion in global markets.</p>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">We are incorporated under the Companies Act No; 7 of 2007. as a business. <br>We are a registered Loans and Hire purchase company with the Act No 29 of 1982 Consumer Credit. Law of Contract Small Claims Procedure Act No. 33 of 2022 Registration of Documents Act 2022 No. 32 as amended Debt Recovery Act ,Mortgage Act, Bills of Exchange Ordinance Act , Stamp Duty Act.</p>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-6 list-disc ml-4">
                <li>Dearo Audit and Sectary services (pvt) ltd.</li>
                <li>Dearo Education (pvt) Ltd.</li>
                <li>DCBT Campus (pvt) Ltd.</li>
                <li>Dearo IT Solution (pvt) Ltd.</li>
                <li>Dearo Foods products (pvt) Ltd.</li>
                <li>Dearo Marketing and Distribution (pvt) Ltd.</li>
                <li>Dearo Investment Ltd.</li>
                <li>Sealand Internationals (pvt) Ltd.</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>