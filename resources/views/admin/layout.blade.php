<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title')
            My Course Rocks
        @show
    </title>
    @section('meta_keywords')
        <meta name="keywords" content="learning, tutorial, online courses, education" />
    @show
    @section('meta_author')
        <meta name="author" content="" />
    @show
    @section('meta_description')
        <meta name="description" content="Take a free online course, or create your own!" />
    @show
    <title></title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    @yield('styles')
    <style>
        .btn-circle.btn-xl {
            width: 180px;
            height: 180px;
            padding: 10px 16px;
            font-size: 24px;
            line-height: 1.33;
            border-radius: 90px;
        }
    </style>
    <!-- Fonts -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.0/react.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.0/JSXTransformer.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>--}}
</head>
<body>

@include('partials.nav')
<div class="container">
<div class="row">
    <div class="col-sm-3">
        @if(Auth::check() && Auth::user()->hasRole('admin'))
            @include('partials.adminNav')
        @endif
    </div>
    <div class="col-sm-9">
        @yield('content')
    </div>
</div>
    </div>


<!-- Scripts -->
<script src="{{ asset('/js/all.js') }}"></script>
<script src="{{ asset('/js/bundle.js') }}"></script>
@yield('scripts')
</body>
</html>