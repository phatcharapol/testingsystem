<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link href="{{asset('css/core.css')}}" rel="stylesheet">
<!--===============================================================================================-->
<!-- 	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> -->
<!--===============================================================================================-->

<!--===============================================================================================-->
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>

    {{-- @include('layouts.nav') --}}

	<div class="limiter">

            @yield('login-form')

	</div>

	<script src="{{asset('js/core.js')}}"></script>

</body>
</html>
