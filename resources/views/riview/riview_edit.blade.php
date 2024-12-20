@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Data Riview
                </div>
                <div class="card-body">
                    <form action="{{ url('riview/'.$riview->id,[]) }}" method="POST" >

                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="my-select">Pengguna</label>
                            <select id="my-select" class="form-control" name="user_id">
                                <option value="">Pilih Pengguna</option>
                                @foreach ($list_user as $id => $a)
                                <option value="{{ $id }}" @selected($id==$riview->user_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('user_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select">Kamar</label>
                            <select id="my-select" class="form-control" name="kamar_id">
                                <option value="">Pilih Kamar</option>
                                @foreach ($list_kamar as $id => $a)
                                <option value="{{ $id }}" @selected($id==$riview->kamar_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('kamar_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input id="rating" class="form-control" type="number" name="rating"
                                value="{{ $riview->rating ?? old('rating') }}">
                            <span class="text-danger">{{ $errors->first('rating') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="komentar">Komentar</label>
                            <input id="komentar" class="form-control" type="text" name="komentar"
                                value="{{ $riview->komentar ?? old('komentar') }}">
                            <span class="text-danger">{{ $errors->first('komentar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_riview">tanggal Riview</label>
                            <input id="tanggal_riview" class="form-control" type="date" name="tanggal_riview"
                                value="{{ $riview->tanggal_riview ?? old('tanggal_riview') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_riview') }}</span>
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
