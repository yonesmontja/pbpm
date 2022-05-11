<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $fillable = [
        'nama',
        'npsn',
        'alamat',
        'kode_pos',
        'no_telp',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'email',
        'website',
        'kepsek',
        'nip_kepsek',
        'logo',
        'sebutan_kepala',
        'nss',
        'kop_1',
        'kop_2',
    ];
    function avatar($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->logo && file_exists(public_path('images/' . $thumbnail . $this->logo)))
            return asset('images/' . $thumbnail  . $this->logo);
        else
            return asset('no_avatar.png');
    }

    function delete_avatar()
    {
        if ($this->logo && file_exists(public_path('images/' . $this->logo)))
            unlink(public_path('images/' . $this->logo));
        if ($this->logo && file_exists(public_path('images/small_' . $this->logo)))
            unlink(public_path('images/small_' . $this->logo));
    }
}
