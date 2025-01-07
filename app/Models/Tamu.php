<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    public function riview()
    {
        return $this->hasMany(Riview::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
