@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($quiz, ['route' => ['quizzes.update', $quiz->id], 'method' => 'patch']) !!}

        @include('quizzes.fields')

    {!! Form::close() !!}
</div>
@endsection
