<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nilai;
use App\Models\Siswa;

class DashboardController extends Controller
{
    //
    public function index()
    {
    	$nilai = Nilai::all();
        $user = User::all();
        $idsiswa_1 = Siswa::all()->where('kelas','=','Kelas 1');
        $idsiswa_2 = Siswa::all()->where('kelas','=','Kelas 2');
        $idsiswa_3 = Siswa::all()->where('kelas','=','Kelas 3');
        $idsiswa_4 = Siswa::all()->where('kelas','=','Kelas 4');
        $idsiswa_5 = Siswa::all()->where('kelas','=','Kelas 5');
        $idsiswa_6 = Siswa::all()->where('kelas','=','Kelas 6');
        foreach ($idsiswa_1 as $user) {
            $siswa_1[] = $user -> id;
        }
        foreach ($idsiswa_2 as $user) {
            $siswa_2[] = $user -> id;
        }
        foreach ($idsiswa_3 as $user) {
            $siswa_3[] = $user -> id;
        }
        foreach ($idsiswa_4 as $user) {
            $siswa_4[] = $user -> id;
        }
        foreach ($idsiswa_5 as $user) {
            $siswa_5[] = $user -> id;
        }
        foreach ($idsiswa_6 as $user) {
            $siswa_6[] = $user -> id;
        }

        // kkm dan rentang nilai
        $kkm = 65;
        $kkm1 = $kkm + (100-$kkm)/3;
        $kkm2 = $kkm1 + (100-$kkm)/3;
        // ---------------------------------

        // Pemetaan dan nilai harian kelas 1
        $underlow_pemetaan_1 = [];
        $low_pemetaan_1 = [];
        $pass_pemetaan_1 = [];
        $high_pemetaan_1 = [];
        for($i=437; $i < 501; $i++)
        {
            //$i = $siswa_1[$h];
            $islam_pemetaan_awal = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',6)
                                ->pluck('nilai')->avg();
            $protestan_pemetaan_awal = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',6)
                                ->pluck('nilai')->avg();
            $katolik_pemetaan_awal = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',6)
                                ->pluck('nilai')->avg();
            $ppkn_pemetaan_awal = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',6)
                                ->pluck('nilai')->avg();
            $indonesia_pemetaan_awal = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',6)
                                ->pluck('nilai')->avg();
            $matematika_pemetaan_awal = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',6)
                                ->pluck('nilai')->avg();
            $ipa_pemetaan_awal = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',6)
                                ->pluck('nilai')->avg();
            $ips_pemetaan_awal = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',6)
                                ->pluck('nilai')->avg();
            $rata_pemetaan_awal[$i] = number_format((float)($islam_pemetaan_awal+
                $protestan_pemetaan_awal+
                $katolik_pemetaan_awal+
                $ppkn_pemetaan_awal+
                $indonesia_pemetaan_awal+
                $matematika_pemetaan_awal+
                $ipa_pemetaan_awal+
                $ips_pemetaan_awal)/6, 1, '.', '');
            if($rata_pemetaan_awal[$i] < $kkm)
            {
                $underlow_pemetaan_1[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm2)
            {
                $high_pemetaan_1[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm && $rata_pemetaan_awal[$i] < $kkm1)
            {
                $low_pemetaan_1[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm1 && $rata_pemetaan_awal[$i] < $kkm2)
            {
                $pass_pemetaan_1[$i] = $rata_pemetaan_awal[$i];
            }
        }

        //dd($islam_harian_1);
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
        $pemetaan_islam_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',1)->pluck('nilai')->avg();
        $pemetaan_protestan_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',2)->pluck('nilai')->avg();
        $pemetaan_katolik_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',3)->pluck('nilai')->avg();
        $pemetaan_ppkn_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',4)->pluck('nilai')->avg();
        $pemetaan_indonesia_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',5)->pluck('nilai')->avg();
        $pemetaan_matematika_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',6)->pluck('nilai')->avg();
        $pemetaan_ipa_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',7)->pluck('nilai')->avg();
        $pemetaan_ips_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',8)->pluck('nilai')->avg();
        $pemetaan_pjok_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',9)->pluck('nilai')->avg();
        $pemetaan_sbk_average = Nilai::all()->where('penilaian_id',6)->where('mapel_id',10)->pluck('nilai')->avg();
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
        return view('dashboards.index',[
            'rata_pemetaan_awal' => $rata_pemetaan_awal,
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

            'underlow_pemetaan_1' => $underlow_pemetaan_1,
            'low_pemetaan_1' => $low_pemetaan_1,
            'pass_pemetaan_1' => $pass_pemetaan_1,
            'high_pemetaan_1' => $high_pemetaan_1,

            'pemetaan_islam_average' => $pemetaan_islam_average,
            'pemetaan_protestan_average' => $pemetaan_protestan_average,
            'pemetaan_katolik_average' => $pemetaan_katolik_average,
            'pemetaan_ppkn_average' => $pemetaan_ppkn_average,
            'pemetaan_indonesia_average' => $pemetaan_indonesia_average,
            'pemetaan_matematika_average' => $pemetaan_matematika_average,
            'pemetaan_ipa_average' => $pemetaan_ipa_average,
            'pemetaan_ips_average' => $pemetaan_ips_average,
            'pemetaan_pjok_average' => $pemetaan_pjok_average,
            'pemetaan_sbk_average' => $pemetaan_sbk_average,
            'budaya_average'=>$budaya_average,
            'skill_average'=>$skill_average,
            'sikap_average'=>$sikap_average,
            'matang1'=>$matang1,
            'matpel'=>$matpel,
            'sumbux'=>$sumbux,
            'sumbuy'=>$sumbuy]);
    }
}
