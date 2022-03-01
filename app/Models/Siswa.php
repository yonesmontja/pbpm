<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = 
    [
        'nama_depan',
    'nama_belakang',
    'nis',
    'jenis_kelamin',
    'agama',
    'alamat',
    'avatar',
    'user_id',
    'nisn',
    'kelas',
    'tempat_lahir',
    'tgl_lahir',
    'pend_sebelum',
    'nama_ayah',
    'nik',
    'nama_ibu',
    'pekerjaan_ayah',
    'pekerjaan_ibu',
    'alamat_ortu',
    'nama_wali',
    'pekerjaan_wali',
    'alamat_wali',
    'email',
    'role',
    'password',
    'status_keluarga',
    'anak_ke',
    'masuk_kls_awal',
    'tgl_masuk_awal',
    'status',
    'siswaOAP',
    'distrik',
    ];

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
        return $this -> belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
    public function user()
    {
        return $this -> belongsTo('App\Models\User','user_id');
    }
    public function keimanan()
    {
        return $this->hasOne(Keimanan::class);
    }
    
    public function ppkn()
    {
        return $this->hasOne('App\Models\Ppkn','nis','nis');
    }

    public function bindo()
    {
        return $this->hasOne(Bindo::class);
    }
    public function bing()
    {
        return $this->hasOne(Bing::class);
    }
    public function matematika()
    {
        return $this->hasOne(Matematika::class);
    }

    public function Ipa()
    {
        return $this->hasOne(Ipa::class);
    }

    public function Ips()
    {
        return $this->hasOne(Ips::class);
    }

    public function Sbk()
    {
        return $this->hasOne(Sbk::class);
    }

    public function penjas()
    {
        return $this->hasOne(Penjas::class);
    }

    public function Ikanasin()
    {
        return $this->hasOne(Ikanasin::class);
    }

    public function sikap()
    {
        return $this->hasOne(Sikap::class);
    }

    public function extra()
    {
        return $this->hasOne(Extra::class);
    }

}
