@extends('app')

@section('content')
    <div class="container">

        @include('common.errors')

        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{route('categories.show',[$lesson->product->category->id])}}">{{{$lesson->product->category->name}}}</a></li>
                <li><a href="{{route('products.show',[$lesson->product->id])}}">{{{ $lesson->product->name }}}</a></li>
                <li href="#" >{{{ $lesson->name }}}</li>
            </ol>
        </div>

        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class={{ $active_tab == 'links'  ? "active" : null }}><a href="#links" aria-controls="home" role="tab" data-toggle="tab">Add Links</a></li>
                <li role="presentation" class={{ $active_tab == 'quiz'   ? "active" : null }}><a href="#quiz" aria-controls="profile" role="tab" data-toggle="tab">Add Quiz Questions</a></li>
                <li role="presentation" ><a href="#lesson" aria-controls="profile" role="tab" data-toggle="tab">Lesson</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane {{ $active_tab == 'links'  ? "active" : null }}" id="links">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Links</div>

                                <div class="panel-body">

                                    <div class="center">

                                        <div class="linkPreview" id="lp1"></div>

                                        <div id="retrieveFromDatabase" ></div>
                                    </div>
                                    {{--{!! Form::open(['route' => 'links.store']) !!}--}}

                                    {{--@include('site.links.fields')--}}

                                    {{--{!! Form::close() !!}--}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            @if($lesson->links->isEmpty())
                                <div class="well text-center">No Links found.</div>
                            @else
                                <table class="table">
                                    <thead>
                                    <th>Url</th>
                                    <th>Name</th>
                                    <th width="50px">Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($lesson->links as $link)
                                        <tr>
                                            <td>{!! $link->url !!}</td>
                                            <td>{!! $link->name !!}</td>
                                            <td>
                                                {!! Form::open(['route' => 'links.delete']) !!}
                                                {!! Form::hidden('id', $link->id) !!}
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure wants to delete this Link?')">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            <div role="tabpanel" class="tab-pane {{ $active_tab == 'quiz'   ? "active" : null }}" id="quiz">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Quiz questions</div>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'quizzes.store']) !!}

                                @include('site.quizzes.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        @if($lesson->quizzes->isEmpty())
                            <div class="well text-center">No Quizzes found.</div>
                        @else
                            <table class="table">
                                <thead>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>False_Answer1</th>
                                <th>False_Answer2</th>
                                <th>False_Answer3</th>
                                {{--<th width="50px">Action</th>--}}
                                </thead>
                                <tbody>
                                @foreach($lesson->quizzes as $quiz)
                                    <tr>
                                        <td>{!! $quiz->question !!}</td>
                                        <td>{!! $quiz->answer !!}</td>
                                        <td>{!! $quiz->false_answer1 !!}</td>
                                        <td>{!! $quiz->false_answer2 !!}</td>
                                        <td>{!! $quiz->false_answer3 !!}</td>
                                        {{--<td>--}}
                                        {{--<a href="{!! route('quizzes.edit', [$quiz->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>--}}
                                        {{--<a href="{!! route('quizzes.delete', [$quiz->id]) !!}" onclick="return confirm('Are you sure wants to delete this Quiz?')"><i class="glyphicon glyphicon-remove"></i></a>--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
                <div role="tabpanel" class="tab-pane" id="lesson">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Lesson</div>

                                <div class="panel-body">
                                    {!! Form::model($lesson, ['route' => ['lessons.update', $lesson->id], 'method' => 'patch']) !!}

                                    @include('site.lessons.fields')

                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>



@endsection
@section('styles')
    @parent
    <script>
        var lesson_id = '{{ $lesson->id }}';
    </script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    {{--<script>tinymce.init({selector:'textarea'});</script>--}}
@endsection