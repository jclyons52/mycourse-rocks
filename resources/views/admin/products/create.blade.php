@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'admin.products.store']) !!}

        @include('admin.products.fields')

    {!! Form::close() !!}
@endsection
