@extends('admin.layout.base')
@section('Main-Content')
<div class="main-content">
    <h1 class="page-header">
        Data Statistik
    </h1>
    <div class="wraper">
        <div class="stats">
            <div class="number">
                <h3 id='today'></h3>
                <small>HARI INI</small>
            </div>
            <div class="icon">
            <i class="fa fa-calendar-check-o"></i>
            </div>
        </div>
        <div class="stats">
            <div class="number">
                <h3 id="this_month"></h3>
                <small>BULAN INI</small>
            </div>
            <div class="icon">
            <i class="fa fa-calendar"></i>
            </div>
        </div>
        <div class="stats">
            <div class="number">
                <h3 id='total'></h3>
                <small>TOTAL</small>
            </div>
            <div class="icon">
            <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="stats">
            <div class="number">
                <h3 id='touris'></h3>
                <small>TURIS</small>
            </div>
            <div class="icon">
                <i class="fa fa-user-secret"></i>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-script')
    <script>
        $(document).ready(function(){
            setInterval(refresh, 1000);
            function refresh() { 
                $.ajax({
                    type: "GET",
                    url: "summary",
                    dataType: "json",
                    success: function (response) {
                        $('#today').html(response.today);
                        $('#this_month').html(response.month);
                        $('#touris').html(response.turis);
                        $('#total').html(response.total);
                    }
                });
            }
        });
    </script>
@endsection