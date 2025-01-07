<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;
    protected $fillable =[
        'tipekamar',
        'deskripsi',
        'harga_dasar',
        'kapasitas'
    ];

    public function kamar()
    {
        return $this->hasMany(Kamar::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
