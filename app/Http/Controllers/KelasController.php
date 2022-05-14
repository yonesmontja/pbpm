<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class KelasController extends Controller
{
    public function profile($id)
    {
    	$mapel = Mapel::all();

        $kelas = Kelas::find($id);
        $nama_kelas = Kelas::where('id','=',$id)->pluck('nama');
        //dd($nama_kelas);
        $nama_siswa = Siswa::where('kelas','=',$nama_kelas)->pluck('nama_depan');
        $jumlah_siswa = Siswa::where('kelas','=',$nama_kelas)->count();
        $id_guru = Kelas::where('id','=',$id)->pluck('guru_id')->first();
        //dd(collect($id_guru));
        $wali_kelas = Guru::all()->where('id','=',$id_guru)->pluck('nama_guru')->first;
        dd($wali_kelas);
        $rata_kelas1 = Nilai::all()->where('kelas_id','=',$id)->pluck('nilai')->avg();
        //dd($rata_kelas1);
        $rata_kelas = number_format((float)$rata_kelas1, 1, '.', '');
        //dd($rata_kelas);
    	return view('kelas.profile',[
            'kelas' => $kelas,
            'nama_siswa' => $nama_siswa,
            'jumlah_siswa' => $jumlah_siswa,
            'wali_kelas' => $wali_kelas,
            'mapel' => $mapel,
            'rata_kelas' => $rata_kelas
        ]);
    }
    public function index()
    {
    	$level = Level::all();
        $kelas1 = Kelas::all();
    	return view('kelas.index',['kelas1' => $kelas1,'level' => $level]);
    }
     public function kelasedit(Kelas $kelas)
    {
        $level = Level::all();
        return view('kelas.kelasedit',['kelas'=>$kelas,'level'=>$level]);
    }
    public function kelasupdate(Request $request, Kelas $kelas)
    {
        $kelas ->update($request->all());
        if ($request->hasFile('avatar')) {
            $kelas->delete_avatar();
            $avatar = $request->file('avatar');
            $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
            $img = Image::make($avatar->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $avatar->move('/images', $file_name);
            $kelas->avatar = $file_name;
        }
        $input = $request->all();
        $kelas -> nama = $input['nama'];
        $kelas -> level_id = $input['level_id'];
        $kelas->save();
        return redirect('/kelas')->with('sukses','berhasil diupdate!');
    }
    public function kelascreate(Request $request)
    {
        $this -> validate($request,[
            'nama' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);
        $avatar = $request->file('avatar');
        $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
        $img = Image::make($avatar->path());
        $img->resize('120', '120')
            ->save(public_path('/images') . '/small_' . $file_name);
        $avatar->move('/images', $file_name);

        $kelas = new Kelas();
        $kelas -> nama = $request -> nama;
        $kelas -> level_id = $request -> level_id;
        $kelas -> avatar = $file_name;
        $kelas -> save();
        //return $request -> all();
        return redirect('/kelas')->with('sukses','berhasil diinput');
    }
    public function kelasdelete(kelas $kelas)
    {
        $kelas ->delete_avatar();
        $kelas ->delete();
        return redirect('/kelas')->with('sukses','berhasil dihapus!');
    }
}
