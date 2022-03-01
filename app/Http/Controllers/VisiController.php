<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visi;
use App\Models\Misi;
use App\Models\Tahun;

class VisiController extends Controller
{
    //
    public function visi()
    {
    	$data_visi = \App\Models\Visi::all();
    	return view('visi.index',['data_visi' => $data_visi]);
    }
    public function visicreate(Request $request)
    {
    	\App\Models\Visi::create($request -> all());
    	//return $request -> all();
    	return redirect('/visi')->with('sukses','berhasil diinput');
    }
    public function visidelete($id)
    {
        $visi = \App\Models\Visi::find($id);
        $visi ->delete();
        return redirect('/visi')->with('sukses','berhasil dihapus!');
    }
    public function visiedit(Visi $visi)
    {
        return view('visi.visiedit',['visi'=>$visi]); 
    }
    public function visiupdate(Request $request, Visi $visi)
    {
        $visi ->update($request->all());
        return redirect('/visi')->with('sukses','berhasil diupdate!');
    }
    public function visiprofile($id)
    {
        $visi_profile = \App\Models\Visi::find($id);
        //dd($visi_profile);
        $misio = \App\Models\Misi::all();
        //dd($misio);
        $tahun = \App\Models\Tahun::all();
        //dd($tahun);
        return view('visi.visiprofile',['visi_profile' => $visi_profile,'misio' => $misio,'tahun' => $tahun]);
    }
    public function visimisiadd(Request $request, $idvisi)
    {
        //dd($request->all());
        $visio = \App\Models\Visi::find($idvisi);
        //dd($visio);
        //$visi -> misi() -> attach($request -> misi);
        if($visio->misi()->where('misi_id',$request->misi)->exists()){
            return redirect('visi/'.$idvisi.'/visiprofile')->with('error','sudah ada');
        }
        $visio->misi()->attach($request->misi_deskripsi,['visi_misi' => $request->visi_misi]);
        
        return redirect('visi/'.$idvisi.'/visiprofile')->with('sukses','berhasil dimasukkan');
    }
}
