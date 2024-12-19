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
                                    <th>Kode Pembayaran</th>
                                    <th>Kode Booking</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayaran as $a )
                                    <tr>
                                        <td>{{ $a->kode_pembayaran }}</td>
                                        <td>{{ $a->booking->kode_booking }}</td>
                                        <td>Rp. <span class="biaya-display">{{ number_format($a->jumlah_pembayaran, 0,',','.') }}</span></td>
                                        <td>{{ date('d F Y', strtotime($a->tanggal_pembayaran)) }}</td>
                                        <td>{{ $a->metode_pembayaran }}</td>
                                        <td>{{ $a->status_pembayaran }}</td>

                                        <td class="text-center">
                                            <a href="{{ url('pembayaran/'.$a->id.'/edit', []) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ url('pembayaran/'.$a->id, []) }}" method="post" class="d-inline"
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
