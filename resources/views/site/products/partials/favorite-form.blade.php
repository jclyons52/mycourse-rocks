@if (Auth::check())
    @if ($product->isFavoritedBy(Auth::user()))
        <a class="btn btn-danger btn-block" href="{!! route('favorites.delete', [$product->id]) !!}"><span class="fa fa-minus-circle"></span> Unfavorite</a>
    @else
        {!! Form::open(['route' => 'favorites.store']) !!}
        {!! Form::hidden('productIdToFavorite', $product->id) !!}
        <button type="submit" class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Favorite</button>
        {!! Form::close() !!}
    @endif
@endif