@extends('admin.layout')

@section('content')


        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Lessons</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.lessons.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($lessons->isEmpty())
                <div class="well text-center">No Lessons found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Description</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($lessons as $lesson)
                        <tr>
                            <td>{!! $lesson->name !!}</td>
					<td>{!! $lesson->description !!}</td>
                            <td>
                                <a href="{!! route('admin.lessons.edit', [$lesson->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('admin.lessons.delete', [$lesson->id]) !!}" onclick="return confirm('Are you sure wants to delete this Lesson?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

@endsection