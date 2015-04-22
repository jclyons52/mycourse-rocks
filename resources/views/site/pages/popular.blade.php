@extends('app')

@section('content')
    <div class="container">
        @foreach($products as $product)
            @include('site.products.thumbnail')
            @endforeach


    </div>
@endsection