<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertest extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
    ];

    function avatar($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->avatar && file_exists(public_path('avatars/posting/' . $thumbnail . $this->avatar)))
            return asset('avatars/posting/' . $thumbnail  . $this->avatar);
        else
            return asset('avatars/no_avatar.png');
    }

    function delete_avatar()
    {
        if ($this->avatar && file_exists(public_path('avatars/posting/' . $this->avatar)))
            unlink(public_path('avatars/posting/' . $this->avatar));
        if ($this->avatar && file_exists(public_path('avatars/posting/small_' . $this->avatar)))
            unlink(public_path('avatars/posting/small_' . $this->avatar));
    }
}
