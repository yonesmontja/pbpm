<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swot;

class SwotController extends Controller
{
    //
    public function swot()
    {
    	$data_swot = \App\Models\Swot::all();
    	return view('swot.index',['data_swot' => $data_swot]);
    }
    public function swotcreate(Request $request)
    {
    	\App\Models\Swot::create($request -> all());
    	//return $request -> all();
    	return redirect('/swot')->with('sukses','berhasil diinput');
    }
    public function swotdelete($id)
    {
        $swot = \App\Models\Swot::find($id);
        $swot ->delete();
        return redirect('/swot')->with('sukses','berhasil dihapus!');
    }
    public function swotedit(Swot $swot)
    {
        return view('swot.swotedit',['swot'=>$swot]); 
    }
    public function swotupdate(Request $request, Swot $swot)
    {
        $swot ->update($request->all());
        return redirect('/swot')->with('sukses','berhasil diupdate!');
    }
}
