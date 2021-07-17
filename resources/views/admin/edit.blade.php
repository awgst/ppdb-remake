@extends('admin.layout.base')
@section('Main-Content')
<div class="main-content">
    <h1 class="page-header">
        Edit Data
    </h1>
    <div class="wraper">
        <form action="/{{ $student->id }}" method="POST" class="register" autocomplete="off" enctype="multipart/form-data">
			@method('put')
            @csrf
			<div class="form-control">
				<h3>Nomor Registrasi</h3>
				<input type="text" name="noreg" disabled class="form" value="PDB/20/{{ $student->id }}">
			</div>
			<div class="form-control">
				<h3>Nama Lengkap</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<input type="text" name="name" class="form @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap" value="{{ $student->name }}">
					@error('name')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>NISN</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<input type="text" name="nisn" class="form @error('nisn') is-invalid @enderror" placeholder="Masukkan NISN" value="{{ $student->nisn }}">
					@error('nisn')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Sekolah Asal</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<input type="text" name="asal_sekolah" class="form @error('asal_sekolah') is-invalid @enderror" placeholder="Masukkan asal sekolah" value="{{ $student->asal_sekolah }}">
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
							<input type="text" name="tempat_lahir" class="form @error('tempat_lahir') is-invalid @enderror" placeholder="Masukkan tempat lahir" value="{{ $student->tempat_lahir }}">
							<label class="label-form">Tempat Lahir</label>
						</div>
						@error('tempat_lahir')
							<label style="color: red">{{ $message }}</label>
						@enderror
					</div>
					<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
						<div class="kolom">
							<input type="date" name="tgl_lahir" class="form @error('tgl_lahir') is-invalid @enderror" value="{{ $student->tgl_lahir }}">
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
						<input type="radio" name="jenis_kelamin" value="Laki-laki" {{ $student->jenis_kelamin=="Laki-laki" ? "checked=true" : ''}}>Laki-laki
						<input type="radio" name="jenis_kelamin" value="Perempuan" {{ $student->jenis_kelamin=="Perempuan" ? "checked=true" : ''}}>Perempuan
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
						<option value="Islam" {{ $student->agama=="Islam" ? "selected" : "" }}>Islam</option>
						<option value="Kristen" {{ $student->agama=="Kristen" ? "selected" : "" }}>Kristen</option>
						<option value="Katholik" {{ $student->agama=="Katholik" ? "selected" : "" }}>Katholik</option>
						<option value="Hindu" {{ $student->agama=="Hindu" ? "selected" : "" }}>Hindu</option>
						<option value="Budha" {{ $student->agama=="Budha" ? "selected" : "" }}>Budha</option>
						<option value="Kong Hu Cu" {{ $student->agama=="Kong Hu Cu" ? "selected" : "" }}>Kong Hu Cu</option>
					</select>
					@error('agama')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Alamat</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<textarea class="form fixed-size @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan alamat lengkap">{{ $student->alamat }}</textarea>
					@error('alamat')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Nama Orang Tua / Wali</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<input type="text" name="nama_wali" class="form @error('nama_wali') is-invalid @enderror" placeholder="Masukkan nama orang tua / wali" value="{{ $student->nama_wali }}">
					@error('nama_wali')
						<label style="color: red">{{ $message }}</label>
					@enderror
				</div>
			</div>
			<div class="form-control">
				<h3>Alamat Orang Tua / Wali</h3>
				<div class="input-form" style="width: 100%;display: flex; flex-direction: column;">
					<textarea class="form fixed-size @error('alamat_wali') is-invalid @enderror" name="alamat_wali" placeholder="Masukkan alamat orang tua / wali">{{ $student->alamat_wali }}</textarea>
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
							<input type="number" class="form @error('jarak') is-invalid @enderror" name="jarak" step="0.1" placeholder="Masukkan jarak rumah dengan SMP N 1 Gabus" value="{{ $student->jarak }}">
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
            <input type="hidden" value="{{ $student->path }}" name="path">
			<div class="reg-buttons" style="display: flex; justify-content: center;">
                <button id="button" class="btn btn-big">Submit</button>
				<a href="{{ url('home') }}" class="btn btn-big">Kembali</a>
			</div>
		</form>
    </div>
</div>
@endsection
@section('custom-style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .register{
            width: 100%;
        }
        .form-control{
            border-color: transparent;
        }
        .form-control h3{
            min-width: 175px;
            max-width: 175px;
        }
        .btn{
            margin: 0 10px;
        }
        .wraper{
            background-color: #fff;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
    </style>
@endsection