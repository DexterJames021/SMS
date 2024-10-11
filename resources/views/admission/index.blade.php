<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>


  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

 
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

requirement
<a href="{{ url('admission/create')}}">admission form</a>
</body>

</html> -->
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
<!-- component -->
<div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
    <div class="container mx-auto p-4">
        <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Personal Information</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Use a permanent address where you can receive mail.</p>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" placeholder="First name" class="border p-2 rounded w-full">
                    <input type="text" placeholder="Last name" class="border p-2 rounded w-full">
                </div>
                <div class="mb-4">
                    <input type="email" placeholder="Email address" class="border p-2 rounded w-full">
                </div>
                <div class="mb-4">
                    <select class="border p-2 rounded w-full">
                        <option>United States</option>
                        <!-- Add more countries as needed -->
                    </select>
                </div>
                <div class="mb-4">
                    <input type="text" placeholder="Street address" class="border p-2 rounded w-full">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <input type="text" placeholder="City" class="border p-2 rounded w-full">
                    <input type="text" placeholder="State / Province" class="border p-2 rounded w-full">
                    <input type="text" placeholder="ZIP / Postal code" class="border p-2 rounded w-full">
                </div>
                <button type="button" id="theme-toggle" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                    Toggle Theme
                </button>
            </form>
        </div>
    </div>

</div>

</body>

</html>