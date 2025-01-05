@extends('layouts.admins')
<style>
    .komentar-td {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

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
                    <div class="card-header text-center fw-bold fs-5 font-weight-bold" style="background-color:#BFB6AE">{{ $judul }}</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class=" text-center" style="color: white; background-color: #404040">
                                    <th class="font-weight-bold">No</th>
                                    <th class="font-weight-bold">Kode Kamar</th>
                                    <th class="font-weight-bold">Nama</th>
                                    <th class="font-weight-bold">Tipe</th>
                                    <th class="font-weight-bold">Harga Permalam</th>
                                    <th class="font-weight-bold">Status</th>
                                    <th class="font-weight-bold">Deskripsi</th>
                                    <th class="font-weight-bold">Fasilitas</th>
                                    <th class="font-weight-bold">Foto</th>
                                    <th class="font-weight-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = ($kamar->currentPage() - 1) * $kamar->perPage() + 0;
                                @endphp
                                @foreach ($kamar as $a )
                                    <tr>
                                        <td class="text-center">{{ $no + $loop->iteration }}</td>
                                        <td class="text-center text-uppercase">{{ $a->nomor_kamar }}</td>
                                        <td>{{ $a->nama_kamar }}</td>
                                        <td>{{ $a->tipe_kamar->tipekamar }}</td>
                                        <td>{{ 'Rp. ' . number_format($a->harga_permalam, 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $a->status }}</td>
                                        <td class="komentar-td">
                                            @if ($a->deskripsi)
                                                {{ $a->deskripsi }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($a->fasilitas)
                                                {{ $a->fasilitas }}
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
                                            <a href="{{ url('kamar/'.$a->id.'/edit', []) }}" class="btn btn-warning btn-sm edit-btn">Edit</a>
                                            <form action="{{ url('kamar/'.$a->id, []) }}" method="post" class="d-inline delete-form">
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
                                @if ($kamar->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Sebelumnya</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $kamar->previousPageUrl() }}">Sebelumnya</a>
                                    </li>
                                @endif
                                @for ($i = 1; $i <= $kamar->lastPage(); $i++)
                                    <li class="page-item {{ ($kamar->currentPage() == $i) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $kamar->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($kamar->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $kamar->nextPageUrl() }}">Selanjutnya</a>
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
