@extends('spark::layouts.app')

@section('content')
    <div class="container">
        @foreach($products as $product)

            <div class="col-sm-6 col-md-4">
                @include('site.products.thumbnail')
            </div>
            @endforeach


    </div>
@endsection