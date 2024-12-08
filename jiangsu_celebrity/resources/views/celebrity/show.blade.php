@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $celebrity->name }}</h2>
    <img src="{{ $celebrity->image }}" alt="{{ $celebrity->name }}" class="img-fluid mb-3">
    <h4>Bio</h4>
    <p>{{ $celebrity->bio }}</p>
    <h4>Description</h4>
    <p>{{ $celebrity->description }}</p>

    <a href="{{ route('celebrity.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
