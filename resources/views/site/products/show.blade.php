@extends('app')

{{-- Web site Title --}}
@section('title')
    {{{ $product->name }}} ::
    @parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
    @parent

@stop

{{-- Update the Meta Description --}}
@section('meta_description')
    <meta name="description" content="{{{ $product->description }}}" />

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
    {{--<meta name="keywords" content="{{{ $product->tags}}}" />--}}

@stop

@section('meta_author')
    <meta name="author" content="{{{ $owner->name }}}" />
@stop

@section('content')
    <div class="container">

        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{route('categories.show',[$product->category->id])}}"> {{{$product->category->name}}}</a></li>
                <li>{{{ $product->name }}}</li>
            </ol>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-6">
                        <img class=" img product-thumbnail" src="{{route('getentry',$product->file->filename )}}" alt="{{$product->name}}">
                    </div>
                    <div class="col-sm-6">
                        <div class="caption-full">
                            <h4 class="pull-right">
                                <div class="col-xs-6">
                                    @include('site.products.partials.favorite-form')
                                </div>
                                <div class="col-xs-6">
                                    {{$product->favorited_count()}}
                                </div>
                            </h4>
                            <h4><a href="#">{{$product->name}}</a>
                            </h4>
                            <p>{{$product->description}}</p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">{{$product->comments()->count()}} reviews</p>
                            <p>
                            <p>Ratings
                                @for( $i = 0; $i < round($product->rating()); $i++)
                                    <span class="fa fa-star"></span>
                                @endfor
                                @for( $i = 0; $i < (5 - ($product->rating())); $i++)
                                    <span class="fa fa-star-o"></span>
                                @endfor
                            </p>
                            {{$product->rating()}} stars
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#lessons"  role="tab" data-toggle="tab">Lessons ({{$product->lessons()->count()}})</a></li>
            <li role="presentation" ><a href="#reviews" aria-controls="profile" role="tab" data-toggle="tab">Reviews ({{$product->comments()->count()}})</a></li>
            <li role="presentation" ><a href="#mods" aria-controls="profile" role="tab" data-toggle="tab">Mods</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="lessons">
                <div class="row">
                    <div class="col-sm-8">
                        @include('site.lessons.index')
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="mods">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(Auth::check() && ($product->isOwnedBy(Auth::user()) or $product->isModeratedBy(Auth::user()) ))
                            <div class="row">
                                {!! Form::open(['route' => 'mods.store']) !!}
                                <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                <!--- Tags Field --->
                                <div class="form-group">
                                    {!! Form::label('users', 'Users:') !!}
                                    {!! Form::select('users[]', Auth::user()->followers()->lists('name','id'), $product->mods()->lists('id'), ['class' => 'form-control', 'multiple', 'id' => 'product_mods']) !!}
                                </div>
                                <!--- Submit Field --->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-3">
                                @include('site.users.thumbnail', ['user' => $owner])
                            </div>
                            @foreach($mods as $user)
                                <div class="col-sm-3">
                                    @include('site.users.thumbnail', ['user' => $user])
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="reviews">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                @include('partials.ratings')
                            </div>
                            <div class="col-sm-6">
                                @if(Auth::check())
                                    @include('site.comments.comment_form')
                                @else
                                    <p>Log in to comment</p>
                                @endif
                            </div>
                        </div>

                        @foreach($product->comments as $comment)

                            @include('site.comments.show')

                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script type="text/javascript">
        $('#product_mods').select2();
    </script>

@endsection
@section('styles')
    @parent
    <style>
        @media(max-width:767px){
            .product-thumbnail{
                max-height: 300px;
            }
        }
        @media(min-width:768px){
            .product-thumbnail{
                max-height: 300px;
            }
        }
    </style>
@endsection