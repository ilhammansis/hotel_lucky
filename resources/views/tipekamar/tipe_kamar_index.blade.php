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
                                    <th>Tipe Kamar</th>
                                    <th>Harga Awal Kamar</th>
                                    <th>Kapasitas</th>
                                    <th>Deskripsi Kamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipe_kamar as $a )
                                    <tr>
                                        <td class="text-center">{{ $a->tipekamar }}</td>
                                        <td>Rp. <span class="biaya-display">{{ number_format($a->harga_dasar, 0,',','.') }}</span></td>
                                        <td class="text-center">{{ $a->kapasitas }}<span> Orang</span></td>
                                        <td class="text-center">
                                            @if ($a->deskripsi)
                                                {{ basename($a->deskripsi) }}
                                            @else
                                                -
                                            @endif
                                        </td>
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
