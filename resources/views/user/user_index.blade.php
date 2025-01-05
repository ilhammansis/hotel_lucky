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
                                <tr class=" text-center"  style="color: white; background-color: #404040">
                                    <th class="font-weight-bold">No</th>
                                    <th class="font-weight-bold">Pengguna</th>
                                    <th class="font-weight-bold">Username</th>
                                    <th class="font-weight-bold">Email</th>
                                    <th class="font-weight-bold">Role</th>
                                    <th class="font-weight-bold">Telepon</th>
                                    <th class="font-weight-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = ($user->currentPage() - 1) * $user->perPage() + 0;
                                @endphp
                                @foreach ($user as $a )
                                    <tr>
                                        <td class="text-center">{{ $no + $loop->iteration }}</td>
                                        <td>{{ $a->name }}</td>
                                        <td class="text-center">{{ $a->username }}</td>
                                        <td class="text-center">{{ $a->email }}</td>
                                        <td class="text-center">{{ $a->role }}</td>
                                        <td class="text-center">{{ $a->no_telepon }}</td>
                                        <td class="text-center">
                                            <form action="{{ url('user/'.$a->id, []) }}" method="post" class="d-inline delete-form">
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
                                @if ($user->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Sebelumnya</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $user->previousPageUrl() }}">Sebelumnya</a>
                                    </li>
                                @endif
                                @for ($i = 1; $i <= $user->lastPage(); $i++)
                                    <li class="page-item {{ ($user->currentPage() == $i) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $user->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($user->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $user->nextPageUrl() }}">Selanjutnya</a>
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
