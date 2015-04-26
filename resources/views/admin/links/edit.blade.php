@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($link, ['route' => ['admin.links.update', $link->id], 'method' => 'patch']) !!}

        @include('admin.links.fields')

    {!! Form::close() !!}

@endsection
