<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $dates = ['tanggal_pembayaran'];

    public $timestamps = false;

    public function booking()
    {
        return $this->belongsTo(Booking::class)->withDefault();
    }
}
