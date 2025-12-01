<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Invest with Dearo | Dearo</title>
</head>
<body class="font-lato h-auto min-h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-customer')

    <!-- Customer Dahboard -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Customer Dashboard</p>
            <p class="text-2xl text-theme-orange font-bold mt-2">Click on the inquiry to proceed.</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10 mb-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                @if(isset($inquiries))
                    @foreach($inquiries as $inquiry)
                        <div class="w-full bg-theme-blue-lite py-3 px-4">
                            @switch($inquiry->inquiry_type)
                                @case('LEASE')
                                    <h3 class="text-theme-blue text-md font-medium">Leasing Inquiry</h3>
                                @break

                                @case('FD')
                                    <h3 class="text-theme-blue text-md font-medium">Fixed Deposit Inquiry</h3>
                                @break

                                @case('INSURANCE')
                                    <h3 class="text-theme-blue text-md font-medium">Insurance Inquiry</h3>
                                @break

                                @case('PAWNING')
                                    <h3 class="text-theme-blue text-md font-medium">Gold Loan Inquiry</h3>
                                @break
                            @endswitch
                            <p class="text-md text-theme-gray">Created on: <span class="font-bold">{{ $inquiry->updated_at }}</span></p>
                            @switch($inquiry->inquiry_status)
                                @case('DRAFT')
                                <p class="text-md text-theme-gray">Status: <span class="font-bold">Draft</span></p>
                                <div class="w-full flex justify-end">
                                    <form action="{{ route('inquiry.next.step.load') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="inquiry_id" value="{{ $inquiry->id }}" />
                                        <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Complete and Submit</button>
                                    </form>  
                                </div>
                                @break

                                @case('PENDING_RESPONSE')
                                <p class="text-md text-theme-gray">Status: <span class="font-bold">Submitted</span></p>
                                <div class="w-full flex justify-end"></div>
                                @break

                                @case('BRANCH_RESPONDED')
                                <p class="text-md text-theme-gray">Status: <span class="font-bold">Reviewed by Branch</span></p>
                                <div class="w-full flex justify-end">
                                    <form action="{{ route('inquiry.next.step.load') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="inquiry_id" value="{{ $inquiry->id }}" />
                                        <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">View Summary</button>
                                    </form>
                                </div>
                                @break
                            @endswitch
                            
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js'])
</body>
</html>