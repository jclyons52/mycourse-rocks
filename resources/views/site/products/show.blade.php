@extends('app')

{{-- Web site Title --}}
@section('title')
    {{{ $product->name }}} ::
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
            <li href="#" ><i class="glyphicon glyphicon-home"></i></li>
            <li href="#" >{{{$product->category->name}}}</li>
            <li href="#" >{{{ $product->name }}}</li>
        </ol>
    </div>

    <h1> {{$product->name}} </h1>
    <hr/>
    <div class="row">
            @include('site.products.thumbnail')

        <div class="col-sm-6">
            <div class="col-sm-12">
                @include('partials.ratings')
            </div>
        </div>

    </div>
 <br/><br/>

    <div class="row">
        <div class="col-sm-8">
            @include('site.lessons.index')
        </div>
    </div>
    <hr>
    <h1>Comments</h1>
    @if(Auth::check())
        @include('site.comments.comment_form')
        @else
        <p>Log in to comment</p>
    @endif

        @foreach($product->comments as $comment)

            @include('site.comments.show')

        @endforeach
</div>
@endsection
