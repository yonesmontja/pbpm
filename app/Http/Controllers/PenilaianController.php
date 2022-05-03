<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PenilaianController extends Controller
{
    //
    public function profile($id)
    {
    	$mapel = Mapel::all();
        $penilaian = Penilaian::find($id);
        $tes = Penilaian::find($id) -> id;
        $nilai = Nilai::all()->where('penilaian_id',$tes);
        $nilai1 = Nilai::all();
        $tes2 = [];
        $nama_tes = "Tugas 2";
        foreach($nilai1 as $key){
            if($penilaian->where('nama_tes','=',$nama_tes)){
                $tes2[] = $key->penilaian->nama_tes;
            }

        }
        dd($tes2);
        //foreach($nilai -)
    	return view('penilaian.profile',[
            'penilaian' => $penilaian,
            'nilai' => $nilai,
            'mapel'=>$mapel]);
    }
    public function index()
    {
    	$data_penilaian = \App\Models\Penilaian::all();
    	return view('penilaian.index',['data_penilaian' => $data_penilaian]);
    }
     public function penilaiancreate(Request $request)
    {
        $this -> validate($request,[
            'nama_tes' => 'required|min:3',
            'kode' => 'required',
            'semester' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);
        $avatar = $request->file('avatar');
        $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
        $img = Image::make($avatar->path());
        $img->resize('120', '120')
            ->save(public_path('/images') . '/small_' . $file_name);

        $avatar->move('/images', $file_name);
        //insert ke tabel Users
        $penilaian = new Penilaian();
        $penilaian -> nama_tes = $request -> nama_tes;
        $penilaian -> kode = $request -> kode;
        $penilaian -> semester = $request -> semester;
        $penilaian -> avatar = $file_name;

        $penilaian -> save();
        //return $request -> all();
        return redirect('/penilaian')->with('sukses','berhasil diinput');
    }
    public function penilaianedit(Penilaian $penilaian)
    {
        return view('penilaian.penilaianedit',['penilaian'=>$penilaian]);
    }
    public function penilaianupdate(Request $request, Penilaian $penilaian)
    {
        $penilaian ->update($request->all());
        if ($request->hasFile('avatar')) {
            $penilaian->delete_avatar();
            $avatar = $request->file('avatar');
            $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
            $img = Image::make($avatar->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $avatar->move('/images', $file_name);
            $penilaian->avatar = $file_name;
        }

        $input = $request->all();


        $penilaian -> nama_tes = $input['nama_tes'];
        $penilaian -> kode = $input['kode'];
        $penilaian -> semester = $input['semester'];

        $penilaian -> avatar = $file_name;

        $penilaian->save();
        return redirect('/penilaian')->with('sukses','berhasil diupdate!');
    }
    public function penilaiandelete(Penilaian $penilaian)
    {
        $penilaian ->delete_avatar();
        $penilaian ->delete();
        return redirect('/penilaian')->with('sukses','berhasil dihapus!');
    }
}
