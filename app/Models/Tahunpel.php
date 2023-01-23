<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
