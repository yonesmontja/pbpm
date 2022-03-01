<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = ['nama_guru','telpon','alamat','kode_guru','jk','is_bk','stat_data','status','email','avatar','user_id'];

    public function getAvatar()
    {
    	if(!$this -> avatar)
    	{
    		return asset('images/default.jpg');
    	}
    	return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
    	return $this -> hasMany(Mapel::class);
    }
    public function user()
    {
        return $this -> belongsTo('App\Models\User','user_id');
    }
}
