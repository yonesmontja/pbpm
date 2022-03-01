<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $fillable = [
        'nama', 'npsn', 'alamat', 'kode_pos', 'no_telp', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'email', 'website', 'kepsek', 'nip_kepsek'
    ];
}
