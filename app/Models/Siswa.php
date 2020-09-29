<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id'];
    public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.jpg');
    	}
    	return asset('images/'.$this->avatar);
    }
    public function mapel()
    {
        return $this -> belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
    public function ratarataNilai()
    {
        $total = 0;
        $hitung = 0;
        $rata = 0;
        foreach ($this->mapel as $mapel){
            //$total = $total + $mapel->pivot->nilai;
            $total += $mapel->pivot->nilai;
            //$hitung + 1;
            $hitung++;
        }
        $rata = ($hitung!=0)?$total/$hitung:0;
        return round($rata);
    }
    public function nama_lengkap()
    {
        return $this -> nama_depan.' '.$this -> nama_belakang;
    }
    public function totalNilai()
    {
        $total = 0;
        foreach($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
        }
        return round($total);
    }
}
