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
                <li> <a href="#notes-tab" role="tab" data-toggle="tab">notes</a></li>
                <hr/>
            </ul>
        </div>
    </nav>
</div>
<div class="container">

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
                                <div class="row">
                                    <ol class="breadcrumb">
                                        <li><a href="{{ url('home') }}"><i class="glyphicon glyphicon-home"></i></a></li>
                                        <li><a href="{{route('categories.show',[$lesson->product->category->id])}}">{{{$lesson->product->category->name}}}</a></li>
                                        <li><a href="{{route('products.show',[$lesson->product->id])}}">{{{ $lesson->product->name }}}</a></li>
                                        <li href="#" >{{{ $lesson->name }}}</li>
                                    </ol>
                                </div>
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
                                                    <div class="previewTitlePosted" id="pTP_{{$link->iframe_id()}}" style="width: 355px">{!! $link->title !!}
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
				                                                <span id="previewSpanTitle">{!! $link->title !!}
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
                <div role="tabpanel" class="tab-pane" id="notes-tab">
                    <div class="col-md-12 content">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                My notes
                            </div>
                            <div class="panel-body">
                                <div id="notes">

                                    <!-- The Form to Add a New Task -->
                                    <form v-on="submit: addNote">
                                        <div class="form-group">
                                            <input v-model="newNote"
                                                   v-el="newNote"
                                                   class="form-control"></input>
                                        </div>

                                        <button class="btn btn-primary">
                                            Add Note
                                        </button>
                                    </form>

                                    <!-- The List of Todos -->
                                    <div v-show="notes.length">
                                        <h1>Notes (@{{ notes.length }})</h1>

                                        <ol class="list-group">
                                            <li v-repeat="note: notes"
                                                class="list-group-item"
                                                    >
                                                <a v-on="click: removeNote(note)" class="glyphicon glyphicon-remove btn btn-danger btn-xs pull-right"></a>
                                                <span v-on="dblclick: editNote(note)">@{{ note.body }}</span>

                                            </li>
                                        </ol>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.11.10/vue.min.js"></script>
    <script>
        new Vue({

            el: '#notes',
            data: {
                notes: [],
                newNote: ''
            },
            methods: {
                addNote: function(e){
                    e.preventDefault();

                    if ( ! this.newNote) return;

                    this.notes.push({
                        body: this.newNote
                    });

                    this.newNote = '';

                },
                removeNote: function(note){
                    this.notes.$remove(note);
                }
            }

        });

    </script>
@endsection
