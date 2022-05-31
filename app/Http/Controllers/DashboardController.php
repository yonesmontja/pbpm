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
        $siswaall = Siswa::all();
        $idsiswa_1 = $siswaall->where('kelas','=','Kelas 1');
        $idsiswa_2 = $siswaall->where('kelas','=','Kelas 2');
        $idsiswa_3 = $siswaall->where('kelas','=','Kelas 3');
        $idsiswa_4 = $siswaall->where('kelas','=','Kelas 4');
        $idsiswa_5 = $siswaall->where('kelas','=','Kelas 5');
        $idsiswa_6 = $siswaall->where('kelas','=','Kelas 6');
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
        $underlow_pemetaan_indonesia_1 = [];
        $low_pemetaan_indonesia_1 = [];
        $pass_pemetaan_indonesia_1 = [];
        $high_pemetaan_indonesia_1 = [];
        $underlow_pemetaan_matematika_1 = [];
        $low_pemetaan_matematika_1 = [];
        $pass_pemetaan_matematika_1 = [];
        $high_pemetaan_matematika_1 = [];
        // Pemetaan kelas 2
        $underlow_pemetaan_indonesia_2 = [];
        $low_pemetaan_indonesia_2 = [];
        $pass_pemetaan_indonesia_2 = [];
        $high_pemetaan_indonesia_2 = [];
        $underlow_pemetaan_matematika_2 = [];
        $low_pemetaan_matematika_2 = [];
        $pass_pemetaan_matematika_2 = [];
        $high_pemetaan_matematika_2 = [];
        // Pemetaan kelas 3
        $underlow_pemetaan_indonesia_3 = [];
        $low_pemetaan_indonesia_3 = [];
        $pass_pemetaan_indonesia_3 = [];
        $high_pemetaan_indonesia_3 = [];
        $underlow_pemetaan_matematika_3 = [];
        $low_pemetaan_matematika_3 = [];
        $pass_pemetaan_matematika_3 = [];
        $high_pemetaan_matematika_3 = [];
        // Pemetaan kelas 4
        $underlow_pemetaan_indonesia_4 = [];
        $low_pemetaan_indonesia_4 = [];
        $pass_pemetaan_indonesia_4 = [];
        $high_pemetaan_indonesia_4 = [];
        $underlow_pemetaan_matematika_4 = [];
        $low_pemetaan_matematika_4 = [];
        $pass_pemetaan_matematika_4 = [];
        $high_pemetaan_matematika_4 = [];
        // Pemetaan kelas 5
        $underlow_pemetaan_indonesia_5 = [];
        $low_pemetaan_indonesia_5 = [];
        $pass_pemetaan_indonesia_5 = [];
        $high_pemetaan_indonesia_5 = [];
        $underlow_pemetaan_matematika_5 = [];
        $low_pemetaan_matematika_5 = [];
        $pass_pemetaan_matematika_5 = [];
        $high_pemetaan_matematika_5 = [];
        // Pemetaan kelas 6
        $underlow_pemetaan_indonesia_6 = [];
        $low_pemetaan_indonesia_6 = [];
        $pass_pemetaan_indonesia_6 = [];
        $high_pemetaan_indonesia_6 = [];
        $underlow_pemetaan_matematika_6 = [];
        $low_pemetaan_matematika_6 = [];
        $pass_pemetaan_matematika_6 = [];
        $high_pemetaan_matematika_6 = [];

        foreach($nilai->where('penilaian_id','=',6) as $m => $n)
        {
            if($n -> mapel_id == 5 && $n -> kelas_id == 1)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_1[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_1[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_1[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_1[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 1)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_1[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_1[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_1[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_1[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 2)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_2[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_2[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_2[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_2[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 2)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_2[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_2[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_2[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_2[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 3)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_3[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_3[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_3[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_3[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 3)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_3[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_3[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_3[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_3[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 4)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_4[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_4[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_4[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_4[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 4)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_4[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_4[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_4[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_4[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 5)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_5[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_5[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_5[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_5[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 5)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_5[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_5[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_5[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_5[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 6)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_6[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_6[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_6[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_6[$m] = $rata_pemetaan_awal[$m];
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 6)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_6[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_6[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_6[$m] = $rata_pemetaan_awal[$m];
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_6[$m] = $rata_pemetaan_awal[$m];
                }
            }
        }

        $underlow_pemetaan_indonesia_total = $underlow_pemetaan_indonesia_6 +
                                $underlow_pemetaan_indonesia_5 +
                                $underlow_pemetaan_indonesia_4 +
                                $underlow_pemetaan_indonesia_3 +
                                $underlow_pemetaan_indonesia_2 +
                                $underlow_pemetaan_indonesia_1;
        $low_pemetaan_indonesia_total = $low_pemetaan_indonesia_6 +
                                $low_pemetaan_indonesia_5 +
                                $low_pemetaan_indonesia_4 +
                                $low_pemetaan_indonesia_3 +
                                $low_pemetaan_indonesia_2 +
                                $low_pemetaan_indonesia_1;
        $pass_pemetaan_indonesia_total = $pass_pemetaan_indonesia_6 +
                                $pass_pemetaan_indonesia_5 +
                                $pass_pemetaan_indonesia_4 +
                                $pass_pemetaan_indonesia_3 +
                                $pass_pemetaan_indonesia_2 +
                                $pass_pemetaan_indonesia_1;
        $high_pemetaan_indonesia_total = $high_pemetaan_indonesia_6 +
                                $high_pemetaan_indonesia_5 +
                                $high_pemetaan_indonesia_4 +
                                $high_pemetaan_indonesia_3 +
                                $high_pemetaan_indonesia_2 +
                                $high_pemetaan_indonesia_1;

        $underlow_pemetaan_matematika_total = $underlow_pemetaan_matematika_6 +
                                $underlow_pemetaan_matematika_5 +
                                $underlow_pemetaan_matematika_4 +
                                $underlow_pemetaan_matematika_3 +
                                $underlow_pemetaan_matematika_2 +
                                $underlow_pemetaan_matematika_1;
        $low_pemetaan_matematika_total =$low_pemetaan_matematika_6 +
                            $low_pemetaan_matematika_5 +
                            $low_pemetaan_matematika_4 +
                            $low_pemetaan_matematika_3 +
                            $low_pemetaan_matematika_2 +
                            $low_pemetaan_matematika_1;
        $pass_pemetaan_matematika_total = $pass_pemetaan_matematika_6 +
                                $pass_pemetaan_matematika_5 +
                                $pass_pemetaan_matematika_4 +
                                $pass_pemetaan_matematika_3 +
                                $pass_pemetaan_matematika_2 +
                                $pass_pemetaan_matematika_1;
        $high_pemetaan_matematika_total = $high_pemetaan_matematika_6 +
                                $high_pemetaan_matematika_5 +
                                $high_pemetaan_matematika_4 +
                                $high_pemetaan_matematika_3 +
                                $high_pemetaan_matematika_2 +
                                $high_pemetaan_matematika_1;
        //dd($underlow_pemetaan_indonesia_6);
        $matpel = ['Agama Islam','Agama Protestan','Agama Katolik','PPKn','Bahasa Indonesia','Matematika','IPA','IPS','PJOK','SBK'];
        $matpel_pemetaan = ['Bahasa Indonesia','Matematika'];
        $islam_average = $nilai->where('mapel_id',1)->pluck('nilai')->avg();
        $protestan_average = $nilai->where('mapel_id',2)->pluck('nilai')->avg();
        $katolik_average = $nilai->where('mapel_id',3)->pluck('nilai')->avg();
        $ppkn_average = $nilai->where('mapel_id',4)->pluck('nilai')->avg();
        $indonesia_average = $nilai->where('mapel_id',5)->pluck('nilai')->avg();
        $matematika_average = $nilai->where('mapel_id',6)->pluck('nilai')->avg();
        $this_month = (int)($indonesia_average + $matematika_average)/2;
        $ipa_average = $nilai->where('mapel_id',7)->pluck('nilai')->avg();
        $ips_average = $nilai->where('mapel_id',8)->pluck('nilai')->avg();
        $pjok_average = $nilai->where('mapel_id',9)->pluck('nilai')->avg();
        $sbk_average = $nilai->where('mapel_id',10)->pluck('nilai')->avg();
        $pemetaan_islam_average = $nilai->where('penilaian_id',6)->where('mapel_id',1)->pluck('nilai')->avg();
        $pemetaan_protestan_average = $nilai->where('penilaian_id',6)->where('mapel_id',2)->pluck('nilai')->avg();
        $pemetaan_katolik_average = $nilai->where('penilaian_id',6)->where('mapel_id',3)->pluck('nilai')->avg();
        $pemetaan_ppkn_average = $nilai->where('penilaian_id',6)->where('mapel_id',4)->pluck('nilai')->avg();
        $pemetaan_indonesia_average = $nilai->where('penilaian_id',6)->where('mapel_id',5)->pluck('nilai')->avg();
        $pemetaan_matematika_average = $nilai->where('penilaian_id',6)->where('mapel_id',6)->pluck('nilai')->avg();
        $total_average = (($pemetaan_indonesia_average + $pemetaan_matematika_average)/2);
        $last_average = ($this_month - $total_average);
        //dd($last_average);
        $pemetaan_ipa_average = $nilai->where('penilaian_id',6)->where('mapel_id',7)->pluck('nilai')->avg();
        $pemetaan_ips_average = $nilai->where('penilaian_id',6)->where('mapel_id',8)->pluck('nilai')->avg();
        $pemetaan_pjok_average = $nilai->where('penilaian_id',6)->where('mapel_id',9)->pluck('nilai')->avg();
        $pemetaan_sbk_average = $nilai->where('penilaian_id',6)->where('mapel_id',10)->pluck('nilai')->avg();
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
        //dd(array_sum($underlow_pemetaan_indonesia_total)/count($underlow_pemetaan_indonesia_total));
        //dd($underlow_pemetaan_indonesia_total);
        return view('dashboards.index',[
            'this_month' => $this_month,
            'last_average' => $last_average,
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

            'underlow_pemetaan_indonesia_total' => $underlow_pemetaan_indonesia_total,
            'low_pemetaan_indonesia_total' => $low_pemetaan_indonesia_total,
            'pass_pemetaan_indonesia_total' => $pass_pemetaan_indonesia_total,
            'high_pemetaan_indonesia_total' => $high_pemetaan_indonesia_total,

            'underlow_pemetaan_matematika_total' => $underlow_pemetaan_matematika_total,
            'low_pemetaan_matematika_total' => $low_pemetaan_matematika_total,
            'pass_pemetaan_matematika_total' => $pass_pemetaan_matematika_total,
            'high_pemetaan_matematika_total' => $high_pemetaan_matematika_total,

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
            'matpel_pemetaan' => $matpel_pemetaan,
            'sumbux'=>$sumbux,
            'sumbuy'=>$sumbuy]);
    }
}
