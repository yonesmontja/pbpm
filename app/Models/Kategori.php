<?php

namespace App\Models;

use App\Models\Journal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable=['kategori','avatar'];

    /**
     * Get all of the journal for the Kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journal(): HasMany
    {
        return $this->hasMany(Journal::class);
    }
}
