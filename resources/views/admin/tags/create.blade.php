@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.tags.store']) !!}

        @include('admin.tags.fields')

    {!! Form::close() !!}
</div>
@endsection
