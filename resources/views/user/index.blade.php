@extends('admin.layout.base')
@section('Main-Content')
    <div class="main-content">
        <h1 class="page-header">Kelola Admin</h1>
        <div class="wraper">
            <div class="container">
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td style="display:flex;">
                                <a href={{ url('/users/edit/'.$user->id) }} class="btn btn-success">Edit</a>
                                <form action="/{{ $user->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    <a href="{{ url('/register') }}" class="btn btn-primary">Tambah Admin</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('custom-style')
    <style>
        .dataTables_filter, .dataTables_paginate, .float-right{
            display: flex;
            flex-direction: row-reverse;
        }
        .btn-primary{
            color: #fff;
        }
        .btn{
            margin: 0 10px;
        }
    </style>
@endsection
@section('custom-script')
    @if (session('deleted'))
        <script>alert('Data berhasil dihapus!');</script>
    @elseif (session('updated'))
        <script>alert('Data berhasil diupdate!');</script>
    @elseif (session('added'))
        <script>alert('Berhasil menambahkan Admin!');</script>
    @endif
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection