@extends('layouts.app')
<style>
    .biaya-display{
        display: inline-block;
        text-align: right;
        min-width: 100px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center fw-bold fs-5">{{ $judul }}</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class=" text-center">
                                    <th>Pengguna</th>
                                    <th>Nama Kamar</th>
                                    <th>Rating</th>
                                    <th>Komentar</th>
                                    <th>Tanggal Riview</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riview as $a)
                                    <tr>
                                        <td class="text-center text-uppercase">{{ $a->user->name }}</td>
                                        <td>{{ $a->kamar->nama_kamar }}</td>
                                        <td>{{ $a->rating }}</td>
                                        <td>
                                            @if ($a->komentar)
                                                {{ basename($a->komentar) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ date('d F Y', strtotime($a->tanggal_riview)) }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('riview/'.$a->id.'/edit', []) }}" class="btn btn-warning">Edit</a>
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
