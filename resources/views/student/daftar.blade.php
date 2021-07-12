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
				<input type="text" name="noreg" disabled class="form" @isset($last) value="PDB/20/".$last @endisset @empty($record) value="PDB/20/1" @endempty>
			</div>
			<div class="form-control">
				<h3>Nama Lengkap</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<input type="text" name="name" class="form @error('name') is-invalid @enderror" autofocus  placeholder="Masukkan nama lengkap" value="{{ old('name') }}">
					@error('name')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>NISN</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<input type="text" name="nisn" class="form @error('nisn') is-invalid @enderror" placeholder="Masukkan NISN" value="{{ old('nisn') }}">
					@error('nisn')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Sekolah Asal</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<input type="text" name="asal_sekolah" class="form @error('asal_sekolah') is-invalid @enderror" placeholder="Masukkan asal sekolah" value="{{ old('asal_sekolah') }}">
					@error('asal_sekolah')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Tempat / Tgl Lahir</h3>
				<div class="baris">
					<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
						<div class="kolom big">
							<input type="text" name="tempat_lahir" class="form @error('tempat_lahir') is-invalid @enderror" placeholder="Masukkan tempat lahir" value="{{ old('tempat_lahir') }}">
							<label class="label-form">Tempat Lahir</label>
						</div>
						@error('tempat_lahir')
							<label style="color: red">{{ $message }}</label>
						@enderror
					</div>
					<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
						<div class="kolom">
							<input type="date" name="tgl_lahir" class="form @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}">
							<label class="label-form">Tanggal Lahir</label>
						</div>
						@error('tgl_lahir')
							<label style="color: red">{{ $message }}</label>
						@enderror
					</div>
				</div>
				
			</div>
			<div class="form-control">
				<h3>Jenis Kelamin</h3>
				<div class="kolom">
					<div class="baris baris-small">
						<input type="radio" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin')=="Laki-laki" ? "checked=true" : ''}}>Laki-laki
						<input type="radio" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin')=="Perempuan" ? "checked=true" : ''}}>Perempuan
					</div>
					@error('jenis_kelamin')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Agama</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<select class="form @error('agama') is-invalid @enderror" name="agama">
						<option disabled selected>Pilih</option>
						<option value="Islam" {{ old('agama')=="Islam" ? "selected" : "" }}>Islam</option>
						<option value="Kristen" {{ old('agama')=="Kristen" ? "selected" : "" }}>Kristen</option>
						<option value="Katholik" {{ old('agama')=="Katholik" ? "selected" : "" }}>Katholik</option>
						<option value="Hindu" {{ old('agama')=="Hindu" ? "selected" : "" }}>Hindu</option>
						<option value="Budha" {{ old('agama')=="Budha" ? "selected" : "" }}>Budha</option>
						<option value="Kong Hu Cu" {{ old('agama')=="Kong Hu Cu" ? "selected" : "" }}>Kong Hu Cu</option>
					</select>
					@error('agama')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Alamat</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<textarea class="form fixed-size @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
					@error('alamat')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Nama Orang Tua / Wali</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<input type="text" name="nama_wali" class="form @error('nama_wali') is-invalid @enderror" placeholder="Masukkan nama orang tua / wali" value="{{ old('nama_wali') }}">
					@error('nama_wali')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Alamat Orang Tua / Wali</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<textarea class="form fixed-size @error('alamat_wali') is-invalid @enderror" name="alamat_wali" placeholder="Masukkan alamat orang tua / wali">{{ old('alamat_wali') }}</textarea>
					@error('alamat_wali')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Jarak rumah dari SMP Negeri 1 Gabus</h3>
				<div class="baris">
					<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
						<div class="kolom big">
							<input type="number" class="form @error('jarak') is-invalid @enderror" name="jarak" step="0.1" placeholder="Masukkan jarak rumah dengan SMP N 1 Gabus" value="{{ old('jarak') }}">
							<label class="label-form">Gunakan . untuk menulis koma</label>
						</div>
						@error('jarak')
							<label style="color: red">{{ $message }}</label>
						@enderror
					</div>
					<div class="kolom">
						<input type="text" disabled class="form" value="KM" style="background-color: transparent;">
					</div>
				</div>
			</div>
			<div class="form-control foto">
				<h3>Upload Foto</h3>
				<div class="baris">
					<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
						<div class="kolom big @error('path') is-invalid @enderror">
							<input id="file" type="file" name="path" accept="image/*">
							<label class="label-form">Upload Foto. Max 2 MB</label>
						</div>
						@error('path')
							<label style="color: red">{{ $message }}</label>
						@enderror
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