<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skl;

class SklController extends Controller
{
    public function skl()
    {
    	$data_skl = \App\Models\Skl::all();
    	return view('skl.index',['data_skl' => $data_skl]);
    }
    public function sklcreate(Request $request)
    {
    	\App\Models\Skl::create($request -> all());
    	//return $request -> all();
    	return redirect('/skl')->with('sukses','berhasil diinput');
    }
    public function skldelete($id)
    {
        $skl = \App\Models\Skl::find($id);
        $skl ->delete();
        return redirect('/skl')->with('sukses','berhasil dihapus!');
    }
    public function skledit(Skl $skl)
    {
        return view('skl.skledit',['skl'=>$skl]); 
    }
    public function sklupdate(Request $request, Skl $skl)
    {
        $skl ->update($request->all());
        return redirect('/skl')->with('sukses','berhasil diupdate!');
    }
}
