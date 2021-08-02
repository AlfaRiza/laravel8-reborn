@extends('layouts.main')

@section('content')
    @foreach($posts as $post)
    <div class="row">
        <div class="col">
        <div class="card mt-3">
        <h5 class="card-header"><a href="/blog/{{ $post['slug'] }}">{{ $post['title'] }}</a></h5>
        <div class="card-body">
            <h6 class="">{{ $post['author'] }}</h6>
            <p class="card-text">{{ \Illuminate\Support\Str::limit($post['body'], 25, ' ...') }}</p>
        </div>
        </div>
        </div>
    </div>
    @endforeach
@endsection