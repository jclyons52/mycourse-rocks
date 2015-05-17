@extends('app')

{{-- Web site Title --}}
@section('title')
    {{{ $category->name }}} ::
    @parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
    @parent

@stop

@section('content')
    <div class="container">

        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li href="#" >{{{$category->name}}}</li>
            </ol>
        </div>

        @include('site.products.index', ['products' => $category->products])
    </div>
@endsection