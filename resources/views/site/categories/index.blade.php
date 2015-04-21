@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Categories</h1>
        </div>

        <div class="row">
            @if($categories->isEmpty())
                <div class="well text-center">No Categories found.</div>
            @else
                    @foreach($categories as $index => $category)
                        @if($index % 4 == 0 && $index != 0)
                            </div>
                            <br/>
                        @endif
                        @if($index % 4 == 0)
                            <div class="row">
                                @endif
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-default btn-circle btn-xl">
                                <a href="{!! route('categories.show', [$category->id]) !!}">{!! $category->name !!}</a>
                            </button>
                        </div>

                    @endforeach
            @endif
        </div>

    </div>
@endsection