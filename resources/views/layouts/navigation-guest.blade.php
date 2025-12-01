<!-- Guest Navigation -->
<header class="w-full flex flex-col z-50">
        <div class="h-12 max-h-12 bg-theme-blue lg:hidden flex justify-end items-center px-4 z-20">
            <ion-icon onclick="onToggleMenu(this);" class="text-3xl text-white cursor-pointer" name="menu"></ion-icon>
        </div>
        <div id="desktop-header-1" class="h-12 bg-theme-orange-ribbon menu-holder-1 hidden lg:block" onmouseenter="hideExpandableMenus();">
            <nav class="md:h-full flex items-center justify-start sm:max-w-screen-2xl mx-auto">
                <div class="nav-links absolute md:static mt-0 text-theme-blue bg-theme-orange-ribbon md:bg-transparent min-h-[50vh] md:min-h-fit w-full md:w-auto left-0 top-[-100%] flex items-center sm:px-20">
                    <ul class="flex flex-col md:flex-row md:items-center gap-8 md:gap-[2vw] text-md font-bold">
                        <li>
                        <a href="{{ route('dearo.home') }}" class="text-theme-gray mr-8 hidden xl:block">Dearo Investment Limited</a>
                        <a href="{{ route('dearo.home') }}" class="text-theme-gray mr-8 xl:hidden">Dearo Investment</a>
                        </li>
                        <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.about.us'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                            <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.about.us') }}">About Us</a>
                            <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.about.us') }}">About</a>
                        </li>
                        <!-- <li class="w-auto h-full {{ Route::currentRouteName() === 'dearo.branch.network'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                            <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.branch.network') }}">Branch Network</a>
                            <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.branch.network') }}">Branches</a>
                        </li> -->
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
                        <!-- </li>
                        <li class="w-auto h-full {{ Route::currentRouteName() === 'dearo.careers'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                            <a class="px-4 py-2" href="{{ route('dearo.careers') }}">Careers</a>
                        </li> -->
                        <li class="w-auto h-full {{ Route::currentRouteName() === 'dearo.contact.us'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                            <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.contact.us') }}">Contact Us</a>
                            <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.contact.us') }}">Contact</a>
                        </li>
                        <li class="w-auto h-full {{ Route::currentRouteName() === 'login'? 'border-b-[1px]':'' }} border-theme-blue hover:border-b-[1px]">
                            <a class="px-4 py-2 hidden xl:block" href="{{ route('login') }}">Login</a>
                            <a class="px-4 py-2 xl:hidden" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div id="mobile-header-1" class="h-auto bg-theme-orange-ribbon menu-holder-1 lg:hidden absolute top-0 left-0 w-10/12 md:w-1/2 max-w-[500px] z-10 hidden border-r-4 border-r-theme-orange">
            <nav class="flex items-center justify-start mx-auto">
                <div class="nav-links mt-0 text-theme-blue bg-theme-orange-ribbon h-[60vh] w-full left-0 top-0 flex items-center">
                    <ul class="flex flex-col gap-8 text-md font-bold ml-8">
                        <li>
                            <a href="{{ route('dearo.home') }}">
                                <img src="{{ url('/assets/img/logo-dearo.png') }}" alt="" class="w-full max-w-40 h-auto object-fill">
                            </a>
                        </li>
                        <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.about.us'? 'border-b-[1px]':'' }} border-theme-blue">
                            <a class="px-4 py-2" href="{{ route('dearo.about.us') }}">About Us</a>
                        </li>
                        <!-- <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.branch.network'? 'border-b-[1px]':'' }} border-theme-blue">
                            <a class="px-4 py-2" href="{{ route('dearo.branch.network') }}">Branch Network</a>
                        </li> -->
                        <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.management.corporate'? 'border-b-[1px]':'' }} border-theme-blue">
                            <a class="px-4 py-2" href="{{ route('dearo.management.corporate') }}">Management</a>
                        </li>
                        <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.news.latest'? 'border-b-[1px]':'' }} border-theme-blue">
                            <a class="px-4 py-2" href="{{ route('dearo.news.latest') }}">News</a>
                        <!-- </li>
                        <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.careers'? 'border-b-[1px]':'' }} border-theme-blue">
                            <a class="px-4 py-2" href="{{ route('dearo.careers') }}">Careers</a>
                        </li> -->
                        <li class="w-auto h-full  {{ Route::currentRouteName() === 'dearo.contact.us'? 'border-b-[1px]':'' }} border-theme-blue">
                            <a class="px-4 py-2" href="{{ route('dearo.contact.us') }}">Contact Us</a>
                        </li>
                        <li class="w-auto h-full  {{ Route::currentRouteName() === 'login'? 'border-b-[1px]':'' }} border-theme-blue">
                            <a class="px-4 py-2" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div  id="desktop-header-2" class="h-12 w-full bg-theme-blue menu-holder-2 hidden lg:flex justify-start">
            <nav class="w-full flex items-center justify-start sm:max-w-screen-2xl mx-auto">
                <div class="nav-links-2 absolute md:static mt-0 text-white bg-theme-blue md:bg-transparent min-h-fit w-full md:w-auto left-0 top-[-100%] flex items-center sm:px-20">
                    <ul class="flex flex-col md:flex-row md:items-center gap-8 md:gap-[2vw] text-md font-bold">
                        
                        <li class="w-auto h-full  {{ Route::is('dearo.pb.*')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="pr-4 py-2 hidden xl:block" onmouseenter="showExpandableMenu('expanding-menu-personal-banking');">Personal Services</a> <!-- href="{{ route('dearo.pb.personal.investments') }}"  -->
                            <a class="pr-4 py-2 xl:hidden"  onmouseenter="showExpandableMenu('expanding-menu-personal-banking');">Personal Financing</a>
                        </li>
                        <li class="w-auto h-full  {{ Route::is('dearo.bb.*')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.bb.joint.venture.loan') }}" onmouseenter="showExpandableMenu('expanding-menu-business-banking');">Business Services</a>
                            <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.bb.joint.venture.loan') }}" onmouseenter="showExpandableMenu('expanding-menu-business-banking');">Business Financing</a>
                        </li>
                        <!-- <li class="w-auto h-full  {{ Route::is('dearo.loan.*')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.loan.gold') }}" onmouseenter="showExpandableMenu('expanding-menu-loans');">Loans</a>
                            <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.loan.gold') }}" onmouseenter="showExpandableMenu('expanding-menu-loans');">Loans</a>
                        </li> -->
                        <li class="w-auto h-full  {{ Route::is('inquiry.product.listing.load')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="px-4 py-2 hidden xl:block" href="{{ route('inquiry.product.listing.load') }}">Need Facility</a>
                            <a class="px-4 py-2 xl:hidden" href="{{ route('inquiry.product.listing.load') }}">Need Facility</a>
                        </li>
                        <!-- <li class="w-auto h-full  {{ Route::is('dearo.inv.*')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="px-4 py-2 hidden xl:block" href="" onmouseenter="showExpandableMenu('expanding-menu-investments');"> route('dearo.inv.mega.waasi')  Financial & Investment Services</a>
                            <a class="px-4 py-2 xl:hidden" href="" onmouseenter="showExpandableMenu('expanding-menu-investments');"> route('dearo.inv.mega.waasi') Financing & Investments</a>
                        </li> -->
                        <!--<li class="w-auto h-full  {{ Route::is('dearo.holdings')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">-->
                        <!--    <a class="px-4 py-2 hidden xl:block" href="{{ route('dearo.holdings') }}" onmouseenter="showExpandableMenu('expanding-menu-subsidiaries');">Dearo Group of Companies</a>-->
                        <!--    <a class="px-4 py-2 xl:hidden" href="{{ route('dearo.holdings') }}" onmouseenter="showExpandableMenu('expanding-menu-subsidiaries');">Group of Companies</a>-->
                        <!--</li>-->
                    </ul>
                </div>
            </nav>
        </div>

        <div  id="mobile-header-2" class="h-auto bg-theme-blue menu-holder-1 lg:hidden absolute top-[55vh] left-0 w-10/12 md:w-1/2 max-w-[500px] z-10 hidden rounded-br-lg">
            <nav class="flex items-center justify-start mx-auto">
                <div class="nav-links mt-0 text-white bg-theme-blue min-h-[35vh] pb-8 w-full left-0 flex flex-col items-start rounded-br-lg">
                    <ul class="flex flex-col gap-8 text-md font-bold ml-8 mt-6">
                        
                        <li class="mobile-exp-link w-auto h-full  {{ Route::is('dearo.pb.*')? 'border-b-[1px]':'' }} border-white" onclick="showExpandableMobileMenu('mobile-exp-menu-pb',this);">
                            <div class="px-4">Personal Financial Services</div>
                        </li>
                        <li class="mobile-exp-link w-auto h-full  {{ Route::is('dearo.bb.*')? 'border-b-[1px]':'' }} border-white" onclick="showExpandableMobileMenu('mobile-exp-menu-bb',this);">
                            <div class="px-4">Business Financial Services</div>
                        </li>
                        <!-- <li class="mobile-exp-link w-auto h-full  {{ Route::is('dearo.loan.*')? 'border-b-[1px]':'' }} border-white" onclick="showExpandableMobileMenu('mobile-exp-menu-loans',this);">
                            <div class="px-4">Loans</div>
                        </li> -->
                        <li class="mobile-exp-link w-auto h-full  {{ Route::is('dearo.loan.*')? 'border-b-[1px]':'' }} border-white" >
                            <a href="{{ route('inquiry.product.listing.load') }}">
                                <div class="px-4">Need Facility</div>
                            </a>
                        </li>
                        <!-- <li class="mobile-exp-link w-auto h-full  {{ Route::is('dearo.inv.*')? 'border-b-[1px]':'' }} border-white" onclick="showExpandableMobileMenu('mobile-exp-menu-inv',this);">
                            <div class="px-4">Financial & Investment Services</div>
                        </li> -->
                        <li class="mobile-exp-link w-auto h-full  {{ Route::is('dearo.holdings')? 'border-b-[1px]':'' }} border-white" onclick="showExpandableMobileMenu('mobile-exp-menu-group',this);">
                            <div class="px-4">Dearo Group of Companies</div>
                        </li>
                    </ul>

                    <!-- ### Mobile Sub Menus ### -->
                    <!-- Personal Banking -->
                    <div id="mobile-exp-menu-pb" class="hidden">
                        <div class="w-full h-auto flex flex-wrap gap-y-4 gap-x-1 px-4 mt-6">
                            <a href="{{ route('dearo.loan.personal') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Personal Loans</button></a>
                            <a href="{{ route('dearo.pb.loan.auto') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Auto Loans</button></a>
                            <a href="{{ route('dearo.pb.hire.purchase') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Hire Purchase</button></a>
                            <a href="{{ route('dearo.loan.housing') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Housing Loans</button></a>
                            <a href="{{ route('dearo.loan.renovations') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Renovation Loans</button></a>
                            <!-- <a href="{{ route('dearo.pb.personal.investments') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Personal Investments</button></a>
                            <a href="{{ route('dearo.pb.daily.investments') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Daily Investments</button></a>
                            <a href="{{ route('dearo.pb.shortterm.investments') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Short Term Investments</button></a>
                            <a href="{{ route('dearo.pb.longterm.investments') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Long Term Investments</button></a>
                            <a href="{{ route('dearo.pb.child.investments') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Child Future Investments</button></a> -->
                            <button class="px-2 py-1 text-sm text-theme-gray bg-theme-orange-lite rounded-md" onclick="closeMobileSubMenu('mobile-exp-menu-pb');">Back</button>
                        </div>
                    </div>
                    
                    <!-- Business Banking -->
                    <div id="mobile-exp-menu-bb" class="hidden">
                        <div class="w-full h-auto flex flex-wrap gap-y-4 gap-x-1 px-4 mt-6">
                            <a href="{{ route('dearo.bb.joint.venture.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Joint Venture Loans</button></a>
                            <a href="{{ route('dearo.bb.mortgage.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Mortgage Loans</button></a>
                            <a href="{{ route('dearo.bb.project.financing.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Project Financing Loans</button></a>
                            <a href="{{ route('dearo.bb.sme.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">SME Loans</button></a>
                            <a href="{{ route('dearo.bb.msme.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">MSME Loans</button></a>
                            <a href="{{ route('dearo.bb.shortterm.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Short Term Loans</button></a>
                            <a href="{{ route('dearo.bb.longterm.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Long Term Loans</button></a>
                            <a href="{{ route('dearo.bb.daily.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Daily Loans</button></a>
                            <a href="{{ route('dearo.bb.bulk.gold.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Bulk Gold Loans</button></a>
                            <a href="{{ route('dearo.bb.auto.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Auto Loans</button></a>
                            <a href="{{ route('dearo.bb.hire.purchase.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Hire Purchase</button></a>
                            <a href="{{ route('dearo.bb.factory.facility.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Factoring Facility</button></a>
                            <a href="{{ route('dearo.bb.working.capital.loan') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Working Capital Loan</button></a>
                            <button class="px-2 py-1 text-sm text-theme-gray bg-theme-orange-lite rounded-md" onclick="closeMobileSubMenu('mobile-exp-menu-bb');">Back</button>
                        </div>
                    </div>

                    <!-- Loans -->
                    <div id="mobile-exp-menu-loans" class="hidden">
                        <div class="w-full h-auto flex flex-wrap gap-y-4 gap-x-1 px-4 mt-6">
                            <a href="{{ route('dearo.loan.gold') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Gold Loans</button></a>
                            <a href="{{ route('dearo.loan.personal') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Personal Loans</button></a>
                            <a href="{{ route('dearo.loan.housing') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Housing Loans</button></a>
                            <a href="{{ route('dearo.loan.educational') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Education Loans</button></a>
                            <a href="{{ route('dearo.loan.auto') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Auto Loans</button></a>
                            <a href="{{ route('dearo.loan.hire.purchase') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Hire Purchase</button></a>
                            <button class="px-2 py-1 text-sm text-theme-gray bg-theme-orange-lite rounded-md" onclick="closeMobileSubMenu('mobile-exp-menu-loans');">Back</button>
                        </div>
                    </div>

                    <!-- Investments -->
                    <div id="mobile-exp-menu-inv" class="hidden">
                        <div class="w-full h-auto flex flex-wrap gap-y-4 gap-x-1 px-4 mt-6">
                            <!-- <a href=" route('dearo.inv.mega.waasi') "><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Mega Wasi</button></a>
                            <a href=" route('dearo.inv.yasa.isuru') "><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Yasa Isuru</button></a>
                            <a href=" route('dearo.inv.general.investment') "><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">General Investment</button></a>
                            <a href=" route('dearo.inv.education.investment') "><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Education Investment</button></a> -->
                            <a href="{{ route('dearo.inv.asset.pledge.investment') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Asset Pledge Investment</button></a>
                            <button class="px-2 py-1 text-sm text-theme-gray bg-theme-orange-lite rounded-md" onclick="closeMobileSubMenu('mobile-exp-menu-inv');">Back</button>
                        </div>
                    </div>

                    <!-- Subsidiaries -->
                    <div id="mobile-exp-menu-group" class="hidden">
                        <div class="w-full h-auto flex flex-wrap gap-y-4 gap-x-1 px-4 mt-6">
                            <a href="{{ route('dearo.group.audit') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Dearo Audit & Financial Services</button></a>
                            <a href="{{ route('dearo.group.it') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Dearo IT solutions</button></a>
                            <a href="{{ route('dearo.group.education') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Dearo Education</button></a>
                            <a href="{{ route('dearo.group.campus') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">DCBT Campus</button></a>
                            <a href="{{ route('dearo.group.food') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Dearo Food Products</button></a>
                            <a href="{{ route('dearo.group.markting.distribution') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Dearo Marketing & Distribution</button></a>
                            <a href="{{ route('dearo.group.investment.ltd') }}"><button class="px-2 py-1 text-sm text-theme-gray bg-theme-blue-lite rounded-md">Dearo Investment</button></a>
                            <button class="px-2 py-1 text-sm text-theme-gray bg-theme-orange-lite rounded-md" onclick="closeMobileSubMenu('mobile-exp-menu-group');">Back</button>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        
        <!-- ### Sub Menus ### -->
        <!-- Personal Banking -->
        <div id="expanding-menu-personal-banking" class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 absolute top-24 left-1/2 transform -translate-x-1/2 z-20 hidden" onmouseleave="hideExpandableMenus();">
            <div class="w-full h-auto bg-slate-300 rounded-b-lg z-20">
                <hr class="w-full border-2 border-theme-orange">
                <div class="py-4 px-4 flex">
                    <div class="w-auto min-w-60 h-auto border-r-[1px] border-r-theme-blue py-2 px-2">
                        <ul class="text-md text-theme-blue mr-8">
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.personal') }}">Personal Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.pb.loan.auto') }}">Auto Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.pb.hire.purchase') }}">Hire Purchase</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.housing') }}">Housing Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.renovations') }}">Renovation Loans</a></li>
                            <!-- <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.pb.personal.investments') }}">Personal Investments</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.pb.daily.investments') }}">Daily Investments</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.pb.shortterm.investments') }}">Short Term Investments</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.pb.longterm.investments') }}">Long Term Investments</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.pb.child.investments') }}">Child Futute Investments</a></li> -->
                        </ul>
                    </div>
                    <div class="w-2/3 h-auto px-8 py-2 text-md text-theme-gray">
                        <p class="font-semibold">Personal Banking</p>
                        <p class="mt-4 font-normal">Dearo Personal Investments Plan will help secure your future needs. With an attractive guaranteed interest rate on your investment and a free life insurance cover up to Rs. 2 million*.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Business Banking -->
        <div id="expanding-menu-business-banking" class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 absolute top-24 left-1/2 transform -translate-x-1/2 z-20 hidden" onmouseleave="hideExpandableMenus();">
            <div class="w-full h-auto bg-slate-300 rounded-b-lg z-20">
                <hr class="w-full border-2 border-theme-orange">
                <div class="py-4 px-4 flex">
                    <div class="w-auto min-w-60 h-auto border-r-[1px] border-r-theme-blue py-2 px-2">
                        <ul class="text-md text-theme-blue mr-8">
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.joint.venture.loan') }}">Joint Venture Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.mortgage.loan') }}">Mortgage Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.project.financing.loan') }}">Project Financing Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.sme.loan') }}">SME Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.msme.loan') }}">MSME Loans</a></li>
                            <!-- <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.sms.finance') }}">SMS Finance</a></li> -->
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.msme.finance') }}">MSME Finance</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.shortterm.loan') }}">Short Term Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.longterm.loan') }}">Long Term Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.daily.loan') }}">Daily Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.bulk.gold.loan') }}">Bulk Gold Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.auto.loan') }}">Auto Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.hire.purchase.loan') }}">Hire Purchase</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.factory.facility.loan') }}">Factoring Facility</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.bb.working.capital.loan') }}">Working Capital Loan</a></li>
                        </ul>
                    </div>
                    <div class="w-2/3 h-auto px-8 py-2 text-md text-theme-gray">
                        <p class="font-semibold">Business Banking</p>
                        <p class="mt-4 font-normal">Dearo Personal Investments Plan will help secure your future needs. With an attractive guaranteed interest rate on your investment and a free life insurance cover up to Rs. 2 million*.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Loans -->
        <div id="expanding-menu-loans" class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 absolute top-24 left-1/2 transform -translate-x-1/2 z-20 hidden" onmouseleave="hideExpandableMenus();">
            <div class="w-full h-auto bg-slate-300 rounded-b-lg z-20">
                <hr class="w-full border-2 border-theme-orange">
                <div class="py-4 px-4 flex">
                    <div class="w-auto min-w-60 h-auto border-r-[1px] border-r-theme-blue py-2 px-2">
                        <ul class="text-md text-theme-blue mr-8">
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.gold') }}">Gold Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.personal') }}">Personal Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.housing') }}">Housing Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.educational') }}">Education Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.auto') }}">Auto Loans</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.loan.hire.purchase') }}">Hire Purchase</a></li>
                        </ul>
                    </div>
                    <div class="w-2/3 h-auto px-8 py-2 text-md text-theme-gray">
                        <p class="font-semibold">Dearo Loans</p>
                        <p class="mt-4 font-normal">Dearo Personal Investments Plan will help secure your future needs. With an attractive guaranteed interest rate on your investment and a free life insurance cover up to Rs. 2 million*.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Investments -->
        <div id="expanding-menu-investments" class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 absolute top-24 left-1/2 transform -translate-x-1/2 z-20 hidden" onmouseleave="hideExpandableMenus();">
            <div class="w-full h-auto bg-slate-300 rounded-b-lg z-20">
                <hr class="w-full border-2 border-theme-orange">
                <div class="py-4 px-4 flex">
                    <div class="w-auto min-w-60 h-auto border-r-[1px] border-r-theme-blue py-2 px-2">
                        <ul class="text-md text-theme-blue mr-8">
                            <!-- <li class="py-2 hover:font-semibold"><a href="route('dearo.inv.mega.waasi')">Mega Wasi Investment Plan</a></li>
                            <li class="py-2 hover:font-semibold"><a href="route('dearo.inv.yasa.isuru')">Yasa Isuru Investment Plan</a></li>
                            <li class="py-2 hover:font-semibold"><a href="route('dearo.inv.general.investment')">General Investment Plan</a></li>
                            <li class="py-2 hover:font-semibold"><a href="route('dearo.inv.education.investment')">Education Investment Plan</a></li> -->
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.inv.asset.pledge.investment') }}">Asset Pledge Investment plans</a></li>
                        </ul>
                    </div>
                    <div class="w-2/3 h-auto px-8 py-2 text-md text-theme-gray">
                        <p class="font-semibold">Investments</p>
                        <p class="mt-4 font-normal">Investments Plan will help secure your future needs. With an attractive guaranteed interest rate on your investment and a free life insurance cover up to Rs. 2 million*.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subsidiaries -->
        <div id="expanding-menu-subsidiaries" class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 absolute top-24 left-1/2 transform -translate-x-1/2 z-20 hidden" onmouseleave="hideExpandableMenus();">
            <div class="w-full h-auto bg-slate-300 rounded-b-lg z-20">
                <hr class="w-full border-2 border-theme-orange">
                <div class="py-4 px-4 flex">
                    <div class="w-auto min-w-60 h-auto border-r-[1px] border-r-theme-blue py-2 px-2">
                        <ul class="text-md text-theme-blue mr-8">
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.group.audit') }}">Dearo Audit & Financial Services</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.group.it') }}">Dearo IT solutions</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.group.education') }}">Dearo Education</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.group.campus') }}">DCBT Campus</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.group.food') }}">Dearo Food Products</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.group.markting.distribution') }}">Dearo Marketing & Distribution</a></li>
                            <li class="py-2 hover:font-semibold"><a href="{{ route('dearo.group.investment.ltd') }}">Dearo Investment Limited</a></li>
                        </ul>
                    </div>
                    <div class="w-2/3 h-auto px-8 py-2 text-md text-theme-gray">
                        <p class="font-semibold">Dearo Group of Companies</p>
                        <p class="mt-4 font-normal">Investments Plan will help secure your future needs. With an attractive guaranteed interest rate on your investment and a free life insurance cover up to Rs. 2 million*.</p>
                    </div>
                </div>
            </div>
        </div>

    </header>