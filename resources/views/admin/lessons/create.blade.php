@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'admin.lessons.store']) !!}

        @include('admin.lessons.fields')

    {!! Form::close() !!}
@endsection
