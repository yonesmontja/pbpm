<?php

namespace App\Models;

use App\Models\Rombel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tahunpel extends Model
{
    use HasFactory;
    protected $table = 'tahunpelajaran';
    protected $fillable =
    [
        'thn_pel',
        'semester',
        'tahun',
        'aktif',
        'nama_kepsek',
        'kode_kepsek',
        'tgl_raport',
        'tgl_raport_kelas3'
    ];

    /**
     * Get all of the nilai for the Tahunpel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }

    /**
     * Get all of the project for the Rombel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rombel(): HasMany
    {
        return $this->hasMany(Rombel::class);
    }
}
