@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center fw-bold fs-5">{{ $judul }}</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class=" text-center">
                                    <th>Tipe Kamar</th>
                                    <th>Deskripsi Kamar</th>
                                    <th>Harga Awal Kamar</th>
                                    <th>Kapasitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipe_kamar as $a )
                                    <tr>
                                        <td class="text-center">{{ $a->tipekamar }}</td>
                                        <td>{{ $a->deskripsi }}</td>
                                        <td class="text-center text-uppercase">{{ $a->harga_dasar }}</td>
                                        <td class="text-center">{{ $a->kapasitas }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('tipekamar/'.$a->id.'/edit', []) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ url('tipekamar/'.$a->id, []) }}" method="post" class="d-inline"
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
