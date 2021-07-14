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
		<form method="POST" class="login" id="find_nisn">
			@csrf
			<div class="form-control">
				<h3>NISN</h3>
				<input type="text" name="nisn" placeholder="Masukkan NISN" class="form">
			</div>
			<button class="btn btn-center btn-big">Proses</button>
		</form>
		<div class="result">
			<center id="loading" style="display: none;">
				<img src="http://localhost:8000/images/loading.gif" style="
					width: 75px;
					height: 75px;
				">
			</center>
		</div>
	</div>
</div>
@endsection
@section('custom-script')
	<script>
		$(document).ready(function () {
			$('#find_nisn').on('submit', function (e) {
				e.preventDefault();
				$('#loading').css('display', 'block');
				$.ajax({
					type: "POST",
					url: "{{ url('student/findStudent') }}",
					data: $('#find_nisn').serialize(),
					success: function (response) {
						$('#loading').css('display', 'none');
						if(response.length){
							console.log(response[0]);
							$('.result').html('');
							$('.result').append('<p style="border-color: #d6e9c6; background-color: #dff0d8; color: #3c763d">Data ditemukan</p>');
							$('.result').append("Nama : "+response[0].name);
							$('.result').append("<br>NISN : "+response[0].nisn);
							$('.result').append("<br>Sekolah asal : "+response[0].asal_sekolah);
							$('.result').append("<br>Alamat : "+response[0].alamat+"<br><br>");
							$('.result').append('<a id="print">Cetak</a>');
							$('#print').addClass('btn btn-big');
							$('#print').attr('href', '{{ url("/student/print") }}/'+response[0].id);
							$('.result').html($('.result').html());
						}
						else{
							$('.result').html('');
							$('.result').html('<p style="border-color: #f2dede; background-color: #ebccd1; color: #a94442">Data tidak ditemukan</p>');
						}
					},
					error: function(xhr, status, error){
						alert("Error - Terjadi kesalahan silahkan coba kembali dalam beberapa saat");
						$('#loading').css('display', 'none');
					}
				});
			});
		});
	</script>
@endsection