{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('admin.layout.base')
@section('Main-Content')
<div class="main-content">
    <h1 class="page-header">
        Data Statistik
    </h1>
    <div class="wraper">
        <div class="stats">
            <div class="number">
                <h3 id='total'></h3>
                <small>Total</small>
            </div>
            <div class="icon">
            <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="stats">
            <div class="number">
                <h3 id="laki-laki"></h3>
                <small>Laki-laki</small>
            </div>
            <div class="icon">
            <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="stats">
            <div class="number">
                <h3 id='perempuan'></h3>
                <small>Perempuan</small>
            </div>
            <div class="icon">
            <i class="fa fa-users"></i>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-script')
    @if (session('reseted'))
        <script>
            alert('Password berhasil di reset!');
        </script>
    @endif
    <script>
       $(document).ready(function () {
           setInterval(function(){
            $.ajax({
                type: "GEt",
                url: "/loadStats",
                dataType: "json",
                success: function (response) {
                    $('#total').html(response.total);
                    $('#laki-laki').html(response.boy);
                    $('#perempuan').html(response.girl);
                }
            });
           },1000);
       });
    </script>
@endsection