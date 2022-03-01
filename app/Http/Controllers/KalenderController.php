<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalenderController extends Controller
{
    //
    public function kalender()
    {
    	return view('kalender.index');
    }
}
