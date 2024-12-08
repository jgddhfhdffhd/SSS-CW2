@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Celebrity</h2>

    <form action="{{ route('celebrity.update', $celebrity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $celebrity->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Field -->
        <div class="form-group mb-3">
            <label for="image">Image URL</label>
            <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $celebrity->image) }}" required>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bio Field -->
        <div class="form-group mb-3">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="4" required>{{ old('bio', $celebrity->bio) }}</textarea>
            @error('bio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description Field -->
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="6" required>{{ old('description', $celebrity->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit and Cancel Buttons -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('celebrity.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
