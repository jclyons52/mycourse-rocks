@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'roles.store']) !!}

        @include('admin.roles.fields')

    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $('#role_permissions').select2();
    </script>
@endsection