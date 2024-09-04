<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROCEREMENT-YAKES</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-gray-300">
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <main class="p-6 sm:ml-64">
        @yield('content')
    </main>
</body>

</html>
