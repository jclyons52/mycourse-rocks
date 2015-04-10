@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method' => 'patch']) !!}

        @include('admin.roles.fields')

    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $('#role_permissions').select2();
    </script>
@endsection