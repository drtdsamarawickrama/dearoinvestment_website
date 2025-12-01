<!-- Branch Manager Navigation -->
<header class="w-full flex flex-col z-50">
    <div class="h-12 max-h-12 bg-theme-blue lg:hidden flex justify-end items-center px-4 z-20">
        <ion-icon onclick="onToggleMenu(this);" class="text-3xl text-white cursor-pointer" name="menu"></ion-icon>
    </div>
    <div id="desktop-header-1" class="h-12 bg-theme-orange-ribbon menu-holder-1 hidden lg:block" onmouseenter="hideExpandableMenus();">
        <nav class="md:h-full flex items-center justify-start sm:max-w-screen-2xl mx-auto">
            <div class="nav-links absolute md:static mt-0 text-theme-blue bg-theme-orange-ribbon md:bg-transparent min-h-[50vh] md:min-h-fit w-full md:w-auto left-0 top-[-100%] flex items-center sm:px-20">
                <ul class="flex flex-col md:flex-row md:items-center gap-8 md:gap-[2vw] text-md font-bold">
                    <li>
                        <a href="{{ route('admin.dashboard.load') }}" class="text-theme-gray mr-8">Dearo Investment | Branch Manager</a>
                    </li>
                    <li class="w-auto h-full border-theme-blue hover:border-b-[1px]">
                        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                    <!-- <li class="w-auto h-full {{ Route::currentRouteName() === 'dearo.management.corporate'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                        <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.management.corporate') }}">Management</a>
                        <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.management.corporate') }}">Management</a>
                    </li> -->
                    <!-- <li class="w-auto h-full {{ Route::currentRouteName() === 'dearo.branch.network'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                        <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.branch.network') }}">Branch Network</a>
                        <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.branch.network') }}">Branches</a>
                    </li>
                    <li class="w-auto h-full {{ Route::currentRouteName() === 'dearo.management.corporate'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                        <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.management.corporate') }}">Management</a>
                        <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.management.corporate') }}">Management</a>
                    </li>
                    <li class="w-auto h-full {{ Route::currentRouteName() === 'info.dearo.financial.reports'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                        <a class="px-4 py-2 hidden xl:block" href="{{ route('info.dearo.financial.reports') }}">Financial Reports</a>
                        <a class="px-4 py-2 xl:hidden" href="{{ route('info.dearo.financial.reports') }}">Financials</a>
                    </li>
                    <li class="w-auto h-full {{ Route::currentRouteName() === 'dearo.news.latest'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                        <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.news.latest') }}">News</a>
                        <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.news.latest') }}">News</a>
                    </li>
                    <li class="w-auto h-full {{ Route::currentRouteName() === 'dearo.contact.us'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                        <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.contact.us') }}">Contact Us</a>
                        <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.contact.us') }}">Contact</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>

    <div id="mobile-header-1" class="h-auto bg-theme-orange-ribbon menu-holder-1 lg:hidden absolute top-0 left-0 w-10/12 md:w-1/2 max-w-[500px] z-10 hidden border-r-4 border-r-theme-orange">
        <nav class="flex items-center justify-start mx-auto">
            <div class="nav-links mt-0 text-theme-blue bg-theme-orange-ribbon h-[60vh] w-full left-0 top-0 flex items-center">
                <ul class="flex flex-col gap-8 text-md font-bold ml-8">
                    <li>
                        <a href="{{ route('admin.dashboard.load') }}">
                            <img src="{{ url('/assets/img/logo-dearo.png') }}" alt="" class="w-full max-w-40 h-auto object-fill">
                        </a>
                    </li>
                    <li class="w-auto h-full border-theme-blue hover:border-b-[1px]">
                        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                    <!-- <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.about.us'? 'border-b-[1px]':'' }} border-theme-blue">
                        <a class="px-4 py-2" href="{{ route('dearo.about.us') }}">About Us</a>
                    </li> -->
                    <!-- <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.branch.network'? 'border-b-[1px]':'' }} border-theme-blue">
                        <a class="px-4 py-2" href="{{ route('dearo.branch.network') }}">Branch Network</a>
                    </li>
                    <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.management.corporate'? 'border-b-[1px]':'' }} border-theme-blue">
                        <a class="px-4 py-2" href="{{ route('dearo.management.corporate') }}">Management</a>
                    </li>
                    <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.news.latest'? 'border-b-[1px]':'' }} border-theme-blue">
                        <a class="px-4 py-2" href="{{ route('dearo.news.latest') }}">News</a>
                    </li>
                    <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.contact.us'? 'border-b-[1px]':'' }} border-theme-blue">
                        <a class="px-4 py-2" href="{{ route('dearo.contact.us') }}">Contact Us</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>

    <div  id="desktop-header-2" class="h-12 w-full bg-theme-blue menu-holder-2 hidden lg:flex justify-start">
        <nav class="w-full flex items-center justify-start sm:max-w-screen-2xl mx-auto">
            <div class="nav-links-2 absolute md:static mt-0 text-white bg-theme-blue md:bg-transparent min-h-fit w-full md:w-auto left-0 top-[-100%] flex items-center sm:px-20">
                <ul class="flex flex-col md:flex-row md:items-center gap-8 md:gap-[2vw] text-md font-bold">
                    <li class="w-auto h-full border-white hover:border-b-[1px]">
                        <a class="pr-4 py-2" href="#" >Dashboard</a>
                    </li>
                    <li class="w-auto h-full border-white hover:border-b-[1px]">
                        <a class="pr-4 py-2" href="#" >Pending Inquiries</a>
                    </li>
                    <li class="w-auto h-full border-white hover:border-b-[1px]">
                        <a class="pr-4 py-2" href="#" >Completed Inquiries</a>
                    </li>
                    <!-- <li class="w-auto h-full border-white hover:border-b-[1px]">
                        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>

    <div  id="mobile-header-2" class="h-auto bg-theme-blue menu-holder-1 lg:hidden absolute top-[55vh] left-0 w-10/12 md:w-1/2 max-w-[500px] z-10 hidden rounded-br-lg">
        <nav class="flex items-center justify-start mx-auto">
            <div class="nav-links mt-0 text-white bg-theme-blue min-h-[35vh] pb-8 w-full left-0 flex flex-col items-start rounded-br-lg">
                <ul class="flex flex-col gap-8 text-md font-bold ml-8 mt-6">
                    <li class="w-auto h-full border-white hover:border-b-[1px]">
                        <a class="pr-4 py-2" href="#" >Dashboard</a>
                    </li>
                    <li class="w-auto h-full border-white hover:border-b-[1px]">
                        <a class="pr-4 py-2" href="#" >Pending Inquiries</a>
                    </li>
                    <li class="w-auto h-full border-white hover:border-b-[1px]">
                        <a class="pr-4 py-2" href="#" >Completed Inquiries</a>
                    </li>
                    <!-- <li class="w-auto h-full border-white hover:border-b-[1px]">
                        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li> -->
                </ul>

            </div>
        </nav>
    </div>
</header>