<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Tahunpel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RombelController extends Controller
{
    public function index(Rombel $rombel)
    {
        $rombel = Rombel::all();
        //dd($rombel);
        $kelas = Kelas::all();
        $guru = Guru::orderBy('nama_guru')->get();
        $tahunpelajaran = Tahunpel::all();

        return view('rombel.index', [
            'rombel' => $rombel,
            'kelas' => $kelas,
            'guru' => $guru,
            'tahunpelajaran' => $tahunpelajaran
        ]);
    }
    public function rombelcreate(Request $request)
    {

        $rombel = Rombel::create($request->all());

        //dd($rombel);
        return Redirect::back()->with('sukses', 'berhasil diinput');
    }
    public function rombel_siswa()
    {

        $rombel = Rombel::all();
        //dd($rombel);
        $kelas = Kelas::all();
        $guru = Guru::orderBy('nama_guru')->get();
        //dd($guru);
        $tahunpelajaran = Tahunpel::all();

        $siswa = Siswa::orderBy('nama_depan')->get();

        //dd($user_id);

        return view('rombel.rombel_siswa', [
            'rombel' => $rombel,
            'kelas' => $kelas,
            'guru' => $guru,
            'tahunpelajaran' => $tahunpelajaran,
            'siswa' => $siswa,
        ]);
    }
    public function rombelsiswacreate(Request $request)
    {

        $date = now();
        DB::table('rombel_siswa')->insert([
            'siswa_id'      => $request->input('siswa_id'),
            'rombel_id'  => $request->input('rombel_id'),
            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),
            'tahunpelajaran_id' => $request->input('tahunpelajaran_id'),
            'created_at' => $date,
            'updated_at' => $date
        ]);
        //dd($request->input('nama_depan'));
        return Redirect::back()->with('sukses', 'berhasil diinput');
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
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa', $nama_file);


        // import data
        Excel::import(new RombelImport, public_path('/file_siswa/' . $nama_file));
        //Excel::import(new UserImport, public_path('/file_siswa/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/rombel_siswa');
    }
}
