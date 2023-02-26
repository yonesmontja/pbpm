<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;
    protected $guarded = [];
    function image($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->image && file_exists(public_path('storage/testimonies/' . $thumbnail . $this->image)))
            return asset('storage/testimonies/' . $thumbnail  . $this->image);
        else
            return asset('no_image.png');
    }
}
