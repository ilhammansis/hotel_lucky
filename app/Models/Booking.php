<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $dates = ['tanggal_check_in','tanggal_check_out'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class)->withDefault();
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
