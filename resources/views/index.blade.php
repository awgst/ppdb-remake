@extends('layout.base')
@section('title', 'PPDB Online SMP N 1 Gabus')
@section('main')
<div class="card">
	<div class="card-header">
		<h1>PPDB ONLINE SMP NEGERI 1 GABUS 2020</h1>
		<a href="{{ url('login') }}">Login</a>
	</div>
	<div class="card-content">
		<h2>Selamat datang di PPDB Online SMP N 1 Gabus</h2>
		<h4>Langkah untuk mendaftar</h4>
		<div class="langkah-pendaftaran">
			<p>1. Siapkan foto berukuran 3x4, ukuran maks 2MB<br>
			2. Daftarkan diri anda, dapat melalui link <a href="{{ url('student/create') }}">ini</a><br>
			3. Cetak dan simpan bukti pendaftaran</p>
			<div class="buttons">
				<a href="{{ url('student/create') }}" class="btn">DAFTAR</a>
				<a href="{{ url('student/printView') }}" class="btn">CETAK</a>
				<a href="{{ url('student/registrant') }}" class="btn">DATA PENDAFTAR</a>	
			</div>
		</div>
	</div>
</div>
@endsection