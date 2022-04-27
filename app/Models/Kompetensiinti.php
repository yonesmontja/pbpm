<?php

namespace App\Models;

use App\Models\Nilai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kompetensiinti extends Model
{
    use HasFactory;

    protected $table = 'kompetensiinti';
    protected $fillable = ['id_level','id_kinti','kompetensi_inti','ki_domain','level','ki_deskripsi'];
    public function kompetensidasar()
    {
    	return $this -> hasMany(Kompetensidasar::class);
    }

    /**
     * Get all of the nilai for the Kompetensiinti
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
    public function level()
    {
    	return $this -> belongsTo(Level::class);
    }
}
