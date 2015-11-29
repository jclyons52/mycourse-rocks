<div class="text-center">
    <div class="thumbnail">
        <a href="{!! route('products.show', [$product->id]) !!}" class="btn btn-primary" role="button" style="background: white; border:none;">
        <img src="{{route('getentry',$product->file->filename )}}" class="img img-responsive" style="height:200px;" alt="...">
            </a>
        <div class="caption">
            <h3>{{$product->name}} - Rating: {{$product->rating()}}</h3>
            <p>{{ str_limit($product->description, 35) }}</p>
            <p><a href="{!! route('products.show', [$product->id]) !!}" class="btn btn-primary" role="button">View</a></p>
        </div>
    </div>
</div>