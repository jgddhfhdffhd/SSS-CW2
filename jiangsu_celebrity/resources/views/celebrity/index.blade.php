@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Celebrity List</h2>
    
    <a href="{{ route('celebrity.create') }}" class="btn btn-primary mb-4">Add New Celebrity</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Bio</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($celebrities as $celebrity)
                <tr>
                    <td>{{ $celebrity->name }}</td>
                    <td>{{ $celebrity->bio }}</td>
                    <td>{{ Str::limit($celebrity->description, 50) }}</td>
                    <td>
                        <a href="{{ route('celebrity.show', $celebrity->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('celebrity.edit', $celebrity->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Delete Form with confirmation prompt -->
                        <form action="{{ route('celebrity.destroy', $celebrity->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this celebrity?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
