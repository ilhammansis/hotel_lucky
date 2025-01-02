@extends('layouts.admins')
<style>
    .biaya-display{
        display: inline-block;
        text-align: right;
        min-width: 100px;
    }
    .komentar-td {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@section('content-admin')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center fw-bold fs-5 font-weight-bold"
                    style=" background-color:#BFB6AE">{{ $judul }}</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class=" text-center" style="color: white; background-color: #404040">
                                    <th class="font-weight-bold">Pengguna</th>
                                    <th class="font-weight-bold">Nama Kamar</th>
                                    <th class="font-weight-bold">Rating</th>
                                    <th class="font-weight-bold">Komentar</th>
                                    <th class="font-weight-bold">Tanggal Riview</th>
                                    <th class="font-weight-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riview as $a)
                                    <tr>
                                        <td class="text-center text-uppercase">{{ $a->user->name }}</td>
                                        <td class="text-center text-uppercase">{{ $a->kamar->nama_kamar }}</td>
                                        <td class="text-center">{{ $a->rating }}</td>
                                        <td class="komentar-td">
                                            @if ($a->komentar)
                                                {{ $a->komentar }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td class="text-center">{{ date('d F Y', strtotime($a->tanggal_riview)) }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('riview/'.$a->id.'/edit', []) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ url('riview/'.$a->id, []) }}" method="post" class="d-inline"
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
