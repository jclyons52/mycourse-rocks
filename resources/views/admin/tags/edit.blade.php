@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'patch']) !!}

        @include('admin.tags.fields')

    {!! Form::close() !!}
@endsection
