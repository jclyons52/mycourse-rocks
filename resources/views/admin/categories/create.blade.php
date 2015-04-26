@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'admin.categories.store']) !!}

        @include('admin.categories.fields')

    {!! Form::close() !!}
@endsection
