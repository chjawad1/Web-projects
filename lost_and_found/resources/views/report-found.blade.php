<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Found Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="bg-info text-white text-center py-4">
        <h1>Lost and Found System</h1>
        <nav>
            <a href="/" class="btn_nav">Home</a>
            <a href="/report-lost" class="btn_nav" >Report Lost Item</a>
            <a href="/report-found" class="btn_nav">Report Found Item</a>
            <a href="/items" class="btn_nav">View Items</a>
            <a href="/admin" class="btn_nav">Admin Login</a>
        </nav>
    </header>
    <main class="container mt-5">
        <h2 class="text-center mb-4">Report a Found Item</h2>
        <form action="{{ route('items.storeFound') }}" method="POST" enctype="multipart/form-data" 
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Item Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter item name" required>
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Describe the item" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <input type="text" id="category" name="category" class="form-control" placeholder="Enter category" required>
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>
            <div class="col-md-6">
                <label for="contact" class="form-label">Contact Information</label>
                <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter email or phone" required>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-info px-5">Submit</button>
                <a href="/" class="btn btn-secondary px-5">Cancel</a>
            </div>
        </form>
    </main>
    <footer class="bg-info text-white text-center py-3 mt-5">
        <p>&copy; 2024 Lost and Found System | <a href="/faq" class="text-white">FAQs</a> | <a href="/privacy" class="text-white">Privacy Policy</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
