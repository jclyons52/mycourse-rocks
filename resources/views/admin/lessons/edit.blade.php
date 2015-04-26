@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($lesson, ['route' => ['admin.lessons.update', $lesson->id], 'method' => 'patch']) !!}

        @include('admin.lessons.fields')

    {!! Form::close() !!}
</div>
@endsection
