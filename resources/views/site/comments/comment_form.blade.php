<div class="row">
    {!! Form::open(['route' => 'comments.store']) !!}
    {!! Form::hidden('product_id', $product->id) !!}
    <div class="col-md-10 col-sm-10">
        <div class="panel panel-default">
            <div class="panel-body">

                            <div class="comment-user"><i class="fa fa-user">{{Auth::user()->name}}</i></div>

                <div class="comment-post">
                    <textarea class="form-control" rows="3" name="content" type="text" id="content"></textarea>
                </div>
        <div class="row">
            <div class="col-sm-8">
                <input id="input-id" type="text" name="rating" class="rating" min=0 max=5 step=1 data-size="xs" >
            </div>
            <div class="col-sm-4">
                <br/>
                <button type="submit" class="btn btn-primary btn-sm pull-right">submit</button>
            </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@section('scripts')
    @parent

@endsection