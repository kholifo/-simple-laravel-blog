@extends('layouts.app')
@section('content')
    <div class="container py-2">
    <div class="d-flex row justify-content-center px-3">
        <h1>{{$post->name}}</h1>
        <p class="pr-3 text-align container-fluid">{{$post->body}}</p>
    </div>
    </div>
@endsection
@section('footer')
    <footer class="container text-center p-3">
        <p>&copy; My laravel blog 2020</p>
    </footer>
@endsection
