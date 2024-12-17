<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Lost and Found System</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/report-lost">Report Lost Item</a>
            <a href="/report-found">Report Found Item</a>
            <a href="/items">View Items</a>
            <a href="/admin">Admin Login</a>
        </nav>
    </header>
    <main>
        <div class="welcome-section">
            <h2>Welcome to the Lost and Found System</h2>
            <p>Helping you reconnect with your lost belongings.</p>
            <div class="main-buttons">
                <a href="/report-lost" class="btn">Report Lost Item</a>
                <a href="/report-found" class="btn">Report Found Item</a>
            </div>
        </div>
        <div class="search-bar">
    <form action="/" method="GET" class="form-inline">
        <input type="text" name="search" placeholder="Search for items..." class="form-control">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

        <section class="recent-items">
    <h3>Recently Reported Items</h3>
    <div class="items-grid">
        @foreach($items as $item)
            <div class="item">
                <!-- Display the item's image if it exists -->
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Item Image">
                @else
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image">
                @endif
                <p><strong>{{ $item->name }}</strong></p>
                <p>{{ $item->description }}</p>
                <p><strong>Category:</strong> {{ ucfirst($item->category) }}</p>
                <p><strong>Contact:</strong> {{ $item->contact }}</p>
                <p><strong>Status:</strong> {{ ucfirst($item->status) }}</p>
            </div>
        @endforeach
    </div>


    <!-- Pagination links -->
    <div class="pagination">
        {{ $items->links() }}
    </div>
</section>
<section class="statistics-section">
    <h2 class="text-center">Statistics</h2>
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

<h1>Admin Contact</h1>
<p>admin123@example.com</p>


    </main>
    <footer>
        <p>&copy; 2024 Lost and Found System | <a href="/faq">FAQs</a> | <a href="/privacy">Privacy Policy</a></p>
    </footer>
</body>
</html>
