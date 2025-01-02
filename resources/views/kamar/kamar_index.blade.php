@extends('layouts.admins')
<style>
    .biaya-display{
        display: inline-block;
        text-align: right;
        min-width: 100px;
    }
</style>
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
                                    <th>Kode Kamar</th>
                                    <th>Nama Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Harga Permalam</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <th>Fasilitas</th>
                                    <th>Foto Kamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kamar as $a )
                                    <tr>
                                        <td class="text-center text-uppercase">{{ $a->nomor_kamar }}</td>
                                        <td>{{ $a->nama_kamar }}</td>
                                        <td>{{ $a->tipe_kamar->tipekamar }}</td>
                                        <td>Rp. <span class="biaya-display">{{ number_format($a->harga_permalam, 0,',','.') }}</span></td>
                                        <td class="text-center">{{ $a->status }}</td>
                                        <td class="text-center">
                                            @if ($a->deskripsi)
                                                {{ basename($a->deskripsi) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($a->fasilitas)
                                                {{ basename($a->fasilitas) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($a->foto_kamar)
                                                <img src="{{ asset('storage/' .$a->foto_kamar) }}" alt="Foto Kamar" style="max-width: 100px; height: auto;">
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ url('kamar/'.$a->id.'/edit', []) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ url('kamar/'.$a->id, []) }}" method="post" class="d-inline"
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
