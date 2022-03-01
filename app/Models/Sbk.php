<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sbk extends Model
{
    use HasFactory;
    protected $table = 'sbk';

    protected $fillable = [
        "nis", 
        "nilai_pengetahuan", 
        "deskripsi_pengetahuan", 
        "nilai_keterampilan", 
        "deskripsi_keterampilan",
        "ppeng",
        "pketr"
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
