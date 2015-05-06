<div class="container">
    @if(Auth::check() && Auth::user()->hasRole('Product'.$product->id.'mod'))
        <div class="row">
            <a class="btn btn-primary" style="margin-top: 25px" href="{!! route('lessons.create',[$product->id]) !!}">Add New</a>
        </div>
    @endif
    <div class="row">
        @if($product->lessons->isEmpty())
            <div class="well text-center">No Lessons found.</div>
        @else
            <table class="table">
                <thead>
                <th>Name</th>
                <th>Score</th>
                <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($product->lessons as $lesson)
                    <tr>

                        <td> <a href="{!! url('lesson/'. $lesson->id) !!}" class="btn btn-xs btn-primary">{!! $lesson->name !!} <i class="glyphicon glyphicon-arrow-right"></i> </a></td>

                        <td>{{$lesson->userScore(Auth::id())}} / {{$lesson->quizzes->count()}}</td>
                        <td>
                            @if(Auth::check() && Auth::user()->hasRole('Product'.$product->id.'mod'))
                                <a href="{!! route('lessons.edit', [$lesson->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                {{--<a href="{!! route('lessons.delete', [$lesson->id]) !!}" onclick="return confirm('Are you sure wants to delete this Lesson?')"><i class="glyphicon glyphicon-remove"></i></a>--}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfooter>
                    <h6>
                        Total Count <span class="label label-info">{{$product->lessons()->count()}}</span>
                    </h6>
                    <hr/>
                </tfooter>
            </table>
        @endif
    </div>

</div>