<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensis';

    protected $fillable = [
        'nama',
        'lokasi_jaga',
        'gps',
        'waktu',
        'foto'
    ];

    public $timestamps = false;
}