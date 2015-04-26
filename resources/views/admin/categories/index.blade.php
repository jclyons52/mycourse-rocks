@extends('admin.layout')

@section('content')


        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Categories</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.categories.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($categories->isEmpty())
                <div class="well text-center">No Categories found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{!! $category->name !!}</td>
                            <td>
                                <a href="{!! route('admin.categories.edit', [$category->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('admin.categories.delete', [$category->id]) !!}" onclick="return confirm('Are you sure wants to delete this Category?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

@endsection