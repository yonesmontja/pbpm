<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'level';
    protected $fillable=['level'];
    public function kompetensiinti()
    {
    	return $this -> hasMany(Kompetensiinti::class);
    }
    public function kompetensidasar()
    {
    	return $this -> hasMany(Kompetensidasar::class);
    }
    /**
     * Get all of the kelas for the Level
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }
}
