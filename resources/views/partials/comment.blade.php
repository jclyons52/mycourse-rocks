<div class="row">
    <div class="col-md-2 col-sm-2 hidden-xs">
        <figure class="thumbnail">
            <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
            <figcaption class="text-center"></figcaption>
        </figure>
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