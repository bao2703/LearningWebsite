<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script>
		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
	</script>

	<title>Laravel</title>

	<!-- styles -->
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/lib.css') }}" rel="stylesheet">

	<!-- scripts -->
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/js/lib.js') }}"></script>

</head>
<body>

<div class="navbar navbar-inverse navbar-static-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Neptune</a>
		</div>
		<div id="navbar-collapse" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">

			</ul>

			@include('client.shared.navbar-right')
		</div>
	</div>
</div>

<div class="content">
	@yield('content')
</div>

<footer>
	Footer
</footer>
</body>
</html>