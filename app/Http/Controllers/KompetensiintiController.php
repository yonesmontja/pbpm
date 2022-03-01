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
    	\App\Models\Kompetensiinti::create($request -> all());
    	//return $request -> all();
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
