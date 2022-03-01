<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;
    protected $table = 'tujuan';
    protected $fillable = ['tujuan_start',
    'tujuan_end',
    'tujuan_deskripsi',
    'tujuan_notes'];
}
