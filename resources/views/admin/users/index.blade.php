@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Users</h1>
        </div>

        <div class="row">
            @if($users->isEmpty())
                <div class="well text-center">No Users found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>
                                <a href="{!! route('admin.users.edit', [$user->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('admin.users.delete', [$user->id]) !!}"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection