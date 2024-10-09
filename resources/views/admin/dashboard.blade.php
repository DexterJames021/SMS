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

<body class="antialiased min-h-screen lg:flex" x-data="{open: false}">
  <!-- sidebar -->
  <nav
    class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-10 w-80 h-full bg-indigo-900 text-white h-screen p-3"
    :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': open === false}">
    <div class="flex justify-between">
      <span class="font-bold text-2xl sm:text-3xl p-2">ASLY</span>
      <button
        class="p-2 focus:outline-none focus:bg-indigo-800 hover:bg-indigo-800 rounded-md lg:hidden"
        @click="open = false">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M15 19l-7-7 7-7" />
        </svg>
      </button>
    </div>
    <ul class="mt-8">
      <li>
          <x-nav-link :href="route('student.index')" :active="request()->routeIs('student.index')">
            Dashboard
          </x-nav-link>
      </li>
      <li>
          <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
            Dashboard
          </x-nav-link>
      </li>
      <li>
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            Dashboard
          </x-nav-link>
      </li>
    </ul>
  </nav>
  <div class="relative z-0 lg:flex-grow">

    <main>
      <x-app-layout>
        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
          </h2>
        </x-slot>

        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                @yield('main')
              </div>
            </div>
          </div>
        </div>
      </x-app-layout>
    </main>

  </div>
</body>

</html>
