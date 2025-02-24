@extends('layouts.admins')
<style>
    .komentar-td {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.all.min.js"></script>
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
                    <div class="card-header text-center fw-bold fs-5 font-weight-bold"
                    style=" background-color:#BFB6AE">{{ $judul }}</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class=" text-center" style="color: white; background-color: #404040">
                                    <th class="font-weight-bold">No</th>
                                    <th class="font-weight-bold">Tamu</th>
                                    <th class="font-weight-bold">Nama Kamar</th>
                                    <th class="font-weight-bold">Rating</th>
                                    <th class="font-weight-bold">Komentar</th>
                                    <th class="font-weight-bold">Tanggal Riview</th>
                                    <th class="font-weight-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = ($riview->currentPage() - 1) * $riview->perPage() + 0;
                                @endphp
                                @foreach ($riview as $a)
                                    <tr>
                                        <td class="text-center">{{ $no + $loop->iteration }}</td>
                                        <td class="text-center text-uppercase">{{ $a->tamu->nama }}</td>
                                        <td class="text-center text-uppercase">{{ $a->kamar->nama_kamar }}</td>
                                        <td class="text-center">{{ $a->rating }}</td>
                                        <td class="komentar-td">
                                            @if ($a->komentar)
                                                {{ $a->komentar }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">{{ date('d F Y', strtotime($a->tanggal_riview)) }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('riview/'.$a->id.'/edit', []) }}" class="btn btn-warning btn-sm edit-btn">Edit</a>
                                            <form action="{{ url('riview/'.$a->id, []) }}" method="post" class="d-inline delete-form">
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
                                @if ($riview->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Sebelumnya</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $riview->previousPageUrl() }}">Sebelumnya</a>
                                    </li>
                                @endif
                                @for ($i = 1; $i <= $riview->lastPage(); $i++)
                                    <li class="page-item {{ ($riview->currentPage() == $i) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $riview->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($riview->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $riview->nextPageUrl() }}">Selanjutnya</a>
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
