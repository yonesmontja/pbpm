<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    //
    public function index()
    {
        $visi = Visi::all();
        $misi = Misi::all();
        //dd($visi);
        return view('welcome', ['visi' => $visi, 'misi' => $misi]);
    }
}
