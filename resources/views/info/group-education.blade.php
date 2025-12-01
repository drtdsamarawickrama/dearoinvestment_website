<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Education</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Education (Pvt) Ltd.</span></h3>
            
            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Our Vision</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">To Be The Leading Primary Education Provider In Sri Lanka.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Our Mission</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">Our mission is together with internationally reputed universities and educational institutes, to provide high quality educational programs, which will enhance the quality of the human resources available to the job markets at an affordable level, thereby contributing to the development of economy to sri lanka</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Main Products</h6>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                <li>Advance education services</li>
                <li>Primary education services</li>
            </ul>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Benefits for students</h6>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                <li>Attractive fees for course</li>
                <li>Skills development</li>
                <li>Knowledge development</li>
                <li>Career opportunities</li>
                <li>Solid occupations</li>
                <li>Cash back scheme</li>
                <li>Solid guideline for life development</li>
                <li>Flexible repayment</li>
                <li>Scholarships</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>