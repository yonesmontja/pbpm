<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    //
    public function nilai()
    {
    	$data_nilai = \App\Models\Nilai::all();
    	return view('nilai.index',['data_nilai' => $data_nilai]);
    }
    public function nilaicreate(Request $request)
    {
    	\App\Models\Nilai::create($request -> all());
    	//return $request -> all();
    	return redirect('/nilai')->with('sukses','berhasil diinput');
    }
    public function nilaidelete($id)
    {
        $nilai = \App\Models\Nilai::find($id);
        $nilai ->delete();
        return redirect('/nilai')->with('sukses','berhasil dihapus!');
    }
    public function nilaiedit(Nilai $nilai)
    {
        return view('nilai.nilaiedit',['nilai'=>$nilai]); 
    }
    public function nilaiupdate(Request $request, Nilai $nilai)
    {
        $nilai ->update($request->all());
        return redirect('/nilai')->with('sukses','berhasil diupdate!');
    }
}
