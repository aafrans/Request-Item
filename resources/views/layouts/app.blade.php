<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</body>

</html>
