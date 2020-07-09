@extends('layouts.app')

@section('content')
    <h1>@lang('views.post.index.list')</h1>
    <a href="{{ route('posts.create') }}">@lang('views.post.index.addNewPost')</a>
    <div>
        <table>
            <thead>
            <tr>
                <td>@lang('models.post.id')</td>
                <td>@lang('models.post.name')</td>
                <td>@lang('views.post.index.actions')</td>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('posts.show', $post->id)}}">{{$post->name}}</a></td>
                    <td><a href="{{route('posts.edit', $post->id)}}">Edit</td>
                    <td><a href="{{route('posts.destroy', $post->id)}}" data-confirm="Вы уверены?" data-method="delete">Delete</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$posts->links()}}
        <div>
@endsection
