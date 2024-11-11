<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- component -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .login_img_section {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)),
            url("{{asset('assets/img/ynb.jpg')}}") center center;
            background-repeat: no-repeat;
            /* background-color: rgba(0, 0, 0, .7); */
            background-size: cover;
        }
    </style>

    <div class="h-screen flex">
        <div class="hidden lg:flex w-full lg:w-1/2 login_img_section
          justify-around items-center">
            <div
                class=" 
                  bg-black 
                  opacity-20 
                  inset-0 
                  z-0">

            </div>
            <div class="p-2 flex-col space-y-6 text-white">
                <h1 class=" font-bold text-9xl shadow-sm text-white font-sans hover:underline cursor-pointer hover:-translate-y-1 transition-all duration-500">
                    <a href="{{ url('/')}}">AICI</a>
                </h1>
                <span>Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Pariatur, aliquid.</span>
            </div>
        </div>
        <div class="flex w-full md:w-54 lg:w-1/2 justify-center items-center bg-white space-y-8">
            <div class="w-full px-8 md:px-32 lg:px-24">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="bg-white rounded-md shadow-xl p-5 ">
                    @csrf
                    <!-- <form class="bg-white rounded-md shadow-2xl p-5"> -->
                    <h1 class="text-gray-600 font-bold text-2xl mb-2">LOGIN </h1>
                    <!-- <p class="text-sm font-normal text-gray-600 mb-8">ASLY Student Portal</p> -->
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <x-primary-button class="block bg-indigo-600 mt-5 py-2 rounded-2xl hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">
                        {{ __('Log in') }}
                    </x-primary-button>
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif


                    </div>

                </form>
            </div>

        </div>
    </div>
</body>

</html>