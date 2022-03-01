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
        return asset('images/'.$this->avatar);
    }
    public function siswa()
    {
        return $this -> belongsTo(Siswa::class);
    }
    public function guru()
    {
        return $this -> belongsTo(Guru::class);
    }
}
