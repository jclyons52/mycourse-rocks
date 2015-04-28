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
    <!--styles-->
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
    <style>

        /* brandico */
        [class*="brandico-"]:before {
            font-family: 'brandico', sans-serif;
        }

        /* entypo */
        [class*="entypo-"]:before {
            font-family: 'entypo', sans-serif;
        }

        /* openwebicons */
        [class*="openwebicons-"]:before {
            font-family: 'OpenWeb Icons', sans-serif;
        }

        /* zocial */
        [class*="zocial-"]:before {
            font-family: 'zocial', sans-serif;
        }

        .form-signin{
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }


        .login-input {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .login-input-pass {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }


        .signup-input {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .signup-input-confirm {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }



        .create-account {
            text-align: center;
            width: 100%;
            display: block;
        }

        .form-signin .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .btn-center{
            width: 50%;
            text-align: center;
            margin: inherit;
        }

        .social-login-btn {
            margin: 5px;
            width: 20%;
            font-size: 250%;
            padding: 0;
        }

        .social-login-more {
            width: 45%;
        }

        .social-google {
            background-color: #da573b;
            border-color: #be5238;
        }
        .social-google:hover{
            background-color: #be5238;
            border-color: #9b4631;
        }

        .social-twitter {
            background-color: #1daee3;
            border-color: #3997ba;
        }
        .social-twitter:hover {
            background-color: #3997ba;
            border-color: #347b95;
        }

        .social-facebook {
            background-color: #4c699e;
            border-color: #47618d;
        }
        .social-facebook:hover {
            background-color: #47618d;
            border-color: #3c5173;
        }

        .social-linkedin {
            background-color: #4875B4;
            border-color: #466b99;
        }
        .social-linkedin:hover {
            background-color: #466b99;
            border-color: #3b5a7c;
        }

        .main-section{
            min-height: 700px;
        }
        .full {
            width: 100%;
        }
        .gap {
            height: 30px;
            width: 100%;
            clear: both;
            display: block;
        }
        .footer {
            background: #EDEFF1;
            height: auto;
            padding-bottom: 30px;
            position: relative;
            width: 100%;
            border-bottom: 1px solid #CCCCCC;
            border-top: 1px solid #DDDDDD;
        }
        .footer p {
            margin: 0;
        }
        .footer img {
            max-width: 100%;
        }
        .footer h3 {
            border-bottom: 1px solid #BAC1C8;
            color: #54697E;
            font-size: 18px;
            font-weight: 600;
            line-height: 27px;
            padding: 40px 0 10px;
            text-transform: uppercase;
        }
        .footer ul {
            font-size: 13px;
            list-style-type: none;
            margin-left: 0;
            padding-left: 0;
            margin-top: 15px;
            color: #7F8C8D;
        }
        .footer ul li a {
            padding: 0 0 5px 0;
            display: block;
        }
        .footer a {
            color: #78828D
        }
        .supportLi h4 {
            font-size: 20px;
            font-weight: lighter;
            line-height: normal;
            margin-bottom: 0 !important;
            padding-bottom: 0;
        }
        .newsletter-box input#appendedInputButton {
            background: #FFFFFF;
            display: inline-block;
            float: left;
            height: 30px;
            clear: both;
            width: 100%;
        }
        .newsletter-box .btn {
            border: medium none;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -o-border-radius: 3px;
            -ms-border-radius: 3px;
            border-radius: 3px;
            display: inline-block;
            height: 40px;
            padding: 0;
            width: 100%;
            color: #fff;
        }
        .newsletter-box {
            overflow: hidden;
        }
        .bg-gray {
            background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);
            box-shadow: 0 1px 0 #B4B3B3;
        }
        .social li {
            background: none repeat scroll 0 0 #B5B5B5;
            border: 2px solid #B5B5B5;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -o-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
            float: left;
            height: 36px;
            line-height: 36px;
            margin: 0 8px 0 0;
            padding: 0;
            text-align: center;
            width: 36px;
            transition: all 0.5s ease 0s;
            -moz-transition: all 0.5s ease 0s;
            -webkit-transition: all 0.5s ease 0s;
            -ms-transition: all 0.5s ease 0s;
            -o-transition: all 0.5s ease 0s;
        }
        .social li:hover {
            transform: scale(1.15) rotate(360deg);
            -webkit-transform: scale(1.1) rotate(360deg);
            -moz-transform: scale(1.1) rotate(360deg);
            -ms-transform: scale(1.1) rotate(360deg);
            -o-transform: scale(1.1) rotate(360deg);
        }
        .social li a {
            color: #EDEFF1;
        }
        .social li:hover {
            border: 2px solid #2c3e50;
            background: #2c3e50;
        }
        .social li a i {
            font-size: 16px;
            margin: 0 0 0 5px;
            color: #EDEFF1 !important;
        }
        .footer-bottom {
            background: #E3E3E3;
            border-top: 1px solid #DDDDDD;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .footer-bottom p.pull-left {
            padding-top: 6px;
        }
        .payments {
            font-size: 1.5em;
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

<div class="main-section">
    @yield('content')
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
	@yield('scripts')
</body>
</html>
