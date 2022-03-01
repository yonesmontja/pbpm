<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Misi;
use App\Models\Tahun;
use App\Models\Visi;
use App\Models\Siswa;

class MisiController extends Controller
{
    //
    public function misi()
    {
    	$data_misi = \App\Models\Misi::all();
    	return view('misi.index',['data_misi' => $data_misi]);
    }
    public function misicreate(Request $request)
    {
    	\App\Models\Misi::create($request -> all());
    	//return $request -> all();
    	return redirect('/misi')->with('sukses','berhasil diinput');
    }
    public function misidelete($id)
    {
        $misi = \App\Models\Misi::find($id);
        $misi ->delete();
        return redirect('/misi')->with('sukses','berhasil dihapus!');
    }
    public function misiedit(Misi $misi)
    {
        return view('misi.misiedit',['misi'=>$misi]); 
    }
    public function misiupdate(Request $request, Misi $misi)
    {
        $misi ->update($request->all());
        return redirect('/misi')->with('sukses','berhasil diupdate!');
    }
    public function misiprofile($id)
    {
        $misi_profile = \App\Models\Misi::find($id);
        //dd($misi_profile);
        $visio = \App\Models\Visi::all();
        //dd($visio);
        $tahun = \App\Models\Tahun::all();
        //dd($tahun);
        $siswa = \App\Models\Siswa::all();
        return view('misi.misiprofile',['misi_profile' => $misi_profile,'visio' => $visio,'tahun' => $tahun,'siswa' => $siswa]);
    }
    public function visimisiadd(Request $request, $idmisi)
    {
        //dd($request->all());
        $misio = \App\Models\Misi::find($idmisi);
        //dd($visio);
        //$visi -> misi() -> attach($request -> misi);
        if($misio->visi()->where('visi_id',$request->visi)->exists()){
            return redirect('misi/'.$idmisi.'/misiprofile')->with('error','sudah ada');
        }
        $misio->visi()->attach($request->visi_deskripsi,['visi_misi' => $request->visi_misi]);
        
        return redirect('misi/'.$idmisi.'/misiprofile')->with('sukses','berhasil dimasukkan');
    }
}
