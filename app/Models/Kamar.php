<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable =[
        'tipekamar_id',
        'nomor_kamar',
        'nama_kamar',
        'harga_permalam',
        'status',
        'deskripsi',
        'fasilitas',
        'foto_kamar'
    ];

    public function tipe_kamar()
    {
        return $this->belongsTo(TipeKamar::class, 'tipekamar_id')->withDefault();
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }   
}
