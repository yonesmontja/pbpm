<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kompetensiinti;

class KompetensiintiController extends Controller
{
    //
    public function kompetensiinti()
    {
    	$data_ki = \App\Models\Kompetensiinti::all();
    	return view('kompetensiinti.index',['data_ki' => $data_ki]);
    }
    public function kompetensiinticreate(Request $request)
    {
    	 $this -> validate($request,[
            'ki_domain' => 'required',
            'ki_deskripsi' => 'required',
            'level' => 'required',
        ]);
    	//return $request -> all();
        $kompetensiinti = new Kompetensiinti;
        $kompetensiinti -> kompetensi_inti = $request -> kompetensi_inti;
        $kompetensiinti -> ki_domain = $request -> ki_domain;
        $kompetensiinti -> ki_deskripsi = $request -> ki_deskripsi;
        $kompetensiinti -> level = $request -> level;
        $kompetensiinti -> id_level = 1;
        $kompetensiinti -> id_kinti = 1;
        $kompetensiinti -> kompetensi_inti = "Kompetensi inti";
        $kompetensiinti->save();
    	return redirect('/kompetensiinti')->with('sukses','berhasil diinput');
    }
    public function kompetensiintidelete($id)
    {
        $ki = \App\Models\Kompetensiinti::find($id);
        $ki ->delete();
        return redirect('/kompetensiinti')->with('sukses','berhasil dihapus!');
    }
    public function kompetensiintiedit(Kompetensiinti $ki)
    {
        return view('kompetensiinti.kompetensiintiedit',['ki'=>$ki]);
    }
    public function kompetensiintiupdate(Request $request, Kompetensiinti $ki)
    {
        $ki ->update($request->all());
        return redirect('/kompetensiinti')->with('sukses','berhasil diupdate!');
    }
}
