<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $fillable = ['kode','nama_mapel','semester','kelompok','tambahan_sub','kd_singkat','is_sikap'];
    
    public function siswa()
    {
        return $this -> belongsToMany(Siswa::class)->withPivot(['nilai']);
    }

    public function guru()
    {
    	return $this -> belongsTo(Guru::class);
    }
    public function kompetensidasar()
    {
        return $this -> hasMany(Kompetensidasar::class);
    }
}
