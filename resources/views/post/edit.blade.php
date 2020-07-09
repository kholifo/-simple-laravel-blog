@extends('layouts.app')
@section('content')
        <div class="form-group d-flex justify-content-center">
    {{ Form::model($post, ['url' => route('posts.update', $post), 'method' => 'PATCH']) }}
    @include('post.form')
    {{ Form::submit('Обновить') }}
    {{ Form::close() }}
        </div>
@endsection
