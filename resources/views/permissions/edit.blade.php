@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($permissions, ['route' => ['permissions.update', $permissions->id], 'method' => 'patch']) !!}

        @include('permissions.fields')

    {!! Form::close() !!}
</div>
@endsection
