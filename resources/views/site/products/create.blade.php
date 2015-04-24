@extends('app')

@section('content')
<div class="container">

    @include('common.errors')
    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['route' => 'products.store', 'files' => true]) !!}

            @include('site.products.fields')

            {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection
