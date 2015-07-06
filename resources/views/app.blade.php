<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reddit</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body class="container">

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Reddit</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  			<ul class="nav navbar-nav">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="{{ route('links.create') }}">Create a link</a></li>
  			</ul>
  			<ul class="nav navbar-nav navbar-right">
  				@unless (Auth::check())
	  				<li><a href="{{ url('/auth/login') }}">Login</a></li>
	  				<li><a href="{{ url('/auth/register') }}">Register</a></li>
				@else
					<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
  				@endunless
			</ul>
		</div>
	</div>
</nav>

@include('errors.list')
@include('flash::message')
@yield('content')
<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>