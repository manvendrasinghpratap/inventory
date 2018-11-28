<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Valuation') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">

    <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/font-awesome/css/font-awesome.min.css')!!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/bootstrap/css/bootstrap.min.css') !!}" />    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="{!! asset('public/css/themes/style1/pink-blue.css')!!}" class="default-style"/>
    <link type="text/css" rel="stylesheet" href="{!! asset('public/css/style-responsive.css')!!}"/>
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/style.css')!!}"/>
    <link rel="shortcut icon" href="images/favicon.html">
</head>
<body id="signin-page" class='signinpage'>
    @yield('content')
    @stack('scripts');
</body>
<script src="{!! asset('public/js/jquery-1.10.2.min.js') !!}"></script>
<script src="{!! asset('public/js/jquery-migrate-1.2.1.min.js ') !!}"></script>
<script src="{!! asset('public/js/jquery-ui.js ') !!}"></script><!--loading bootstrap js-->
<script src="{!! asset('public/vendors/bootstrap/js/bootstrap.min.js ') !!}"></script>

</html>