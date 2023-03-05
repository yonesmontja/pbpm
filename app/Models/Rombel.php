<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Tahunpel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rombel extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the tahunpel that owns the Rombel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahunpel(): BelongsTo
    {
        return $this->belongsTo(Tahunpel::class, 'tahunpelajaran_id', 'id');
    }

    /**
     * Get the tahunpel that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    /**
     * Get the tahunpel that owns the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'rombel_siswa', 'rombel_id', 'siswa_id')->withPivot(['nama_depan', 'nama_belakang'])->withTimeStamps();
    }
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
}
