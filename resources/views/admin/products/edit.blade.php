@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'patch']) !!}

        @include('admin.products.fields')

    {!! Form::close() !!}
@endsection
