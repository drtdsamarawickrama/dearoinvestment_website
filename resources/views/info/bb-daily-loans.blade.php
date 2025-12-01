<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Daily Loans</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Daily Loans</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">We give the opportunity to prolong the loan period. From: Rs. 5,000 To: Rs. 50,000. Interest rate from 0% to 16%.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Daily Loan Categories</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                <b>Student Loans</b> Having trouble in affording to pay for school or class fees? We have a convenient solution in offering loans for all the people seeking emergency funds for education. <br>
                <b>Salary Advance</b> Weeks away from your paycheck? Worry no more, apply for a loan from us, and get a salary advance before your pay day. <br>
                <b>Health Needs</b> Unexpected problems in your health for you or your loved ones? Incase of an emergency we are ready to help you in instantly. <br>
                <b>Business Needs</b> Falling short of working capital? We will partner with you in helping you fund your business needs. <br>
                <b>Pay Bills</b> Falling short of money in hand to pay bills in the end of the month? We are here for you
            </p>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>