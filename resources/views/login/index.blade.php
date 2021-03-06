@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-5">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Berhasil</strong>, anda telah register, silahkan login
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Gagal</strong>,login anda gagal, silahkan isi data dengan benar
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
      <form action="/login" method="post">
        @csrf
        <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <div class="form-floating">
          <input type="email" name="email" class="form-control rounded-top @error('email') is-invalid @enderror" id="email" autofocus required placeholder="your.email@gmail.com" value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" required placeholder="Password" value="{{ old('password') }}">
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
    
        <!-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017???2021</p> -->
      </form>
      <small><a class="d-block text-center mt-3" href="/register">Not registed? Register here</a></small>
    </main>
  </div>
</div>

@endsection
