@extends('app')

@section('content')
<div class="container">
            <div class="container-fluid main-container">
                <div class="col-md-3 sidebar">
                    <ul class="nav nav-pills nav-stacked">
                        @foreach($lesson->links as $index => $link)
                            <li class="{{ ($index == 0 ? 'active' : null) }}"><a href="#content{{$link->id}}" role="tab" data-toggle="tab">{{$link->name}}</a></li>
                        @endforeach
                        <li ><a href="#quiz-main" role="tab" data-toggle="tab">quiz</a></li>
                    </ul>
                </div>
                <div class="container-fluid main-container">
                    <div class="col-md-9 sidebar">
                        <div class="tab-content">
                                @foreach($lesson->links as $index => $link)
                                    <div role="tabpanel" class="tab-pane {{ ($index == 0 ? 'active' : null) }}" id="content{{$link->id}}">
                                        <div class="col-md-12 content">
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

                            <div role="tabpanel" class="tab-pane" id="quiz-main">
                                <div class="col-md-12 content">
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
                        </div>
                    </div>
            </div>
            </div>

@endsection

