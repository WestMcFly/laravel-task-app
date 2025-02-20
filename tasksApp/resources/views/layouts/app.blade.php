<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel Task App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4">
        <!-- Navbar content -->
        <h1 class="text-xl font-bold">My Task App</h1>
    </nav>
    <main class="p-4">
        @yield('content')
    </main>
</body>
</html>
