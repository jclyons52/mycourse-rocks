<div class="container">
    <div class="row">
        @if($product->lessons->isEmpty())
            <div class="well text-center">No Lessons found. <a class="btn btn-primary btn-xs"  href="{!! route('lessons.create',[$product->id]) !!}"><i class="glyphicon glyphicon-plus" ></i> Add New</a></div>

        @else

                @foreach($product->lessons as $lesson)
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <div class="row">
                                <h3>{!! $lesson->name.' ' !!}</h3>
                            </div>
                            <div class="row">
                                {{$lesson->userScore(Auth::id())}} / {{$lesson->quizzes->count()}}

                                    @if(Auth::check() && ($product->isOwnedBy(Auth::user()) or $product->isModeratedBy(Auth::user()) ))
                                        <a href="{!! route('lessons.edit', [$lesson->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                        {{--<a href="{!! route('lessons.delete', [$lesson->id]) !!}" onclick="return confirm('Are you sure wants to delete this Lesson?')"><i class="glyphicon glyphicon-remove"></i></a>--}}
                                    @endif


                            </div>

                        </div>
                        <div class="col-sm-8">
                            <br/>
                                @foreach($lesson->links as $link)
                                    <div class="col-sm-6"><a href="{!! url('lesson/'. $lesson->id.'?'.$link->id) !!}" >{!! $link->title !!}</a></div>
                                @endforeach
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