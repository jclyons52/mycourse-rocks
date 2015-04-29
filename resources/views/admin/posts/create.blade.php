@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'admin.posts.store']) !!}

        @include('admin.posts.fields')

    {!! Form::close() !!}
@endsection
@section('styles')
    @parent
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection