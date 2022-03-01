<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swot extends Model
{
    use HasFactory;
    	protected $table = 'swot';
    protected $fillable = ['swot_start',
    'swot_end',
    'swot_komponen',
    'swot_deskripsi',
    'swot_notes'];
}
