<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tujuan;

class TujuanController extends Controller
{
    //
        public function tujuan()
    {
    	$data_tujuan = \App\Models\Tujuan::all();
    	return view('tujuan.index',['data_tujuan' => $data_tujuan]);
    }
    public function tujuancreate(Request $request)
    {
    	\App\Models\Tujuan::create($request -> all());
    	//return $request -> all();
    	return redirect('/tujuan')->with('sukses','berhasil diinput');
    }
    public function tujuandelete($id)
    {
        $tujuan = \App\Models\Tujuan::find($id);
        $tujuan ->delete();
        return redirect('/tujuan')->with('sukses','berhasil dihapus!');
    }
    public function tujuanedit(Tujuan $tujuan)
    {
        return view('tujuan.tujuanedit',['tujuan'=>$tujuan]); 
    }
    public function tujuanupdate(Request $request, Tujuan $tujuan)
    {
        $tujuan ->update($request->all());
        return redirect('/tujuan')->with('sukses','berhasil diupdate!');
    }
}
