
@extends('app')
@section('content')

    <div class="container">
    <h1> Courses</h1>


    <div class="row">
            @foreach($products as $product)

                @include('site.products.thumbnail')

            @endforeach
    </div>
    </div>

@endsection

@section('scripts')

@endsection