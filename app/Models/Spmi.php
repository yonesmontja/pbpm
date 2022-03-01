<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spmi extends Model
{
    use HasFactory;
    protected $fillable = [
    	'spmi_start',
    	'spmi_end',
    	'tahapan',
    	'kegiatan',
    	'pihak_terlibat',
    	'waktu',
    	'catatan',
        'output',
    ];
}
