<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journal extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = ['title','content','thumbnail','slug','user_id','kategori_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
    	return $this ->belongsTo(User::class);
    }

    public function totalJournal()
    {
        return Journal::count();
    }

    /**
     * Get the kategori that owns the Journal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    function avatar($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->thumbnail && file_exists(public_path('images/' . $thumbnail . $this->thumbnail)))
            return asset('images/' . $thumbnail  . $this->thumbnail);
        else
            return asset('no_avatar.png');
    }
    function delete_avatar()
    {
        if ($this->thumbnail && file_exists(public_path('images/' . $this->thumbnail)))
            unlink(public_path('images/' . $this->thumbnail));
        if ($this->thumbnail && file_exists(public_path('images/small_' . $this->thumbnail)))
            unlink(public_path('images/small_' . $this->thumbnail));
    }
}
