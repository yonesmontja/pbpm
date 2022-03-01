<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahunpelajaran extends Model
{
    use HasFactory;
    protected $table = "tahunpelajaran";

    protected $fillable = ["thn_pel","semester"];
}
