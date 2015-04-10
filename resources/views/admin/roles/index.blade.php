@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Roles</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.roles.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($roles->isEmpty())
                <div class="well text-center">No Roles found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{!! $role->name !!}</td>
                            <td>
                                <a href="{!! route('admin.roles.edit', [$role->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('admin.roles.delete', [$role->id]) !!}"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection