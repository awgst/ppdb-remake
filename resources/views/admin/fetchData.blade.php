@extends('admin.layout.base')
@section('Main-Content')
<div class="main-content">
    <h1 class="page-header">
        Data Statistik
    </h1>
    
    <div class="wraper">
        <div id="container" class="container table-responsive">
            <table id="dataTable" class="table table-hover">
                <thead>
                    <th>No</th>
                    <th>No Registrasi</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Tempat / Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Nama Ortu / Wali</th>
                    <th>Alamat Ortu / Wali</th>
                    <th>Jarak (KM)</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('custom-style')
    <style>
        .dataTables_filter, .dataTables_paginate{
            display: flex;
            flex-direction: row-reverse;
        }
    </style>
@endsection
@section('custom-script')
    @if (session('status'))
        <script>
            alert('Data Berhasil diubah!');
        </script>
    @elseif (session('deleted'))
        <script>
            alert('Data Berhasil dihapus!');
        </script>
    @endif
    <script>
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "/loadData",
                dataType: "json",
                success: function (response) {
                    $(".odd").remove();
                    $.each(response, function (index, item) { 
                        $('tbody').append('<tr>\
                            <td>'+(index+1)+'</td>\
                            <td>PDB/20/'+item.id+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.nisn+'</td>\
                            <td>'+item.tempat_lahir+', '+item.tgl_lahir+'</td>\
                            <td>'+item.jenis_kelamin+'</td>\
                            <td>'+item.agama+'</td>\
                            <td>'+item.alamat+'</td>\
                            <td>'+item.nama_wali+'</td>\
                            <td>'+item.alamat_wali+'</td>\
                            <td>'+item.jarak+'</td>\
                            <td><img src="'+item.path+'" class="img-prev"></td>\
                            <td>\
                                <div style="display: flex;">\
                                    <a href="/edit/'+item.id+'" style="margin-right:15px; background-color: greenyellow;" class="btn">Edit</a>\
                                    <form action="" method="POST">\
                                        @method("delete")\
                                        <button class="btn" style="background-color: red">Delete</button>\
                                    </form>\
                                </div>\
                            </td>\
                        </tr>');    
                    });
                    $('#dataTable').DataTable();
                }
            });
        });
    </script>
@endsection