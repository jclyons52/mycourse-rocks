@extends('admin.layout')

@section('content')


        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Posts</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.posts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($posts->isEmpty())
                <div class="well text-center">No Posts found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>User_Id</th>
			<th>Title</th>
			<th>Slug</th>
			<th>Content</th>
			<th>Meta_Title</th>
			<th>Meta_Description</th>
			<th>Meta_Keywords</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{!! $post->user_id !!}</td>
					<td>{!! $post->title !!}</td>
					<td>{!! $post->slug !!}</td>
					<td>{!! $post->content !!}</td>
					<td>{!! $post->meta_title !!}</td>
					<td>{!! $post->meta_description !!}</td>
					<td>{!! $post->meta_keywords !!}</td>
                            <td>
                                <a href="{!! route('admin.posts.edit', [$post->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('admin.posts.delete', [$post->id]) !!}" onclick="return confirm('Are you sure wants to delete this Post?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

@endsection