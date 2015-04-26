@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'admin.links.store']) !!}

        @include('admin.links.fields')

    {!! Form::close() !!}
@endsection
