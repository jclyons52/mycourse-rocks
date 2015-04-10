@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($permissions, ['route' => ['admin.permissions.update', $permissions->id], 'method' => 'patch']) !!}

        @include('admin.permissions.fields')

    {!! Form::close() !!}
</div>
@endsection
