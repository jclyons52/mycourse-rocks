@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'permissions.store']) !!}

        @include('admin.permissions.fields')

    {!! Form::close() !!}
</div>
@endsection
