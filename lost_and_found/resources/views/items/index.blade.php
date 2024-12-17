<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Reported Items</h1>
        <div class="row">
            @forelse($items as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="Item Image">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" class="card-img-top" alt="No Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p><strong>Category:</strong> {{ ucfirst($item->category) }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($item->status) }}</p>
                            <p><strong>Contact:</strong> {{ $item->contact }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">No items found.</p>
                </div>
            @endforelse
        </div>

        <div class="pagination justify-content-center">
            {{ $items->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
