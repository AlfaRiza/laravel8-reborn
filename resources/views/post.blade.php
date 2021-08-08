@extends('layouts.main')

@section('content')


        <div class="container">
            <div class="row justify-content-center">
            <h1 class="card-header"><a class="text-decoration-none text-dark" href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h1>
                <div class="col-md-8">
                <h6 class="">By <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>  In <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h6>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">

                <article class="my-3 fs-5">{!! $post->body !!}</article>
                <a href="/blog">Kembali</a>
                </div>
            </div>
        </div>
@endsection