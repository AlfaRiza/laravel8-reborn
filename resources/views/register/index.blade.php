@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Please sign up</h1>
      <form>
        <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="name">
          <label for="name">Name</label>
        </div>
        <div class="form-floating">
          <input type="text" name="username" class="form-control" id="username" placeholder="username">
          <label for="username">UserName</label>
        </div>
        <div class="form-floating">
          <input type="mail" name="email" class="form-control" id="email" placeholder="email">
          <label for="email">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
          <label for="password">Password</label>
        </div>
    
        <!-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> -->
      </form>
      <small><a class="d-block text-center mt-3" href="/login">Has account? login here</a></small>
    </main>
  </div>
</div>

@endsection
