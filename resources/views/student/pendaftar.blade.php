@extends('layout.base')
@section('title', 'Pendaftar Sementara')
@section('main')
    <div class="card" style="border: none;">
        <div class="card-header text-white bg-dark" style="margin: 0;">
            <h1>Calon Peserta Didik Baru SMP N 1 Gabus</h1>
        </div>
        <div class="card-content">
            <h2 style="text-align: center;">Selamat datang di PPDB Online SMP N 1 Gabus</h2>
            <p>Silahkan cari nama kamu dalam daftar berikut untuk mengetahui apakah kamu diterima atau tidak.</p>
            <div class="container">
                <table id="dataTable" class="table table-responsive" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Jenis Kelamin</th>
                        <th>Jarak (KM)</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Awang Suria Trisakti</td>
                            <td>123160046</td>
                            <td>Laki-laki</td>
                            <td>3.5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('custom-style')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .dataTables_filter, .dataTables_paginate{
            display: flex;
            flex-direction: row-reverse;
        }
        @media only screen and (max-width: 805px){
            .dataTables_filter, .dataTables_paginate{
                display: block;
            }
        }
    </style>
@endsection
@section('custom-script')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection