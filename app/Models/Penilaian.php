<?php

namespace App\Models;

use App\Models\Nilai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $fillable = ['kode','nama_tes','semester','avatar'];

    public function siswa()
    {
        return $this -> belongsToMany(Siswa::class)->withPivot(['nilai','penilaian_id']);
    }
    public function guru()
    {
    	return $this -> belongsTo(Guru::class);
    }
    public function mapel()
    {
        return $this -> hasMany(Mapel::class);
    }

    /**
     * Get all of the nilai for the Penilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
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
