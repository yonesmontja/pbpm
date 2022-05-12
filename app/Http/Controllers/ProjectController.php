<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Project;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\Kompetensiinti;
use App\Models\Tahunpelajaran;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function projects()
    {

        $project = Project::all();
        $psd = Project::pluck('siswa_id');

        $siswa = Siswa::all();
        //$project1 = Project::whereBelongsTo(siswa)->get();
        //$project1 = Project::whereHas('siswa', function($q) {
        //        $q->where('id', '620');
        //        })->get();


        return view('profile.projects',[
            'project' => $project,
            'siswa' => $siswa,
            'psd' => $psd,
        ]);
    }
    public function projects_add()
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

        return view('profile.projects-add',[
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

    public function projects_create(Request $request)
    {
    	$this -> validate($request,[
            'nama' => 'required|min:3',
            'status' => 'required',
            'progress' => 'required',
            'tanggal' => 'required',
        ]);

        //insert ke tabel projects
        $projects = new Project();
        $projects -> nama = $request -> nama;
        $projects -> status = $request -> status;
        $projects -> progress = $request -> progress;
        $projects -> tanggal = $request -> tanggal;
        $projects -> mapel_id = $request -> mapel_id;
        $projects -> kelas_id = $request -> kelas_id;
        $projects -> guru_id = $request -> guru_id;
        $projects -> penilaian_id = $request -> penilaian_id;
        $projects -> kompetensiinti_id = $request -> kompetensiinti_id;
        $projects -> save();

        return redirect('/projects')->with('sukses','berhasil diinput');
    }
    public function projects_edit()
    {
    	return view('profile.projects-edit');
    }
    public function projects_detail(Request $request, $id)
    {
        $project = Project::find($id);
        //dd($project);
        $project1 = Project::all();
        $psd = Project::where('id',$id)->pluck('siswa_id');
        $gsd = Project::where('id',$id)->pluck('guru_id');
        $guru = Guru::find($gsd);
        $siswa = Siswa::find($psd);
        //dd($guru);
        return view('profile.projects-detail',[
            'project' => $project,
            'project1' => $project1,
            'psd' => $psd,
            'siswa' => $siswa,
            'guru' => $guru,
        ]);
    }
}
