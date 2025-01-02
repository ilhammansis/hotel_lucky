@extends('layouts.admins')
@section('content-admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Pembayaran
                </div>
                <div class="card-body">
                    <form action="{{ url('pembayaran/'.$pembayaran->id,[]) }}" method="POST" >

                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="kode_pembayaran">Kode Pembayaran</label>
                            <input id="kode_pembayaran" class="form-control" type="text" name="kode_pembayaran"
                                value="{{ $pembayaran->kode_pembayaran ?? old('kode_pembayaran') }}">
                            <span class="text-danger">{{ $errors->first('kode_pembayaran') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select">Kode Booking</label>
                            <select id="my-select" class="form-control" name="booking_id">
                                <option value="">Kode Booking</option>
                                @foreach ($list_booking as $id => $a)
                                <option value="{{ $id }}" @selected($id==$pembayaran->booking_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('booking_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                            <input id="jumlah_pembayaran" class="form-control" type="number" name="jumlah_pembayaran"
                                value="{{ $pembayaran->jumlah_pembayaran ?? old('jumlah_pembayaran') }}">
                            <span class="text-danger">{{ $errors->first('jumlah_pembayaran') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pembayaran">Tanggal pembayaran</label>
                            <input id="tanggal_pembayaran" class="form-control" type="date" name="tanggal_pembayaran"
                                value="{{ $pembayaran->tanggal_pembayaran  ?? old('tanggal_pembayaran') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_pembayaran') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="status_pembayaran">Status Pembayaran</label>
                            <select id="status_pembayaran" class="form-control" name="status_pembayaran">
                                <option value="">Pilih status</option>
                                @foreach ($list_status as $a)
                                <option value="{{ $a }}" @selected($a==$pembayaran->status_pembayaran)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('status_pembayaran') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="metode_pembayaran">Metode Pembayaran</label>
                            <select id="metode_pembayaran" class="form-control" name="metode_pembayaran">
                                <option value="">Pilih Metode</option>
                                @foreach ($list_pembayaran as $a)
                                <option value="{{ $a }}" @selected($a==$pembayaran->status_pembayaran)>{{ $a }}
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
