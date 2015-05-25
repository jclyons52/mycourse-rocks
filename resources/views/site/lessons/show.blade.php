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
                    <div role="tabpanel">

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
    </style>

@endsection
@section('scripts')
    @parent
    <script>
        var lesson_id = '{{ $lesson->id }}';
        $( document). ready(function(){
            $('body').scrollspy({ target: '#scrolll' });
            $('iframe').each(function(){
                $(this).css('display','inline');
            });
        });

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
