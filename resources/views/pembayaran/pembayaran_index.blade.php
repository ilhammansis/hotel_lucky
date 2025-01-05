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
                        {{ $judul }}</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class=" text-center" style="color: white; background-color: #404040">
                                    <th class="font-weight-bold" style="max-width: 1rem">No</th>
                                    <th class="font-weight-bold">Kode Pembayaran</th>
                                    <th class="font-weight-bold">Kode Booking</th>
                                    <th class="font-weight-bold">Total</th>
                                    <th class="font-weight-bold">Tanggal</th>
                                    <th class="font-weight-bold">Metode</th>
                                    <th class="font-weight-bold">Status</th>
                                    <th class="font-weight-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = ($pembayaran->currentPage() - 1) * $pembayaran->perPage() + 0;
                                @endphp
                                @foreach ($pembayaran as $a )
                                    <tr>
                                        <td class="text-center">{{ $no + $loop->iteration }}</td>
                                        <td class="text-center text-uppercase">{{ $a->kode_pembayaran }}</td>
                                        <td class="text-center text-uppercase">{{ $a->booking->kode_booking }}</td>
                                        <td>{{ 'Rp. ' . number_format($a->jumlah_pembayaran, 0, ',', '.') }}</td>
                                        <td class="text-center">{{ date('d F Y', strtotime($a->tanggal_pembayaran)) }}</td>
                                        <td class="text-center">{{ $a->metode_pembayaran }}</td>
                                        <td class="text-center">{{ $a->status_pembayaran }}</td>

                                        <td class="text-center">
                                            <a href="{{ url('pembayaran/'.$a->id.'/edit', []) }}" class="btn btn-warning btn-sm edit-btn">Edit</a>
                                            <form action="{{ url('pembayaran/'.$a->id, []) }}" method="post" class="d-inline delete-form">
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
                        <nav>
                            <ul class="pagination">
                                @if ($pembayaran->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Sebelumnya</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $pembayaran->previousPageUrl() }}">Sebelumnya</a>
                                    </li>
                                @endif
                                @for ($i = 1; $i <= $pembayaran->lastPage(); $i++)
                                    <li class="page-item {{ ($pembayaran->currentPage() == $i) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $pembayaran->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($pembayaran->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $pembayaran->nextPageUrl() }}">Selanjutnya</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Selanjutnya</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
