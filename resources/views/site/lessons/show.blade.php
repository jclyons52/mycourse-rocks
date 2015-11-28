@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12" >
                <h1>{{$lesson->name}}</h1>
            </div>
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('home') }}"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="{{route('categories.show',[$lesson->product->category->id])}}">{{{$lesson->product->category->name}}}</a></li>
                    <li><a href="{{route('products.show',[$lesson->product->id])}}">{{{ $lesson->product->name }}}</a></li>
                    <li href="#" >{{{ $lesson->name }}}</li>
                </ol>
            </div>
        </div>
</div>
        <div class="container">

        <div class="row">
            <div class="col-xs-1 text-center left-hand-nav  right-border">
                <div class="row">
                    <a href="#video-tab" role="tab" data-toggle="tab">
                        <h4><i class="glyphicon glyphicon-play"></i><br/>videos</h4>
                    </a>
                </div>
                <br/>
                <div class="row">
                    <a href="#notes-tab" role="tab" data-toggle="tab">
                        <h4><i class="glyphicon glyphicon-edit"></i><br/>notes</h4>
                    </a>
                </div>
                <br/>
                <div class="row">
                    <a href="#quiz-tab" role="tab" data-toggle="tab">
                        <h4><i class="glyphicon glyphicon-question-sign"></i><br/>quiz</h4>
                    </a>
                </div>
                <br/>
                <div class="row">
                    <a href="#resources-tab" role="tab" data-toggle="tab">
                        <h4><i class="glyphicon glyphicon-folder-open"></i><br/>resources</h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-10 tab-content">
                <div role="tabpanel" class="col-xs-10 tab-pane active" id="video-tab">
                    <div role="tabpanel" id="videos">
                        @include('site.lessons.tabs.videos')
                    </div>
                </div>

                <div role="tabpanel" class="col-xs-10 tab-pane" id="notes-tab">
                   {{--@include('site.lessons.tabs.notes')--}}
                    <notes lesson_id="{{$lesson->id}}"></notes>
                </div>

                <div role="tabpanel" class="col-xs-10 tab-pane" id="quiz-tab">
                    <h1>quiz</h1>
                    <div class="tab-content">
                        @if(count($lesson->quizzes) > 0)
                            @include('site.quizzes.show')
                        @else
                            <h1>No quiz added</h1>
                        @endif
                    </div>
                </div>

                <div role="tabpanel" class="col-xs-10 tab-pane" id="resources-tab">
                    <h1>resources</h1>
                   @include('site.lessons.tabs.resources')
                </div>

            </div>
        </div>
    </div>

    {{--end of section--}}

@endsection
@section('styles')
    @parent

    <style>
        .right-border{
            border-right: thin solid black;
        }
        .bottom-border{
            border-bottom: thin solid black;
        }
        input[type=range][orient=vertical]
        {
            writing-mode: bt-lr; /* IE */
            -webkit-appearance: slider-vertical; /* WebKit */
            width: 8px;
            height: 175px;
            padding: 0 5px;
        }
    </style>

@endsection
