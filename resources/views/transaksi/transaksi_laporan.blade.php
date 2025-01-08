
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>

    <!-- Scripts-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center>
                    <h2>{{ $judul }}</h2>
                </center>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class=" text-center" style="color: white; background-color: #404040">
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">Tamu</th>
                            <th class="font-weight-bold">Kode Booking</th>
                            <th class="font-weight-bold">Kode Pembayaran</th>
                            <th class="font-weight-bold">Kamar</th>
                            <th class="font-weight-bold">Tipe Kamar</th>
                            <th class="font-weight-bold">Tanggal</th>
                            <th class="font-weight-bold">Total</th>
                            <th class="font-weight-bold">Metode Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $a)
                            @if ($a->status_transaksi === 'Berhasil')
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center text-uppercase">{{ $a->tamu->nama }}</td>
                                    <td class="text-center text-uppercase">{{ $a->booking->kode_booking }}</td>
                                    <td class="text-center text-uppercase">{{ $a->pembayaran->kode_pembayaran }}</td>
                                    <td class="text-center text-uppercase">{{ $a->kamar->nama_kamar }}</td>
                                    <td class="text-center text-uppercase">{{ $a->tipe_kamar->tipekamar }}</td>
                                    <td class="text-center">{{ date('d F Y', strtotime($a->tanggal_transaksi)) }}</td>
                                    <td>{{ 'Rp. ' . number_format($a->total_harga, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $a->metode_transaksi }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>
                <h5>Mengetahui</h5>
                <br>
                <br>
                <br>
                <h5>Admin</h5>
            </div>
        </div>
    </div>
</body>

</html>

