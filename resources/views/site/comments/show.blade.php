<div class="row">
    <div class="col-md-1 col-sm-2 hidden-xs">
            <a href="{{route('users.show',[$comment->user->id])}}">
            <img class="img-responsive img-circle" src="//www.gravatar.com/avatar/{{ md5($comment->user->email) }}" />
            </a>
    </div>
    <div class="col-md-10 col-sm-10">
        <div class="panel panel-default arrow left">
            <div class="panel-body">
                <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i>{{$comment->user->name}}</div>
                    <div id="stars" class="starrr" data-rating='{{$comment->rating}}'></div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>{{$comment->created_at}}</time>
                </header>
                <div class="comment-post">
                    <p>
                        {{$comment->content}}
                    </p>
                </div>
                <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
            </div>
        </div>
    </div>
</div>