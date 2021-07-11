<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	@yield('custom-style')
</head>
<body>
	<div class="body gradient-bg">
		@yield('main')
		<footer>
			<center>Copyright &copy 2020-<?=date('Y');?></center>
		</footer>
	</div>
	<!-- Custom JS -->
	<script src="{{ asset('js/script.js') }}"></script>
	@yield('custom-script')
	<!-- Page level plugin JavaScript-->
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>