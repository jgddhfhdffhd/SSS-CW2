@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <div class="text-center">
            <h1 class="display-4 mb-4 font-weight-bold text-primary">{{ $celebrity->name }}</h1>
            <img src="{{ asset('storage/' . $celebrity->image) }}" alt="{{ $celebrity->name }}" class="img-fluid rounded"style="max-height: 400px;">
        </div>

        <div class="mt-4">
            <h2 class="text-secondary font-weight-bold">Bio</h2>
            <p class="lead" style="font-size: 1.2rem; line-height: 1.8;">{{ $celebrity->bio }}</p>

            <h2 class="text-secondary font-weight-bold mt-4">Description</h2>
            <p class="lead" style="font-size: 1.2rem; line-height: 1.8;">{{ $celebrity->description }}</p>
        </div>

        <div class="text-center mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-lg btn-outline-secondary px-5">Back to List</a>
        </div>        
    </div>
</div>
@endsection
