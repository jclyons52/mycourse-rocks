@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($lesson, ['route' => ['lessons.update', $lesson->id], 'method' => 'patch']) !!}

        @include('lessons.fields')

    {!! Form::close() !!}
</div>
@endsection
