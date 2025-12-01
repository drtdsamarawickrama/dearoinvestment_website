<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Personal Loans</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Personal Loans</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">So many of your needs may seem beyond your reach, but a Personal Loan from Dearo Investment is the easiest way to have the lifestyle you preferred.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Eligibility</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                You should be aged between 18 and 60 years. <br>
                You need to be a permanent employee of an organization acceptable to the Bank, and your salary must be remitted to any bank account for at least 3 months.<br>
                Minimum salary or your regular monthly net income should be Rs 75,000/-, to apply for a Personal Loan.<br>
                The loan should be fully repaid before the date of retirement.<br>
                Your regular income should be directed to an account at Commercial Bank (which could be opened for this purpose) from which the monthly payments could be deducted.
            </p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Repayment</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-2">
                You have the option of choosing between an equated or a reducing balance payment schemes. <br>
                Maximum repayment period of Personal Loans is 5 years. The maximum repayment period will depend on your age and remaining years of service.
            </p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Documents Required</h6>
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-2 list-disc ml-4">
                <li>Loan application.  </li>
                <li>Letter from the employer confirming Employment, Salary & Deductions with the undertaking to the account at Commercial Bank.</li>
                <li>Bank statements of other banks for the past 06 months, where salary is being credited at present.  </li>
                <li>Salary slips for past 03 months.</li>
                <li>Copy of National Identity Card/ Valid Passport/ Valid Driving License. </li>
                <li>Address verification documents indicating applicant’s name and address (if applicable).</li>
                <li>Guarantor Statements (if applicable).</li>
                <li>Copy of National Identity Card of the Guarantor (if applicable).</li>
                <li>Copy of latest salary slip of the Guarantor (if applicable).</li>
                <li>Address verification documents indicating Guarantor's name and address (if applicable).</li>
                <li>Documentary Evidence regarding any Higher Educational / Professional qualifications (If available).</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>