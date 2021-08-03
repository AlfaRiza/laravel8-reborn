@extends('layouts.main')

@section('content')
    <h1>Post Categories</h1>
    @foreach($categories as $category)
    <div class="row">
        <div class="col">
        <div class="card mt-3">
        <h5 class="card-header"><a href="/blog/{{ $category->slug }}">{{ $category->name }}</a></h5>
        </div>
        </div>
    </div>
    @endforeach
@endsection