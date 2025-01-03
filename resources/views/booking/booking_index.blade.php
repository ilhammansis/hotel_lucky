@extends('layouts.admins')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-form').forEach(function(form) {
            form.onsubmit = function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: 'Data ini akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            };
        });

        document.querySelectorAll('.edit-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: 'Anda akan mengedit data ini!',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Edit!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = button.href;
                    }
                });
            });
        });
    });
</script>
@section('content-admin')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center fw-bold fs-5 font-weight-bold" style="background-color:#BFB6AE">
                        {{ $judul }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class=" text-center" style="color: white; background-color: #404040">
                                    <th class="font-weight-bold">Kode Booking</th>
                                    <th class="font-weight-bold">Pengguna</th>
                                    <th class="font-weight-bold">Kamar</th>
                                    <th class="font-weight-bold">Check-In</th>
                                    <th class="font-weight-bold">Check-Out</th>
                                    <th class="font-weight-bold">Jumlah Tamu</th>
                                    <th class="font-weight-bold">Total</th>
                                    <th class="font-weight-bold">Status</th>
                                    <th class="font-weight-bold">Metode Pembayaran</th>
                                    <th class="font-weight-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $a )
                                    <tr class="text-center">
                                        <td>{{ $a->kode_booking }}</td>
                                        <td class="text-center text-uppercase">{{ $a->user->name }}</td>
                                        <td>{{ $a->kamar->nama_kamar }}</td>
                                        <td>{{ date('d F Y', strtotime($a->tanggal_check_in)) }}</td>
                                        <td>{{ date('d F Y', strtotime($a->tanggal_check_out)) }}</td>
                                        <td>{{ $a->jumlah_tamu }} <span> Orang</span> </td>
                                        <td>{{ 'Rp. ' . number_format($a->total_harga, 0, ',', '.') }}</td>
                                        <td>{{ $a->status }}</td>
                                        <td>{{ $a->metode_pembayaran }}</td>

                                        <td class="text-center">
                                            <a href="{{ url('booking/'.$a->id.'/edit', []) }}" class="btn btn-warning btn-sm edit-btn">Edit</a>
                                            <form action="{{ url('booking/'.$a->id, []) }}" method="post" class="d-inline delete-form">
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
