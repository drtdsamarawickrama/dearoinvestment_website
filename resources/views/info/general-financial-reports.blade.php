<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo - Financial Reports</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Financial Reports</span></h3>
            
            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Annual Reports</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6"></p>
            
            @if(isset($annual_reports))
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-6 list-disc ml-4">
                @foreach($annual_reports as $annualReport)
                <li><a href="{{ route('customer.blog.post.read', ['slug' => $annualReport->slug]) }}" target="_blank" class="">{{ $annualReport->title }}</a></li>
                @endforeach
            </ul>
            @endif

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Quarterly Reports</h6>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6"></p>
            
            
            @if(isset($quarterly_reports))
            <ul class="text-theme-gray text-md font-normal text-left w-full mt-6 list-disc ml-4">
                @foreach($quarterly_reports as $quarterlyReport)
                <li><a href="{{ route('customer.blog.post.read', ['slug' => $quarterlyReport->slug]) }}" target="_blank" class="">{{ $quarterlyReport->title }}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>