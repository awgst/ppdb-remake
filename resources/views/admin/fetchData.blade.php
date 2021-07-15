@extends('admin.layout.base')
@section('Main-Content')
<div class="main-content">
    <h1 class="page-header">
        Data Statistik
    </h1>
    <div class="wraper">
        <div class="table-responsive">
            <table class="table table-hover">
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
                    <tr>
                        <td>1</td>
                        <td>PDB/20/1</td>
                        <td>Awang Suria Trisakti</td>
                        <td>1234567890</td>
                        <td>Grobogan, 04 Maret 1998</td>
                        <td>Laki-laki</td>
                        <td>Islam</td>
                        <td>Jembar</td>
                        <td>Sutrisno</td>
                        <td>Jembar</td>
                        <td>2.5</td>
                        <td><img src="{{ asset('foto/1584959903212.jpg')}}"  class="img-prev"></td>
                        <td>
                            <div style="display: flex;">
                                <form action="" method="POST" style="margin-right:15px;">
                                    @method('put')
                                    <button class="btn" style="background-color: greenyellow">Edit</button>
                                </form>
                                <form action="" method="POST">
                                    @method('delete')
                                    <button class="btn" style="background-color: red">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection