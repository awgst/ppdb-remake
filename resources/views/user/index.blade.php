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
                                    <form action="" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
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
        .btn{
            margin: 0 10px;
        }
    </style>
@endsection
@section('custom-script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection