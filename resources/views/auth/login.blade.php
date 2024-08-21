<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 min-h-screen flex">

    <div class="relative flex w-full min-h-screen">
        <!-- Left Background Column -->
        <div class="lg:flex flex-1 items-center justify-center bg-cover bg-center" style="background-image: url('/img/ccc.png')">
            <div class="text-teal-500 text-center mx-6">
                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-24 w-auto mx-auto mb-4">
                    <path d="M32 0C14.3274 0 0 14.3274 0 32C0 49.6726 14.3274 64 32 64C49.6726 64 64 49.6726 64 32C64 14.3274 49.6726 0 32 0ZM32 58C16.268 58 3 45.732 3 32C3 18.268 16.268 6 32 6C47.732 6 60 18.268 60 32C60 45.732 47.732 58 32 58ZM40 30H24V24H40V30ZM40 36H24V42H40V36ZM20 48H44V42H20V48ZM44 30H40V24H44V30ZM40 12H24V18H40V12Z" fill="currentColor" />
                </svg>
                <h1 class="text-3xl font-bold">Sistem Permintaan Barang</h1>
                <p class="mt-2">Kelola permintaan barang dengan mudah dan efisien.</p>
            </div>
        </div>

        <!-- Right Column with Login Form -->
        <div class="bg-white flex-1 flex items-center justify-center p-6 lg:p-12">
            <div class="w-full max-w-md p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <!-- Icon Row -->
                <div class="flex justify-center mb-6 space-x-4">
                    <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-8 w-auto">
                            <path d="M12 1.5C5.855 1.5 1 6.355 1 12C1 17.645 5.855 22.5 12 22.5C18.145 22.5 23 17.645 23 12C23 6.355 18.145 1.5 12 1.5ZM12 21C6.763 21 3 17.237 3 12S6.763 3 12 3 21 6.763 21 12 17.237 21 12 21ZM13.6 11H10.4V14H13.6V11ZM13.6 8H10.4V9.6H13.6V8ZM12 5C10.343 5 9 6.343 9 8C9 9.657 10.343 11 12 11C13.657 11 15 9.657 15 8C15 6.343 13.657 5 12 5ZM12 10C11.447 10 11 9.553 11 9C11 8.447 11.447 8 12 8C12.553 8 13 8.447 13 9C13 9.553 12.553 10 12 10Z" fill="currentColor" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-8 w-auto">
                            <path d="M12 1C5.924 1 1 5.924 1 12S5.924 23 12 23 23 18.076 23 12 18.076 1 12 1ZM12 20.437C8.579 20.437 5.563 17.421 5.563 14H8.563C8.563 15.711 10.259 17.406 12 17.406C13.741 17.406 15.437 15.711 15.437 14H18.438C18.438 17.421 15.421 20.437 12 20.437ZM8.563 11.438C7.508 11.438 6.563 10.493 6.563 9.438C6.563 8.382 7.508 7.438 8.563 7.438C9.619 7.438 10.563 8.382 10.563 9.438C10.563 10.493 9.619 11.438 8.563 11.438ZM12 12.438C10.732 12.438 9.563 11.269 9.563 10C9.563 8.732 10.732 7.563 12 7.563C13.269 7.563 14.438 8.732 14.438 10C14.438 11.269 13.269 12.438 12 12.438Z" fill="currentColor" />
                        </svg>
                    </a>
                </div>

                <!-- Login Form -->
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Login</h1>

                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input id="email" name="email" type="email" required autofocus class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input id="password" name="password" type="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" />
                    </div>

                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Forgot your password?</a>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600">Log in</button>
                </form>

                <p class="mt-6 text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Register</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
