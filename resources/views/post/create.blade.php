@extends('layouts.app')
@section('content')
    <div class="form-group d-flex justify-content-center">
    {{ Form::model($post, ['url' => route('posts.store')]) }}
    @include('post.form')
    {{ Form::submit('Сохранить') }}
    {{ Form::close() }}
    </div>
@endsection
