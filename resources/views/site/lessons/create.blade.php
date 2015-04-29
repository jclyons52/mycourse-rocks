@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
            <li><a href="{{route('categories.show',[$product->category->id])}}">{{{$product->category->name}}}</a></li>
            <li><a href="{{route('products.show',[$product->id])}}">{{{ $product->name }}}</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['route' => 'lessons.store']) !!}

            @include('site.lessons.fields')

            {!! Form::close() !!}
        </div>
    </div>



</div>
@endsection
