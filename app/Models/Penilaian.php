<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $fillable = ['kode','nama_tes','semester'];

    public function siswa()
    {
        return $this -> belongsToMany(Siswa::class)->withPivot(['nilai']);
    }
    public function mapel()
    {
        return $this -> belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
}
