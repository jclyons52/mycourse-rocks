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
                                <a href="#link-panel{{$index}}">{!! $link->title !!}</a>
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
                                        @foreach($lesson->links as $index => $link)
                                            @if($link->iframe != "")

                                                <div class="previewPosted" style="" id="link-panel{{$index}}" >
                                                    <div class="previewTextPosted"> {{$link->text}}
                                                    </div> {!! $link->iframe !!}
                                                    <div class="previewImagesPosted">
                                                        <div class="previewImagePosted">
                                                            <img id="img_{{$link->iframe_id()}}" src="{{$link->image}}" class="imgIframe" style="width: 130px; height: auto; float: left;">
			                                                <span class="videoPostPlay">
			                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="previewContentPosted">
                                                        <div class="previewTitlePosted" id="pTP_{{$link->iframe_id()}}" style="width: 355px">{{$link->title}}
                                                        </div>
                                                        <div class="previewUrlPosted">{{$link->canonicalUrl}}
                                                        </div>
                                                        <div class="previewDescriptionPosted" id="pDP_{{$link->iframe_id()}}" style="width: 355px">
		                                                    <span id="previewSpanDescription">{{$link->description}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div style="clear: both">
                                                    </div>
                                                </div>
                                            @else
                                                <div class="previewPosted" style="" id="link-panel{{$index}}" >
                                                    <div class="previewTextPosted"> {{$link->text}}
                                                    </div>
                                                    <div class="previewImagesPosted">
                                                        <div class="previewImagePosted">
                                                            <a href="{{$link->url}}" target="_blank">
                                                                <img src="{{$link->image}}" style="width: 130px; height: auto; float: left;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="previewContentPosted">
                                                        <div class="previewTitlePosted" >
                                                            <a href="{{$link->url}}" target="_blank">
				                                                <span id="previewSpanTitle">{{$link->title}}
				                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="previewUrlPosted">{{$link->canonicalUrl}}
                                                        </div>
                                                        <div class="previewDescriptionPosted"  >
			                                                <span id="previewSpanDescription">{{$link->description}}
			                                                </span>
                                                        </div>
                                                        <div style="clear: both">
                                                        </div>
                                                    </div>
                                                    </div>

                                            @endif
                                        @endforeach
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
