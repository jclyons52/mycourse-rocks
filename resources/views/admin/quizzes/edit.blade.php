@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::model($quiz, ['route' => ['quizzes.update', $quiz->id], 'method' => 'patch']) !!}

        @include('quizzes.fields')

    {!! Form::close() !!}
@endsection
