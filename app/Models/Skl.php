<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skl extends Model
{
    use HasFactory;

    protected $table = 'sklsmp';
    protected $fillable = ['skl_smp','skl_domain','skl_notes'];

}
