@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  <a href="{{ url('dashboard/posts/create') }}" class="btn btn-primary mb-3"><span data-feather="create"></span>Buat Post</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
            <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                  <a href="{{ url('dashboard/posts/' . $post->slug) }}" class="badge bg-info">lihat</a>
                  <a href="{{ url('dashboard/posts/' . $post->slug . '/edit') }}" class="badge bg-warning">edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus data ?')">hapus</button>
                    </form>
                  
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection