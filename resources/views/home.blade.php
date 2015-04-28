@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-4 text-center">
                            <figure>
                                <img class="img-responsive img-circle" src="//www.gravatar.com/avatar/{{ md5($user->email) }}" />
                            </figure>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <h2>{{$user->name}}</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>

                        </div>


                        <div class="col-xs-12 divider text-center">
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong> {{$user->followerCount()}} </strong></h2>
                                <p><small>Followers</small></p>
                            </div>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong>{{$user->followerCount()}}</strong></h2>
                                <p><small>Following</small></p>
                            </div>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong>{{Auth::user()->favorites_count()}}</strong></h2>
                                <p><small>Favorites</small></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            My courses {{Auth::user()->owned_count()}}
                            <div class="pull-right btn-group">
                                <a href="{{route('products.create')}}" class="btn btn-primary">create a course</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel-body">
                            @foreach(Auth::user()->products as $product)
                                @if($product->pivot->owner == true)
                                    @include('site.products.thumbnail')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Favorites</div>

                        <div class="panel-body">
                            @foreach(Auth::user()->products as $product)
                                @if($product->pivot->favorite == true)
                                    @include('site.products.thumbnail')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
@endsection
