<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Extra;
use App\Models\Level;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable=['level_id','guru_id','nama','avatar'];
    /**
     * Get the level that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    /**
     * Get the guru that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    /**
     * Get the nilai that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
    /**
     * Get all of the extra for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extra(): HasMany
    {
        return $this->hasMany(Extra::class);
    }

    /**
     * Get all of the project for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    function avatar($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->avatar && file_exists(public_path('storage/kelas/' . $thumbnail . $this->avatar)))
            return asset('storage/kelas/' . $thumbnail  . $this->avatar);
        else
            return asset('no_avatar.png');
    }
    function delete_avatar()
    {
        if ($this->avatar && file_exists(public_path('storage/penilaian/' . $this->avatar)))
        {
            unlink(public_path('storage/penilaian/' . $this->avatar));
        }
        if ($this->avatar && file_exists(public_path('storage/penilaian/small_' . $this->avatar)))
        {
            unlink(public_path('storage/penilaian/small_' . $this->avatar));
        }
    }
    /**
     * Get all of the siswa for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
}
