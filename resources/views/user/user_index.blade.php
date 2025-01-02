@extends('layouts.admins')
@section('content-admin')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center fw-bold fs-5">{{ $judul }}</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class=" text-center">
                                    <th>Nama Pengguna</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $a )
                                    <tr>
                                        <td class="text-center">{{ $a->name }}</td>
                                        <td class="text-center">{{ $a->username }}</td>
                                        <td class="text-center">{{ $a->email }}</td>
                                        <td class="text-center">{{ $a->role }}</td>
                                        <td class="text-center">{{ $a->no_telepon }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('user/'.$a->id.'/edit', []) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ url('user/'.$a->id, []) }}" method="post" class="d-inline"
                                                onsubmit="return confirm('Anda Yakin Data ini Mau Dihapus?')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
