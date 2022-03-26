<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'description'];
    function image($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->image && file_exists(public_path('images/posting/' . $thumbnail . $this->image)))
            return asset('images/posting/' . $thumbnail  . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('images/posting/' . $this->image)))
            unlink(public_path('images/posting/' . $this->image));
        if ($this->image && file_exists(public_path('images/posting/small_' . $this->image)))
            unlink(public_path('images/posting/small_' . $this->image));
    }
}
