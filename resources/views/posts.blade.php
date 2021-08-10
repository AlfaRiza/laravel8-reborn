@extends('layouts.main')

@section('content')
    <h1 class="text-decoration-none my-3 text-center">{{ $title }}</h1>


    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog/" method="get">
            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search forr...." value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit" >Search</button>
            </div>
            </form>
        </div>
    </div>

    @if($posts->count())
    <div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
    <div class="card-body text-center">
        <h3 class="card-title"><a class="text-decoration-none text-dark" href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
        <p class="text-small">By <a class="text-decoration-none" href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> In <a class="text-decoration-none" href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</p>
        <p class="card-text">{{ $posts[0]->excert }}</p>
        <a class="btn btn-primary text-decoration-none" href="/blog/{{ $posts[0]->slug }}">Read More</a>
    </div>
    </div>

    <div class="container">
        <div class="row">
    @foreach($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="position-absolute badge bg-info text-dark"><a class="text-decoration-none text-white" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                <div class="card-body">
                    <h5 class="card-title"><a class="text-decoration-none text-dark" href="/blog?category={{ $post->slug }}">{{ $post->title }}</a></h5>
                    <p >By <a class="text-decoration-none" href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }} </p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/blog/{{ $post->slug }}" class="btn btn-primary text-decoration-none">Read More</a>
                </div>
                </div>
            </div>
    @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    @else
    <p class="text-center fs-4">No post found</p>
    @endif
@endsection