@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'quizzes.store']) !!}

        @include('quizzes.fields')

    {!! Form::close() !!}
@endsection
