<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utama extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'uraian',
        'isi',
        'jamoperasi',
        'alamat',
        'no_telp',
        'gambar',
        'gambarbackground',
    ];
}
