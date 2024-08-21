<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Permintaan Barang - Yayasan Kesehatan</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">

    <div class="relative flex flex-col justify-center items-center w-full max-w-4xl p-6 lg:p-8 space-y-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <!-- Authentication Links -->
        @if (Route::has('login'))
        <div class="absolute top-0 right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors duration-300">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="bg-green-500 font-semibold  text-white px-6 py-3 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors duration-300">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class=" bg-green-500 ml-4 font-semibold text-white px-6 py-3 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors duration-300">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="flex flex-col items-center space-y-4">
            <!-- Logo/Illustration -->
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-32 w-auto text-green-600 dark:text-green-400">
                <!-- Replace with a relevant logo or illustration -->
                <path d="M32 0C14.3274 0 0 14.3274 0 32C0 49.6726 14.3274 64 32 64C49.6726 64 64 49.6726 64 32C64 14.3274 49.6726 0 32 0ZM32 58C16.268 58 4 45.732 4 32C4 18.268 16.268 6 32 6C47.732 6 60 18.268 60 32C60 45.732 47.732 58 32 58ZM40 30H24V24H40V30ZM40 36H24V42H40V36ZM20 48H44V42H20V48ZM44 30H40V24H44V30ZM40 12H24V18H40V12Z" fill="currentColor" />
            </svg>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100">Selamat Datang di Sistem Permintaan Barang</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 text-center"></p>

        </div>
    </div>
</body>

</html>
