@extends('layouts.main')

@section('content')
    <h1>Post Categories</h1>

    <div class="container">
        <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4">
            <div class="card bg-dark text-white">
                <img src="https://source.unsplash.com/1200x400?{{ $category->name }}" class="card-img" alt="...">
                <div class="card-img-overlay d-flex align-items-center justify-content-center">
                    <h5 class="card-title text-center"><a href="/blog?category={{ $category->slug }}" class="text-decoration-none text-white">{{ $category->name }}</a></h5>
                </div>
            </div>
            </div>
    @endforeach
        </div>
    </div>
@endsection