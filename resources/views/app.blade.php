<!DOCTYPE html>
<html lang="en">
<head>
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

                <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{--<link href="{{ asset('css/all.css') }}" rel="stylesheet">--}}

        @yield('styles', '')

                <!-- Spark Globals -->
        @include('spark::scripts.globals')

                <!-- Injected Scripts -->

        @yield('scripts', '')

                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body id="spark-layout">
<!-- Vue App For Spark Screens -->
<div id="spark-app" v-cloak>
    <!-- Navigation -->
    @if (Auth::check())
    @include('spark::nav.authenticated')
    @else
    @include('spark::nav.guest')
    @endif

            <!-- Main Content -->
    @yield('content')

            <!-- Footer -->
    @include('spark::common.footer')

            <!-- JavaScript Application -->
    <script src="{{  elixir('js/app.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('/js/all.js') }}"></script>

    <script>
        $('.pull-down-thumbnail').each(function() {
            $(this).css('margin-top', $(this).parent().height()-$(this).height())
        });
    </script>
    <script>
        var token = '{{ csrf_token() }}';
        $(document).ready(function() {

            $('#lp1').linkPreview();
            // changing placeholder
            $('#lp2').linkPreview({placeholder: "Second Field"});

            // bind to a tag the results brought from database
            $('#retrieveFromDatabase').linkPreviewRetrieve();
        });
    </script>

</div>
</body>
</html>