@extends('app')

@section('content')

    <div class="col-md-3 sidebar pull-right">
        <nav style="position: fixed; top: 150px;">
            <div class="center" id="scrolll">
                <ul class="nav bs-docs-sidenav">
                    <hr/>
                        <a href="#content" role="tab" data-toggle="tab">{{$lesson->name}}</a>
                    <ul class="nav" id="collapseSidenav">
                        @foreach($lesson->links as $index => $link)
                            <li>
                                <a href="#link-panel{{$index}}">{{$link->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="#quiz-main" role="tab" data-toggle="tab">quiz</a>
                    <hr/>
                </ul>
            </div>
        </nav>
    </div>
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
            <div class="col-md-9 sidebar">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="content">
                        <div class="col-md-12 content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Links
                                </div>
                                <div class="panel-body">
                                    <div class="center">
                                        <div id="retrieveFromDatabase" ></div>
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
                                        @if(count($lesson->quizzes) > 0)
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
</div>
@endsection
@section('scripts')
    @parent
    <script>
        var lesson_id = '{{ $lesson->id }}';
        $('body').scrollspy({ target: '#scrolll' });
    </script>
@endsection
