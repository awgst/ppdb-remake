@extends('layout.base')
@section('title', 'PPDB Online SMP N 1 Gabus')
@section('main')
<div class="card">
	<div class="card-header">
		<h1>FORMULIR PENDAFTARAN PPDB ONLINE 2020</h1>
	</div>
	<div class="card-content">
		<p style="max-width: 597px; margin-top: 0;">Isilah form pendaftaran berikut dengan lengkap dan benar, pastikan anda mengisi semua data dengan benar. Setelah anda mengklik tombol daftar dibawah maka data sudah tidak dapat dirubah.</p>
		<form action="{{ url('student') }}" method="POST" class="register" autocomplete="off" enctype="multipart/form-data">
			@csrf
			<div class="form-control">
				<h3>Nomor Registrasi</h3>
				<input type="text" name="noreg" disabled class="form">
			</div>
			<div class="form-control">
				<h3>Nama Lengkap</h3>
				<input type="text" name="name" class="form @error('name') is-invalid @enderror" autofocus  placeholder="Masukkan nama lengkap">
				@error('name')
					<label>{{ $message }}</label>
				@enderror
			</div>
			<div class="form-control">
				<h3>NISN</h3>
				<input type="text" name="nisn" class="form" placeholder="Masukkan NISN">
			</div>
			<div class="form-control">
				<h3>Sekolah Asal</h3>
				<input type="text" name="asal_sekolah" class="form" placeholder="Masukkan asal sekolah">
			</div>
			<div class="form-control">
				<h3>Tempat / Tgl Lahir</h3>
				<div class="baris">
					<div class="kolom big">
						<input type="text" name="tempat_lahir" class="form" placeholder="Masukkan tempat lahir">
						<label class="label-form">Tempat Lahir</label>
					</div>
					<div class="kolom">
						<input type="date" name="tgl_lahir" class="form">
						<label class="label-form">Tanggal Lahir</label>
					</div>
				</div>
				
			</div>
			<div class="form-control">
				<h3>Jenis Kelamin</h3>
				<div class="baris baris-small">
					<input type="radio" name="jenis_kelamin" value="Laki-laki" checked="true">Laki-laki
					<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
				</div>
			</div>
			<div class="form-control">
				<h3>Agama</h3>
				<select class="form" name="agama">
					<option disabled selected>Pilih</option>
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen</option>
					<option value="Katholik">Katholik</option>
					<option value="Hindu">Hindu</option>
					<option value="Budha">Budha</option>
					<option value="Kong Hu Cu">Kong Hu Cu</option>
				</select>
			</div>
			<div class="form-control">
				<h3>Alamat</h3>
				<textarea class="form fixed-size" name="alamat" placeholder="Masukkan alamat lengkap"></textarea>
			</div>
			<div class="form-control">
				<h3>Nama Orang Tua / Wali</h3>
				<input type="text" name="nama_wali" class="form" placeholder="Masukkan nama orang tua / wali">
			</div>
			<div class="form-control">
				<h3>Alamat Orang Tua / Wali</h3>
				<textarea class="form fixed-size" name="alamat_wali" placeholder="Masukkan alamat orang tua / wali"></textarea>
			</div>
			<div class="form-control">
				<h3>Jarak rumah dari SMP Negeri 1 Gabus</h3>
				<div class="baris">
					<div class="kolom big">
						<input type="number" class="form" name="jarak" step="0.01" placeholder="Masukkan jarak rumah dengan SMP N 1 Gabus">
						<label class="label-form">Gunakan . untuk menulis koma</label>
					</div>
					<div class="kolom">
						<input type="text" disabled class="form" value="KM" style="background-color: transparent;">
					</div>
				</div>
			</div>
			<div class="form-control foto">
				<h3>Upload Foto</h3>
				<div class="baris">
					<div class="kolom big">
						<input id="file" type="file" name="file" accept="image/*">
						<label class="label-form">Upload Foto. Max 2 MB</label>
					</div>
					<div class="kolom">
						<img id="img-box" style="max-width: 125px; height: 100%;">
					</div>
				</div>
			</div>
			<div class="form-control">
				<h3 style="display: flex; justify-content: center;"><input type="checkbox" id="checkBox"></h3>
				<div class="baris">
					<p style="max-width: 477px; margin: 0;">Saya mengisi data tersebut dengan sebenar-benarnya. Apabila dikemudian hari ditemukan ketidaksesuaian dengan data yang saya masukkan, saya bersedia menerima konsekuensi akan hal tersebut.</p>
				</div>
				
			</div>
			<button id="button" class="btn btn-center btn-big btn-disable" disabled>Daftar</button>
		</form>
	</div>
</div>
@if(session('status'))
	<script>
		alert('Pendaftaran Berhasil!');
	</script>
@endif
@endsection