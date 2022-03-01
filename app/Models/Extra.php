<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;
    protected $table = 'extra';

    protected $fillable = ['nis', 'saran', 'ekskul', 'tinggi_sem1', 'tinggi_sem2', 'berat_sem1, berat_sem2', 'pendengaran', 'penglihatan', 'gigi', 'prestasi', 'jenis_prestasi', 'sakit', 'ijin', 'alpa'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
