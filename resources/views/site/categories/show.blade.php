@extends('app')

@section('content')
    <div class="container">
        @include('site.products.index', ['products' => $category->products])
    </div>
@endsection