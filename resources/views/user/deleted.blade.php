@extends('admin.layout.base')
@section('Main-Content')
    <div class="main-content">
        <h1 class="page-header">Data Siswa Terhapus</h1>
        <div class="wraper">
            <div class="responsive">
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
                        @foreach ($students as $student)
                        <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ 'PDB/20/'.$student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->nisn }}</td>
                                <td>{{ $student->tempat_lahir.', '.$student->tgl_lahir }}</td>
                                <td>{{ $student->jenis_kelamin }}</td>
                                <td>{{ $student->agama }}</td>
                                <td>{{ $student->alamat }}</td>
                                <td>{{ $student->nama_wali }}</td>
                                <td>{{ $student->alamat_wali }}</td>
                                <td>{{ $student->jarak }}</td>
                                <td><img src="{{ asset($student->path) }}" style="width: 100px;height:100px;"></td>
                                <td><form action="{{ url('users/restore/') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                    <button class="btn btn-primary">Restore</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
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
@if (session('restored'))
    <script>alert('Data berhasil dikembalikan!');</script>
@endif
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection