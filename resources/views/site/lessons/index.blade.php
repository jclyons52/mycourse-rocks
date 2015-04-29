<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span> Lessons

                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @if(Auth::check() && Auth::user()->hasRole('Product'.$product->id.'mod'))
                            <li class="list-group-item">
                                <a class="btn btn-primary action-buttons" href="{!! route('lessons.create',[$product->id]) !!}">Add New</a>
                            </li>
                        @endif
                        @foreach($product->lessons as $lesson)
                            <a href="{!! url('lesson/'. $lesson->id) !!}">
                            <li class="list-group-item">
                                {{$lesson->name}}
                                @if(Auth::check() && Auth::user()->hasRole('Product'.$product->id.'mod'))
                                    <a class="btn btn-primary action-buttons pull-right" href="{!! route('lessons.edit',[$lesson->id]) !!}">Edit Lesson</a>
                                @endif
                                <div class="pull-right action-buttons">

                                </div>
                            </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>
                                Total Count <span class="label label-info">{{$product->lessons()->count()}}</span></h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('styles')
    <style>
        .trash { color:rgb(209, 91, 71); }
        .flag { color:rgb(248, 148, 6); }
        .panel-body { padding:0px; }
        .panel-footer .pagination { margin: 0; }
        .panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
        .panel-body .radio, .checkbox { display:inline-block;margin:0px; }
        .panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
        .list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
        .list-group { margin-bottom:0px; }
    </style>
@endsection