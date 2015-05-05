@extends('app')

@section('content')
<div class="container">

    @include('common.errors')
    <div class="row">
        <div class="col-sm-6">
            <div class="well bs-component">
            {!! Form::open(['route' => 'products.store', 'files' => true, 'class' => 'form-horizontal']) !!}
            <fieldset>
            @include('site.products.fields')
            </fieldset>
            {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@endsection
@section('styles')
    @parent
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection