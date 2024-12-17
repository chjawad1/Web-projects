<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Panel</h1>
    <a href="{{ route('admin.items') }}">Manage Items</a>
    <section class="statistics-section">
    <h2 class="text-center">Admin Statistics</h2>
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Items</h3>
            <p>{{ $totalItems }}</p>
        </div>
        <div class="stat-card">
            <h3>Lost Items</h3>
            <p>{{ $lostItems }}</p>
        </div>
        <div class="stat-card">
            <h3>Found Items</h3>
            <p>{{ $foundItems }}</p>
        </div>
        <div class="stat-card">
            <h3>Resolved Items</h3>
            <p>{{ $resolvedItems }}</p>
        </div>
    </div>
</section>

</body>

</html>
