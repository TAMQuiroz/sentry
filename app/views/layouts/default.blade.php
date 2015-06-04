<!doctype <!DOCTYPE html>
<html>
<head>
	<title>Sentry</title>
	{{ HTML::style('css/bootstrap.min.css') }}
	@yield('extra_css')
</head>
<body>
    <header>
    @if(Auth::check())
		@include('layouts.header.private')
	@else
		@include('layouts.header.public')
	@endif
    </header>
    @yield('content')

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
