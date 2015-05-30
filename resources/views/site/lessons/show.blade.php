@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('home') }}"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="{{route('categories.show',[$lesson->product->category->id])}}">{{{$lesson->product->category->name}}}</a></li>
                    <li><a href="{{route('products.show',[$lesson->product->id])}}">{{{ $lesson->product->name }}}</a></li>
                    <li href="#" >{{{ $lesson->name }}}</li>
                </ol>
            </div>
        </div>
        <div class="row  bottom-border">
            <h1>{{$lesson->name}}</h1>
        </div>
        <div class="row">
            <div class="col-xs-1 text-center left-hand-nav  right-border">
                <div class="row"><a href="#video-tab" role="tab" data-toggle="tab"><h4><i class="glyphicon glyphicon-play"></i><br/>videos</h4></a></div>
                <br/><div class="row"><a href="#notes-tab" role="tab" data-toggle="tab"><h4><i class="glyphicon glyphicon-edit"></i><br/>notes</h4></a></div>
                <br/><div class="row"><a href="#quiz-tab" role="tab" data-toggle="tab"><h4><i class="glyphicon glyphicon-question-sign"></i><br/>quiz</h4></a></div>
                <br/><div class="row"><a href="#resources-tab" role="tab" data-toggle="tab"><h4><i class="glyphicon glyphicon-folder-open"></i><br/>resources</h4></a></div>
            </div>
            <div class="col-sm-10 tab-content">
                <div role="tabpanel" class="col-xs-10 tab-pane active" id="video-tab">
                    <div role="tabpanel" id="videos">

                        <div class="row">
                            <!-- Nav tabs -->
                            <ul class="pagination pagination-sm" role="tablist">
                                <?php $count = 0; ?>
                                @foreach($lesson->links as $index => $link)
                                    @if($link->iframe != "")

                                        <li role="presentation" class="{{($count == 0 ? 'active' : null )}}"><a href="#iframe-link-panel{{$index}}" aria-controls="iframe-link-panel{{$index}}" role="tab" data-toggle="tab">{{$count}}</a></li>
                                        <?php $count++ ?>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-xs-1">
                                <div class="row">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </div>
                                <div class="row">
                                    <div class="range">
                                        <input
                                                v-model="zoom"
                                                type="range"
                                                name="range"
                                                min="1"
                                                max="7"
                                                v-on="change: changeZoom"
                                                orient="vertical">
                                    </div>
                                </div>
                                <div class="row">
                                    <i class="glyphicon glyphicon-minus"></i>
                                </div>



                            </div>

                           <div class="col-xs-11">
                               <!-- Tab panes -->
                               <div class="tab-content">
                                   <?php $count = 0; ?>
                                   @foreach($lesson->links as $index => $link)
                                       @if($link->iframe != "")
                                           <div role="tabpanel" class="tab-pane {{($count == 0 ? 'active' : null )}}" id="iframe-link-panel{{$index}}">
                                               <div class="col-sm-12">
                                                   {!! $link->iframe !!}
                                               </div>
                                           </div>
                                           <?php $count++ ?>
                                       @endif
                                   @endforeach
                               </div>
                           </div>
                        </div>

                    </div>
                    <nav>
                        <ul class="pagination pagination-sm">
                        </ul>
                    </nav>
                    <div class="tab-content">

                    </div>

                </div>
                <div role="tabpanel" class="col-xs-10 tab-pane" id="notes-tab">
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
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @foreach($lesson->links as $index => $link)
                                @if($link->iframe == "")
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
@section('scripts')
    @parent
    <script>
        var lesson_id = '{{ $lesson->id }}';
        var notes_data = [];

        $( document). ready(function(){
            $('body').scrollspy({ target: '#scrolll' });
            $('iframe').each(function(){
                $(this).css('display','inline');
            });
//            $.get( "/api/notes", function( data ) {if(data.flag == true){console.log( data.data)}});
        });

    </script>
    <script>
        new Vue({
            el: '#videos',
            data: {
                zoom: 4
            },
            methods: {
                changeZoom: function(){
                    that = this;
                    $('iframe').each(function(){
                        var height = that.zoom * 315/3;
                        var width = that.zoom * 560/3;
                        $(this).css('height', height);
                        $(this).css('width',width);
                    });
                }
            }
        });

        new Vue({

            el: '#notes',
            data: {
                notes: [],
                newNote: ''
            },

            ready: function(){
                that = this;
                console.log('fire!');
                $.get( "/api/notes",{lesson_id: lesson_id, user_id: '{{ Auth::id() }}' } , function( data ) {
                    notes_data = data.data;
                    for(var i=0; i< notes_data.length; i++){
                        that.notes.push({
                            body: notes_data[i].body,
                            id: notes_data[i].id
                        });
                    }
                });
            },

            methods: {



                addNote: function(e){
                    e.preventDefault();

                    if ( ! this.newNote) return;

                    this.notes.push({
                        body: this.newNote,
                        lesson_id: lesson_id,
                        user_id: '{{ Auth::id() }}'
                    });

                    $.post(
                            '/api/notes',
                            {
                                body: this.newNote,
                                lesson_id: lesson_id,
                                user_id: '{{ Auth::id() }}',
                                _token: token
                            },
                            function( data ){
                                console.log(data);
                            }
                    );

                    this.newNote = '';


                },
                removeNote: function(note){
                    this.notes.$remove(note);
                    $.get( "/api/notes/"+note.id+"/delete", function( data ) {
                        console.log(data);

                    });

                }
            }

        });

    </script>
@endsection
