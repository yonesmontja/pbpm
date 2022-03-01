<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kompetensidasar;
use App\Models\Kompetensiinti;
use App\Models\Level;
use App\Models\Mapel;
use Illuminate\Support\Facades\DB;

class KompetensidasarController extends Controller
{
    //
    public function kompetensidasar()
    {
    	//$data_kd = \App\Models\Kompetensidasar::all();
    	
        $data_ki = \App\Models\Kompetensiinti::all();
    	$data_level = \App\Models\Level::all();
    	$data_mapel = \App\Models\Mapel::all();
    	return view('kompetensidasar.index',['data_ki' => $data_ki,'data_mapel' => $data_mapel,'data_level' => $data_level]);
    }
    public function kompetensidasarcreate(Request $request)
    {

        //insert ke tabel Kompetensiinti
        $kdi = \App\Models\Kompetensiinti::all();
        $data_level = \App\Models\Level::all();
        $data_mapel = \App\Models\Mapel::all();
        //insert ke tabel Kompetensidasar
        //$request -> request -> add(['kompetensiinti_id' => $kdi -> id,'level_id' => $data_level -> id,'mapel_id' => $data_mapel -> id]);
        \App\Models\Kompetensidasar::create($request -> all());
      
        //return $request -> all();
        return redirect('/kompetensidasar')->with('sukses','berhasil diinput');
    }

    public function getStates($id) {
        $kominti = DB::table("kompetensiinti")->where("level_id",$id)->pluck("ki_deskripsi","id");
//dd($kominti);
        return json_encode($kominti);

    }
}
