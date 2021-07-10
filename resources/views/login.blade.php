@extends('layout.base')
@section('title', 'PPDB Online SMP N 1 Gabus')
@section('main')
<div class="card">
	<div class="card-header">
		<h1>LOGIN ADMIN</h1>
	</div>
	<div class="card-content">
		<form action="#" method="POST" class="login">
			@csrf
			<div class="form-control">
				<h3>Username</h3>
				<div class="kolom">
					<input type="text" name="username" placeholder="Username" class="form">
					<label>Gunakan NIP sebagai username</label>		
				</div>
			</div>
			<div class="form-control">
				<h3>Password</h3>
				<input type="password" name="password" placeholder="Password" class="form">	
			</div>
			<button class="btn btn-center btn-big">Login</button>
		</form>
	</div>
</div>
@endsection