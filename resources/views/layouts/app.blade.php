<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Roster App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav style="padding: 1rem; background: #f3f4f6;">
        <strong>Roster App</strong>
    </nav>

    <main style="padding: 1rem;">
        @yield('content')
    </main>
</body>
</html>
