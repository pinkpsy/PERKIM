<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ajuan extends Model
{
    use HasFactory, SoftDeletes; // Gunakan SoftDeletes jika Anda ingin melakukan soft delete

    protected $fillable = [
        'nama_pemohon',
        'nik',
        'nama_instansi',
        'jabatan',
        'alamat',
        'keperluan',
        'detail_keperluan',
        'surat',
        'nomor',
        'status',
    ];

    // Jika Anda menggunakan tabel lain selain 'ajuans', tentukan nama tabelnya
    protected $table = 'ajuans'; // Nama tabel, sesuaikan jika berbeda

    // Jika menggunakan SoftDeletes
    protected $dates = ['deleted_at'];
}
