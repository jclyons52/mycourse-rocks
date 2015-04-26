@extends('admin.layout')

@section('content')


        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Tags</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.tags.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tags->isEmpty())
                <div class="well text-center">No Tags found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{!! $tag->name !!}</td>
                            <td>
                                <a href="{!! route('admin.tags.edit', [$tag->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('admin.tags.delete', [$tag->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tag?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

@endsection