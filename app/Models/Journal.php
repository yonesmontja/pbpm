<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = ['title','content','thumbnail','slug','user_id'];

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
    public function thumbnail()
    {
    	return !$this -> thumbnail ? asset('/admin/images/no_thumbnail.png') : $this -> thumbnail;
    }

    public function totalJournal()
    {
        return Journal::count();
    }
}
