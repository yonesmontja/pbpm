<?php

namespace App\Http\Controllers;

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
        // ambil data nilai siswa bulan ini sumber https://www.codegrepper.com/code-examples/php/get+last+month+data+in+laravel
        $this_month = Nilai::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['nilai','created_at'])
            ->pluck('nilai');
        //dd(date('m'));
        dd($this_month);

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
