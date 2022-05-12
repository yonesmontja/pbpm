<?php

namespace App\Models;

use App\Models\Nilai;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = ['nama_guru','telpon','alamat','kode_guru','jk','is_bk','stat_data','status','email','avatar','user_id'];

    public function getAvatar()
    {
    	if(!$this -> avatar)
    	{
    		return asset('/images/default.jpg');
    	}
    	return asset('/images/'.$this->avatar);
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
    public function mapel()
    {
    	return $this -> hasMany(Mapel::class);
    }

    /**
     * Get all of the nilai for the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }

    /**
     * Get all of the project for the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function user()
    {
        return $this -> belongsTo('App\Models\User','user_id');
    }
    public function penilaian()
    {
    	return $this -> belongsTo(Penilaian::class);
    }
}
