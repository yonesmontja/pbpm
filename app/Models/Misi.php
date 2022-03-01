<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;
    	protected $table = 'misi';
    protected $fillable = ['misi_start',
    'misi_end',
    'misi_deskripsi',
    'misi_notes'];

    public function visi()
    {
        return $this -> belongsToMany(Visi::class)->withPivot(['visi_misi'])->withTimeStamps();
    }
}
