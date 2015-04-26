@extends('admin.layout')

@section('content')


        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Comments</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('comments.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($comments->isEmpty())
                <div class="well text-center">No Comments found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Content</th>
			<th>Rating</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{!! $comment->content !!}</td>
					<td>{!! $comment->rating !!}</td>
                            <td>
                                <a href="{!! route('comments.edit', [$comment->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('comments.delete', [$comment->id]) !!}" onclick="return confirm('Are you sure wants to delete this Comment?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
@endsection