<div class="row">
    {!! Form::open(['route' => 'comments.store']) !!}
    {!! Form::hidden('product_id', $product->id) !!}
    <div class="col-md-1 col-sm-2 hidden-xs">
        <a href="{{route('users.show',[Auth::user()->id])}}">
            <img class="img-responsive img-circle" src="//www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" />
        </a>
    </div>
    <div class="col-md-10 col-sm-10">
        <div class="panel panel-default arrow left">
            <div class="panel-body">
                <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user">{{Auth::user()->name}}</i></div>
                    <input id="input-id" type="text" name="rating" class="rating" min=0 max=5 step=1 data-size="xs" >
                </header>
                <div class="comment-post">
                    <label for="content">Comment</label>
                    <textarea class="form-control" rows="3" name="content" type="text" id="content"></textarea>
                </div>
                <p class="text-right"><div class="btn btn-default btn-sm">{!! Form::submit() !!}</div>
                </p>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@section('scripts')
    <script>

    </script>
@endsection