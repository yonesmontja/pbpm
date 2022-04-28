<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
    	$level1 = Level::all();
    	return view('level.index',['level1' => $level1]);
    }
     public function leveledit(Level $level)
    {
        return view('level.leveledit',['level'=>$level]);
    }
}
