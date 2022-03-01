<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    use HasFactory;
    	protected $table = 'sasaran';
    protected $fillable = ['sasaran_start',
    'sasaran_end',
    'sasaran_deskripsi',
    'sasaran_notes'];
}
