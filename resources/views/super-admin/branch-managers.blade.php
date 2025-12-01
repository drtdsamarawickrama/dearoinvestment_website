<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Branch Managers | Dearo Super Admin</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-admin')

    <!-- Mangers - Heading -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Branch Managers</p>
            <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Super Admin</p>
        </div>
    </div>

    <!-- Table - New Inquiries -->
    <div class="w-full py-5 mb-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <!-- Search Bar -->
            <div class="w-full flex justify-end">
                <input type="text" class="w-3/4 sm:w-2/5 md:w-2/5 max-w-[300px] border-0 border-b-[1px] border-b-theme-blue text-theme-blue focus:border-0 focus:border-b-[1px] focus:ring-0" placeholder="Search Here" />
            </div>

            <div class="w-full h-auto mt-5 overflow-scroll">
                <table class="w-full">
                    <thead class="h-12 bg-theme-blue-lite px-4 py-[10px]  text-left text-theme-blue text-md font-bold">
                        <th class="pl-4 pr-2 whitespace-nowrap">System Id</th>
                        <th class="pr-2 whitespace-nowrap">Name</th>
                        <th class="pr-2 whitespace-nowrap">Branch</th>
                        <th class="pr-2 whitespace-nowrap">Phone</th>
                        <th class="pr-2 whitespace-nowrap">Email</th>
                        <th class="pr-4 whitespace-nowrap">Action</th>
                    </thead>
                    <tbody class="w-full text-left text-theme-gray text-md font-normal">
                        @if(isset($managers))
                            @foreach($managers as $manager)
                            @php 
                                $user = App\Models\User::find($manager->user_id);
                                $branch = App\Models\Branch::find($manager->branch_id);
                            @endphp
                            <tr class="align-middle h-12 py-[10px] border-b-[1px] border-b-theme-blue text-left">
                                <td class="pl-4 pr-2">{{ $manager->id }}</td>
                                <td class="pr-2">{{ $manager->manager_name }}</td>
                                <td class="pr-2">{{ $branch->branch_name }}</td>
                                <td class="pr-2">{{ $user->mobile }}</td>
                                <td class="pr-2">{{ $user->email }}</td>
                                <td class="pr-4">
                                    <div class="flex gap-6 items-center">
                                        <!-- <a href="#">
                                            <img src="{{ url('/assets/img/inquiry/icon-admin-view-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                        </a>
                                        <button>
                                            <img src="{{ url('/assets/img/inquiry/icon-admin-menu-blue.svg') }}" alt="" class="w-7 h-7 object-contain">
                                        </button> -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Page Navigation -->
            <div class="w-full flex justify-end items-center gap-4 mt-10">
                
            </div>
        </div>
    </div>

    <!-- Cerate a new manager -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Create New Manager</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <form id="form-branch-manager-create" action="{{ route('admin.branch.manager.create') }}" method="POST" class="m-0 p-0">
                @csrf
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3">
                    <div class="w-full text-sm">
                        <label for="manager_name" class="text-theme-gray">Manager Name <span class="text-theme-red">*</span></label>
                        <input type="text" id="manager_name" name="manager_name" placeholder="Enter name of the manager" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="branch_select" class="text-theme-gray">Branch <span class="text-theme-red">*</span></label>
                        <select name="branch_id" id="branch_select" class="h-10 mt-1 border-theme-gray text-md w-full" require>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full text-sm">
                        <label for="mobile_number" class="text-theme-gray">Mobile Number <span class="text-theme-red">*</span></label>
                        <input type="text" id="mobile_number" name="mobile_number" placeholder="Enter mobile number in 10 digits" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="email" class="text-theme-gray">Email <span class="text-theme-red">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Enter email" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="password" class="text-theme-gray">Password <span class="text-theme-red">*</span></label>
                        <input type="password" id="password" name="password" placeholder="Enter password" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                </div>
                <div class="w-full flex justify-start mt-4 items-center">
                    <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Create Manager</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-fd.js'])
</body>
</html>