<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{route('getentry', $product->files[0]->filename)}}" alt="{{$product->name}}">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <h5>Rating: {{$product->rating()}}</h5>
            <p>{{$product->description}}</p>
            <p><a href="#" class="btn btn-primary" role="button">Purchase</a> <a href="{!! route('products.show', [$product->id]) !!}" class="btn btn-default" role="button">View</a></p>
        </div>
    </div>
</div>