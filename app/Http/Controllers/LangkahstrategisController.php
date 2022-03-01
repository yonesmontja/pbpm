<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langkahstrategis;
use App\Models\Spmi;

class LangkahstrategisController extends Controller
{
    //
    public function langkahstrategis()
    {
    	$data_langkahstrategis = \App\Models\Langkahstrategis::all();
    	return view('langkahstrategis.index',['data_langkahstrategis' => $data_langkahstrategis]);
    }
    public function langkahstrategiscreate(Request $request)
    {
    	\App\Models\Langkahstrategis::create($request -> all());
    	//return $request -> all();
    	return redirect('/langkahstrategis')->with('sukses','berhasil diinput');
    }
    public function langkahstrategisdelete($id)
    {
        $langkahstrategis = \App\Models\Langkahstrategis::find($id);
        $langkahstrategis ->delete();
        return redirect('/langkahstrategis')->with('sukses','berhasil dihapus!');
    }
    public function langkahstrategisedit(Langkahstrategis $langkahstrategis)
    {
        return view('langkahstrategis.langkahstrategisedit',['langkahstrategis'=>$langkahstrategis]); 
    }
    public function langkahstrategisupdate(Request $request, Langkahstrategis $langkahstrategis)
    {
        $langkahstrategis ->update($request->all());
        return redirect('/langkahstrategis')->with('sukses','berhasil diupdate!');
    }

    public function spmi()
    {
        $data_spmi = \App\Models\Spmi::all();
        return view('langkahstrategis.spmi',['data_spmi' => $data_spmi]);
    }

    public function spmicreate(Request $request)
    {
        \App\Models\Spmi::create($request -> all());
        return redirect('/spmi')->with('sukses','berhasil diinput');
    }
    public function spmiedit(Spmi $spmi)
    {
        return view('langkahstrategis.spmiedit',['spmi'=>$spmi]); 
    }
    public function spmiupdate(Request $request, Spmi $spmi)
    {
        $spmi ->update($request->all());
        return redirect('/spmi')->with('sukses','berhasil diupdate!');
    }
    public function spmidelete($id)
    {
        $spmi = \App\Models\Spmi::find($id);
        $spmi ->delete();
        return redirect('/spmi')->with('sukses','berhasil dihapus!');
    }
}
