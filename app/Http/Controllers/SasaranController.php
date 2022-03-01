<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sasaran;

class SasaranController extends Controller
{
    //
        public function sasaran()
    {
    	$data_sasaran = \App\Models\Sasaran::all();
    	return view('sasaran.index',['data_sasaran' => $data_sasaran]);
    }
    public function sasarancreate(Request $request)
    {
    	\App\Models\Sasaran::create($request -> all());
    	//return $request -> all();
    	return redirect('/sasaran')->with('sukses','berhasil diinput');
    }
    public function sasarandelete($id)
    {
        $sasaran = \App\Models\Sasaran::find($id);
        $sasaran ->delete();
        return redirect('/sasaran')->with('sukses','berhasil dihapus!');
    }
    public function sasaranedit(Sasaran $sasaran)
    {
        return view('sasaran.sasaranedit',['sasaran'=>$sasaran]); 
    }
    public function sasaranupdate(Request $request, Sasaran $sasaran)
    {
        $sasaran ->update($request->all());
        return redirect('/sasaran')->with('sukses','berhasil diupdate!');
    }
}
