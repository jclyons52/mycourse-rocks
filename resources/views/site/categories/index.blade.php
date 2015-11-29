@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row text-center">
            <h1>Categories</h1>
        </div>

        <div class="row">
            @if($categories->isEmpty())
                <div class="well text-center">No Categories found.</div>
            @else
                <div class="col-sm-6 col-sm-offset-3">
                    <ul class="list-group">
                    @foreach($categories as $index => $category)
                            <a href="{!! route('categories.show', [$category->id]) !!}">
                            <li class="list-group-item">


                                    {!! $category->name !!}

                            </li>
                            </a>


                    @endforeach
                </ul>
                </div>
            @endif
        </div>

    </div>
@endsection