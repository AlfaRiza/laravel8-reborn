@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

@if(session()->has('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif

<div class="col-8">
<form method="post" action="{{ url('dashboard/posts') }}" enctype="multipart/form-data">
  @csrf 
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" required autofocus class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
  </div>
  @error('title') 
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror


  <div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <select class="form-select" name="category_id" >
      @foreach($category as $c)
      @if(old('category_id') == $c->id)
      <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
      @else
      <option value="{{ $c->id }}">{{ $c->name }}</option>
      @endif
      
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Gambar Post</label>
    <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
    @error('image') 
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    @error('title') 
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
    <input id="body" type="hidden" name="body">
    <trix-editor input="body"></trix-editor>
    
  </div>

  
  
  <button type="submit" class="btn btn-primary">Create Post</button>
</form>
</div>

<script>
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

<!-- <script>
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
    })
    
</script> -->
@endsection