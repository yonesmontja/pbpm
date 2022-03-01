<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafikController extends Controller
{
    //
    public function grafiknilai()
    {
    	return view('grafik.grafiknilai');
    }
    public function grafikmateri()
    {
    	return view('grafik.grafikmateri');
    }
    public function grafikkompetensi()
    {
    	return view('grafik.grafikkompetensi');
    }
}
