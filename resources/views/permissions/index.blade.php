@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Permissions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('permissions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($permissions->isEmpty())
                <div class="well text-center">No Permissions found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permissions)
                        <tr>
                            <td>{!! $permissions->name !!}</td>
                            <td>
                                <a href="{!! route('permissions.edit', [$permissions->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('permissions.delete', [$permissions->id]) !!}"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection