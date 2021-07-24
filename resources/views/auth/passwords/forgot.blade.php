@extends('admin.layout.base')
@section('Main-Content')
    <div class="main-content">
        <h1 class="page-header">Ganti Password</h1>
        <div class="wraper">
            <form action="{{ url('users/reset') }}" method="POST">
                @csrf
                <div class="form-control">
                    <h3>Password</h3>
                    <div class="kolom">
                        <input type="password" name="password" placeholder="Password" class="form">
                        @error('password')
                            <strong class="alert">{{ $message }}</strong>
                        @enderror	
                    </div>
                </div>
                <div class="form-control">
                    <h3>Konfirmasi Password</h3>
                    <div class="kolom big">
                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Ulangi Password" class="form">	
                        @error('password_confirmation')
                            <strong class="alert">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary mt-3" style="color: #fff">Reset</button>
            </form>
        </div>
    </div>
@endsection
@section('custom-style')
    <style>
        .alert{
            color:red;
        }
    </style>
@endsection