@extends('app')

@section('content')

            <div class="container-fluid main-container">
                <div class="col-md-2 sidebar">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active" ><a href="#content" role="tab" data-toggle="tab">content</a></li>
                        <li ><a href="#quiz-list" role="tab" data-toggle="tab">quiz</a></li>
                    </ul>
                </div>
                <div class="container-fluid main-container">
                    <div class="col-md-2 sidebar">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="content">
                                <ul class="nav nav-pills nav-stacked">

                                    @foreach($lesson->links as $index => $link)
                                        <li class="{{ ($index == 0 ? 'active' : null) }}"><a href="#content{{$link->id}}" role="tab" data-toggle="tab">{{$link->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="quiz-list">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($lesson->quizzes as $index => $quiz)
                                        <li class=""><a href="#quiz{{$quiz->id}}" role="tab" data-toggle="tab">question {{$index}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="quiz">
                        <div class="col-md-8 content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Quiz
                                </div>
                                <div class="panel-body">
                                    <div class="panel-body">
                                        @include('site.quizzes.show')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($lesson->quizzes as $index => $quiz)
                        <div role="tabpanel" class="tab-pane" id="quiz{{$quiz->id}}">
                            <div class="col-md-8 content">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Quiz
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-body">
                                            {{json_encode($quiz)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach($lesson->links as $index => $link)
                        <div role="tabpanel" class="tab-pane {{ ($index == 0 ? 'active' : null) }}" id="content{{$link->id}}">
                            <div class="col-md-8 content">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    {{$lesson->name}}
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-body">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="{{$link->url}}"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>


@endsection