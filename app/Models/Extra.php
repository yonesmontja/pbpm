<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tahunpel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extra extends Model
{
    use HasFactory;
    protected $table = 'extra';

    protected $fillable = ['kelas_id', 'siswa_id', 'saran', 'ekskul', 'tinggi_sem1', 'tinggi_sem2', 'berat_sem1, berat_sem2', 'pendengaran', 'penglihatan', 'gigi', 'prestasi', 'jenis_prestasi', 'sakit', 'ijin', 'alpa', 'rombel_id', 'tahunpelajaran_id'];

    /**
     * Get the siswa that owns the Extra
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
    /**
     * Get the kelas that owns the Extra
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    public function rombel(): BelongsTo
    {
        return $this->belongsTo(Rombel::class, 'rombel_id', 'id');
    }

    /**
     * Get the tahunpel that owns the Tahunpel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahunpel(): BelongsTo
    {
        return $this->belongsTo(Tahunpel::class, 'tahunpelajaran_id', 'id');
    }
}
