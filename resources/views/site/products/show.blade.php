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

{{-- Update the Meta Description --}}
@section('meta_description')
    <meta name="description" content="{{{ $product->description }}}" />

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
    {{--<meta name="keywords" content="{{{ $product->tags}}}" />--}}

@stop

@section('meta_author')
    <meta name="author" content="{{{ $owner->name }}}" />
@stop

@section('content')
    <div class="container">

        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{route('categories.show',[$product->category->id])}}"> {{{$product->category->name}}}</a></li>
                <li>{{{ $product->name }}}</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <h1> {{$product->name}} </h1>
            </div>
            <div class="col-sm-3">
                <h2> Favorited {{$product->favorited_count()}} times</h2>
            </div>
        </div>


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
        <hr/>
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Creator</div>

                    <div class="panel-body">
                        <div class="col-sm-12">
                            @include('site.users.thumbnail', ['user' => $owner])
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Moderators</div>

                    <div class="panel-body">
                        <div class="col-sm-3">
                            @foreach($mods as $user)
                                @include('site.users.thumbnail', ['user' => $owner])
                            @endforeach
                        </div>

                    </div>
                </div>
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
