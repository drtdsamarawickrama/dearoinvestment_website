<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Latest News</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Dearo <span class="text-theme-orange">Latest News</span></h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Dearo Holdings has strategically diversified into key economic growth sectors across financial services, leisure, agriculture and plantations, construction and real estate, manufacturing and trading, technology, research and innovation and strategic investments.</p>
        </div>

        @if(isset($general_articles))
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <div class="w-full flex flex-wrap justify-center sm:justify-start gap-7">
                @foreach($general_articles as $blog)
                <a target="_blank" href="{{ route('customer.blog.post.read',['slug' => $blog->slug]) }}">
                    <div class="flex flex-col flex-shrink-0 w-72 rounded-lg bg-theme-orange-lite pb-2">
                        <img src="{{ url('/') }}/uploads/blog/{{ $blog->og_image }}" alt="hikka-tranz hotel" class="w-72 h-52 object-cover rounded-t-lg">
                        <hr class="border-[2px] border-theme-orange">
                        <p class="mt-3 text-md text-theme-gray font-semibold w-auto px-4">{{ $blog->title }}</p>
                        <p class="mt-2 text-md text-theme-gray font-medium w-auto px-4">{{ $blog->meta_description }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>