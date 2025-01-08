@extends('layouts.admins')
@section('content-admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center font-weight-bold" style="background-color:#D9D9D9">
                    Tambah Tipe Kamar
                </div>
                <div class="card-body">
                    <form action="{{ url('tipekamar',[]) }}" method="POST">

                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="tipekamar" class="font-weight-bold">Tipe Kamar</label>
                            <select id="tipekamar" class="form-control" name="tipekamar">
                                <option value="">Pilih Tipe Kamar</option>
                                @foreach ($list_tipe_kamar as $a)
                                <option value="{{ $a }}" @selected($a==old('tipekamar'))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tipekamar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="stok_kamar" class="font-weight-bold">Stok Kamar</label>
                            <input id="stok_kamar" class="form-control" type="number" name="stok_kamar"
                                value="{{ old('stok_kamar') }}">
                            <span class="text-danger">{{ $errors->first('stok_kamar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="harga_dasar" class="font-weight-bold">Harga Awal</label>
                            <input id="harga_dasar" class="form-control" type="number" name="harga_dasar"
                                value="{{ old('harga_dasar') }}">
                            <span class="text-danger">{{ $errors->first('harga_dasar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="kapasitas" class="font-weight-bold">Kapasitas</label>
                            <input id="kapasitas" class="form-control" type="number" name="kapasitas"
                                value="{{ old('kapasitas') }}">
                            <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold">Deskripsi</label>
                            <input id="deskripsi" class="form-control" type="text" name="deskripsi"
                                value="{{ old('deskripsi') }}">
                            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
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
