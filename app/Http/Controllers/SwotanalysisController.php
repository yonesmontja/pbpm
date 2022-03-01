<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swotanalysis;

class SwotanalysisController extends Controller
{
    //
    public function swotanalysis()
    {
    	$data_swotanalysis = \App\Models\Swotanalysis::all();
    	return view('swotanalysis.index',['data_swotanalysis' => $data_swotanalysis]);
    }
    public function swotanalysiscreate(Request $request)
    {
    	\App\Models\Swotanalysis::create($request -> all());
    	//return $request -> all();
    	return redirect('/swotanalysis')->with('sukses','berhasil diinput');
    }
    public function swotanalysisdelete($id)
    {
        $swotanalysis = \App\Models\Swotanalysis::find($id);
        $swotanalysis ->delete();
        return redirect('/swotanalysis')->with('sukses','berhasil dihapus!');
    }
    public function swotanalysisedit(Swotanalysis $swotanalysis)
    {
        return view('swotanalysis.swotanalysisedit',['swotanalysis'=>$swotanalysis]); 
    }
    public function swotanalysisupdate(Request $request, Swotanalysis $swotanalysis)
    {
        $swotanalysis ->update($request->all());
        return redirect('/swotanalysis')->with('sukses','berhasil diupdate!');
    }
}
