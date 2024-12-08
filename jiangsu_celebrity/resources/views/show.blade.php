@extends('layouts.app')

@section('content')
    <h1>{{ $celebrity->name }}</h1>
    <img src="{{ asset('storage/' . $celebrity->image) }}" alt="{{ $celebrity->name }}" class="img-fluid">
    <p><strong>Introduction:</strong> {{ $celebrity->bio }}</p>
    <p><strong>Details:</strong> {{ $celebrity->description }}</p>
    <a href="{{ url('/') }}" class="btn btn-secondary">Return to the List</a>
@endsection
