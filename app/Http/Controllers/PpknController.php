<?php

namespace App\Http\Controllers;

use App\Imports\PpknImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Models\Ppkn;
use Session;
use App\Models\Siswa;

class PpknController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        //dd($siswa);
        $ppkn = Ppkn::all();
        return view('ppkn.index', ['ppkn' => $ppkn,'siswa' => $siswa]);
    }

    public function import(Request $request)
    {
        $siswa = Siswa::all();
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa',$nama_file);
 
        // import data
        Excel::import(new PpknImport, public_path('/file_siswa/'.$nama_file));
 
        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
        // alihkan halaman kembali
        return redirect()->route('ppkn.index',['siswa' => $siswa]);
    
    }

    public function edit($id)
    {
        $ppkn = Ppkn::findOrFail($id);

        return view('ppkn.edit', ['ppkn' => $ppkn]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'nilai_pengetahuan' => 'required|min:0|max:100',
            'ppeng' => 'required',
            'deskripsi_pengetahuan' => 'required',
            'nilai_keterampilan' => 'required|min:0|max:100',
            'pketr' => 'required',
            'deskripsi_keterampilan' => 'required',
        ]);

        $ppkn = Ppkn::findOrFail($id);

        $ppkn->nilai_pengetahuan = $request->nilai_pengetahuan;
        $ppkn->ppeng = $request->ppeng;
        $ppkn->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;
        $ppkn->nilai_keterampilan = $request->nilai_keterampilan;
        $ppkn->pketr = $request->pketr;
        $ppkn->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $ppkn->save();

        return redirect()->route('ppkn.index');
    }

    public function destroy($id)
    {
        $ppkn = Ppkn::findOrFail($id);
        $ppkn->delete();

        return redirect()->route('ppkn.index')->with('success', 'Data Nilai berhasil dihapus');
    }
}
