<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
    	$level = Level::all();
    	return view('level.index',['level' => $level]);
    }
}
