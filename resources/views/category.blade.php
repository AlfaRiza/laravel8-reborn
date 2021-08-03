@extends('layouts.main')

@section('content')
    <h1>Post Category : {{ $category }}</h1>
    @foreach($posts as $post)
    <div class="row">
        <div class="col">
        <div class="card mt-3">
        <h5 class="card-header"><a href="/blog/{{ $post->slug }}">{{ $title }}</a></h5>
        <div class="card-body">
            <!-- <h6 class="">{{ $post['author'] }}</h6> -->
            <p class="card-text">{{ $post->excerpt }}</p>
        </div>
        </div>
        </div>
    </div>
    @endforeach
@endsection