@extends('layouts.main')

@section('content')
        <h5 class="card-header"><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h5>
        <div class="card-body">
            <h6 class="">By <a class="text-decoration-none" href="/user/{{ $post->user->name }}">{{ $post->user->name }}</a>  In <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h6>
            {!! $post->body !!}
            <a href="/blog">Kembali</a>
        </div>
        </div>
        </div>
@endsection