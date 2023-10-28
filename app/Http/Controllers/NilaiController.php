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
use App\Models\Rombel;
use App\Models\Tahunpel;
use App\Models\Penilaian;
use App\Exports\NilaiExport;
use App\Imports\ExtraImport;
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
        $nilai_start = Tahunpelajaran::all()->where('id', '=', 2)->pluck('tahun');
        $nilai_end = Tahunpelajaran::all()->where('id', '=', 1)->pluck('tahun');
        $kelas_sub = Siswa::where('kelas_id', 0)->get();
        $tahunpel = Tahunpel::all();
        $rombel = Rombel::all();
        //dd($kelas_sub);
        for ($bulan = 1; $bulan < 7; $bulan++) {
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($jumlah_penilaian);
        return view('nilai.index', [
            'rombel' => $rombel,
            'jumlah_penilaian' => $jumlah_penilaian,
            'kelas_sub' => $kelas_sub,
            'nilai_start' => $nilai_start,
            'nilai_end' => $nilai_end,
            'tahunpel' => $tahunpel,
            'kelas' => $kelas,
            'penilaian' => $penilaian,
            'siswa' => $siswa,
            'mapel' => $mapel,
            'kompetensiinti' => $kompetensiinti,
            'data_nilai' => $data_nilai,
            'guru' => $guru
        ]);
    }
    public function isinilai($id)
    {

        $tahunpel = Tahunpel::where('aktif', 'Y')->get();
        foreach ($tahunpel as $thn) {
            $semester_aktif = $thn->semester;
            $kepsek_aktif = $thn->nama_kepsek;
            $nip_kepsek = $thn->kode_kepsek;
            $tanggal_raport = Carbon::parse($thn->tgl_raport)->isoFormat('D MMMM Y');
            $tanggal_raport_kls6 = $thn->tgl_raport_kelas3;
            $tahun_pelajaran = $thn->thn_pel;
            $tahun_aktif = $thn->tahun;
            $thn_id = $thn->id;
        }
        $guru = Guru::find($id);
        //dd($guru);
        $nama_rombel = Rombel::where('guru_id', '=', $id)->where('tahunpelajaran_id', '=', $thn_id)->pluck('rombel')->first();
        $guru_rombel = Rombel::where('guru_id', '=', $id)->where('tahunpelajaran_id', '=', $thn_id)->pluck('id')->first();
        //dd($guru_rombel);
        $id_guru = $id;
        //dd($id_guru);
        $kelas_rombel = Rombel::where('guru_id', '=', $id)->where('tahunpelajaran_id', '=', $thn_id)->pluck('kelas_id')->first();
        $data_nilai = Nilai::with('kompetensiinti', 'mapel', 'guru', 'penilaian', 'rombel', 'kelas', 'siswa')->where('guru_id', '=', $id)->where('tahunpel_id', '=', $thn_id)->get();
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $penilaian = Penilaian::all();
        //dd($kelas_rombel);
        //dd($guru_rombel);
        $rombel = DB::table('rombel_siswa')->where('rombel_id', '=', $guru_rombel)->where('tahunpelajaran_id', '=', $thn_id)->pluck('rombel_id')->first();
        $siswa =
        DB::table('rombel_siswa')->where('rombel_id', '=', $guru_rombel)->where('tahunpelajaran_id', '=', $thn_id)->join('siswa', 'siswa.id', '=', 'rombel_siswa.siswa_id')
        ->get();

        $kelas = Kelas::where('guru_id', '=', $id)->pluck('nama');

        //dd($kelas);
        $nilai_start = Tahunpelajaran::where('id', '=', 2)->pluck('tahun');
        $nilai_end = Tahunpelajaran::where('id', '=', 1)->pluck('tahun');
        $kelas_sub = Siswa::where('kelas_id', 0)->get();
        $tahunpel = Tahunpel::all();
        //$rombel = Rombel::all();
        //dd($kelas_sub);
        // for ($bulan = 1; $bulan < 7; $bulan++) {
        //     $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
        //     $jumlah_penilaian[] = $chart_penilaian->jumlah;
        // }
        //dd($jumlah_penilaian);
        return view('nilai.isinilai', [
            'rombel' => $rombel,
            'nama_rombel' => $nama_rombel,
            'guru_rombel' => $guru_rombel,
            'id_guru' => $id_guru,
            'kelas_rombel' => $kelas_rombel,
            // 'jumlah_penilaian' => $jumlah_penilaian,
            'kelas_sub' => $kelas_sub,
            'nilai_start' => $nilai_start,
            'nilai_end' => $nilai_end,
            'tahunpel' => $tahunpel,
            'kelas' => $kelas,
            'penilaian' => $penilaian,
            'siswa' => $siswa,
            'mapel' => $mapel,
            'kompetensiinti' => $kompetensiinti,
            'data_nilai' => $data_nilai,
            'guru' => $guru,
        ]);
    }

    public function hapusBanyak(Request $request)
    {
        $ids = $request->ids;
        Nilai::whereIn('id', $ids)->delete();
        return response()->json(["success" => "Nilai berhasil dihapus!"]);
    }

    public function multiDelete(Request $request)
    {
        Nilai::whereIn('id', $request->get('selected'))->delete();

        return response("Selected nilai(s) deleted successfully.", 200);
    }

    public function getSiswa($id)
    {
        //$get_siswa = Siswa::where('kelas_id',$id)->get();
        $get_siswa = DB::table('rombel_siswa')->where('rombel_id', $id)->get();
        //dd($get_siswa);
        return response()->json($get_siswa);
    }
    public function getNamaSiswa($id)
    {
        $get_siswa = Siswa::where('kelas_id', $id)->orderBy('nama_depan')->get();
        //$get_siswa = DB::table('rombel_siswa')->where('rombel_id', $id)->get();
        //dd($get_siswa);
        return response()->json($get_siswa);
    }
    public function getNamaDepan($id)
    {
        $get_siswa = Siswa::where('id', $id)->get();
        //$get_siswa = DB::table('rombel_siswa')->where('rombel_id', $id)->get();
        //dd($get_siswa);
        return response()->json($get_siswa);
    }
    public function getNamaBelakang($id)
    {
        $get_siswa = Siswa::where('id', $id)->get();
        //$get_siswa = DB::table('rombel_siswa')->where('rombel_id', $id)->get();
        //dd($get_siswa);
        return response()->json($get_siswa);
    }
    public function nilaicreate(Request $request)
    {
        //dd($request->tanggal);
        if ($request->tanggal == '0000-00-00') {
            $tanggal = null;
        } else {
            $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        }
        //dd($tanggal);
        $nilai = Nilai::create([
            'nilai' => $request->nilai,
            'tanggal' => $tanggal,
            'nilai_start' => $request->nilai_start,
            'nilai_end' => $request->nilai_end,
            'nilai_deskripsi' => $request->nilai_deskripsi,
            'nilai_notes' => $request->nilai_notes,
            'kompetensi_inti_id' => $request->kompetensi_inti_id,
            'mapel_id' => $request->mapel_id,
            'penilaian_id' => $request->penilaian_id,
            'guru_id' => $request->guru_id,
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahunpel_id' => $request->tahunpel_id,
            'rombel_id' => $request->rombel_id
        ]);
        $id = $nilai->id;
        //dd($id);
        $date = now();
        DB::table('penilaian_siswa')->insert([
            'siswa_id'      => $request->input('siswa_id'),
            'penilaian_id'  => $request->input('penilaian_id'),
            'nilai' => $request->input('nilai'),
            'nilai_id' => $id,
            'created_at' => $date,
            'updated_at' => $date,
            'tanggal' => $tanggal,
        ]);
        DB::table('mapel_siswa')->insert([
            'siswa_id'      => $request->input('siswa_id'),
            'mapel_id'  => $request->input('mapel_id'),
            'nilai' => $request->input('nilai'),
            'nilai_id' => $id,
            'created_at' => $date,
            'updated_at' => $date,
            'tanggal' => $tanggal,
        ]);
        //dd($nilai);
        return Redirect::back()->with(
            'sukses',
            'berhasil diinput'
        );
    }
    public function nilaidelete($id)
    {
        $id_user = auth()->user()->id;
        $guru = Guru::where('user_id', $id_user)->value('id');
        $role = auth()->user()->role;
        $nilai = Nilai::find($id);
        $nilai->delete();
        if ($role == 'admin') {
            return redirect('/nilai')->with('sukses', 'berhasil dihapus!');
        } else {
            return redirect('/isinilai' . '/' . $guru)->with('sukses', 'berhasil dihapus');
        }
    }
    public function nilaiedit(Nilai $nilai)
    {
        $tahunpel = Tahunpel::all();
        $all_kompetensiinti = Kompetensiinti::all();

        $all_penilaian = Penilaian::all();
        $tahunpel1 = Tahunpel::where('id', $nilai->tahunpel_id)->pluck('thn_pel');
        $data_nilai = Nilai::all();
        $kompetensiinti = Kompetensiinti::where('id', $nilai->kompetensi_inti_id)->pluck('kompetensi_inti');
        $mapel1 = Mapel::where('id', $nilai->mapel_id)->get();
        $mapel = Mapel::all();
        //dd($mapel);
        $siswa1 = Siswa::where('id', $nilai->siswa_id)->pluck('nama_depan');
        $siswa2 = Siswa::where('id', $nilai->siswa_id)->pluck('nama_belakang');
        $siswa = Siswa::all();
        //dd($siswa);
        $penilaian = Penilaian::where('id', $nilai->penilaian_id)->pluck('nama_tes');
        $guru1 = Guru::where('id', $nilai->guru_id)->pluck('nama_guru');
        $guru = Guru::all();
        //dd($guru1[0]);
        $kelas = Kelas::where('id', $nilai->kelas_id)->pluck('nama');
        $nilai_start = Tahunpelajaran::all()->where('id', '=', 2)->pluck('tahun');
        $nilai_end = Tahunpelajaran::all()->where('id', '=', 1)->pluck('tahun');
        //dd($siswa->kelas->nama_depan);
        return view('nilai.nilaiedit', [
            'all_penilaian' => $all_penilaian,
            'all_kompetensiinti' => $all_kompetensiinti,
            'nilai' => $nilai,
            'tahunpel' => $tahunpel,
            'tahunpel1' => $tahunpel1,
            'nilai_start' => $nilai_start,
            'nilai_end' => $nilai_end,
            'kelas' => $kelas,
            'guru' => $guru,
            'guru1' => $guru1,
            'penilaian' => $penilaian,
            'siswa' => $siswa,
            'siswa1' => $siswa1,
            'siswa2' => $siswa2,
            'mapel' => $mapel,
            'mapel1' => $mapel1,
            'kompetensiinti' => $kompetensiinti,
            'data_nilai' => $data_nilai
        ]);
    }
    public function nilaiupdate(Request $request, Nilai $nilai)
    {
        $guru_user_id = auth()->user()->id;
        $guru_id = Guru::where('user_id', '=', $guru_user_id)->pluck('id')->first();
        $data_nilai = Nilai::all()->where('guru_id', '=', $guru_id);
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        $penilaian = Penilaian::all();

        $guru = Guru::find($guru_id);
        //dd($guru);
        $nama_rombel = Rombel::where('guru_id', '=', $guru_id)->pluck('rombel')->first();
        $guru_rombel = Rombel::where('guru_id', '=', $guru_id)->pluck('id')->first();
        $kelas_rombel = Rombel::where('guru_id', '=', $guru_id)->pluck('kelas_id')->first();
        if ($request->tanggal == '0000-00-00') {
            $tanggal = null;
        } else {
            $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        }
        //dd($tanggal);
        //$nilai->update($request->all());

        $nilai->update([
            'nilai' => $request->nilai,
            'tanggal' => $tanggal,
            'nilai_start' => $request->nilai_start,
            'nilai_end' => $request->nilai_end,
            'nilai_deskripsi' => $request->nilai_deskripsi,
            'nilai_notes' => $request->nilai_notes,
            'kompetensi_inti_id' => $request->kompetensi_inti_id,
            'mapel_id' => $request->mapel_id,
            'penilaian_id' => $request->penilaian_id,
            'guru_id' => $request->guru_id,
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahunpel_id' => $request->tahunpel_id,
            'rombel_id' => $request->rombel_id
        ]);
        //dd($nilai);
        $date = now();
        //$siswa = Siswa::find($nilai->siswa_id)->penilaian()->updateExixtingPivot();
        if ('siswa_id' == $nilai->siswa_id) {
            DB::table('penilaian_siswa')->where('siswa_id', $nilai->siswa_id)->update([
                'siswa_id'      => $request->input('siswa_id'),
                'penilaian_id'  => $request->input('penilaian_id'),
                'nilai' => $request->input('nilai'),
                'updated_at' => $date,
                'tanggal' => $tanggal,
            ]);
            DB::table('mapel_siswa')->where('siswa_id', $nilai->siswa_id)->update([
                'siswa_id'      => $request->input('siswa_id'),
                'mapel_id'  => $request->input('mapel_id'),
                'nilai' => $request->input('nilai'),
                'updated_at' => $date,
                'tanggal' => $tanggal,
            ]);
        }
        if ('siswa_id' != $nilai->siswa_id) {
            DB::table('penilaian_siswa')->where('siswa_id', $nilai->siswa_id)->update([
                'siswa_id'      => $request->input('siswa_id'),
                'penilaian_id'  => $request->input('penilaian_id'),
                'nilai' => $request->input('nilai'),
                'updated_at' => $date,
                'tanggal' => $tanggal,
            ]);
            DB::table('mapel_siswa')->where('siswa_id', $nilai->siswa_id)->update([
                'siswa_id'      => $request->input('siswa_id'),
                'mapel_id'  => $request->input('mapel_id'),
                'nilai' => $request->input('nilai'),
                'updated_at' => $date,
                'tanggal' => $tanggal,
            ]);
        }

        if (auth()->user()->role == 'admin') {
            return redirect('/nilai')->with('sukses', 'berhasil diupdate!');
        }
        if (auth()->user()->role == 'guru') {
            return redirect('/isinilai' . '/' . $guru_id)->with('sukses', 'berhasil diupdate');
        }
    }
    public function import_excel(Request $request)
    {

        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');
        //dd($file);
        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();
        //dd($nama_file);
        // upload ke folder file_nilai di dalam folder public
        $file->move('file_nilai', $nama_file);


        // import data
        Excel::import(new NilaiImport, public_path('/file_nilai/' . $nama_file));
        //Excel::import(new NilaiImport, $request->file('file'));
        $date = now();
        //dd($date);
        $siswa = Nilai::all();
        //DB::beginTransaction();
        // do all your updates here
        //dd($siswa);
        foreach ($siswa as $s) {
            DB::table('penilaian_siswa')
            ->where('nilai_id', '=', $s->id)
                ->insert([
                    'siswa_id'      => $s->siswa_id,
                    'penilaian_id'  => $s->penilaian_id,
                    'nilai' => $s->nilai,
                    'nilai_id' => $s->id,
                    'created_at' => $date,
                'updated_at' => $date,
                'tanggal' => $s->tanggal,
                ]);
            DB::table('mapel_siswa')
            ->where('nilai_id', '=', $s->id)
                ->insert([
                    'siswa_id'      => $s->siswa_id,
                    'mapel_id'  => $s->mapel_id,
                    'nilai' => $s->nilai,
                    'nilai_id' => $s->id,
                    'created_at' => $date,
                'updated_at' => $date,
                'tanggal' => $s->tanggal,
                ]);
        }
        // when done commit
        //DB::commit();

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        // notifikasi dengan session
        Session::flash('sukses', 'Berhasil Diimport!');
        //dd(auth()->user()->role);
        // alihkan halaman kembali
        if (auth()->user()->role == 'admin') {
            return redirect('/nilai');
        }
        if (auth()->user()->role == 'guru') {
            return Redirect::back()->with('sukses', 'berhasil diinput');
        }
    }
    public function export_excel()
    {

        return Excel::download(new NilaiExport, 'export_nilai.xlsx');
    }
    public function extra()
    {
        $tahunpel = Tahunpel::where('aktif', 'Y')->get();
        foreach ($tahunpel as $thn) {
            $semester_aktif = $thn->semester;
            $kepsek_aktif = $thn->nama_kepsek;
            $nip_kepsek = $thn->kode_kepsek;
            $tanggal_raport = Carbon::parse($thn->tgl_raport)->isoFormat('D MMMM Y');
            $tanggal_raport_kls6 = $thn->tgl_raport_kelas3;
            $tahun_pelajaran = $thn->thn_pel;
            $tahun_aktif = $thn->tahun;
            $thn_id = $thn->id;
        }
        $data_extra = Extra::where('tahunpelajaran_id', '=', $thn_id)->get();
        $rombel = Rombel::where('tahunpelajaran_id', '=', $thn_id)->get();
        //dd($rombel);
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();

        $penilaian = Penilaian::all();

        $kelas = Kelas::all();
        $nilai_start = Tahunpelajaran::where('id', '=', 2)->pluck('tahun');
        $nilai_end = Tahunpelajaran::where('id', '=', 1)->pluck('tahun');
        $kelas_sub = Siswa::where('kelas_id', 0)->get();
        // mengambil data siswa yang sudah memiliki rombel dan menampilkannya sesuai user()->role == guru
        // langkah pertama ambil id user yg role == guru dan sedang buka route /test
        $id_user = auth()->user()->id;
        // lalu cari id guru dengan user_id == $id_user
        $id_guru = Guru::where('user_id', '=', $id_user)->pluck('id')->first();
        // lalu tampilkan data siswa rombel yang memiliki guru_id == $id_guru
        $rombel2 = Rombel::where('guru_id', '=', $id_guru)->where('tahunpelajaran_id', '=', $thn_id)->pluck('id')->first();
        $nama_rombel2 = Rombel::where('guru_id', '=', $id_guru)->where('tahunpelajaran_id', '=', $thn_id)->pluck('rombel')->first();
        $rombel_kelas
            = Rombel::where('guru_id', '=', $id_guru)->where('tahunpelajaran_id', '=', $thn_id)->pluck('kelas_id')->first();
        $nama_rombel_kelas = Kelas::where('id', '=', $rombel_kelas)->pluck('nama')->first();
        $guru = $id_guru;
        $siswa = Siswa::where('kelas_id', '=', $rombel_kelas)->get();
        $rombel3 = DB::table('rombel_siswa')->where('rombel_id', '=', $rombel2)->pluck('siswa_id')->toArray();
        foreach ($rombel3 as $z => $zefa) {
            $tampung3[] = Siswa::find($zefa);
        }
        $tampung4 = Extra::where('rombel_id', '=', $rombel2)->where('tahunpelajaran_id', '=', $thn_id)->get();
        //dd($tampung4);
        for ($bulan = 1; $bulan < 7; $bulan++) {
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($jumlah_penilaian);
        return view('nilai.extra', [
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
            'guru' => $guru,
            'tampung4' => $tampung4,
            'rombel' => $rombel,
            'rombel2' => $rombel2,
            'nama_rombel2' => $nama_rombel2,
            'rombel_kelas' => $rombel_kelas,
            'nama_rombel_kelas' => $nama_rombel_kelas,
            'semester_aktif' => $semester_aktif,
            'thn_id' => $thn_id,
            'tahun_pelajaran' => $tahun_pelajaran,
        ]);
    }
    public function extracreate(Request $request)
    {
        Extra::create($request->all());
        //return $request -> all();
        //return redirect('/nilai')->with('sukses','berhasil diinput');
        return Redirect::back()->with('sukses', 'berhasil diinput');
    }
    public function extradelete($id)
    {
        $extra = \App\Models\Extra::find($id);
        $extra->delete();
        return redirect('/extra')->with('sukses', 'berhasil dihapus!');
    }
    public function extraedit(Extra $extra)
    {

        $id_guru = auth()->user()->id;
        $guru = Guru::where('user_id', '=', $id_guru)->pluck('id')->first();
        return view('nilai.extraedit', [
            'extra' => $extra,
            'guru' => $guru
        ]);
    }
    public function extraupdate(Request $request, extra $extra)
    {
        $extra->update($request->all());
        return redirect('/extra')->with('sukses', 'berhasil diupdate!');
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
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_nilai di dalam folder public
        $file->move('file_nilai', $nama_file);


        // import data
        Excel::import(new ExtraImport, public_path('/file_nilai/' . $nama_file));

        $siswa = Extra::all();

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        // notifikasi dengan session
        Session::flash('sukses', 'Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/extra');
    }
    public function audit()
    {
        $nilai = Nilai::first();
        //dd($nilai->audits);
        $all = Nilai::with('audits')->orderBy('created_at', 'desc')->take(5)->get();
        //dd($article);
        //$all = $article->audits->toArray();
        //dd($all);
        //$all = $nilai -> audits;

        // Get first available Article
        //dd($article);

        // Get latest Audit
        //$audit = $article->audits;
        //dd($audit);
        //var_dump($audit->getMetadata());
        //return Nilai::with('audits')->get();
        //dd($all);

        return view('nilai.audit', [
            'nilai' => $nilai,
            'all' => $all,
        ]);
    }
}
