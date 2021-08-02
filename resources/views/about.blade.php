@extends('layouts.main')

@section('content')
    <h1>Halaman About</h1>
    <h1>{{ $name }}</h1>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" width="200" alt="{{ $name }}">
@endsection

