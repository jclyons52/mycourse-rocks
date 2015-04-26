@extends('app')

{{-- Web site Title --}}
@section('title')
    {{{ $post->title }}} ::
    @parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
    @parent

@stop

{{-- Update the Meta Description --}}
@section('meta_description')
    <meta name="description" content="{{{ $post->meta_description() }}}" />

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
    <meta name="keywords" content="{{{ $post->meta_keywords() }}}" />

@stop

@section('meta_author')
    <meta name="author" content="{{{ $post->author->username }}}" />
@stop

{{-- Content --}}
@section('content')
    <div class="container">
    <h3>{{ $post->title }}</h3>

    <p>{{ $post->content() }}</p>

    <div>
        <span class="badge badge-info">Posted {{{ $post->date() }}}</span>
    </div>

    <hr />
    </div>


@stop