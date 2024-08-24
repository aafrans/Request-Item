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
        <div class="lg:flex flex-1 items-center justify-center bg-cover bg-center"
            style="background-image: url('/img/ccc.png')">
            <div class="text-teal-500 text-center mx-6">
                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-24 w-auto mx-auto mb-4">
                    <path
                        d="M32 0C14.3274 0 0 14.3274 0 32C0 49.6726 14.3274 64 32 64C49.6726 64 64 49.6726 64 32C64 14.3274 49.6726 0 32 0ZM32 58C16.268 58 3 45.732 3 32C3 18.268 16.268 6 32 6C47.732 6 60 18.268 60 32C60 45.732 47.732 58 32 58ZM40 30H24V24H40V30ZM40 36H24V42H40V36ZM20 48H44V42H20V48ZM44 30H40V24H44V30ZM40 12H24V18H40V12Z"
                        fill="currentColor" />
                </svg>
                <h1 class="text-3xl font-bold">Sistem Permintaan Barang</h1>
                <p class="mt-2">Kelola permintaan barang dengan mudah dan efisien.</p>
            </div>
        </div>

        <!-- Right Column with Login Form -->
        <div class="bg-white flex-1 flex items-center justify-center p-6 lg:p-12">
            <div class="w-full max-w-md p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <!-- Login Form -->
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Login</h1>

                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf
                    <div class="mb-4">
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input id="email" name="email" type="email" autofocus
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" />
                        @error('email')
                            <p class="text-red-600 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input id="password" name="password" type="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" />
                        @error('password')
                            <p class="text-red-600 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember_me"
                                class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Forgot
                            your password?</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600">Log
                        in</button>
                </form>

                <p class="mt-6 text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account? <a href="{{ route('register') }}"
                        class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Register</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
