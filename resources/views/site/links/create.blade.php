@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.links.store']) !!}

        @include('admin.links.fields')

    {!! Form::close() !!}

</div>
@endsection