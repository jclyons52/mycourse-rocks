<div class="container">
    <div class="row">
        @if($product->lessons->isEmpty())
            <div class="well text-center">No Lessons found. <a class="btn btn-primary btn-xs"  href="{!! route('lessons.create',[$product->id]) !!}"><i class="glyphicon glyphicon-plus" ></i> Add New</a></div>

        @else

                @foreach($product->lessons as $lesson)
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="row">
                                <h3></h3>
                            </div>
                            <div class="row">


                            </div>
                            <br/>
                            <ul class="list-group">
                                <a href="{!! url('lessons/'. $lesson->id) !!}" class="list-group-item active">
                                    <h4 class="list-group-item-heading">{!! $lesson->name.' ' !!}</h4>
                                    <p class="list-group-item-text">
                                        {{$lesson->userScore(Auth::id())}} / {{$lesson->quizzes->count()}}
                                        @if(Auth::check() && ($product->isOwnedBy(Auth::user()) or $product->isModeratedBy(Auth::user()) ))
                                            <a href="{!! route('lessons.edit', [$lesson->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                            {{--<a href="{!! route('lessons.delete', [$lesson->id]) !!}" onclick="return confirm('Are you sure wants to delete this Lesson?')"><i class="glyphicon glyphicon-remove"></i></a>--}}
                                        @endif
                                    </p>
                                </a>
                                @foreach($lesson->links as $link)
                                    <li class="list-group-item">
                                        <a href="{!! url('lessons/'. $lesson->id.'?'.$link->id) !!}" >{!! $link->title !!}</a>
                                    </li>


                                @endforeach
                            </ul>
                        </div>
                    </div>
                <hr/>
                @endforeach
                @if(Auth::check() && ($product->isOwnedBy(Auth::user()) or $product->isModeratedBy(Auth::user()) ))
                            <a class="btn btn-primary btn-xs"  href="{!! route('lessons.create',[$product->id]) !!}"><i class="glyphicon glyphicon-plus" ></i> Add New</a>

                @endif

        @endif
    </div>

</div>