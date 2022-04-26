<?php

namespace App\Http\Controllers;

use PDF;
use Session;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Penilaian;
use App\Imports\UserImport;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SiswaController extends Controller
{
    public function index(Siswa $data_siswa)
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
        //if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
        //    $siswa->avatar= $request->file('avatar')->getClientOriginalName();
        //    $siswa->save();
        //}
        if ($request->hasFile('avatar')) {
            $siswa->delete_avatar();
            $avatar = $request->file('avatar');
            $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
            $img = Image::make($avatar->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $avatar->move('/images', $file_name);
            $siswa->avatar = $file_name;
        }
        return redirect('/siswa')->with('sukses','berhasil diupdate!');
    }
    public function test(Siswa $data_siswa)
    {
        $data_siswa = \App\Models\Siswa::all();
        $user_id = \App\Models\Siswa::all();
        //dd('$data_siswa');
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
        $avatar = $request->file('avatar');
        $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
        $img = Image::make($avatar->path());
        $img->resize('120', '120')
            ->save(public_path('/images') . '/small_' . $file_name);

        $avatar->move('/images', $file_name);

        //insert ke tabel Users
        $user = new User();
        $user -> role = 'siswa';
        $user -> name = $request -> nama_depan;
        $user -> email = $request -> email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        $user -> avatar = $file_name;
        $user -> save();
        //insert ke tabel Siswa
        $input = $request->all();
        $user_id = $user->id;
        //dd($user_id);
        $siswa = new Siswa();
        //dd($siswa);
        $siswa -> user_id = $user_id;
        $siswa -> nama_depan = $input['nama_depan'];
        $siswa -> nama_belakang = $input['nama_belakang'];
        $siswa -> email = $input['email'];
        $siswa -> nis = $input['nis'];
        $siswa -> nisn = $input['nisn'];
        $siswa -> jenis_kelamin = $input['jenis_kelamin'];
        $siswa -> agama = $input['agama'];
        $siswa -> alamat = $input['alamat'];
        $siswa -> avatar = $file_name;
        //$request -> request -> add(['user_id' => $user -> id]);
        //dd($request -> request -> add(['user_id' => $user -> id]));
        //$siswa = Siswa::create($request -> all());
        $siswa -> password = bcrypt('rahasia');
        //dd($siswa);

        //if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('/images/',$request->file('avatar')->getClientOriginalName());
        //    $siswa->avatar= $request->file('avatar')->getClientOriginalName();
        //    $siswa->save();
        //}

        $siswa -> save();
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
        $status = '1';
        $request -> request -> add(['user_id' => $user -> id,'status' => $status]);
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
        //if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('/images/',$request->file('avatar')->getClientOriginalName());
        //    $siswa->avatar= $request->file('avatar')->getClientOriginalName();
        //    $siswa->save();
        //}
        if ($request->hasFile('avatar')) {
            $siswa->delete_avatar();
            $avatar = $request->file('avatar');
            $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
            $img = Image::make($avatar->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $avatar->move('/images', $file_name);
            $siswa->avatar = $file_name;
        }
        $siswa->nama_depan = $request->nama_depan;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->email = $request->email;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->save();
        return redirect('/test')->with('sukses','berhasil diupdate!');
    }
    public function testdelete(Siswa $siswa)
    {
        $user ->delete_avatar();
        $siswa ->delete();
        return redirect('/test')->with('sukses','berhasil dihapus!');
    }
    public function testprofile($id, Request $request)
    {
        $siswa = \App\Models\Siswa::find($id);
        $matapelajaran = \App\Models\Mapel::all();
        $penilaian = \App\Models\Penilaian::all();
        //dd($penilaian);
        //$siswa->penilaian();
        //$nilairata = \App\Models\MapelSiswa::avg();
        //dd('$nilairata');
        //dd($penilaian);

        // data untuk Chart.js
        $categories = [];
        $data = [];
        $tescategories = [];
        $tes1 = [];
        $data5 = [];
        $categories2 = [];
        $data6 = [];
        $categories3 = [];
        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp ->nama_mapel;

                $data[] = $siswa -> mapel() -> wherePivot('mapel_id',$mp ->id) -> first()->pivot->nilai;
            }
        }
        foreach($siswa->mapel as $mnp){
            $data5[] = $mnp->pivot->nilai;
            $categories2[] = $mnp -> nama_mapel;
        }
        foreach($siswa->penilaian as $mnpx){
            $data6[] = $mnpx->pivot->nilai;
            $categories3[] = $mnpx -> nama_tes;
        }
        //dd($categories2);
        //dd($data5);
        foreach($penilaian as $mp2){
            if($siswa->penilaian()->wherePivot('penilaian_id',$mp2->id)->first()){
                $tescategories[] = $mp2 ->nama_tes;

                $tes1[] = $siswa -> penilaian() -> wherePivot('penilaian_id',$mp2 ->id) -> first()->pivot->nilai;
                //dd($tes1);
            }
        }
        $matang = $siswa->penilaian->pluck('id');
        //dd($matang);
        //$hasil = Penilaian::with('siswa')->where('id',$id)->get();
        //$hasil = $siswa->penilaian()->first()->pivot->penilaian_id;
        //$penilaian1 = Penilaian::find($hasil);
        $cuma = $siswa->penilaian()->where('siswa_id',$id)->get();
        //dd($cuma);
        //$hasil = $siswa->penilaian->where('id');
        //dd($hasil);
        $tescategories1 = collect($tescategories);
        //dd($tescategories1);
        $matpel = collect($categories);
        //$average = collect($data)->avg();
        $average = collect($data5)->avg();
        $data2 = DB::table('penilaian_siswa')
                    ->join('mapel_siswa', 'mapel_siswa.siswa_id', '=', 'penilaian_siswa.siswa_id');

        //$data3 = $siswa -> penilaian() ->wherePivot('penilaian_id',$id);
        //dd($data3);
        //dd($penilaian);
        //dd($tes1);
        //dd($data2);
        //dd($matpel);
        //dd($average);
        //dd(json_encode($tes));
        //dd($data);
        //dd($tes);
        //dd($matapelajaran);
        return view('profile.index',['categories3'=>$categories3,'data6'=>$data6,'data5'=>$data5,'categories2'=>$categories2,'cuma'=>$cuma,'matang'=>$matang,'tescategories1' => $tescategories1,'data2'=>$data2,'penilaian'=>$penilaian,'matpel'=>$matpel,'average'=> $average,'siswa'=> $siswa,'matapelajaran' => $matapelajaran,'categories' => $categories, 'data' => $data, 'tescategories' => $tescategories, 'tes1' => $tes1]);
    }
    public function testaddnilai(Request $request, $idsiswa)
    {
        //dd($idsiswa);
        //$tes = $request->penilaian;
        $siswa = \App\Models\Siswa::find($idsiswa);
        //$tes = \App\Models\Penilaian::find($idsiswa);
        //dd($siswa);
        //if($siswa->mapel()->where('mapel_id',$request->mapel)->exists())
        //{
        //    return redirect('test/'.$idsiswa.'/profile')->with('error','data mapel sudah ada');
        //}
        //if($siswa->penilaian()->where('penilaian_id',$request->penilaian)->exists())
        //{
        //    return redirect('test/'.$idsiswa.'/profile')->with('error','data mapel sudah ada');
       // }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
        //dd($siswa);
        $siswa->penilaian()->attach($request->penilaian,['nilai' => $request->nilai]);
        //dd($tes);
        return redirect()->back()->with('sukses','nilai sukses diinput');
    }
    public function testdeletenilai(Siswa $siswa, $idmapel)
    {
        //$penilaian = Penilaian::find($idmapel);
        $siswa -> mapel() -> detach($idmapel);
        $siswa -> penilaian() -> detach($idmapel);
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
