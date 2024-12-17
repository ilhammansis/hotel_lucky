@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Data Kamar
                </div>
                <div class="card-body">
                    <form action="{{ url('kamar/'.$kamar->id,[]) }}" method="POST" enctype="multipart/form-data">

                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="nomor_kamar">Kode kamar</label>
                            <input id="nomor_kamar" class="form-control" type="text" name="nomor_kamar"
                                value="{{$kamar->nomor_kamar ?? old('nomor_kamar') }}">
                            <span class="text-danger">{{ $errors->first('nomor_kamar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="nama_kamar">Nama kamar</label>
                            <input id="nama_kamar" class="form-control" type="text" name="nama_kamar"
                                value="{{ $kamar->nama_kamar ?? old('nama_kamar') }}">
                            <span class="text-danger">{{ $errors->first('nama_kamar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select">Tipe Kamar</label>
                            <select id="my-select" class="form-control" name="tipekamar_id">
                                <option value="">Pilih Tipe</option>
                                @foreach ($list_tipekamar as $id => $a)
                                <option value="{{ $id }}" @selected($id==$kamar->tipekamar_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tipekamar_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status">
                                <option value="">Pilih status</option>
                                @foreach ($list_status as $a)
                                <option value="{{ $a }}" @selected($a==$kamar->status)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="harga_permalam">Harga permalam</label>
                            <input id="harga_permalam" class="form-control" type="number" name="harga_permalam"
                                value="{{ $kamar->harga_permalam ?? old('harga_permalam') }}">
                            <span class="text-danger">{{ $errors->first('harga_permalam') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input id="deskripsi" class="form-control" type="text" name="deskripsi"
                                value="{{ $kamar->deskripsi ?? old('deskripsi') }}">
                            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="fasilitas">Fasilitas</label>
                            <input id="fasilitas" class="form-control" type="text" name="fasilitas"
                                value="{{ $kamar->fasilitas ?? old('fasilitas') }}">
                            <span class="text-danger">{{ $errors->first('fasilitas') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="foto_kamar">Foto Kamar</label>
                            <input id="foto_kamar" class="form-control" type="file" name="foto_kamar"
                                value="{{ $kamar->foto_kamar ?? old('foto_kamar') }}">
                            <span class="text-danger">{{ $errors->first('foto_kamar') }}</span>
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
