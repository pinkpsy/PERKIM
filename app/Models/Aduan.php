<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $fillable = [
        'nama_pelapor',
        'nik',  // Tambahkan kolom nik di sini
        'ktp_pelapor',
        'alamat_rumah',
        'ktp_pemilik',
        'foto_rumah',
        'kriteria_atap',
        'kriteria_dinding',
        'kriteria_lantai',
        'status',
    ];

    protected $casts = [
        'foto_rumah' => 'array',
        'kriteria_atap' => 'array',
        'kriteria_dinding' => 'array',
        'kriteria_lantai' => 'array',
    ];
}