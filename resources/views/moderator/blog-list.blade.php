<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>All Articles - Dearo Admin</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    <header class="w-full flex flex-col z-50">
        <div class="h-12 max-h-12 bg-theme-blue lg:hidden flex justify-end items-center px-4 z-20">
            <ion-icon onclick="onToggleMenu(this);" class="text-3xl text-white cursor-pointer" name="menu"></ion-icon>
        </div>
        <div  id="desktop-header-2" class="h-12 w-full bg-theme-blue menu-holder-2 hidden lg:flex justify-start">
            <nav class="w-full flex items-center justify-start sm:max-w-screen-2xl mx-auto">
                <div class="nav-links-2 absolute md:static mt-0 text-white bg-theme-blue md:bg-transparent min-h-fit w-full md:w-auto left-0 top-[-100%] flex items-center sm:px-20">
                    <ul class="flex flex-col md:flex-row md:items-center gap-8 md:gap-[2vw] text-md font-bold">
                        <li class="w-auto h-full  {{ Route::is('admin-blogs-list-load')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="pr-4 py-2" href="{{ route('admin-blogs-list-load') }}">All Articles</a>
                        </li>
                        <li class="w-auto h-full  {{ Route::is('admin-blogs-new-load')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="px-4 py-2" href="{{ route('admin-blogs-new-load') }}" >New Article</a>
                        </li>
                        <li class="w-auto h-full  {{ Route::is('dearo.loan.*')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="px-4 py-2">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="w-full h-auto mb-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Manage <span class="text-theme-orange">Articles</span></h3>
        </div>
    </div>

    @if(isset($blogs))
    <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
        <div class="w-full flex flex-wrap justify-center sm:justify-start gap-7">
            @foreach($blogs as $blog)
            <a href="{{ route('admin-blog-update-load',['blog_id' => $blog->id]) }}">
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

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>