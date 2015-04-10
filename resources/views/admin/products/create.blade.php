@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'products.store']) !!}

        @include('admin.products.fields')

    {!! Form::close() !!}
</div>
@endsection
