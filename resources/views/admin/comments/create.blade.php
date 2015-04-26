@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'comments.store']) !!}

        @include('comments.fields')

    {!! Form::close() !!}
@endsection
