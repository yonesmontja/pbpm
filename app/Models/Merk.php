<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Motor;

class Merk extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'id_merk';
    protected $fillable = [
    	'id_merk','nama_merk',
    ];

    public function Motor()
    {
    	return $this -> hasMany(Motor::class);
    }
}
