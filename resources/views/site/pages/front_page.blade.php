@extends('app')

@section('content')

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To My Course Rocks!</div>
                <div class="intro-heading">Learn anything for free</div>
                <a href="#services" class="page-scroll btn btn-xl btn-info">Latest courses <i class="glyphicon glyphicon-arrow-down"></i></a>
            </div>
        </div>
    </header>
    <section id="services">
        <br/>
        <div class="container">

            @foreach($products as $product)
                @include('site.products.thumbnail')
            @endforeach
        </div>
    </section>
@endsection

@section('styles')
    @parent
    <style>
        .navbar{
            position: absolute;
            width: 100%;
        }
    </style>
@endsection

@section('scripts')
    @parent
    <script>
            $('a.page-scroll').on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: $('#services').position().top }, 1000);
            });
    </script>
@endsection