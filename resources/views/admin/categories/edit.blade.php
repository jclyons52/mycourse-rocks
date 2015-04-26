@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'patch']) !!}

        @include('categories.fields')

    {!! Form::close() !!}
@endsection
