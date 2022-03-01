<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensidasar extends Model
{
    use HasFactory;
    protected $table = 'kompetensidasar';
    protected $fillable = ['kompetensiinti_id','level_id','mapel_id','kompetensi_dasar'];
    public function kompetensiinti()
    {
    	return $this -> belongsTo(Kompetensiinti::class);
    }
    public function mapel()
    {
    	return $this -> belongsTo(Mapel::class);
    }
    public function level()
    {
        return $this -> belongsTo(Level::class);
    }
}
