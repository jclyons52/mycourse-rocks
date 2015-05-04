@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Users</h1>
        </div>

        <div class="row">
            @if($users->isEmpty())
                <div class="well text-center">No Users found.</div>
            @else
                @foreach($users as $index => $user)
                    @if($index % 4 == 0 && $index != 0)
        </div>
        <br/>
        @endif
        @if($index % 4 == 0)
            <div class="row">
                @endif
                <div class="col-sm-3">
                    <div class="panel panel-body">
                        <a href="{{route('users.show',[$user->id])}}">
                            @if(isset($user->avatar))
                                <img class="img-responsive img-circle" src="{{ $user->avatar }}" />
                            @else
                                <img class="img-responsive img-circle" src="//www.gravatar.com/avatar/{{ md5($user->email) }}" />
                            @endif
                                    <h3>{{$user->name}}</h3>
                        </a>
                    </div>
                </div>

                @endforeach
                @endif
            </div>

    </div>
@endsection