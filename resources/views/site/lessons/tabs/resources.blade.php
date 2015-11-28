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