<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>{{ $blog->title }} | Article</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            @if(isset($blog))
                <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left"><span class="text-theme-orange drop-shadow-md shadow-theme-blue">{{ $blog->title }}</span></h3>
            @endif

            @if(isset($contents))
                <div class="mt-6 w-full">
                @foreach($contents as $contentElement)
                    @php
                        $contentObject = json_decode($contentElement->content)
                    @endphp

                    @switch($contentElement->content_type)
                        @case("TITLE")
                            <h6 class="text-theme-blue text-2xl font-bold text-left my-3">{{ $contentObject->title }}</h6>
                            @break

                        @case("PARAGRAPH")
                            <p class="text-theme-gray text-md font-normal text-left w-full my-2">{{ $contentObject->paragraph }}</p>
                            @break

                        @case("LIST_BULLETS")
                            <ul class="text-theme-gray text-md font-normal text-left w-full list-disc ml-4 my-3">
                                @foreach($contentObject->list_items as $listItem)
                                    <li>{{ $listItem }}</li>
                                @endforeach
                            </ul>
                            @break

                        @case("LIST_NUMBERED")
                            <ol class="text-theme-gray text-md font-normal text-left w-full mt-2 ml-4 list-decimal my-3">
                                @foreach($contentObject->list_items as $listItem)
                                    <li>{{ $listItem }}</li>
                                @endforeach
                            </ol>
                            @break

                        @case("IMAGE")
                            <div class="flex flex-col max-w-fit my-3 border-2 border-theme-blue-lite">
                                <img src="{{ url('/') }}/uploads/blog/{{ $contentObject->image }}" alt="{{ $contentObject->title }}" class="w-full h-auto object-contain border-theme-blue-lite">
                                <span class="text-center bg-theme-blue-lite py-1">{{ $contentObject->title }}</span>
                            </div>
                            @break

                        @case("PDF")
                            <a target="_blank" href="{{ url('/') }}/uploads/pdf/{{ $contentObject->pdf }} my-2">
                                <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">{{ $contentObject->title }}</button>
                            </a>
                            @break
                    @endswitch
                @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>