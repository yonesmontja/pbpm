<?php

namespace App\Models;

use App\Models\Nilai;
use App\Models\Project;
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

    /**
     * Get all of the project for the Kompetensiinti
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function level()
    {
    	return $this -> belongsTo(Level::class);
    }
}
