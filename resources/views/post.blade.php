@extends('layouts.main')

@section('content')
        <h5 class="card-header"><a href="/blog/{{ $post['slug'] }}">{{ $post['title'] }}</a></h5>
        <div class="card-body">
            <h6 class="">{{ $post['author'] }}</h6>
            <p class="card-text">{{ $post['body'] }}</p>
            <a href="/blog">Kembali</a>
        </div>
        </div>
        </div>
@endsection