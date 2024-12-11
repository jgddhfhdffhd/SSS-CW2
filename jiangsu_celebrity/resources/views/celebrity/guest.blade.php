@extends('layouts.app')

@section('content')
<section class="text-left container">
  <div class="row py-lg-4">
    <div class="col-lg-12 col-md-8 mx-auto">
      <h1 class="h1">Prominent Figures of Jiangsu</h1>
      <p class="lead">Jiangsu, a province rich in history and culture, has produced many distinguished individuals. From ancient scholars to modern scientists and entrepreneurs, the people of Jiangsu have made significant contributions across various fields. 
        <br><br> This website aims to showcase the achievements and life stories of these influential figures, offering insights into their journeys and lasting impact.
        <br><br> This website serves as the Final Project for the Server Side Systems course. It is hosted on an AWS server and built using the LAMP stack, with the PHP code leveraging the robust Laravel framework.</p>
      <em style="float:right">Ye Shen</em><br>
      <em style="float:right">08.12.2024</em>
    </div>
  </div>
</section>

@auth
    <div class="text-left mt-3 container py-lg-2">
        <a href="/celebrity/index" class="btn btn-primary">
            Manage Posts
        </a>
    </div>
@endauth

<div class="album bg-body-tertiary">
  <div class="container">
    @foreach ($celebrities as $celebrity)
        @if ($loop->iteration % 2 == 1)
            <div class="row mb-2">
        @endif
        
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $celebrity->name }}</strong>
                    <h3 class="mb-0">{{ $celebrity->bio }}</h3>
                    <br>
                    <div class="mb-1 text-body-secondary">{{ $celebrity->created_at->format('M d') }}</div>
                    <div class="mt-auto">
                        <a href="/celebrity/{{ $celebrity->id }}" class="btn btn-link text-decoration-none text-primary">
                            <span class="fw-bold">Continue reading</span>
                            <svg class="bi" width="16" height="16"><use xlink:href="#chevron-right"></use></svg>
                        </a>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block centered-content">
                    @if ($celebrity->image)
                        <img src="{{ $celebrity->image }}" alt="{{ $celebrity->name }}" 
                             class="bd-placeholder-img img-fluid rounded" 
                             width="200" height="250" style="object-fit: cover;">
                    @else
                        <svg class="bd-placeholder-img" width="250" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Thumbnail: {{ $celebrity->title }}" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <text x="50%" y="50%" fill="white" dy=".3em">{{ $celebrity->title }}</text>
                        </svg>
                    @endif
                </div>
            </div>
        </div>

        @if ($loop->iteration % 2 == 0)
            </div>
        @endif
    @endforeach



    {{ $celebrities->links('pagination::bootstrap-5')}}
  </div>
</div>
@endsection

