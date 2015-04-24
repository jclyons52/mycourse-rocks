@extends('app')
@section('content')
<div class="container">
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
