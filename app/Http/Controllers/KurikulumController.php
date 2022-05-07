<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurikulumController extends Controller
{
    //
        public function index()
    {
    	$nilai = Nilai::all();
        $user = User::all();
        $siswa = Siswa::all();
        // collection nilai semua kelas
        $data_nilai = Nilai::all()->pluck('created_at');
        //dd($data_nilai);
        // nilai kelas 1
        $kelas1 = Nilai::all()->where('kelas_id','=',1)->pluck('nilai');
        $nilai_kelas1 = [];
        foreach($kelas1 as $k)
        {
            $nilai_kelas1[] = $k;
        }
         $kls1_average = Nilai::all()->where('kelas_id','=',1)->pluck('nilai')->avg();
        // nilai kelas 2
        $kelas2 = Nilai::all()->where('kelas_id','=',2)->pluck('nilai');
        $nilai_kelas2 = [];
        foreach($kelas2 as $k)
        {
            $nilai_kelas2[] = $k;
        }
         $kls2_average = Nilai::all()->where('kelas_id','=',2)->pluck('nilai')->avg();
        // nilai kelas 3
        $kelas3 = Nilai::all()->where('kelas_id','=',3)->pluck('nilai');
        $nilai_kelas3 = [];
        foreach($kelas3 as $k)
        {
            $nilai_kelas3[] = $k;
        }
         $kls3_average = Nilai::all()->where('kelas_id','=',3)->pluck('nilai')->avg();
        // nilai kelas 4
        $kelas4 = Nilai::all()->where('kelas_id','=',4)->pluck('nilai');
        $nilai_kelas4 = [];
        foreach($kelas4 as $k)
        {
            $nilai_kelas4[] = $k;
        }
         $kls4_average = Nilai::all()->where('kelas_id','=',4)->pluck('nilai')->avg();
        // nilai kelas 5
        $kelas5 = Nilai::all()->where('kelas_id','=',5)->pluck('nilai');
        $nilai_kelas5 = [];
        foreach($kelas5 as $k)
        {
            $nilai_kelas5[] = $k;
        }
         $kls5_average = Nilai::all()->where('kelas_id','=',5)->pluck('nilai')->avg();
        // nilai kelas 6
        $kelas6 = Nilai::all()->where('kelas_id','=',6)->pluck('nilai');
        $nilai_kelas6 = [];
        foreach($kelas6 as $k)
        {
            $nilai_kelas6[] = $k;
        }
        $kls6_average = Nilai::all()->where('kelas_id','=',6)->pluck('nilai')->avg();

        $kelas_average[0] = (int)$kls1_average;
        $kelas_average[1] = (int)$kls2_average;
        $kelas_average[2] = (int)$kls3_average;
        $kelas_average[3] = (int)$kls4_average;
        $kelas_average[4] = (int)$kls5_average;
        $kelas_average[5] = (int)$kls6_average;

        $label = ['Jan','Feb','Mar','Apr','Mei','Jun'];
        for($bulan=1;$bulan < 7;$bulan++){
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            (int)$chart_nilai1[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',1)->pluck('nilai')->avg();
            (int)$chart_nilai2[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',2)->pluck('nilai')->avg();
            (int)$chart_nilai3[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',3)->pluck('nilai')->avg();
            (int)$chart_nilai4[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',4)->pluck('nilai')->avg();
            (int)$chart_nilai5[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',5)->pluck('nilai')->avg();
            (int)$chart_nilai6[] = Nilai::whereMonth('created_at','=',$bulan)->where('kelas_id','=',6)->pluck('nilai')->avg();
            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($chart_nilai5);
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
        return view('kurikulum.index',[
            'chart_nilai1' => $chart_nilai1,
            'chart_nilai2' => $chart_nilai2,
            'chart_nilai3' => $chart_nilai3,
            'chart_nilai4' => $chart_nilai4,
            'chart_nilai5' => $chart_nilai5,
            'chart_nilai6' => $chart_nilai6,
            'label' => $label,
            'jumlah_penilaian' => $jumlah_penilaian,
            'siswa' => $siswa,
            'user' => $user,
            'kls6_average' => $kls6_average,
            'kls5_average' => $kls5_average,
            'kls4_average' => $kls4_average,
            'kls3_average' => $kls3_average,
            'kls2_average' => $kls2_average,
            'kls1_average' => $kls1_average,
            'kelas_average' => $kelas_average,
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
