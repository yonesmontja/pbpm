<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swotanalysis extends Model
{
    use HasFactory;
    	protected $table = 'swotanalysis';
    protected $fillable = ['swotanalysis_start',
    'swotanalysis_end',
    'swotanalysis_kuadran',
    'swotanalysis_deskripsi',
    'swotanalysis_notes'];
}
