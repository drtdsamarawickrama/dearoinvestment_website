<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo - About Us</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">About Our <span class="text-theme-orange">Company</span></h3>
            
            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Our Mission</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Empowering our customers by delivering innovative solutions and exceptional services while fostering a culture of growth and collaboration.</p>
            
            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Our Vision</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Empowering our customers through innovation, exceptional service, and a commitment to sustainability for a brighter future.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Our Process</h6>
            <ol class="text-theme-gray text-md font-normal text-left w-full mt-6 list-decimal ml-4">
                <li>High-quality products/services, customer satisfaction, and cost-effectiveness are at the core of our business process.</li>
                <li>We prioritize efficiency, innovation, and continuous improvement to stay competitive in the industry's.</li>
                <li>Our commitment to sustainability and social responsibility guides our business decisions and practices.</li>
            </ol>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Our Goals</h6>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-6 list-disc ml-4">
                <li>Driven by innovation and excellence, our goal is to deliver high-quality products/services and create long- term value for our customers.</li>
                <li>Our goals are to innovate continuously and deliver exceptional customer service to drive long-term success</li>
                <li>We strive to achieve sustainable growth and make a positive impact on the world through our products and services</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>