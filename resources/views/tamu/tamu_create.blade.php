@extends('layouts.admins')
@section('content-admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center font-weight-bold" style="background-color:#D9D9D9">
                    Tambah Data Tamu
                </div>
                <div class="card-body">
                    <form action="{{ url('tamu',[]) }}" method="POST" >

                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama</label>
                            <input id="nama" class="form-control" type="text" name="nama"
                                value="{{ old('nama') }}">
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input id="email" class="form-control" type="text" name="email"
                                value="{{ old('email') }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="no_hp" class="font-weight-bold">Telepon</label>
                            <input id="no_hp" class="form-control" type="text" name="no_hp"
                                value="{{ old('no_hp') }}">
                            <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="font-weight-bold">Alamat</label>
                            <input id="alamat" class="form-control" type="text" name="alamat"
                                value="{{ old('alamat') }}">
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="catatan" class="font-weight-bold">Catatan</label>
                            <input id="catatan" class="form-control" type="text" name="catatan"
                                value="{{ old('email') }}">
                            <span class="text-danger">{{ $errors->first('catatan') }}</span>
                        </div>

                </div>
                <div class="card-footer" style="background-color:#D9D9D9 ">
                    <button type="submit" class="btn" style="background-color: #333333; color:white">Simpan</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
