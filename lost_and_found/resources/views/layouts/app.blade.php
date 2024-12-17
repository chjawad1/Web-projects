<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lost and Found')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="bg-success text-white text-center py-4">
        <h1>Lost and Found Management System</h1>
        <nav>
            <a href="/" >Home</a>
            <a href="/report-lost" >Report Lost Item</a>
            <a href="/report-found" >Report Found Item</a>
            <a href="/items" >View Items</a>
            <a href="/admin" >Admin Panel</a>
        </nav>
    </header>
    <main class="container mt-4">
        @yield('content') <!-- Content section -->
    </main>
    <footer class="bg-success text-white text-center py-3 mt-4">
        <p>&copy; 2024 Lost and Found System | <a href="/faq" class="text-white">FAQs</a> | <a href="/privacy" class="text-white">Privacy Policy</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
