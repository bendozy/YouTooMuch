
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="XSRF-TOKEN" content="{{ csrf_token() }}" >
</head>
<body>
	<section>
		@yield('content')
	</section>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/uploadtest.js') }}"></script>
</body>
</html>