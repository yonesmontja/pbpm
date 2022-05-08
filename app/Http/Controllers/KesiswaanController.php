<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KesiswaanController extends Controller
{
    //
    public function index()
    {
    	$nilai = Nilai::all();
        $user = User::all();
        // hitung nilai rata-rata per mapel $chart_nilai[] untuk ditampilkan di grafik
        for($bulan=1; $bulan < 7; $bulan++){
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            (int)$chart_nilai1[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',1)->pluck('nilai')->avg();
            (int)$chart_nilai2[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',2)->pluck('nilai')->avg();
            (int)$chart_nilai3[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',3)->pluck('nilai')->avg();
            (int)$chart_nilai4[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',4)->pluck('nilai')->avg();
            (int)$chart_nilai5[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',5)->pluck('nilai')->avg();
            (int)$chart_nilai6[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',6)->pluck('nilai')->avg();
            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        // ambil data nilai siswa 3 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(3);
        $weekE = Carbon::now()->startOfWeek();
        for($mapel=1; $mapel < 11; $mapel++)
        {
            $mapel_last_3month[] = Nilai::where('mapel_id','=',$mapel)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$dateS,$dateE])
            ->avg('nilai');
            $mapel_last_3week[] = Nilai::where('mapel_id','=',$mapel)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$weekS,$weekE])
            ->avg('nilai');
        }
        $TotalSpent3 = DB::table('nilai')
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent3 = DB::table('nilai')
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $last3month_average = number_format((float)$TotalSpent3, 2, '.', '');
        $last3week_average = number_format((float)$weekSpent3, 2, '.', '');

        // ambil data nilai siswa 2 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(2);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(2);
        $weekE = Carbon::now()->startOfWeek();
        for($mapel=1; $mapel < 11; $mapel++)
        {
            $mapel_last_2month[] = Nilai::where('mapel_id','=',$mapel)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$dateS,$dateE])
            ->avg('nilai');
             $mapel_last_2week[] = Nilai::where('mapel_id','=',$mapel)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$weekS,$weekE])
            ->avg('nilai');
        }
        $TotalSpent2 = DB::table('nilai')
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent2 = DB::table('nilai')
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $last2month_average = number_format((float)$TotalSpent2, 2, '.', '');
        $last2week_average = number_format((float)$weekSpent2, 2, '.', '');

        // ambil data nilai siswa 1 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(1);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(1);
        $weekE = Carbon::now()->startOfWeek();
        for($mapel=1; $mapel < 11; $mapel++)
        {
            $mapel_last_month_old = Nilai::where('mapel_id','=',$mapel)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$dateS,$dateE])
            ->avg('nilai');
            $mapel_last_month [] = number_format((float)$mapel_last_month_old, 2, '.', '');
            $mapel_last_week_old = Nilai::where('mapel_id','=',$mapel)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$weekS,$weekE])
            ->avg('nilai');
            $mapel_last_week[] = number_format((float)$mapel_last_week_old, 2, '.', '');
        }
        for($penilaian = 1; $penilaian < 14; $penilaian++)
        {
            $penilaian_old = Nilai::where('penilaian_id','=',$penilaian)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$dateS, $dateE])
                -> avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id','=',$penilaian)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$weekS, $weekE])
                -> avg('nilai');
            $penilaian_last_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_last_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        //dd($penilaian_last_month);
        $TotalSpent1 = DB::table('nilai')
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent1 = DB::table('nilai')
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $last1month_average = number_format((float)$TotalSpent1, 2, '.', '');
        $last1week_average = number_format((float)$weekSpent1, 2, '.', '');

        // ambil data nilai siswa bulan ini sumber https://www.codegrepper.com/code-examples/php/get+last+month+data+in+laravel
        $this_month = Nilai::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['nilai','created_at'])
            ->avg('nilai');
        $this_month = number_format((float)$this_month, 2, '.', '');

        // ambil data nilai siswa bulan ini, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(0);
        $dateE = Carbon::now();
        $weekS = Carbon::now()->startOfWeek()->subWeek(0);
        $weekE = Carbon::now();
        for($mapel=1; $mapel < 11; $mapel++)
        {
            $mapel_this_month_old = Nilai::where('mapel_id','=',$mapel)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$dateS,$dateE])
            ->avg('nilai');
            $mapel_this_month[] = number_format((float)$mapel_this_month_old, 2, '.', '');
            $mapel_this_week_old = Nilai::where('mapel_id','=',$mapel)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$weekS,$weekE])
            ->avg('nilai');
            $mapel_this_week[] = number_format((float)$mapel_this_week_old, 2, '.', '');
        }
        for($penilaian = 1; $penilaian < 14; $penilaian++)
        {
            $penilaian_old = Nilai::where('penilaian_id','=',$penilaian)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$dateS, $dateE])
                -> avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id','=',$penilaian)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$weekS, $weekE])
                -> avg('nilai');
            $penilaian_this_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_this_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        $penilaian_list = ['Tugas 1','Tugas 2','Tugas 3','Tugas 4','Tugas 5','Latihan 1','Latihan 2','Latihan 3','Latihan 4','Latihan 5','UH','PTS','PAS'];
        //dd($penilaian_this_month);
        $TotalSpent0 = DB::table('nilai')
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent0 = DB::table('nilai')
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $last0month_average = number_format((float)$TotalSpent0, 2, '.', '');
        $last0week_average = number_format((float)$weekSpent0, 2, '.', '');
        //dd($mapel_this_week);

        //$last_week_average =
        $last_average = number_format((float)(($last0month_average - $last1month_average)/$last1month_average*100), 2, '.', '');  // Outputs in two dp
        $last_week_average = number_format((float)(($last0week_average-$last1week_average)/$last1week_average*100), 2, '.', '');
        //dd($last1month_average);

        $matpel = ['Agama Islam','Agama Protestan','Agama Katolik','PPKn','Bahasa Indonesia','Matematika','IPA','IPS','PJOK','SBK'];
        $islam_average = Nilai::all()->where('mapel_id',1)->pluck('nilai')->avg();
        $protestan_average = Nilai::all()->where('mapel_id',2)->pluck('nilai')->avg();
        $katolik_average = Nilai::all()->where('mapel_id',3)->pluck('nilai')->avg();
        $ppkn_average = Nilai::all()->where('mapel_id',4)->pluck('nilai')->avg();
        $indonesia_average = Nilai::all()->where('mapel_id',5)->pluck('nilai')->avg();
        $matematika_average = Nilai::all()->where('mapel_id',6)->pluck('nilai')->avg();
        $ipa_average = Nilai::all()->where('mapel_id',7)->pluck('nilai')->avg();
        $ips_average = Nilai::all()->where('mapel_id',8)->pluck('nilai')->avg();
        $pjok_average = Nilai::all()->where('mapel_id',9)->pluck('nilai')->avg();
        $sbk_average = Nilai::all()->where('mapel_id',10)->pluck('nilai')->avg();
        $sikap_average = (int)($islam_average+$protestan_average+$katolik_average+$ppkn_average)/4;
        $skill_average = (int)($indonesia_average+$matematika_average+$ipa_average+$ips_average)/4;
        $budaya_average = (int)($pjok_average+$sbk_average)/2;
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
        foreach($nilai as $mnp){
                $sumbux[] = $mnp->nilai;
                //$sumbuy[] = $mnp -> mapel -> nama_mapel;
        }
        foreach($nilai as $mnp){
            //$sumbux[] = $mnp->nilai;
            $sumbuy[] = $mnp -> mapel -> nama_mapel;
        }
        //dd($sumbuy);
        return view('kesiswaan.index',[
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
            'budaya_average'=>$budaya_average,
            'skill_average'=>$skill_average,
            'sikap_average'=>$sikap_average,
            'matang1'=>$matang1,
            'matpel'=>$matpel,
            'sumbux'=>$sumbux,
            'sumbuy'=>$sumbuy]);
    }
}
