@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'lessons.store']) !!}

        @include('lessons.fields')

    {!! Form::close() !!}
</div>
@endsection
