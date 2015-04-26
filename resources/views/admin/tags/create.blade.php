@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'admin.tags.store']) !!}

        @include('admin.tags.fields')

    {!! Form::close() !!}
@endsection
