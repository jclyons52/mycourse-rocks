@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'permissions.store']) !!}

        @include('admin.permissions.fields')

    {!! Form::close() !!}
@endsection
