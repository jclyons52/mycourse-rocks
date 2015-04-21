@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.lessons.store']) !!}

        @include('admin.lessons.fields')

    {!! Form::close() !!}
</div>
@endsection
