<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sikap extends Model
{
    protected $table = 'sikap';

    protected $fillable = [
        "nis", "sikap_spiritual", "sikap_sosial"
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
