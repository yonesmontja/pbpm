<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppkn extends Model
{
    use HasFactory;
    protected $table = 'ppkn';

    protected $fillable = [
        'nis',
        'nisn', 
        'nilai_pengetahuan', 
        'deskripsi_pengetahuan', 
        'nilai_keterampilan', 
        'deskripsi_keterampilan',
        'ppeng',
        'pketr'
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa','nis','nis');
    }
}
