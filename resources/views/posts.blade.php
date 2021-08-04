@extends('layouts.main')

@section('content')
    <h1 class="text-decoration-none my-3">{{ $title }}</h1>
    @foreach($posts as $post)
    <div class="row">
        <div class="col">
        <div class="card mt-3">
        <h5 class="card-header text-decoration-none"><a class="text-decoration-none" href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h5>
        <div class="card-body">
        <h6 >By <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> In <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h6>
            <!-- <h6 class="">{{ $post['author'] }}</h6> -->
            <p class="card-text">{{ $post->excerpt }}</p>
            <a class="text-decoration-none" href="/blog/{{ $post->slug }}">Read More</a>
        </div>
        
        </div>
        </div>
    </div>
    @endforeach
@endsection