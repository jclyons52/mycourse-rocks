@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'patch']) !!}

        @include('comments.fields')

    {!! Form::close() !!}
@endsection
