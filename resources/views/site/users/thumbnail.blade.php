
<div class="col-sm-12">
    <div class="thumbnail">
        @if(isset($user->avatar))
            <img class="img-responsive img-circle" src="{{ $user->avatar }}" />
        @else
            <img class="img-responsive img-circle" src="//www.gravatar.com/avatar/{{ md5($user->email) }}" />
        @endif
        <div class="caption text-center">
            <h3>{{$user->name}}</h3>
        </div>
    </div>
</div>