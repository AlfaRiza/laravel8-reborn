@extends('layouts.main')

@section('content')
    <h1 class="text-decoration-none my-3">{{ $title }}</h1>

    @if($posts->count())
    <div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
    <div class="card-body text-center">
        <h3 class="card-title"><a class="text-decoration-none text-dark" href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
        <p class="text-small">By <a class="text-decoration-none" href="/authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> In <a class="text-decoration-none" href="/categories/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</p>
        <p class="card-text">{{ $posts[0]->excert }}</p>
        <a class="btn btn-primary text-decoration-none" href="/blog/{{ $posts[0]->slug }}">Read More</a>
    </div>
    </div>
    @else
    <p class="text-center fs-4">No post found</p>
    @endif

    <div class="container">
        <div class="row">
    @foreach($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="position-absolute badge bg-info text-dark"><a class="text-decoration-none text-white" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                <div class="card-body">
                    <h5 class="card-title"><a class="text-decoration-none text-dark" href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h5>
                    <p >By <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }} </p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/blog/{{ $post->slug }}" class="btn btn-primary text-decoration-none">Read More</a>
                </div>
                </div>
            </div>
    @endforeach
        </div>
    </div>
@endsection