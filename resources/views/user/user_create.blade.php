@extends('layouts.admins')
@section('content-admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Pengguna
                </div>
                <div class="card-body">
                    <form action="{{ url('user',[]) }}" method="POST">

                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama Pengguna</label>
                            <input id="name" class="form-control" type="text" name="name"
                                value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="username">UserName</label>
                            <input id="username" class="form-control" type="text" name="username"
                                value="{{ old('username') }}">
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="text" name="email"
                                value="{{ old('email') }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" class="form-control" name="role">
                                <option value="">Pilih Role</option>
                                @foreach ($list_pengguna as $a)
                                <option value="{{ $a }}" @selected($a==old('role'))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">Telepon</label>
                            <input id="no_telepon" class="form-control" type="text=" name="no_telepon"
                                value="{{ old('no_telepon') }}">
                            <span class="text-danger">{{ $errors->first('no_telepon') }}</span>
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
@endsection