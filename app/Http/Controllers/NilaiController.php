<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\Kompetensiinti;

class NilaiController extends Controller
{
    //
    public function nilai()
    {
    	$data_nilai = Nilai::all();
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        $penilaian = Penilaian::all();
        $guru = Guru::all();


        //dd($guru);
    	return view('nilai.index',['penilaian' => $penilaian,'siswa' => $siswa,'mapel' => $mapel,'kompetensiinti' => $kompetensiinti,'data_nilai' => $data_nilai,'guru' => $guru]);
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
