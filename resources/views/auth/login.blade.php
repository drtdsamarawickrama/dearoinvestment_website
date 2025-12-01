<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo Login</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto px-4">
        <div class="mt-20 w-full sm:w-1/2 lg:w-1/3 bg-theme-blue-lite rounded-lg px-4 md:px-8 pt-6 pb-2 mx-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Login Identifier Address -->
                <div>
                    <x-input-label for="identifier" :value="__('Email or Mobile Number')" />
                    <input id="identifier" type="text" name="identifier" :value="old('identifier')" required autofocus autocomplete="username" class="mt-1 border-theme-gray-lite w-full" />
                    <x-input-error :messages="$errors->get('identifier')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <input id="password" class="mt-1 border-theme-gray-lite w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button class="bg-theme-blue text-white font-bold px-4 py-2 ml-4">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>
