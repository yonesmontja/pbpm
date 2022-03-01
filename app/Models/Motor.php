<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merk;

class Motor extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'id_motor';
    protected $fillable = ['id_motor','id_merk','nama_motor',];
    public function Merk()
    {
    	return $this -> belongsTo(Merk::class);
    }
}
