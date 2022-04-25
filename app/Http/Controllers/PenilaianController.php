<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    //
    public function profile($id)
    {
    	$penilaian = Penilaian::find($id);
    	return view('penilaian.profile',['penilaian' => $penilaian]);
    }
}
