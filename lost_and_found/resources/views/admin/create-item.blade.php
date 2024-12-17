@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Item</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.items.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" id="category" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" name="contact" class="form-control" id="contact" required>
        </div>

        <button type="submit" class="btn btn-success">Add Item</button>
    </form>
</div>
@endsection
