@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Manage Items</h1>

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Items Table -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Contact</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->contact }}</td>
                <td class="text-center">
    <div class="d-flex justify-content-center align-items-center gap-2">
        <!-- Edit Button -->
        <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-sm btn-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>

        <!-- Delete Button -->
        <form action="{{ route('admin.items.delete', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>

   
</div>
@endsection
