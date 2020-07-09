@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row pb-3 pt-2">
            <div class="col-5 col-sm-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Hello there!</h5>
                        <p class="card-text">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting.</p>
                        <a href="#" class="btn btn-outline-secondary">Outline</a>
                    </div>
                </div>
                <div class="menu sticky-top p-3 bg-light">
                    <h5>Sticky menu</h5>
                    <div class="nav flex-column">
                        <a href="{{route ('posts.create')}}" class="nav-link pl-0">Create post</a>
                        <a href="#" class="nav-link pl-0">Menu 2</a>
                        <a href="#" class="nav-link pl-0">Menu 3</a>
                    </div>
                </div>
            </div>
            <div class="col-7 col-sm-8 content">
                @foreach($posts as $post)
                    <div class="pb-2 mb-2">
                        <h3>
                            <a href="{{route('posts.show', $post->id)}}" class="text-dark">{{$post->name}}</a>
                        </h3>
                        <div class="d-flex justify-content-start align-content-center">
                            <p>{{date("F j, Y", strtotime($post->created_at))}}</p>
                        </div>
                        <p class="pb-1 mb-1">{{Str::limit($post->body, 213)}}
                            <a href="{{route('posts.show', $post->id)}}" class="link"> Read more</a>
                        </p>
                        {{$posts->links()}}
                    </div>
                @endforeach
            </div>
    </div>
</div>
@endsection
@section('footer')
    <div class="container text-center p-3">
        <p>&copy; My laravel blog 2020</p>

    </div>
@endsection


