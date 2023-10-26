<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\User;
use App\Models\Extra;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Tahunpel;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\Kompetensiinti;
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
        $rombel = Rombel::where('tahunpelajaran_id', '=', $thn_id)->get();
        //dd($rombel);
        //$rombel_siswa = DB::table('rombel_siswa')->where('tahunpelajaran_id', '=', $thn_id)->pluck('siswa_id');
        $siswa = DB::table('rombel_siswa')
        ->where('tahunpelajaran_id', '=', $thn_id)
        ->join('siswa', 'rombel_siswa.siswa_id', '=', 'siswa.id')
        ->select('siswa.*')
        ->orderBy('nama_depan')
        ->get();
        //foreach ($rombel_siswa as $rs) {
        //    $siswa[] = DB::table('siswa')->where('id', '=', $rs)->orderBy('nama_depan')->get();
        //}
        //dd($siswa);
        //dd(Siswa::orderBy('nama_depan')->get());
        $kelas = Kelas::all();
        $guru = Guru::orderBy('nama_guru')->get();
        //dd($guru);
        //$tahunpelajaran = Tahunpel::all();
        //dd($user_id);
        return view('rombel.rombel_siswa', [
            'rombel' => $rombel,
            'kelas' => $kelas,
            'guru' => $guru,
            'tahunpel' => $tahunpel,
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
    public function rombeledit(Rombel $rombel)
    {
        $rombel = Rombel::all();
        return view('rombel/rombeledit', ['rombel' => $rombel]);
    }
    public function rombelprofile($id)
    {
        // kkm dan rentang nilai
        $kkm_0 = 65;
        $kkm = number_format((float)$kkm_0, 1, '.', '');
        $kkm1 = $kkm + (100 - $kkm) / 3;
        $kkm2 = $kkm1 + (100 - $kkm) / 3;
        $siswa1 = Siswa::all();
        $matapelajaran = Mapel::all();
        $penilaian = Penilaian::all();
        $tahunpel = Tahunpel::all();
        $nilai = Nilai::all()->where('rombel_id', '=', $id);
        //dd($nilai);
        $data_nilai = Nilai::all();
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        $rombel_kelas = Rombel::find($id)->pluck('kelas_id')->first();
        $rombel_guru = Rombel::find($id)->guru_id;
        $jumlah_siswa = DB::table('rombel_siswa')->where('rombel_id', $id)->count();
        $nama_siswa = DB::table('rombel_siswa')->where('rombel_id', $id)->pluck('siswa_id');
        //dd($nama_siswa);
        $wali_kelas = Guru::find($rombel_guru)->nama_guru;
        //dd($wali_kelas);
        $nilai_rata_siswa = Nilai::all()->where('rombel_id', '=', $id);
        //hitung nilai rata-rata rombel untuk semua mapel
        $rata_rombel1 = Nilai::all()->where('rombel_id', '=', $id)->pluck('nilai')->avg();
        $rata_rombel = number_format((float)$rata_rombel1, 1, '.', '');
        $kelas = Kelas::find($rombel_kelas);
        $nama_rombel = Rombel::find($id)->rombel;
        $rombel3 = Rombel::all();
        $rombel1 = Rombel::find($id);
        //dd($rombel1);
        $rombel2 = $rombel1->rombel;

        //-----------------------------------------------
        //hitung nilai terbawah
        $kkm = 65;
        $low_ul = [];
        $low_l = [];
        $low_p = [];
        $low_h = [];
        for ($i = 0; $i < $jumlah_siswa; $i++) {
            $low[] = Nilai::all()->where('kelas_id', '=', $id)->where('siswa_id', '=', $nama_siswa[$i])->avg('nilai');
            if ($low[$i] < $kkm) {
                $low_ul[] = number_format((float)$low[$i], 1, '.', '');
            }
            if ($low[$i] > $kkm && $low[$i] <= $kkm + (100 - $kkm) / 3) {
                $low_l[] = number_format((float)$low[$i], 1, '.', '');
            }
            if ($low[$i] > $kkm + (100 - $kkm) / 3 && $low[$i] <= $kkm + 2 * (100 - $kkm) / 3) {
                $low_p[] = number_format((float)$low[$i], 1, '.', '');
            }
            if ($low[$i] > $kkm + 2 * (100 - $kkm) / 3) {
                $low_p[] = number_format((float)$low[$i], 1, '.', '');
            }
        }


        $user = User::all();
        // hitung nilai rata-rata per mapel $chart_nilai[] untuk ditampilkan di grafik
        for ($bulan = 1; $bulan < 7; $bulan++) {
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where kelas_id='$id' AND month(created_at)='$bulan'"))->first();
            //$chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            (int)$chart_nilai1[] = Nilai::whereMonth('created_at', '=', $bulan)->where('kelas_id', '=', $id)->pluck('nilai')->avg();
            //(int)$chart_nilai1[] = Nilai::whereMonth('created_at','=',$bulan)->pluck('nilai')->avg();

            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($chart_nilai1);
        // ambil data nilai siswa 3 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(3);
        $weekE = Carbon::now()->startOfWeek();
        for ($mapel = 1; $mapel < 11; $mapel++) {
            $mapel_last_3month[] = Nilai::where('mapel_id', '=', $mapel)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_last_3week[] = Nilai::where('mapel_id', '=', $mapel)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$weekS, $weekE])
                ->avg('nilai');
        }
        $TotalSpent3 = DB::table('nilai')->where('kelas_id', '=', $id)
            ->select('created_at', 'nilai')
            ->whereBetween('created_at', [$dateS, $dateE])
            ->avg('nilai');
        $weekSpent3 = DB::table('nilai')->where('kelas_id', '=', $id)
            ->select('created_at', 'nilai')
            ->whereBetween('created_at', [$weekS, $weekE])
            ->avg('nilai');
        $last3month_average = number_format((float)$TotalSpent3, 2, '.', '');
        $last3week_average = number_format((float)$weekSpent3, 2, '.', '');

        // ambil data nilai siswa 2 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(2);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(2);
        $weekE = Carbon::now()->startOfWeek();
        for ($mapel = 1; $mapel < 11; $mapel++) {
            $mapel_last_2month[] = Nilai::where('mapel_id', '=', $mapel)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_last_2week[] = Nilai::where('mapel_id', '=', $mapel)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$weekS, $weekE])
                ->avg('nilai');
        }
        $TotalSpent2 = DB::table('nilai')->where('kelas_id', '=', $id)
            ->select('created_at', 'nilai')
            ->whereBetween('created_at', [$dateS, $dateE])
            ->avg('nilai');
        $weekSpent2 = DB::table('nilai')->where('kelas_id', '=', $id)
            ->select('created_at', 'nilai')
            ->whereBetween('created_at', [$weekS, $weekE])
            ->avg('nilai');
        $last2month_average = number_format((float)$TotalSpent2, 2, '.', '');
        $last2week_average = number_format((float)$weekSpent2, 2, '.', '');

        // ambil data nilai siswa 1 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(1);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(1);
        $weekE = Carbon::now()->startOfWeek();
        for ($mapel = 1; $mapel < 11; $mapel++) {
            $mapel_last_month_old = Nilai::where('mapel_id', '=', $mapel)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_last_month[] = number_format((float)$mapel_last_month_old, 2, '.', '');
            $mapel_last_week_old = Nilai::where('mapel_id', '=', $mapel)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$weekS, $weekE])
                ->avg('nilai');
            $mapel_last_week[] = number_format((float)$mapel_last_week_old, 2, '.', '');
        }
        for ($penilaian = 1; $penilaian < 6; $penilaian++) {
            $penilaian_old = Nilai::where('penilaian_id', '=', $penilaian)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$dateS, $dateE])
                ->avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id', '=', $penilaian)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$weekS, $weekE])
                ->avg('nilai');
            //$penilaian_week_old = Nilai::where('penilaian_id','=',$penilaian)
            //    -> select('created_at','nilai')
            //    -> whereBetween('created_at',[$weekS, $weekE])
            //    -> avg('nilai');
            $penilaian_last_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_last_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        //dd($penilaian_last_week);
        $TotalSpent1 = DB::table('nilai')->where('kelas_id', '=', $id)
            ->select('created_at', 'nilai')
            ->whereBetween('created_at', [$dateS, $dateE])
            ->avg('nilai');
        $weekSpent1 = DB::table('nilai')->where('kelas_id', '=', $id)
            ->select('created_at', 'nilai')
            ->whereBetween('created_at', [$weekS, $weekE])
            ->avg('nilai');
        $last1month_average = number_format((float)$TotalSpent1, 2, '.', '');
        $last1week_average = number_format((float)$weekSpent1, 2, '.', '');

        // ambil data nilai siswa bulan ini sumber https://www.codegrepper.com/code-examples/php/get+last+month+data+in+laravel
        $this_month = Nilai::whereMonth('created_at', date('m'))->where('kelas_id', '=', $id)
            ->whereYear('created_at', date('Y'))
            ->get(['nilai', 'created_at'])
            ->avg('nilai');
        $this_month = number_format((float)$this_month, 2, '.', '');

        // ambil data nilai siswa bulan ini, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(0);
        $dateE = Carbon::now();
        $weekS = Carbon::now()->startOfWeek()->subWeek(0);
        $weekE = Carbon::now();
        for ($mapel = 1; $mapel < 11; $mapel++) {
            $mapel_this_month_old = Nilai::where('mapel_id', '=', $mapel)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_this_month[] = number_format((float)$mapel_this_month_old, 2, '.', '');
            $mapel_this_week_old = Nilai::where('mapel_id', '=', $mapel)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$weekS, $weekE])
                ->avg('nilai');
            $mapel_this_week[] = number_format((float)$mapel_this_week_old, 2, '.', '');
        }
        for ($penilaian = 1; $penilaian < 6; $penilaian++) {
            $penilaian_old = Nilai::where('penilaian_id', '=', $penilaian)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$dateS, $dateE])
                ->avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id', '=', $penilaian)->where('kelas_id', '=', $id)
                ->select('created_at', 'nilai')
                ->whereBetween('created_at', [$weekS, $weekE])
                ->avg('nilai');
            $penilaian_this_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_this_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        $penilaian_list = ['Tugas', 'Latihan', 'UH', 'PTS', 'PAS'];
        //dd($penilaian_this_week);
        $TotalSpent0 = Nilai::where('kelas_id', '=', $id)
            ->select('created_at', 'nilai')
            ->whereBetween('created_at', [$dateS, $dateE])
            ->avg('nilai');
        $weekSpent0 = Nilai::where('kelas_id', '=', $id)
            ->select('created_at', 'nilai')
            ->whereBetween('created_at', [$weekS, $weekE])
            ->avg('nilai');
        $last0month_average = number_format((float)$TotalSpent0, 2, '.', '');
        $last0week_average = number_format((float)$weekSpent0, 2, '.', '');
        //dd($last0week_average);

        //$last_week_average =
        if ($last1month_average > 0) {
            $last_average = number_format((float)(($last0month_average - $last1month_average) / $last1month_average * 100), 2, '.', '');  // Outputs in two dp
        }
        if (
            $last1week_average > 0
        ) {
            $last_week_average = number_format((float)(($last0week_average - $last1week_average) / $last1week_average * 100), 2, '.', '');
        }
        if ($last1week_average == 0) {
            $last_week_average = 0;
        }
        if ($last1month_average == 0) {
            $last_average = 0;
        }

        $matpel = ['Agama Islam', 'Agama Protestan', 'Agama Katolik', 'PPKn', 'Bahasa Indonesia', 'Matematika', 'IPA', 'IPS', 'PJOK', 'SBK'];
        $islam_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 1)->pluck('nilai')->avg();
        $protestan_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 2)->pluck('nilai')->avg();
        $katolik_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 3)->pluck('nilai')->avg();
        $ppkn_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 4)->pluck('nilai')->avg();
        $indonesia_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 5)->pluck('nilai')->avg();
        $matematika_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 6)->pluck('nilai')->avg();
        $ipa_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 7)->pluck('nilai')->avg();
        $ips_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 8)->pluck('nilai')->avg();
        $pjok_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 9)->pluck('nilai')->avg();
        $sbk_average = Nilai::all()->where('kelas_id', '=', $id)->where('mapel_id', 10)->pluck('nilai')->avg();
        $sikap_average = (int)($islam_average + $protestan_average + $katolik_average + $ppkn_average) / 4;
        $skill_average = (int)($indonesia_average + $matematika_average + $ipa_average + $ips_average) / 4;
        $budaya_average = (int)($pjok_average + $sbk_average) / 2;
        $matang1[0] = (int)$islam_average;
        $matang1[1] = (int)$protestan_average;
        $matang1[2] = (int)$katolik_average;
        $matang1[3] = (int)$ppkn_average;
        $matang1[4] = (int)$indonesia_average;
        $matang1[5] = (int)$matematika_average;
        $matang1[6] = (int)$ipa_average;
        $matang1[7] = (int)$ips_average;
        $matang1[8] = (int)$pjok_average;
        $matang1[9] = (int)$sbk_average;
        //dd($matang1);
        $sumbux = [];
        $sumbuy = [];
        foreach ($nilai as $mnp) {
            $sumbux[] = $mnp->nilai;
            //$sumbuy[] = $mnp -> mapel -> nama_mapel;
        }
        foreach ($nilai as $mnp) {
            //$sumbux[] = $mnp->nilai;
            $sumbuy[] = $mnp->mapel->nama_mapel;
        }
        //dd($sumbuy);
        return view('rombel.profile', [
            'wali_kelas' => $wali_kelas,
            'rata_rombel' => $rata_rombel,
            'nilai_rata_siswa' => $nilai_rata_siswa,
            'user' => $user,
            'kkm' => $kkm,
            'kkm1' => $kkm1,
            'kkm2' => $kkm2,
            'rombel2' => $rombel2,
            'rombel3' => $rombel3,
            'rombel1' => $rombel1,
            'nama_rombel' => $nama_rombel,
            'islam_average' => $islam_average,
            'katolik_average' => $katolik_average,
            'ppkn_average' => $ppkn_average,
            'indonesia_average' => $indonesia_average,
            'matematika_average' => $matematika_average,
            'ipa_average' => $ipa_average,
            'ips_average' => $ips_average,
            'pjok_average' => $pjok_average,
            'sbk_average' => $sbk_average,
            'siswa1' => $siswa1,
            'guru' => $guru,
            'kompetensiinti' => $kompetensiinti,
            'mapel' => $mapel,
            'data_nilai' => $data_nilai,
            'nilai' => $nilai,
            'matang1' => $matang1,
            'penilaian' => $penilaian,
            'tahunpel' => $tahunpel,
            'matpel' => $matpel,
            'kelas' => $kelas,
            'matapelajaran' => $matapelajaran,
            'low_ul' => $low_ul,
            'low_l' => $low_l,
            'low_p' => $low_p,
            'low_h' => $low_h,
            'kelas' => $kelas,
            'nilai_rata_siswa' => $nilai_rata_siswa,
            'nama_siswa' => $nama_siswa,
            'jumlah_siswa' => $jumlah_siswa,
            'wali_kelas' => $wali_kelas,
            'mapel' => $mapel,
            'penilaian_list' => $penilaian_list,
            'penilaian_this_month' => $penilaian_this_month,
            'penilaian_this_week' => $penilaian_this_week,
            'penilaian_last_month' => $penilaian_last_month,
            'penilaian_last_week' => $penilaian_last_week,
            'mapel_last_3week' => $mapel_last_3week,
            'mapel_last_2week' => $mapel_last_2week,
            'mapel_last_week' => $mapel_last_week,
            'mapel_this_week' => $mapel_this_week,
            'last_week_average' => $last_week_average,
            'mapel_last_3month' => $mapel_last_3month,
            'mapel_last_2month' => $mapel_last_2month,
            'mapel_last_month' => $mapel_last_month,
            'mapel_this_month' => $mapel_this_month,
            'last3week_average' => $last3week_average,
            'last2week_average' => $last2week_average,
            'last1week_average' => $last1week_average,
            'last0week_average' => $last0week_average,
            'this_month' => $this_month,
            'last3month_average' => $last3month_average,
            'last2month_average' => $last2month_average,
            'last1month_average' => $last1month_average,
            'last0month_average' => $last0month_average,
            'last_average' => $last_average,
            'user' => $user,
            'islam_average' => $islam_average,
            'protestan_average' => $protestan_average,
            'katolik_average' => $katolik_average,
            'ppkn_average' => $ppkn_average,
            'indonesia_average' => $indonesia_average,
            'matematika_average' => $matematika_average,
            'ipa_average' => $ipa_average,
            'ips_average' => $ips_average,
            'pjok_average' => $pjok_average,
            'sbk_average' => $sbk_average,
            'budaya_average' => $budaya_average,
            'skill_average' => $skill_average,
            'sikap_average' => $sikap_average,
            'matang1' => $matang1,
            'matpel' => $matpel,
            'sumbux' => $sumbux,
            'sumbuy' => $sumbuy,
        ]);
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
    public function show($id)
    {
        if (auth()->user()->role == 'admin') {
            $rombel = Rombel::where('id', '=', $id)->pluck('id')->first();
            //dd($rombel);
            $id_guru = Rombel::where('id', '=', $id)->pluck('guru_id')->first();
            //$guru = Guru::find($id_guru);
            $rombel2 = Rombel::where('guru_id', '=', $id_guru)->pluck('rombel')->first();
            $rombel3 = Rombel::where('guru_id', '=', $id_guru)->pluck('kelas_id')->first();
            $rombel4 = Rombel::find($rombel, ['guru_id', 'id']);
            $jumlah_siswa = DB::table('rombel_siswa')->where('rombel_id', '=', $id)->count();
            $siswa1 = Siswa::all();
            //dd($rombel4);
            $penilaian1 = Penilaian::find($rombel);
            //dd($penilaian1);
            // menghitung jumlah berapa kali mata pelajaran melakukan penilaian di rombel. akumulasi dari semua penilaian yang siswa ikuti di rombel ini.
            $jml_kelas_penilaian = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 1)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 2)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 3)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 4)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 5)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 6)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 7)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 8)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 9)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 10)->pluck('rombel_id', 'mapel_id')->count();
            //dd($jml_kelas_penilaian);
            // menghitung jumlah berapa kali penilaian di rombel.
            $jml_mapel_penilaian = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 1)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 2)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 3)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 4)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 5)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 6)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 18)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 19)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 20)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 21)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini = Nilai::where('rombel_id', '=', $rombel)->count();
            $jumlah_penilaian_rombel_ini_1 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 1)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_2 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 2)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_3 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 3)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_4 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 4)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_5 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 5)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_6 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 6)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_7 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 7)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_18 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 18)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_19 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 19)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_20 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 20)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_penilaian_rombel_ini_21 = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 21)->pluck('penilaian_id', 'rombel_id')->count();
            $jumlah_data_absensi = Extra::where('rombel_id', '=', $rombel)->pluck('id')->count();
            $jumlah_penilaian_mapel_ini_1 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 1)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_2 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 2)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_3 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 3)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_4 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 4)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_5 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 5)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_6 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 6)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_7 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 7)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_8 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 8)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_9 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 9)->pluck('mapel_id', 'rombel_id')->count();
            $jumlah_penilaian_mapel_ini_10 = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 10)->pluck('mapel_id', 'rombel_id')->count();

            // menghitung berapa jumlah siswa di rombel ini yang telah melakukan penilaian.
            $jml_siswa_penilaian = Nilai::where('rombel_id', '=', $rombel)->select('siswa_id', 'penilaian_id')->pluck('penilaian_id', 'siswa_id')->count();
            //$penilaian = Penilaian::;

            //hitung nilai rata-rata kelas untuk semua mapel di rombel ini
            $rata_kelas1 = Nilai::all()->where('rombel_id', '=', $rombel)->pluck('nilai')->avg();
            $rata_kelas = number_format((float)$rata_kelas1, 1, '.', '');
            //dd($rata_kelas);
            //-----------------------------------------------
            // menghitung nilai rata-rata pemetaan awal dari rombel ini
            $nilai = Nilai::all()->where('guru_id', '=', $id_guru);
            //dd($nilai);
            $nilai1 = Nilai::all()->where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 6)->avg('nilai');
            //dd($nilai1);
            $user = User::all();
            // hitung nilai rata-rata per bulan $chart_nilai[] untuk ditampilkan di grafik
            for ($bulan = 1; $bulan < 7; $bulan++) {
                $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where rombel_id='$rombel' AND month(tanggal)='$bulan'"))->first();
                //$chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(tanggal)='$bulan'"))->first();
                (int)$chart_nilai1[] = Nilai::whereMonth('tanggal', '=', $bulan)->where('rombel_id', '=', $rombel)->pluck('nilai')->avg();
                //(int)$chart_nilai1[] = Nilai::whereMonth('tanggal','=',$bulan)->pluck('nilai')->avg();

                $jumlah_penilaian[] = $chart_penilaian->jumlah;
            }
            //dd($jumlah_penilaian);
            // ambil data nilai siswa 3 bulan lalu, kemudian hitung rata-rata
            $dateS = Carbon::now()->startOfMonth()->subMonth(3);
            $dateE = Carbon::now()->startOfMonth();
            $weekS = Carbon::now()->startOfWeek()->subWeek(3);
            $weekE = Carbon::now()->startOfWeek();

            $mapel_last_3month = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');

            $mapel_last_3week = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');

            $TotalSpent3 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $weekSpent3 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $last3month_average = number_format((float)$TotalSpent3, 2, '.', '');
            $last3week_average = number_format((float)$weekSpent3, 2, '.', '');

            // ambil data nilai siswa 2 bulan lalu, kemudian hitung rata-rata
            $dateS = Carbon::now()->startOfMonth()->subMonth(2);
            $dateE = Carbon::now()->startOfMonth();
            $weekS = Carbon::now()->startOfWeek()->subWeek(2);
            $weekE = Carbon::now()->startOfWeek();

            $mapel_last_2month = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_last_2week = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');

            $TotalSpent2 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $weekSpent2 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $last2month_average = number_format((float)$TotalSpent2, 2, '.', '');
            $last2week_average = number_format((float)$weekSpent2, 2, '.', '');

            // ambil data nilai siswa 1 bulan lalu, kemudian hitung rata-rata
            $dateS = Carbon::now()->startOfMonth()->subMonth(1);
            $dateE = Carbon::now()->startOfMonth();
            $weekS = Carbon::now()->startOfWeek()->subWeek(1);
            $weekE = Carbon::now()->startOfWeek();

            $mapel_last_month_old = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_last_month = number_format((float)$mapel_last_month_old, 2, '.', '');
            $mapel_last_week_old = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $mapel_last_week = number_format((float)$mapel_last_week_old, 2, '.', '');

            for ($penilaian = 1; $penilaian < 6; $penilaian++) {
                $penilaian_old = Nilai::where('penilaian_id', '=', $penilaian)->where('rombel_id', '=', $rombel)
                    ->select('tanggal', 'nilai')
                    ->whereBetween('tanggal', [$dateS, $dateE])
                    ->avg('nilai');
                $penilaian_week_old = Nilai::where('penilaian_id', '=', $penilaian)->where('rombel_id', '=', $rombel)
                    ->select('tanggal', 'nilai')
                    ->whereBetween('tanggal', [$weekS, $weekE])
                    ->avg('nilai');
                $penilaian_last_month[] = number_format((float)$penilaian_old, 2, '.', '');
                $penilaian_last_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
            }
            //dd($penilaian_last_week);
            $TotalSpent1 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $weekSpent1 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $last1month_average = number_format((float)$TotalSpent1, 2, '.', '');
            $last1week_average = number_format((float)$weekSpent1, 2, '.', '');

            // ambil data nilai siswa bulan ini sumber https://www.codegrepper.com/code-examples/php/get+last+month+data+in+laravel
            $this_month = Nilai::whereMonth('tanggal', date('m'))->where('rombel_id', '=', $rombel)
                ->whereYear('tanggal', date('Y'))
                ->get(['nilai', 'tanggal'])
                ->avg('nilai');
            $this_month = number_format((float)$this_month, 2, '.', '');

            // ambil data nilai siswa bulan ini, kemudian hitung rata-rata
            $dateS = Carbon::now()->startOfMonth()->subMonth(0);
            $dateE = Carbon::now();
            $weekS = Carbon::now()->startOfWeek()->subWeek(0);
            $weekE = Carbon::now();

            $mapel_this_month_old = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_this_month = number_format((float)$mapel_this_month_old, 2, '.', '');
            $mapel_this_week_old = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $mapel_this_week = number_format((float)$mapel_this_week_old, 2, '.', '');

            for ($penilaian = 1; $penilaian < 6; $penilaian++) {
                $penilaian_old = Nilai::where('penilaian_id', '=', $penilaian)->where('rombel_id', '=', $rombel)
                    ->select('tanggal', 'nilai')
                    ->whereBetween('tanggal', [$dateS, $dateE])
                    ->avg('nilai');
                $penilaian_week_old = Nilai::where('penilaian_id', '=', $penilaian)->where('rombel_id', '=', $rombel)
                    ->select('tanggal', 'nilai')
                    ->whereBetween('tanggal', [$weekS, $weekE])
                    ->avg('nilai');
                $penilaian_this_month[] = number_format((float)$penilaian_old, 2, '.', '');
                $penilaian_this_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
            }
            $penilaian_list = ['Tugas', 'Latihan', 'UH', 'PTS', 'PAS'];
            //dd($penilaian_this_week);
            $TotalSpent0 = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $weekSpent0 = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $last0month_average = number_format((float)$TotalSpent0, 2, '.', '');
            $last0week_average = number_format((float)$weekSpent0, 2, '.', '');

            $last_average = 0.00;
            $last_week_average = 0.00;
            if ($last1month_average > 0.00) {
                $last_average = number_format((float)(($last0month_average - $last1month_average) / $last1month_average * 100), 2, '.', '');  // Outputs in two dp

            } elseif ($last1week_average > 0.00) {

                $last_week_average = number_format((float)(($last0week_average - $last1week_average) / $last1week_average * 100), 2, '.', '');
            } elseif ($last1month_average == 0) {
                $last_average = 0;
            } elseif ($last1week_average == 0) {

                $last_week_average = 0;
            }
            //dd($last_average);

            $data['title'] = Rombel::find($rombel)->rombel;
            $data['rombel'] = $rombel;
            $mapel = Mapel::all();
            return view('rombel.show', [
                //'guru' => $guru,
                'data' => $data,
                'penilaian1' => $penilaian1,
                'mapel' => $mapel,
                'jml_kelas_penilaian' => $jml_kelas_penilaian,
                'nilai' => $nilai,
                'nilai1' => $nilai1,
                'rombel2' => $rombel2,
                'rombel3' => $rombel3,
                'rombel4' => $rombel4,
                'jumlah_siswa' => $jumlah_siswa,
                'siswa1' => $siswa1,
                'rata_kelas' => $rata_kelas,
                'penilaian_list' => $penilaian_list,
                'penilaian_this_month' => $penilaian_this_month,
                'penilaian_this_week' => $penilaian_this_week,
                'penilaian_last_month' => $penilaian_last_month,
                'penilaian_last_week' => $penilaian_last_week,
                'mapel_last_3week' => $mapel_last_3week,
                'mapel_last_2week' => $mapel_last_2week,
                'mapel_last_week' => $mapel_last_week,
                'mapel_this_week' => $mapel_this_week,
                'last_week_average' => $last_week_average,
                'mapel_last_3month' => $mapel_last_3month,
                'mapel_last_2month' => $mapel_last_2month,
                'mapel_last_month' => $mapel_last_month,
                'mapel_this_month' => $mapel_this_month,
                'last3week_average' => $last3week_average,
                'last2week_average' => $last2week_average,
                'last1week_average' => $last1week_average,
                'last0week_average' => $last0week_average,
                'this_month' => $this_month,
                'last3month_average' => $last3month_average,
                'last2month_average' => $last2month_average,
                'last1month_average' => $last1month_average,
                'last0month_average' => $last0month_average,
                'last_average' => $last_average,
                'jml_siswa_penilaian' => $jml_siswa_penilaian,
                'jml_mapel_penilaian' => $jml_mapel_penilaian,
                'user' => $user,
                'rombel' => $rombel,
                'jumlah_penilaian_rombel_ini' => $jumlah_penilaian_rombel_ini,
                'jumlah_penilaian_rombel_ini_1' => $jumlah_penilaian_rombel_ini_1,
                'jumlah_penilaian_rombel_ini_2' => $jumlah_penilaian_rombel_ini_2,
                'jumlah_penilaian_rombel_ini_3' => $jumlah_penilaian_rombel_ini_3,
                'jumlah_penilaian_rombel_ini_4' => $jumlah_penilaian_rombel_ini_4,
                'jumlah_penilaian_rombel_ini_5' => $jumlah_penilaian_rombel_ini_5,
                'jumlah_penilaian_rombel_ini_6' => $jumlah_penilaian_rombel_ini_6,
                'jumlah_penilaian_rombel_ini_7' => $jumlah_penilaian_rombel_ini_7,
                'jumlah_penilaian_rombel_ini_18' => $jumlah_penilaian_rombel_ini_18,
                'jumlah_penilaian_rombel_ini_19' => $jumlah_penilaian_rombel_ini_19,
                'jumlah_penilaian_rombel_ini_20' => $jumlah_penilaian_rombel_ini_20,
                'jumlah_penilaian_rombel_ini_21' => $jumlah_penilaian_rombel_ini_21,
                'jumlah_data_absensi' => $jumlah_data_absensi,
                'jumlah_penilaian_mapel_ini_1' => $jumlah_penilaian_mapel_ini_1,
                'jumlah_penilaian_mapel_ini_2' => $jumlah_penilaian_mapel_ini_2,
                'jumlah_penilaian_mapel_ini_3' => $jumlah_penilaian_mapel_ini_3,
                'jumlah_penilaian_mapel_ini_4' => $jumlah_penilaian_mapel_ini_4,
                'jumlah_penilaian_mapel_ini_5' => $jumlah_penilaian_mapel_ini_5,
                'jumlah_penilaian_mapel_ini_6' => $jumlah_penilaian_mapel_ini_6,
                'jumlah_penilaian_mapel_ini_7' => $jumlah_penilaian_mapel_ini_7,
                'jumlah_penilaian_mapel_ini_8' => $jumlah_penilaian_mapel_ini_8,
                'jumlah_penilaian_mapel_ini_9' => $jumlah_penilaian_mapel_ini_9,
                'jumlah_penilaian_mapel_ini_10' => $jumlah_penilaian_mapel_ini_10,
            ]);
        }
        if (auth()->user()->role == 'guru') {
            $rombel = Rombel::where('guru_id', '=', $id)->pluck('id ')->first();
            //dd($rombel);
            //$guru = Guru::find($id);
            $rombel2 = Rombel::where('guru_id', '=', $id)->pluck('rombel')->first();
            $rombel3 = Rombel::where('guru_id', '=', $id)->pluck('kelas_id')->first();
            $rombel4 = Rombel::find($rombel);
            $jumlah_siswa = DB::table('rombel_siswa')->where('rombel_id', '=', $id)->count();
            $siswa1 = Siswa::all();
            //dd($rombel4);
            $penilaian1 = Penilaian::find($rombel);
            // menghitung jumlah berapa kali mata pelajaran melakukan penilaian di rombel. akumulasi dari semua penilaian yang siswa ikuti di rombel ini.
            $jml_kelas_penilaian = Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 1)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 2)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 3)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 4)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 5)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 6)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 7)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 8)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 9)->pluck('rombel_id', 'mapel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('mapel_id', '=', 10)->pluck('rombel_id', 'mapel_id')->count();
            //dd($jml_kelas_penilaian);
            // menghitung jumlah berapa kali penilaian di rombel.
            $jml_mapel_penilaian = Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 1)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 2)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 3)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 4)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 5)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 6)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 18)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 19)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 20)->pluck('penilaian_id', 'rombel_id')->count() +
                Nilai::where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 21)->pluck('penilaian_id', 'rombel_id')->count();
            //dd($jml_mapel_penilaian);
            // menghitung berapa jumlah siswa di rombel ini yang telah melakukan penilaian.
            $jml_siswa_penilaian = Nilai::where('rombel_id', '=', $rombel)->select('siswa_id', 'penilaian_id')->pluck('penilaian_id', 'siswa_id')->count();
            //$penilaian = Penilaian::;

            //hitung nilai rata-rata kelas untuk semua mapel di rombel ini
            $rata_kelas1 = Nilai::all()->where('rombel_id', '=', $rombel)->pluck('nilai')->avg();
            $rata_kelas = number_format((float)$rata_kelas1, 1, '.', '');
            //dd($rata_kelas);
            //-----------------------------------------------
            // menghitung nilai rata-rata pemetaan awal dari rombel ini
            $nilai = Nilai::all()->where('guru_id', '=', $id);
            //dd($nilai);
            $nilai1 = Nilai::all()->where('rombel_id', '=', $rombel)->where('penilaian_id', '=', 6)->avg('nilai');
            //dd($nilai1);
            $user = User::all();
            // hitung nilai rata-rata per bulan $chart_nilai[] untuk ditampilkan di grafik
            for ($bulan = 1; $bulan < 7; $bulan++) {
                $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where rombel_id='$rombel' AND month(tanggal)='$bulan'"))->first();
                //$chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(tanggal)='$bulan'"))->first();
                (int)$chart_nilai1[] = Nilai::whereMonth('tanggal', '=', $bulan)->where('rombel_id', '=', $rombel)->pluck('nilai')->avg();
                //(int)$chart_nilai1[] = Nilai::whereMonth('tanggal','=',$bulan)->pluck('nilai')->avg();

                $jumlah_penilaian[] = $chart_penilaian->jumlah;
            }
            //dd($jumlah_penilaian);
            // ambil data nilai siswa 3 bulan lalu, kemudian hitung rata-rata
            $dateS = Carbon::now()->startOfMonth()->subMonth(3);
            $dateE = Carbon::now()->startOfMonth();
            $weekS = Carbon::now()->startOfWeek()->subWeek(3);
            $weekE = Carbon::now()->startOfWeek();

            $mapel_last_3month = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');

            $mapel_last_3week = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');

            $TotalSpent3 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $weekSpent3 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $last3month_average = number_format((float)$TotalSpent3, 2, '.', '');
            $last3week_average = number_format((float)$weekSpent3, 2, '.', '');

            // ambil data nilai siswa 2 bulan lalu, kemudian hitung rata-rata
            $dateS = Carbon::now()->startOfMonth()->subMonth(2);
            $dateE = Carbon::now()->startOfMonth();
            $weekS = Carbon::now()->startOfWeek()->subWeek(2);
            $weekE = Carbon::now()->startOfWeek();

            $mapel_last_2month = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_last_2week = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');

            $TotalSpent2 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $weekSpent2 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $last2month_average = number_format((float)$TotalSpent2, 2, '.', '');
            $last2week_average = number_format((float)$weekSpent2, 2, '.', '');

            // ambil data nilai siswa 1 bulan lalu, kemudian hitung rata-rata
            $dateS = Carbon::now()->startOfMonth()->subMonth(1);
            $dateE = Carbon::now()->startOfMonth();
            $weekS = Carbon::now()->startOfWeek()->subWeek(1);
            $weekE = Carbon::now()->startOfWeek();

            $mapel_last_month_old = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_last_month = number_format((float)$mapel_last_month_old, 2, '.', '');
            $mapel_last_week_old = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $mapel_last_week = number_format((float)$mapel_last_week_old, 2, '.', '');

            for ($penilaian = 1; $penilaian < 6; $penilaian++) {
                $penilaian_old = Nilai::where('penilaian_id', '=', $penilaian)->where('rombel_id', '=', $rombel)
                    ->select('tanggal', 'nilai')
                    ->whereBetween('tanggal', [$dateS, $dateE])
                    ->avg('nilai');
                $penilaian_week_old = Nilai::where('penilaian_id', '=', $penilaian)->where('rombel_id', '=', $rombel)
                    ->select('tanggal', 'nilai')
                    ->whereBetween('tanggal', [$weekS, $weekE])
                    ->avg('nilai');
                $penilaian_last_month[] = number_format((float)$penilaian_old, 2, '.', '');
                $penilaian_last_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
            }
            //dd($penilaian_last_week);
            $TotalSpent1 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $weekSpent1 = DB::table('nilai')->where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $last1month_average = number_format((float)$TotalSpent1, 2, '.', '');
            $last1week_average = number_format((float)$weekSpent1, 2, '.', '');

            // ambil data nilai siswa bulan ini sumber https://www.codegrepper.com/code-examples/php/get+last+month+data+in+laravel
            $this_month = Nilai::whereMonth('tanggal', date('m'))->where('rombel_id', '=', $rombel)
                ->whereYear('tanggal', date('Y'))
                ->get(['nilai', 'tanggal'])
                ->avg('nilai');
            $this_month = number_format((float)$this_month, 2, '.', '');

            // ambil data nilai siswa bulan ini, kemudian hitung rata-rata
            $dateS = Carbon::now()->startOfMonth()->subMonth(0);
            $dateE = Carbon::now();
            $weekS = Carbon::now()->startOfWeek()->subWeek(0);
            $weekE = Carbon::now();

            $mapel_this_month_old = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $mapel_this_month = number_format((float)$mapel_this_month_old, 2, '.', '');
            $mapel_this_week_old = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $mapel_this_week = number_format((float)$mapel_this_week_old, 2, '.', '');

            for ($penilaian = 1; $penilaian < 6; $penilaian++) {
                $penilaian_old = Nilai::where('penilaian_id', '=', $penilaian)->where('rombel_id', '=', $rombel)
                    ->select('tanggal', 'nilai')
                    ->whereBetween('tanggal', [$dateS, $dateE])
                    ->avg('nilai');
                $penilaian_week_old = Nilai::where('penilaian_id', '=', $penilaian)->where('rombel_id', '=', $rombel)
                    ->select('tanggal', 'nilai')
                    ->whereBetween('tanggal', [$weekS, $weekE])
                    ->avg('nilai');
                $penilaian_this_month[] = number_format((float)$penilaian_old, 2, '.', '');
                $penilaian_this_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
            }
            $penilaian_list = ['Tugas', 'Latihan', 'UH', 'PTS', 'PAS'];
            //dd($penilaian_this_week);
            $TotalSpent0 = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $weekSpent0 = Nilai::where('rombel_id', '=', $rombel)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $last0month_average = number_format((float)$TotalSpent0, 2, '.', '');
            $last0week_average = number_format((float)$weekSpent0, 2, '.', '');

            $last_average = 0.00;
            $last_week_average = 0.00;
            if ($last1month_average > 0.00) {
                $last_average = number_format((float)(($last0month_average - $last1month_average) / $last1month_average * 100), 2, '.', '');  // Outputs in two dp

            } elseif ($last1week_average > 0.00) {

                $last_week_average = number_format((float)(($last0week_average - $last1week_average) / $last1week_average * 100), 2, '.', '');
            } elseif ($last1month_average == 0) {
                $last_average = 0;
            } elseif ($last1week_average == 0) {

                $last_week_average = 0;
            }
            //dd($last_average);

            $data['title'] = Rombel::find($rombel)->rombel;
            $data['rombel'] = $rombel;
            $mapel = Mapel::all();
            return view('rombel.show', [
                //'guru' => $guru,
                'data' => $data,
                'penilaian1' => $penilaian1,
                'mapel' => $mapel,
                'jml_kelas_penilaian' => $jml_kelas_penilaian,
                'nilai' => $nilai,
                'nilai1' => $nilai1,
                'rombel2' => $rombel2,
                'rombel3' => $rombel3,
                'rombel4' => $rombel4,
                'jumlah_siswa' => $jumlah_siswa,
                'siswa1' => $siswa1,
                'rata_kelas' => $rata_kelas,
                'penilaian_list' => $penilaian_list,
                'penilaian_this_month' => $penilaian_this_month,
                'penilaian_this_week' => $penilaian_this_week,
                'penilaian_last_month' => $penilaian_last_month,
                'penilaian_last_week' => $penilaian_last_week,
                'mapel_last_3week' => $mapel_last_3week,
                'mapel_last_2week' => $mapel_last_2week,
                'mapel_last_week' => $mapel_last_week,
                'mapel_this_week' => $mapel_this_week,
                'last_week_average' => $last_week_average,
                'mapel_last_3month' => $mapel_last_3month,
                'mapel_last_2month' => $mapel_last_2month,
                'mapel_last_month' => $mapel_last_month,
                'mapel_this_month' => $mapel_this_month,
                'last3week_average' => $last3week_average,
                'last2week_average' => $last2week_average,
                'last1week_average' => $last1week_average,
                'last0week_average' => $last0week_average,
                'this_month' => $this_month,
                'last3month_average' => $last3month_average,
                'last2month_average' => $last2month_average,
                'last1month_average' => $last1month_average,
                'last0month_average' => $last0month_average,
                'last_average' => $last_average,
                'jml_siswa_penilaian' => $jml_siswa_penilaian,
                'jml_mapel_penilaian' => $jml_mapel_penilaian,
                'user' => $user,
                'rombel' => $rombel,


            ]);
        }
    }
}
