<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $dates = ['tanggal_transaksi'];
    public $timestamps = false;
    public $fillable = [
        'tamu_id',
        'booking_id',
        'pembayaran_id',
        'kamar_id',
        'tipekamar_id',
        'tanggal_transaksi',
        'total_harga',
        'status_transaksi',
        'metode_transaksi',
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class)->withDefault();
    }

    public function tamu()
    {
        return $this->belongsTo(Tamu::class)->withDefault();
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class)->withDefault();
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class)->withDefault();
    }

    public function tipe_kamar()
    {
        return $this->belongsTo(TipeKamar::class, 'tipekamar_id')->withDefault();
    }

}
