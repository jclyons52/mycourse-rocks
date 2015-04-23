@extends('app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-4">
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
                        <h2><strong>{{Auth::user()->products()->count()}}</strong></h2>
                        <p><small>Favorites</small></p>

                    </div>
                </div>
            </div>
            </div>
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Favorites</div>

				<div class="panel-body">
                    @foreach(Auth::user()->products as $product)

                        @include('site.products.thumbnail')

                    @endforeach
				</div>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-sm-4">
            <a href="{{route('products.create')}}" class="btn btn-default">create a course</a>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
</div>
@endsection
