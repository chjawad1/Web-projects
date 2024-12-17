<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="{{ route('admin.manage-items') }}" class="btn btn-primary">Manage Items</a>
            <a href="{{ route('admin.items.create') }}" class="btn btn-primary mb-3">Add New Item</a>

        
            <a href="{{ route('admin.statistics') }}" class="btn btn-info">View Statistics</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button class="btn btn-warning">Logout</button>
            </form>
        </nav>

        <!-- Recently Reported Lost Items -->
        <h2>Recently Reported Lost Items</h2>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Contact</th>
                    <th>Reported At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lostItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->contact }}</td>
                        <td>{{ $item->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <!-- Resolve Button -->
                            <form action="{{ route('admin.items.resolve', $item) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-success btn-sm">Resolve</button>
                            </form>
                            <!-- Delete Button -->
                            <form action="{{ route('admin.items.delete', $item) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Recently Reported Found Items -->
        <h2>Recently Reported Found Items</h2>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Contact</th>
                    <th>Reported At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foundItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->contact }}</td>
                        <td>{{ $item->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <!-- Edit Button -->
                             <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <!-- Resolve Button -->
                            <form action="{{ route('admin.items.resolve', $item) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-success btn-sm">Resolve</button>
                            </form>
                            <!-- Delete Button -->
                            <form action="{{ route('admin.items.delete', $item) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        
</body>
</html>
