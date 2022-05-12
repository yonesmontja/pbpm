<?php

namespace App\Models;

use App\Models\Nilai;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $fillable = ['kode','nama_mapel','semester','kelompok','guru_id','tambahan_sub','kd_singkat','is_sikap'];

    public function siswa()
    {
        return $this -> belongsToMany(Siswa::class)->withPivot(['nilai']);
    }
    public function penilaian()
    {
        return $this -> belongsTo(Penilaian::class);
    }
    public function guru()
    {
    	return $this -> belongsTo(Guru::class);
    }
    public function kompetensidasar()
    {
        return $this -> hasMany(Kompetensidasar::class);
    }

    /**
     * Get all of the nilai for the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }

    /**
     * Get all of the project for the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    function avatar($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->avatar && file_exists(public_path('images/' . $thumbnail . $this->avatar)))
            return asset('images/' . $thumbnail  . $this->avatar);
        else
            return asset('no_avatar.png');
    }

    function delete_avatar()
    {
        if ($this->avatar && file_exists(public_path('images/' . $this->avatar)))
            unlink(public_path('images/' . $this->avatar));
        if ($this->avatar && file_exists(public_path('images/small_' . $this->avatar)))
            unlink(public_path('images/small_' . $this->avatar));
    }
}
