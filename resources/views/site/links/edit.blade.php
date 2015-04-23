@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($link, ['route' => ['admin.links.update', $link->id], 'method' => 'patch']) !!}

        @include('admin.links.fields')

    {!! Form::close() !!}
</div>
@endsection
