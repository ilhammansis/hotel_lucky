@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tambah Data Booking
                </div>
                <div class="card-body">
                    <form action="{{ url('booking',[]) }}" method="POST" >

                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="kode_booking">Kode Booking</label>
                            <input id="kode_booking" class="form-control" type="text" name="kode_booking"
                                value="{{ old('kode_booking') }}">
                            <span class="text-danger">{{ $errors->first('booking') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select">Pengguna</label>
                            <select id="my-select" class="form-control" name="user_id">
                                <option value="">Pilih Pengguna</option>
                                @foreach ($list_user as $id => $a)
                                <option value="{{ $id }}" @selected($id==old(''))>{{ $a }}
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
                                <option value="{{ $id }}" @selected($id==old(''))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('kamar_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_check_in">Tanggal Check In</label>
                            <input id="tanggal_check_in" class="form-control" type="date" name="tanggal_check_in"
                                value="{{ old('tanggal_check_in') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_check_in') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_check_out">Tanggal Check Out</label>
                            <input id="tanggal_check_out" class="form-control" type="date" name="tanggal_check_out"
                                value="{{ old('tanggal_check_out') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_check_out') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_tamu">Jumlah Tamu</label>
                            <input id="jumlah_tamu" class="form-control" type="number" name="jumlah_tamu"
                                value="{{ old('jumlah_tamu') }}">
                            <span class="text-danger">{{ $errors->first('jumlah_tamu') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input id="total_harga" class="form-control" type="number" name="total_harga"
                                value="{{ old('total_harga') }}">
                            <span class="text-danger">{{ $errors->first('total_harga') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status">
                                <option value="">Pilih status</option>
                                @foreach ($list_status as $a)
                                <option value="{{ $a }}" @selected($a==old('status'))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="metode_pembayaran">Metode Pembayaran</label>
                            <select id="metode_pembayaran" class="form-control" name="metode_pembayaran">
                                <option value="">Pilih Metode</option>
                                @foreach ($list_pembayaran as $a)
                                <option value="{{ $a }}" @selected($a==old('metode_pembayaran'))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('metode_pembayaran') }}</span>
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
