@extends('layout.base')
@section('title', 'PPDB Online SMP N 1 Gabus')
@section('main')
<div class="card">
	<div class="card-header">
		<h1>PPDB ONLINE SMP NEGERI 1 GABUS 2020</h1>
	</div>
	<div class="card-content">
		<h2 style="text-align: center;">Selamat datang di PPDB Online SMP N 1 Gabus</h2>
		<p style="max-width: 514px;">Masukkan NISN yang telah terdaftar, apabila belum terdaftar silahkan daftar pada link <a href="{{ url('register') }}">ini</a></p>
		<form action="#" method="POST" class="login">
			@csrf
			<div class="form-control">
				<h3>NISN</h3>
				<input type="text" name="NISN" placeholder="Masukkan NISN" class="form">
			</div>
			<button class="btn btn-center btn-big">Proses</button>
		</form>
	</div>
</div>
@endsection