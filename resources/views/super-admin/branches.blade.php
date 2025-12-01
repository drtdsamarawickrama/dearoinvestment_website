<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Branches | Dearo Super Admin</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-admin')

    <!-- Branches - Heading -->
    <div class="w-full py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">Branch Management</p>
            <p class="text-2xl text-theme-orange font-bold mt-2">Dearo Super Admin</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10 mb-auto">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                @if(isset($branches))
                    @foreach($branches as $branch)
                        <a href="{{ route('admin.branches.branch.dashboard.load',['branch_id' => $branch->id]) }}">
                            <div class="w-full bg-theme-blue-lite py-3 px-4">
                                <h3 class="text-theme-blue text-md font-medium">{{ $branch->branch_name }}</h3>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Cerate a new branch -->
    <div class="w-full bg-theme-blue-lite py-6">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <p class="text-theme-blue text-2xl font-bold">Create a New Branch</p>
        </div>
    </div>

    <div class="w-full py-6 lg:py-10">
        <div class="w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
            <form id="form-branch-create" action="{{ route('admin.branch.create') }}" method="POST" class="m-0 p-0">
                @csrf
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3">
                    <div id="div_vehicle_registered_number" class="w-full text-sm">
                        <label for="branch_name" class="text-theme-gray">Branch Name <span class="text-theme-red">*</span></label>
                        <input type="text" id="branch_name" name="branch_name" placeholder="Enter branch name" class="h-10 mt-1 border-theme-gray text-md w-full" value="" />
                    </div>
                </div>
                <div class="w-full flex flex-wrap gap-4 mt-4">
                    @php
                        $districts = App\Models\District::all();
                    @endphp
                    @foreach ($districts as $district)
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="districts[]" value="{{ $district->id }}"/>
                            <p class="text-theme-gray">{{ $district->district_name }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="w-full flex justify-start mt-4 items-center">
                    <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Create Branch</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-customer')

    @vite(['resources/js/app.js','resources/js/customer-inquiry.js', 'resources/js/customer-inquiry-fd.js'])
</body>
</html>