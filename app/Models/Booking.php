<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $dates = ['tanggal_check_in','tanggal_check_out'];
    public $timestamps = false;
    protected $fillable =[
        'tamu_id',
        'kamar_id',
        'kode_booking',
        'tanggal_check_in',
        'tanggal_check_out',
        'jumlah_tamu',
        'total_harga',
        'status',
        'metode_pembayaran'
    ];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class)->withDefault();
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class)->withDefault();
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
