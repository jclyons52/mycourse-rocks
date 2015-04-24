@extends('app')

@section('content')
<div class="container">

    @include('common.errors')
    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['route' => 'lessons.store']) !!}

            @include('site.lessons.fields')

            {!! Form::close() !!}
        </div>
    </div>



</div>
@endsection
