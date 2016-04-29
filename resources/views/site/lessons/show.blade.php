@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12" >
                <h1><b>{{$lesson->name}}</b> in <a href="{{route('products.show',[$lesson->product->id])}}">{{{ $lesson->product->name }}}</a></h1>
            </div>
        </div>
</div>
        <div class="container">

        <div class="row">
            <div class="col-xs-1 text-center left-hand-nav  right-border">
                @include('site.lessons.partials.sidebar')
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
