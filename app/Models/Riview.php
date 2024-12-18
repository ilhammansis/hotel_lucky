<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riview extends Model
{
    protected $dates = ['tanggal_riview'];

    public $timestamps = false;
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class)->withDefault();
    }
}
