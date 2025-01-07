@extends('layouts.admins')
@section('content-admin')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold text-center" style="background-color:#D9D9D9 ">
                    Tambah Data Transaksi
                </div>
                <div class="card-body">
                    <form action="{{ url('transaksi/'.$transaksi->id,[]) }}" method="POST" >

                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Tamu</label>
                            <select id="my-select" class="form-control" name="tamu_id">
                                <option value="">Pilih Tamu</option>
                                @foreach ($list_tamu as $id => $a)
                                <option value="{{ $id }}" @selected($id==$transaksi->tamu_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tamu_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Kode Booking</label>
                            <select id="my-select" class="form-control" name="booking_id">
                                <option value="">Kode Booking</option>
                                @foreach ($list_booking as $id => $a)
                                <option value="{{ $id }}" @selected($id==$transaksi->booking_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('booking_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Kode Pembayaran</label>
                            <select id="my-select" class="form-control" name="pembayaran_id">
                                <option value="">Kode Pembayaran</option>
                                @foreach ($list_pembayaran as $id => $a)
                                <option value="{{ $id }}" @selected($id==$transaksi->pembayaran_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('booking_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Kamar</label>
                            <select id="my-select" class="form-control" name="kamar_id">
                                <option value="">Pilih Kamar</option>
                                @foreach ($list_kamar as $id => $a)
                                <option value="{{ $id }}" @selected($id==$transaksi->kamar_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('kamar_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="my-select" class="font-weight-bold">Tipe Kamar</label>
                            <select id="my-select" class="form-control" name="tipekamar_id">
                                <option value="">Pilih Tipe Kamar</option>
                                @foreach ($list_tipekamar as $id => $a)
                                <option value="{{ $id }}" @selected($id==$transaksi->tipekamar_id)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tipekamar_id') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_transaksi" class="font-weight-bold">Tanggal</label>
                            <input id="tanggal_transaksi" class="form-control" type="date" name="tanggal_transaksi"
                                value="{{ $transaksi->tanggal_transaksi ?? old('tanggal_transaksi') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_transaksi') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="total_harga" class="font-weight-bold">Total</label>
                            <input id="total_harga" class="form-control" type="number" name="total_harga"
                                value="{{ $transaksi->total_harga ?? old('total_harga') }}">
                            <span class="text-danger">{{ $errors->first('total_harga') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="status_transaksi" class="font-weight-bold">Status Transaksi</label>
                            <select id="status_transaksi" class="form-control" name="status_transaksi">
                                <option value="">Pilih status</option>
                                @foreach ($list_status as $a)
                                <option value="{{ $a }}" @selected($a==$transaksi->status_transaksi)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('status_transaksi') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="metode_transaksi" class="font-weight-bold">Metode Pembayaran</label>
                            <select id="metode_transaksi" class="form-control" name="metode_transaksi">
                                <option value="">Pilih Metode</option>
                                @foreach ($list_transaksi as $a)
                                <option value="{{ $a }}" @selected($a==$transaksi->metode_transaksi)>{{ $a }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('metode_transaksi') }}</span>
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
