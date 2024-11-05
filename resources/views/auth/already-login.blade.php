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
    <div class="h-screen mx-auto my-auto">
        <div class=" text-center border rounded m-5 lg:mx-52 p-10 ">
            <div class="flex justify-center  p-4 mx-auto">
                <img src="{{ asset('asly-logo-nbg.png')}}" class="h-auto w-auto" alt="">
            </div>
            <h1 class=" text-3xl">You are already logged in</h1>
            <p class="text-md text-gray-400 my-2">Do you want to log out?</p>
            <div class="mt-2 lg:my-5">
            {{-- Check the user's usertype and redirect accordingly --}}
            @if (Auth::user()->usertype === 'admin')
            <a href="{{ route('admin.index') }}" class=" underline ">Go to Admin Dashboard<span aria-hidden="true">&rarr;</span></a>
            @elseif (Auth::user()->usertype === 'student')
            <a href="{{ route('dashboard') }}" class=" underline ">Go to Student Dashboard<span aria-hidden="true">&rarr;</span></a>
            @else
            <a href="{{ route('dashboard') }}" class=" underline ">Go to Dashboard<span aria-hidden="true">&rarr;</span></a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class=" bg-red-600 hover:bg-red-500 text-white
                py-2 px-4 rounded m-2">Logout</button>
            </form>
            </div>
        </div>
    </div>
</body>

</html>