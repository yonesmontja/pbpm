<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langkahstrategis extends Model
{
    use HasFactory;
	protected $table = 'langkahstrategis';
    protected $fillable = ['langkahstrategis_start',
    'langkahstrategis_end',
    'langkahstrategis_aspek',
    'langkahstrategis_deskripsi',
    'langkahstrategis_notes'];
}
