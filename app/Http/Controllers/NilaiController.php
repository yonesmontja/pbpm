<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Extra;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Penilaian;
use App\Imports\NilaiImport;
use Illuminate\Http\Request;
use App\Models\Kompetensiinti;
use App\Models\Tahunpelajaran;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
        $nilai_start = Tahunpelajaran::all()->where('id','=',2)->pluck('tahun');
        $nilai_end = Tahunpelajaran::all()->where('id','=',1)->pluck('tahun');
        $kelas_sub = Siswa::where('kelas_id',0)->get();
        //dd($kelas_sub);
        for($bulan=1;$bulan < 7;$bulan++){
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($jumlah_penilaian);
    	return view('nilai.index',[
            'jumlah_penilaian' => $jumlah_penilaian,
            'kelas_sub' => $kelas_sub,
            'nilai_start' => $nilai_start,
            'nilai_end' => $nilai_end,
            'kelas' => $kelas,
            'penilaian' => $penilaian,
            'siswa' => $siswa,
            'mapel' => $mapel,
            'kompetensiinti' => $kompetensiinti,
            'data_nilai' => $data_nilai,
            'guru' => $guru]);
    }
    public function getSiswa($id)
    {
        $get_siswa = Siswa::where('kelas_id',$id)->get();
        //dd($get_siswa);
    return response()->json($get_siswa);
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
    public function extra()
    {
    	$data_extra = Extra::all();
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        $penilaian = Penilaian::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $nilai_start = Tahunpelajaran::all()->where('id','=',2)->pluck('tahun');
        $nilai_end = Tahunpelajaran::all()->where('id','=',1)->pluck('tahun');
        $kelas_sub = Siswa::where('kelas_id',0)->get();
        //dd($kelas_sub);
        for($bulan=1;$bulan < 7;$bulan++){
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($jumlah_penilaian);
    	return view('nilai.extra',[
            'jumlah_penilaian' => $jumlah_penilaian,
            'kelas_sub' => $kelas_sub,
            'nilai_start' => $nilai_start,
            'nilai_end' => $nilai_end,
            'kelas' => $kelas,
            'penilaian' => $penilaian,
            'siswa' => $siswa,
            'mapel' => $mapel,
            'kompetensiinti' => $kompetensiinti,
            'data_extra' => $data_extra,
            'guru' => $guru]);
    }
    public function extracreate(Request $request)
    {
    	\App\Models\Extra::create($request -> all());
    	//return $request -> all();
    	//return redirect('/nilai')->with('sukses','berhasil diinput');
    	return Redirect::back()->with('sukses','berhasil diinput');

    }
    public function extradelete($id)
    {
        $extra = \App\Models\Extra::find($id);
        $extra ->delete();
        return redirect('/extra')->with('sukses','berhasil dihapus!');
    }
    public function extraedit(Extra $extra)
    {

        return view('nilai.extraedit',['extra'=>$extra]);
    }
    public function extraupdate(Request $request, extra $extra)
    {
        $extra ->update($request->all());
        return redirect('/extra')->with('sukses','berhasil diupdate!');
    }
    public function import_extra_excel(Request $request)
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
        Excel::import(new ExtraImport, public_path('/file_nilai/'.$nama_file));

        $siswa = Extra::all();

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar= $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        // notifikasi dengan session
        Session::flash('sukses','Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/extra');
    }
}
