@extends('layouts.admins')

@section('content-admin')
<div class="container-fluid">
    <h3 class="text-center font-weight-bold" style="margin-bottom: 20px">Total Transaksi</h3>
    <div class="row">

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header text-center font-weight-bold">Total Transaksi</div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">{{ $total_transaksi }}</h5>
                    <p class="card-text text-center font-weight-bold">Jumlah semua transaksi.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header text-center font-weight-bold">Transaksi Berhasil</div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">{{ $transaksi_berhasil }}</h5>
                    <p class="card-text text-center font-weight-bold">Jumlah transaksi berhasil.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header text-center font-weight-bold">Transaksi Pending</div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">{{ $transaksi_pending }}</h5>
                    <p class="card-text text-center font-weight-bold">Jumlah transaksi pending.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header text-center font-weight-bold">Transaksi Gagal</div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold">{{ $transaksi_gagal }}</h5>
                    <p class="card-text text-center font-weight-bold">Jumlah transaksi gagal.</p>
                </div>
            </div>
        </div>

        <div class="col-md-12" >
            <div class="card text-white bg-info mb-3" >
                <div class="card-header text-center font-weight-bold" style="background-color: #012E40">Pendapatan Total</div>
                <div class="card-body" style="background-color: #012E40">
                    <h5 class="card-title text-center font-weight-bold" style="color: white">Rp {{ number_format($pendapatan_total, 0, ',', '.') }}</h5>
                    <p class="card-text text-center font-weight-bold">Total pendapatan dari transaksi berhasil.</p>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="footer text-center" style="background-color: #f8f9fa; padding: 10px; position: fixed; bottom: 0; width: 100%; left: 0; text-align: center;">
    <div class="container-fluid">
        <p class="mb-0">&copy; {{ date('Y') }} Lucky Hotel Hotel and Resort. All Rights Reserved.</p>
    </div>
</div>

@endsection
