@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ isset($celebrity) ? 'Edit Celebrity' : 'Add New Celebrity' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('celebrity.store', $celebrity->id ?? null) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $celebrity->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="bio" class="form-label fw-bold">Bio</label>
                    <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="3" required>{{ old('bio', $celebrity->bio ?? '') }}</textarea>
                    @error('bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description', $celebrity->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success px-5">{{ isset($celebrity) ? 'Update' : 'Save' }}</button>
                    <a href="{{ route('celebrity.index') }}" class="btn btn-secondary px-5">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
