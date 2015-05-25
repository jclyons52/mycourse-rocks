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
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond|Share:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    <!--styles-->
    @yield('styles')
	<!-- Fonts -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>

		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->
</head>
<body>
	    @include('partials.nav')

<div class="main-section">
    @yield('content')
</div>

        <br/><br/><br/><br/><br/>

</div>
@include('partials.footer')
	<!-- Scripts -->
    <script src="{{ asset('/js/all.js') }}"></script>
    <script src="{{ asset('/js/bundle.js') }}"></script>
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
	@yield('scripts')
</body>
</html>
