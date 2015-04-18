
@extends('app')
@section('content')

    <h1> Products</h1>


    <div class="row">
            @foreach($products as $product)

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{route('getentry', $product->files[0]->filename)}}" alt="{{$product->name}}">
                        <div class="caption">
                            <h3>{{$product->name}} - {{$product->price}}</h3>
                            <p>{{$product->description}}</p>
                            <p><a href="#" class="btn btn-primary" role="button">Purchase</a> <a href="product/{{$product->id}}" class="btn btn-default" role="button">View</a></p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
    </div>


@endsection

@section('scripts')

@endsection