@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<div class="container">
            <div class="row">
            <h1 class="card-header"><a class="text-decoration-none text-dark" href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h1>
                <div class="col-md-8">
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"> Kembali</a>
                <a href="{{ url('dashboard/posts/' . $post->slug) }}" class="badge bg-warning"><span data-feather="edit"></span> Edit</a>
                <a href="{{ url('dashboard/posts/' . $post->slug) }}" class="badge bg-danger"><span data-feather="x-circle"></span> Hapus</a>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">

                <article class="my-3 fs-5">{!! $post->body !!}</article>
                
                </div>
            </div>
        </div>
</div>
@endsection