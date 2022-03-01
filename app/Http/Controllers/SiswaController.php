<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport; 
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Siswa;
use App\Models\User;
use PDF;
use Session;

class SiswaController extends Controller
{
    public function index()
    {
    	$data_siswa = \App\Models\Siswa::all();
    	return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
    	\App\Models\Siswa::create($request -> all());
    	//return $request -> all();
    	return redirect('/siswa')->with('sukses','berhasil diinput');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa/edit',['siswa'=>$siswa]); 
    }
    public function update(Request $request, Siswa $siswa)
    {

        $siswa ->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar= $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','berhasil diupdate!');
    }
    public function test(Siswa $siswa)
    {
        $data_siswa = \App\Models\Siswa::all();
        $user_id = \App\Models\Siswa::all();
        return view('siswa.test',['data_siswa' => $data_siswa,'user_id'=> $user_id]);
    }
    public function testcreate(Request $request)
    {
        $this -> validate($request,[
            'nama_depan' => 'required|min:3',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);

        //insert ke tabel Users
        $user = new \App\Models\User;
        $user -> role = 'siswa';
        $user -> name = $request -> nama_depan;
        $user -> email = $request -> email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        $user -> save();
        //insert ke tabel Siswa
        $request -> request -> add(['user_id' => $user -> id]);
        $siswa = \App\Models\Siswa::create($request -> all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar= $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        //return $request -> all();
        return redirect('/test')->with('sukses','berhasil diinput');
    }

    public function testaktivasi(Request $request,$id)
    {
        $siswa = Siswa::find($id);
        
        $user = new \App\Models\User;
        //dd($siswa);
        $user -> role = 'siswa';
        $user -> name = $siswa->nama_depan;
        $user -> email = $siswa->email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        $user -> save();
        //dd($user);

        $request -> request -> add(['user_id' => $user -> id]);
        $siswa ->update($request->all());
        
        //dd($siswa);

        return redirect('/test')->with('sukses', 'berhasil diaktivasi'); 
    }

    public function testedit(Siswa $siswa)
    {
        return view('siswa/testedit',['siswa'=>$siswa]); 
    }
    public function testupdate(Request $request, Siswa $siswa)
    {

        $siswa ->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar= $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/test')->with('sukses','berhasil diupdate!');
    }
    public function testdelete(Siswa $siswa)
    {
        $siswa ->delete();
        return redirect('/test')->with('sukses','berhasil dihapus!');
    }
    public function testprofile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $matapelajaran = \App\Models\Mapel::all();
        //dd($mapel);

        // data untuk Chart.js
        $categories = [];
        $data = [];
        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp ->nama_mapel;
                $data[] = $siswa -> mapel() -> wherePivot('mapel_id',$mp ->id) -> first()->pivot->nilai;
            }
        }
        //dd($data);

        //dd(json_encode($categories));

        //dd($matapelajaran);
        return view('profile.index',['siswa'=> $siswa,'matapelajaran' => $matapelajaran,'categories' => $categories, 'data' => $data]);
    }
    public function testaddnilai(Request $request, $idsiswa)
    {
        //dd($request->all());
        $siswa = \App\Models\Siswa::find($idsiswa);
        //dd($siswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists())
        {
            return redirect('test/'.$idsiswa.'/profile')->with('error','data mapel sudah ada');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect('test/'.$idsiswa.'/profile')->with('sukses','nilai sukses diinput');
    }
    public function testdeletenilai(Siswa $siswa, $idmapel)
    {
        $siswa -> mapel() -> detach($idmapel);
        return redirect()->back()->with('sukses','nilai berhasil dihapus');
    }
    public function export_excel()
    {
        return Excel::download(new SiswaExport,'siswa.xls');
    }
    public function import_excel(Request $request)
    {
        //$siswa = Siswa::all();
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
        Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
        //Excel::import(new UserImport, public_path('/file_siswa/'.$nama_file));
        $siswa = Siswa::all();
        //dd($siswa);
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar= $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
 
        // notifikasi dengan session
        Session::flash('sukses','Berhasil Diimport!');
 
        // alihkan halaman kembali
        return redirect('/test');
    }
    public function export_PDF()
    {
        //pkai loadHTML
        //$pdf = PDF::loadHTML('<h1>DATA SISWA</h1>');
        //pkai loadView
        $data_siswa = Siswa::get();
        $pdf = PDF::loadView('export.siswapdf',['data_siswa'=>$data_siswa]);
        return $pdf->download('data_siswa_'.date('Y-m-d_H-i-s').'.pdf');
    }
}
