@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'patch']) !!}

        @include('admin.posts.fields')

    {!! Form::close() !!}
@endsection
