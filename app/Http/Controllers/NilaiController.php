<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Penilaian;
use App\Imports\NilaiImport;
use Illuminate\Http\Request;
use App\Models\Kompetensiinti;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Illuminate\Support\Facades\Redirect;

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
        $kelas = Kelas::all();
        //dd($guru);
    	return view('nilai.index',['kelas' => $kelas,'penilaian' => $penilaian,'siswa' => $siswa,'mapel' => $mapel,'kompetensiinti' => $kompetensiinti,'data_nilai' => $data_nilai,'guru' => $guru]);
    }
    public function nilaicreate(Request $request)
    {
    	\App\Models\Nilai::create($request -> all());
    	//return $request -> all();
    	//return redirect('/nilai')->with('sukses','berhasil diinput');
    	return Redirect::back()->with('sukses','berhasil diinput');

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
    public function import_excel(Request $request)
    {

        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_nilai di dalam folder public
        $file->move('file_nilai',$nama_file);


        // import data
        Excel::import(new NilaiImport, public_path('/file_nilai/'.$nama_file));

        $siswa = Nilai::all();

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar= $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        // notifikasi dengan session
        Session::flash('sukses','Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/nilai');
    }
}
