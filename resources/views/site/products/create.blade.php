@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'products.store', 'files' => true]) !!}

        @include('site.products.fields')

    {!! Form::close() !!}
</div>
@endsection
