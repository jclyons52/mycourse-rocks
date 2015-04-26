@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'patch']) !!}

        @include('admin.users.fields')

    {!! Form::close() !!}
@endsection

@section('scripts')

<script type="text/javascript">
    $('#user_roles').select2();
</script>
@endsection