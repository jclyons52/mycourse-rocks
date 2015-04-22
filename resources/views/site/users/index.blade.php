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
                    <a href="{{route('users.show',[$user->id])}}">
                        <img class="img-responsive img-circle" src="//www.gravatar.com/avatar/{{ md5($user->email) }}" />
                    </a>
                </div>

                @endforeach
                @endif
            </div>

    </div>
@endsection