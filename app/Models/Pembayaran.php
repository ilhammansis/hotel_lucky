<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $dates = ['tanggal_pembayaran'];
    public $timestamps = false;
    protected $fillable =[
        'booking_id',
        'kode_pembayaran',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'status_pembayaran'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class)->withDefault();
    }
}
