<?php

namespace App\Models;

use App\Models\Nilai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * Get all of the nilai for the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }

    public function mapel()
    {
        return $this -> belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
    public function penilaian()
    {
        return $this -> belongsToMany(Penilaian::class,'penilaian_siswa', 'siswa_id', 'penilaian_id')->withPivot(['nilai'])->withTimeStamps();
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
