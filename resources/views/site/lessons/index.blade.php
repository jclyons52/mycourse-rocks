<div class="container">
    <div class="row">
        @if($product->lessons->isEmpty())
            <div class="well text-center">No Lessons found. <a class="btn btn-primary btn-xs"  href="{!! route('lessons.create',[$product->id]) !!}"><i class="glyphicon glyphicon-plus" ></i> Add New</a></div>

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

                        <td> <a href="{!! url('lesson/'. $lesson->id) !!}" class="btn btn-xs btn-primary">{!! $lesson->name.' ' !!}<i class="glyphicon glyphicon-arrow-right"></i> </a></td>

                        <td>{{$lesson->userScore(Auth::id())}} / {{$lesson->quizzes->count()}}</td>
                        <td>
                            @if(Auth::check() && ($product->isOwnedBy(Auth::user()) or $product->isModeratedBy(Auth::user()) ))
                                <a href="{!! route('lessons.edit', [$lesson->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                {{--<a href="{!! route('lessons.delete', [$lesson->id]) !!}" onclick="return confirm('Are you sure wants to delete this Lesson?')"><i class="glyphicon glyphicon-remove"></i></a>--}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                @if(Auth::check() && ($product->isOwnedBy(Auth::user()) or $product->isModeratedBy(Auth::user()) ))
                    <tr>
                        <td>
                            <a class="btn btn-primary btn-xs"  href="{!! route('lessons.create',[$product->id]) !!}"><i class="glyphicon glyphicon-plus" ></i> Add New</a>
                        </td>
                    </tr>

                @endif
                </tbody>

            </table>
        @endif
    </div>

</div>