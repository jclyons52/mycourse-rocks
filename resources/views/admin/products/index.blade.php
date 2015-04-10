@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Products</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.products.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($products->isEmpty())
                <div class="well text-center">No Products found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Price</th>
			<th>Description</th>
			<th>Category</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{!! $product->name !!}</td>
					<td>{!! $product->price !!}</td>
					<td>{!! $product->description !!}</td>
					<td>{!! $product->category !!}</td>
                            <td>
                                <a href="{!! route('admin.products.edit', [$product->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('admin.products.delete', [$product->id]) !!}" onclick="return confirm('Are you sure wants to delete this Product?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection