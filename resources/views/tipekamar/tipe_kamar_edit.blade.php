@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Tipe Kamar
                </div>
                <div class="card-body">
                    <form action="{{ url('tipekamar/'.$tipe_kamar->id,[]) }}" method="POST">

                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="tipekamar">Tipe Kamar</label>
                            <select id="tipekamar" class="form-control" name="tipekamar">
                                <option value="">Pilih Tipe Kamar</option>
                                @foreach ($list_tipe_kamar as $a)
                                <option value="{{ $a }}" @selected($a==$tipe_kamar->tipekamar)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tipekamar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="harga_dasar">Harga Awal</label>
                            <input id="harga_dasar" class="form-control" type="number" name="harga_dasar"
                                value="{{ $tipe_kamar->harga_dasar ?? old('harga_dasar') }}">
                            <span class="text-danger">{{ $errors->first('harga_dasar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="kapasitas">Kapasitas</label>
                            <input id="kapasitas" class="form-control" type="number" name="kapasitas"
                                value="{{ $tipe_kamar->kapasitas ?? old('kapasitas') }}">
                            <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input id="deskripsi" class="form-control" type="text" name="deskripsi"
                                value="{{ $tipe_kamar->deskripsi ?? old('deskripsi') }}">
                            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
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
