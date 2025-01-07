@extends('layouts.admins')
@section('content-admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center font-weight-bold" style="background-color: #D9D9D9">
                    Edit Data Riview
                </div>
                <div class="card-body">
                    <form action="{{ url('riview/'.$riview->id,[]) }}" method="POST" >

                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Tamu</label>
                            <select id="my-select" class="form-control" name="tamu_id">
                                <option value="">Pilih Tamu</option>
                                @foreach ($list_tamu as $id => $a)
                                <option value="{{ $id }}" @selected($id==$riview->tamu_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tamu_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Kamar</label>
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
                            <label for="rating" class="font-weight-bold">Rating</label>
                            <input id="rating" class="form-control" type="number" name="rating" placeholder="Rating 1-5"
                                value="{{ $riview->rating ?? old('rating') }}">
                            <span class="text-danger">{{ $errors->first('rating') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="komentar" class="font-weight-bold">Komentar</label>
                            <input id="komentar" class="form-control" type="text" name="komentar"
                                value="{{ $riview->komentar ?? old('komentar') }}">
                            <span class="text-danger">{{ $errors->first('komentar') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_riview" class="font-weight-bold">tanggal Riview</label>
                            <input id="tanggal_riview" class="form-control" type="date" name="tanggal_riview"
                                value="{{ $riview->tanggal_riview ?? old('tanggal_riview') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_riview') }}</span>
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
