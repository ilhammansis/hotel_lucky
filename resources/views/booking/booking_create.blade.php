@extends('layouts.admins')
@section('content-admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center font-weight-bold" style="background-color:#D9D9D9 ">
                    Tambah Data Booking
                </div>
                <div class="card-body">
                    <form action="{{ url('booking',[]) }}" method="POST" >

                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="kode_booking" class="font-weight-bold">Kode Booking</label>
                            <input id="kode_booking" class="form-control" type="text" name="kode_booking" placeholder="Awali dengan kode *BK"
                                value="{{ old('kode_booking') }}">
                            <span class="text-danger">{{ $errors->first('booking') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Tamu</label>
                            <select id="my-select" class="form-control" name="tamu_id">
                                <option value="">Pilih Tamu</option>
                                @foreach ($list_tamu as $id => $a)
                                <option value="{{ $id }}" @selected($id==old('tamu_id'))>{{ $a }}
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
                                <option value="{{ $id }}" @selected($id==old('kamar_id'))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('kamar_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_check_in" class="font-weight-bold">Check-In</label>
                            <input id="tanggal_check_in" class="form-control" type="date" name="tanggal_check_in"
                                value="{{ old('tanggal_check_in') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_check_in') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_check_out" class="font-weight-bold">Check-Out</label>
                            <input id="tanggal_check_out" class="form-control" type="date" name="tanggal_check_out"
                                value="{{ old('tanggal_check_out') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_check_out') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_tamu" class="font-weight-bold">Tamu</label>
                            <input id="jumlah_tamu" class="form-control" type="number" name="jumlah_tamu"
                                value="{{ old('jumlah_tamu') }}">
                            <span class="text-danger">{{ $errors->first('jumlah_tamu') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Total</label>
                            <select id="my-select" class="form-control" name="total_harga">
                                <option value="">Pilih Total</option>
                                @foreach ($list_harga as $id => $a)
                                <option value="{{ $id }}" @selected($id==old('total_harga'))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('total_harga') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="status" class="font-weight-bold">Status</label>
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
                            <label for="metode_pembayaran" class="font-weight-bold">Metode Pembayaran</label>
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
