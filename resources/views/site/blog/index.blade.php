@extends('app')

{{-- Content --}}
@section('content')
    @foreach ($posts as $post)
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Post Title -->
                    <div class="row">
                        <div class="col-md-8">
                            <h4><strong><a href="{{{ $post->url() }}}">{{ ($post->title) }}</a></strong></h4>
                        </div>
                    </div>
                    <!-- ./ post title -->

                    <!-- Post Content -->
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{{ $post->url() }}}" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
                        </div>
                        <div class="col-md-6">
                            <p>
                                {{ (Str::limit($post->content, 200)) }}
                            </p>
                            <p><a class="btn btn-mini btn-default" href="{{{ route('blog.posts.show', [$post->id]) }}}">Read more</a></p>
                        </div>
                    </div>
                    <!-- ./ post content -->

                    <!-- Post Footer -->
                    {{--<div class="row">--}}
                    {{--<div class="col-md-8">--}}
                    {{--<p></p>--}}
                    {{--<p>--}}
                    {{--<span class="glyphicon glyphicon-user"></span> by <span class="muted">{{{ $post->author->username }}}</span>--}}
                    {{--| <span class="glyphicon glyphicon-calendar"></span> <!--Sept 16th, 2012-->{{{ $post->date() }}}--}}
                    {{--| <span class="glyphicon glyphicon-comment"></span> <a href="{{{ $post->url() }}}#comments">{{$post->comments()->count()}} {{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}</a>--}}
                    {{--</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <!-- ./ post footer -->
                </div>
            </div>

            <hr />
            @endforeach

            {{ $posts->render() }}
        </div>

@stop