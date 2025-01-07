<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riview extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $dates = ['tanggal_riview'];
    protected $fillable =[
        'tamu_id',
        'kamar_id',
        'rating',
        'komentar',
        'tanggal_riview'
    ];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class)->withDefault();
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class)->withDefault();
    }
}
