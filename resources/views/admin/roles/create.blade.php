@extends('admin.layout')

@section('content')

    @include('common.errors')

    {!! Form::open(['route' => 'roles.store']) !!}

        @include('admin.roles.fields')

    {!! Form::close() !!}
@endsection

@section('scripts')

    <script type="text/javascript">
        $('#role_permissions').select2();
    </script>
@endsection