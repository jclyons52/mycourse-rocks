@extends('app')

@section('content')
<div class="container">

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
            <li><a href="{{route('categories.show',[$lesson->product->category->id])}}">{{{$lesson->product->category->name}}}</a></li>
            <li><a href="{{route('products.show',[$lesson->product->id])}}">{{{ $lesson->product->name }}}</a></li>
            <li href="#" >{{{ $lesson->name }}}</li>
        </ol>
    </div>

            <div class="container-fluid main-container">
                <div class="col-md-3 sidebar">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#description" role="tab" data-toggle="tab">Lesson overview</a></li>
                            <li class=""><a href="#content" role="tab" data-toggle="tab">Links</a></li>
                        <li ><a href="#quiz-main" role="tab" data-toggle="tab">quiz</a></li>
                    </ul>
                </div>
                <div class="container-fluid main-container">
                    <div class="col-md-9 sidebar">
                        <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="content">
                                        <div class="col-md-12 content">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    {{$lesson->name}}
                                                </div>
                                                <div class="panel-body">
                                                    <div class="center">
                                                        <div id="retrieveFromDatabase" ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <div class="col-md-12 content">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Lesson Overview
                                                </div>
                                                <div class="panel-body">
                                                    <div class="panel-body">
                                                        {!! $lesson->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <div role="tabpanel" class="tab-pane" id="quiz-main">
                                <div class="col-md-12 content">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Quiz
                                        </div>
                                        <div class="panel-body">
                                            <div class="panel-body">
                                                @if($lesson->quizzes)
                                                    @include('site.quizzes.show')
                                                @else
                                                    <h1>No quiz added</h1>
                                                @endif

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
@section('scripts')
    @parent
        <script>
            var lesson_id = '{{ $lesson->id }}';
        </script>
    @endsection
