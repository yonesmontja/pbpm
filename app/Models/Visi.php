<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    use HasFactory;
    	protected $table = 'visi';
    protected $fillable = ['visi','visi_start',
    'visi_end',
    'visi_deskripsi',
    'visi_notes'];

    public function misi()
    {
        return $this -> belongsToMany(Misi::class)->withPivot(['visi_misi'])->withTimeStamps();
    }
}
