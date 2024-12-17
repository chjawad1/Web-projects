@extends('layouts.app')

@section('content')
<h1>Edit Item</h1>

<form action="{{ route('admin.items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="name" value="{{ $item->name }}" required>
    <br>

    <label>Description:</label>
    <textarea name="description" required>{{ $item->description }}</textarea>
    <br>

    <label>Category:</label>
    <input type="text" name="category" value="{{ $item->category }}" required>
    <br

    <label>Contact:</label>
    <input type="email" name="contact" value="{{ $item->contact }}" required>
    <br>

    <button type="submit">Update Item</button>
</form>
@endsection
