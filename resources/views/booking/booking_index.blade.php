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
                                    <th>Kode Booking</th>
                                    <th>Pengguna</th>
                                    <th>Nama Kamar</th>
                                    <th>Tanggal check in</th>
                                    <th>Tangggal check out</th>
                                    <th>Jumlah Tamu</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Metode Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $a )
                                    <tr>
                                        <td>{{ $a->kode_booking }}</td>
                                        <td class="text-center text-uppercase">{{ $a->user->name }}</td>
                                        <td>{{ $a->kamar->nama_kamar }}</td>
                                        <td>{{ date('d F Y', strtotime($a->tanggal_check_in)) }}</td>
                                        <td>{{ date('d F Y', strtotime($a->tanggal_check_out)) }}</td>
                                        <td>{{ $a->jumlah_tamu }}</td>
                                        <td>Rp. <span class="biaya-display">{{ number_format($a->total_harga, 0,',','.') }}</span></td>
                                        <td>{{ $a->status }}</td>
                                        <td>{{ $a->metode_pembayaran }}</td>

                                        <td class="text-center">
                                            <a href="{{ url('booking/'.$a->id.'/edit', []) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ url('booking/'.$a->id, []) }}" method="post" class="d-inline"
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
