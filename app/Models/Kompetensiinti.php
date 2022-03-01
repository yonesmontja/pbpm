<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kompetensiinti extends Model
{
    use HasFactory;

    protected $table = 'kompetensiinti';
    protected $fillable = ['ki_domain','level','ki_deskripsi'];
    public function kompetensidasar()
    {
    	return $this -> hasMany(Kompetensidasar::class);
    }
    public function level()
    {
    	return $this -> belongsTo(Level::class);
    }
}
