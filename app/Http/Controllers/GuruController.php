<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function profile ($id)
    {
    	$guru = Guru::find($id);
    	return view('guru.profile',['guru' => $guru]);
    }
}
