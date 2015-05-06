@if($product->isOwnedBy(Auth::user()))
    <i class="glyphicon glyphicon-heart"></i>
@elseif(Auth::check())
    @if ($product->isFavoritedBy(Auth::user()))
        <a class="glyphicon glyphicon-heart" href="{!! route('favorites.delete', [$product->id]) !!}"></a>
    @else
        <a class="glyphicon glyphicon-heart-empty" href="{!! route('favorites.store', [$product->id]) !!}"></a>
    @endif
@endif