@extends('layouts.admins')
@section('content-admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold text-center" style="background-color:#D9D9D9 ">
                    Tambah Data Pembayaran
                </div>
                <div class="card-body">
                    <form action="{{ url('pembayaran',[]) }}" method="POST" >

                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="kode_pembayaran" class="font-weight-bold">Kode Pembayaran</label>
                            <input id="kode_pembayaran" class="form-control" type="text" name="kode_pembayaran" placeholder="Awali dengan kode *PMB"
                                value="{{ old('kode_pembayaran') }}">
                            <span class="text-danger">{{ $errors->first('kode_pembayaran') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Kode Booking</label>
                            <select id="my-select" class="form-control" name="booking_id">
                                <option value="">Kode Booking</option>
                                @foreach ($list_booking as $id => $a)
                                <option value="{{ $id }}" @selected($id==old(''))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('booking_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_pembayaran" class="font-weight-bold">Jumlah Pembayaran</label>
                            <input id="jumlah_pembayaran" class="form-control" type="number" name="jumlah_pembayaran"
                                value="{{ old('jumlah_pembayaran') }}">
                            <span class="text-danger">{{ $errors->first('jumlah_pembayaran') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pembayaran" class="font-weight-bold">Tanggal pembayaran</label>
                            <input id="tanggal_pembayaran" class="form-control" type="date" name="tanggal_pembayaran"
                                value="{{ old('tanggal_pembayaran') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_pembayaran') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="status_pembayaran" class="font-weight-bold">Status Pembayaran</label>
                            <select id="status_pembayaran" class="form-control" name="status_pembayaran">
                                <option value="">Pilih status</option>
                                @foreach ($list_status as $a)
                                <option value="{{ $a }}" @selected($a==old('status_pembayaran'))>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('status_pembayaran') }}</span>
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
                <div class="card-footer" style="background-color:#D9D9D9">
                    <button type="submit" class="btn" style="background-color: #333333; color:white">Simpan</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
