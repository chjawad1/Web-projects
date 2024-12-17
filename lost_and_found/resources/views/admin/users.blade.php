@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Users</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.users.delete', $user) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
