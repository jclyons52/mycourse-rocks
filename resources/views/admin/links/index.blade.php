@extends('admin.layout')

@section('content')


        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Links</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.links.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($links->isEmpty())
                <div class="well text-center">No Links found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Url</th>
			<th>Name</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($links as $link)
                        <tr>
                            <td>{!! $link->url !!}</td>
					<td>{!! $link->name !!}</td>
                            <td>
                                <a href="{!! route('admin.links.edit', [$link->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('admin.links.delete', [$link->id]) !!}" onclick="return confirm('Are you sure wants to delete this Link?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
@endsection