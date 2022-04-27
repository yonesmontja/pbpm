<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Penilaian;
use App\Models\Kompetensiinti;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $fillable = ['nilai_start',
    'nilai',
    'kompetensi_inti_id',
    'mapel_id',
    'penilaian_id',
    'guru_id',
    'siswa_id',
    'nilai_end',
    'nilai_deskripsi',
    'nilai_notes'];

    /**
     * Get the kompetensiinti that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kompetensiinti(): BelongsTo
    {
        return $this->belongsTo(Kompetensiinti::class, 'kompetensi_inti_id', 'id');
    }
    /**
     * Get the mapel that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mapel(): BelongsTo
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
/**
 * Get the penilaian that owns the Nilai
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
    public function penilaian(): BelongsTo
    {
        return $this->belongsTo(Penilaian::class, 'penilaian_id', 'id');
    }

    /**
     * Get the guru that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    /**
     * Get the siswa that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
