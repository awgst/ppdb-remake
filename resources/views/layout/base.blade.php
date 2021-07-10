<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="body gradient-bg">
		@yield('main')
		<footer>
			<center>Copyright &copy 2020-<?=date('Y');?></center>
		</footer>
	</div>
	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>