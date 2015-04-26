@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'admin.posts.store']) !!}

        @include('admin.posts.fields')

    {!! Form::close() !!}
@endsection
