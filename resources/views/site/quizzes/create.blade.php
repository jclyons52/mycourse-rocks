@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'quizzes.store']) !!}

        @include('site.quizzes.fields')

    {!! Form::close() !!}
</div>
@endsection
