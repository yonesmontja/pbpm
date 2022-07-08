<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'last_seen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
        public function getuserAvatar()
    {
        if(!$this -> avatar)
        {
            return asset('images/default.jpg');
        }
        return asset('storage/images/'.$this->avatar);
    }
    function avatar($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->avatar && file_exists(public_path('storage/users/' . $thumbnail . $this->avatar)))
            return asset('storage/users/' . $thumbnail  . $this->avatar);
        else
            return asset('no_avatar.png');
    }
    function delete_avatar()
    {
        if ($this->avatar && file_exists(public_path('storage/users/' . $this->avatar)))
        {
            unlink(public_path('storage/users/' . $this->avatar));
        }
        if ($this->avatar && file_exists(public_path('storage/users/small_' . $this->avatar)))
        {
            unlink(public_path('storage/users/small_' . $this->avatar));
        }
    }
    public function siswa()
    {
        return $this -> hasOne(Siswa::class);
    }
    public function guru()
    {
        return $this -> belongsTo(Guru::class);
    }
}
