<div class="row">
    {!! Form::open(['route' => 'comments.store']) !!}
    {!! Form::hidden('product_id', $product->id) !!}
    <div class="col-md-2 col-sm-2 hidden-xs">
        <figure class="thumbnail">
            <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
            <figcaption class="text-center"></figcaption>
        </figure>
    </div>
    <div class="col-md-10 col-sm-10">
        <div class="panel panel-default arrow left">
            <div class="panel-body">
                <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user">{{Auth::user()->name}}</i></div>
                    <div id="stars" class="starrr">
                        <input type="hidden" id="count" value="0" name="rating" />
                    </div>
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