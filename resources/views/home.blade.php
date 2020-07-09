@extends('layouts.app')

@section('content')

    @if(count($posts) > 0)
        <div class="container col-8">
            <div class="d-flex row justify-content-center px-3">
                <h3>My posts</h3>
                <div class="content">
                    @foreach($posts as $post)
                        <div class="pb-2 mb-2 mt-3">
                            <h3>
                                <a href="{{route('posts.show', $post->id)}}" class="text-dark">{{$post->name}}</a>
                            </h3>
                            <div class="d-flex justify-content-start align-content-center">
                                <p>{{date("F j, Y", strtotime($post->created_at))}}
                                    <a href="{{ route('posts.edit', $post->id) }}" type="button" class="btn btn-sm btn-outline-info p-1 ml-1">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-outline-danger p-1 ml-1">
                                        Delete
                                    </button>
                                </form>
                                </p>
                            </div>
                            <p class="pb-1 mb-1">{{Str::limit($post->body, 213)}}
                                <a href="{{route('posts.show', $post->id)}}" class="link"> Read more</a>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
            @else
                    <div class="container py-2 col-md-3">
                        <div class="d-flex row justify-content-center mb-1">
                            <h3 class="mb-4">My posts</h3>
                            <p> You did't write any posts. Let's do this right now!</p>
                            <a href="{{ route('posts.create') }}" class="btn btn-outline-secondary m-1">Create post</a>
                        </div>
                    </div>
            @endif
@endsection
@section('footer')
    <div class="container text-center p-3">
        <p>&copy; My laravel blog 2020</p>

    </div>
@endsection
