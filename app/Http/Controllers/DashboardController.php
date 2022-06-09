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

        $siswa_underlow_pemetaan_indonesia_1 = [];
        $siswa_low_pemetaan_indonesia_1 = [];
        $siswa_pass_pemetaan_indonesia_1 = [];
        $siswa_high_pemetaan_indonesia_1 = [];

        $siswa_underlow_pemetaan_indonesia_2 = [];
        $siswa_low_pemetaan_indonesia_2 = [];
        $siswa_pass_pemetaan_indonesia_2 = [];
        $siswa_high_pemetaan_indonesia_2 = [];

        $siswa_underlow_pemetaan_indonesia_3 = [];
        $siswa_low_pemetaan_indonesia_3 = [];
        $siswa_pass_pemetaan_indonesia_3 = [];
        $siswa_high_pemetaan_indonesia_3 = [];

        $siswa_underlow_pemetaan_indonesia_4 = [];
        $siswa_low_pemetaan_indonesia_4 = [];
        $siswa_pass_pemetaan_indonesia_4 = [];
        $siswa_high_pemetaan_indonesia_4 = [];

        $siswa_underlow_pemetaan_indonesia_5 = [];
        $siswa_low_pemetaan_indonesia_5 = [];
        $siswa_pass_pemetaan_indonesia_5 = [];
        $siswa_high_pemetaan_indonesia_5 = [];

        $siswa_underlow_pemetaan_indonesia_6 = [];
        $siswa_low_pemetaan_indonesia_6 = [];
        $siswa_pass_pemetaan_indonesia_6 = [];
        $siswa_high_pemetaan_indonesia_6 = [];

        $siswa_underlow_pemetaan_matematika_1 = [];
        $siswa_low_pemetaan_matematika_1 = [];
        $siswa_pass_pemetaan_matematika_1 = [];
        $siswa_high_pemetaan_matematika_1 = [];

        $siswa_underlow_pemetaan_matematika_2 = [];
        $siswa_low_pemetaan_matematika_2 = [];
        $siswa_pass_pemetaan_matematika_2 = [];
        $siswa_high_pemetaan_matematika_2 = [];

        $siswa_underlow_pemetaan_matematika_3 = [];
        $siswa_low_pemetaan_matematika_3 = [];
        $siswa_pass_pemetaan_matematika_3 = [];
        $siswa_high_pemetaan_matematika_3 = [];

        $siswa_underlow_pemetaan_matematika_4 = [];
        $siswa_low_pemetaan_matematika_4 = [];
        $siswa_pass_pemetaan_matematika_4 = [];
        $siswa_high_pemetaan_matematika_4 = [];

        $siswa_underlow_pemetaan_matematika_5 = [];
        $siswa_low_pemetaan_matematika_5 = [];
        $siswa_pass_pemetaan_matematika_5 = [];
        $siswa_high_pemetaan_matematika_5 = [];

        $siswa_underlow_pemetaan_matematika_6 = [];
        $siswa_low_pemetaan_matematika_6 = [];
        $siswa_pass_pemetaan_matematika_6 = [];
        $siswa_high_pemetaan_matematika_6 = [];

        foreach($nilai->where('penilaian_id','=',6) as $m => $n)
        {
            if($n -> mapel_id == 5 && $n -> kelas_id == 1)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_1[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_indonesia_1[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_1[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_indonesia_1[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_1[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_indonesia_1[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_1[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_indonesia_1[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 1)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_1[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_matematika_1[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_1[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_matematika_1[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_1[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_matematika_1[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_1[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_matematika_1[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 2)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_2[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_indonesia_2[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_2[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_indonesia_2[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_2[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_indonesia_2[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_2[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_indonesia_2[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 2)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_2[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_matematika_2[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_2[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_matematika_2[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_2[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_matematika_2[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_2[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_matematika_2[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 3)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_3[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_indonesia_3[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_3[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_indonesia_3[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_3[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_indonesia_3[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_3[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_indonesia_3[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 3)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_3[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_matematika_3[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_3[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_matematika_3[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_3[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_matematika_3[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_3[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_matematika_3[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 4)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_4[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_indonesia_4[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_4[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_indonesia_4[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_4[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_indonesia_4[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_4[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_indonesia_4[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 4)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_4[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_matematika_4[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_4[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_matematika_4[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_4[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_matematika_4[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_4[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_matematika_4[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 5)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_5[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_indonesia_5[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_5[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_indonesia_5[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_5[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_indonesia_5[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_5[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_indonesia_5[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 5)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_5[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_matematika_5[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_5[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_matematika_5[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_5[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_matematika_5[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_5[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_matematika_5[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 5 && $n -> kelas_id == 6)
            {
                $indonesia_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$indonesia_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_indonesia_6[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_indonesia_6[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_indonesia_6[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_indonesia_6[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_indonesia_6[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_indonesia_6[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_indonesia_6[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_indonesia_6[$m] = $n -> siswa -> nama_depan;
                }
            }
            if($n -> mapel_id == 6 && $n -> kelas_id == 6)
            {
                $matematika_pemetaan_awal[$m] = $n -> nilai;
                $rata_pemetaan_awal[$m] = number_format((float)$matematika_pemetaan_awal[$m], 1, '.', '');
                if($rata_pemetaan_awal[$m] < $kkm)
                {
                    $underlow_pemetaan_matematika_6[$m] = $rata_pemetaan_awal[$m];
                    $siswa_underlow_pemetaan_matematika_6[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm2)
                {
                    $high_pemetaan_matematika_6[$m] = $rata_pemetaan_awal[$m];
                    $siswa_high_pemetaan_matematika_6[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm && $rata_pemetaan_awal[$m] < $kkm1)
                {
                    $low_pemetaan_matematika_6[$m] = $rata_pemetaan_awal[$m];
                    $siswa_low_pemetaan_matematika_6[$m] = $n -> siswa -> nama_depan;
                }
                if($rata_pemetaan_awal[$m] >= $kkm1 && $rata_pemetaan_awal[$m] < $kkm2)
                {
                    $pass_pemetaan_matematika_6[$m] = $rata_pemetaan_awal[$m];
                    $siswa_pass_pemetaan_matematika_6[$m] = $n -> siswa -> nama_depan;
                }
            }
        }
        // kelas 1 -----------------------
        if(count($siswa_high_pemetaan_matematika_1) == null)
        {
            $siswa_rata_high_pemetaan_matematika_1 = [];
        }
        if(count($siswa_high_pemetaan_matematika_1) ==! null)
        {
            $siswa_rata_high_pemetaan_matematika_1 = $siswa_high_pemetaan_matematika_1;
        }

        if(count($siswa_pass_pemetaan_matematika_1) == null)
        {
            $siswa_rata_pass_pemetaan_matematika_1 = [];
        }
        if(count($siswa_pass_pemetaan_matematika_1) ==! null)
        {
            $siswa_rata_pass_pemetaan_matematika_1 = $siswa_pass_pemetaan_matematika_1;
        }

        if(count($siswa_low_pemetaan_matematika_1) == null)
        {
            $siswa_rata_low_pemetaan_matematika_1 = [];
        }
        if(count($siswa_low_pemetaan_matematika_1) ==! null)
        {
            $siswa_rata_low_pemetaan_matematika_1 = $siswa_low_pemetaan_matematika_1;
        }

        if(count($siswa_underlow_pemetaan_matematika_1) == null)
        {
            $siswa_rata_underlow_pemetaan_matematika_1 = [];
        }
        if(count($siswa_underlow_pemetaan_matematika_1) ==! null)
        {
            $siswa_rata_underlow_pemetaan_matematika_1 = $siswa_underlow_pemetaan_matematika_1;
        }

        if(count($siswa_high_pemetaan_indonesia_1) == null)
        {
            $siswa_rata_high_pemetaan_indonesia_1 = [];
        }
        if(count($siswa_high_pemetaan_indonesia_1) ==! null)
        {
            $siswa_rata_high_pemetaan_indonesia_1 = $siswa_high_pemetaan_indonesia_1;
        }

        if(count($siswa_pass_pemetaan_indonesia_1) == null)
        {
            $siswa_rata_pass_pemetaan_indonesia_1 = [];
        }
        if(count($siswa_pass_pemetaan_indonesia_1) ==! null)
        {
            $siswa_rata_pass_pemetaan_indonesia_1 = $siswa_pass_pemetaan_indonesia_1;
        }

        if(count($siswa_low_pemetaan_indonesia_1) == null)
        {
            $siswa_rata_low_pemetaan_indonesia_1 = [];
        }
        if(count($siswa_low_pemetaan_indonesia_1) ==! null)
        {
            $siswa_rata_low_pemetaan_indonesia_1 = $siswa_low_pemetaan_indonesia_1;
        }

        if(count($siswa_underlow_pemetaan_indonesia_1) == null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_1 = [];
        }
        if(count($siswa_underlow_pemetaan_indonesia_1) ==! null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_1 = $siswa_underlow_pemetaan_indonesia_1;
        }
        // kelas 2 -----------------------
        if(count($siswa_high_pemetaan_matematika_2) == null)
        {
            $siswa_rata_high_pemetaan_matematika_2 = [];
        }
        if(count($siswa_high_pemetaan_matematika_2) ==! null)
        {
            $siswa_rata_high_pemetaan_matematika_2 = $siswa_high_pemetaan_matematika_2;
        }

        if(count($siswa_pass_pemetaan_matematika_2) == null)
        {
            $siswa_rata_pass_pemetaan_matematika_2 = [];
        }
        if(count($siswa_pass_pemetaan_matematika_2) ==! null)
        {
            $siswa_rata_pass_pemetaan_matematika_2 = $siswa_pass_pemetaan_matematika_2;
        }

        if(count($siswa_low_pemetaan_matematika_2) == null)
        {
            $siswa_rata_low_pemetaan_matematika_2 = [];
        }
        if(count($siswa_low_pemetaan_matematika_2) ==! null)
        {
            $siswa_rata_low_pemetaan_matematika_2 = $siswa_low_pemetaan_matematika_2;
        }

        if(count($siswa_underlow_pemetaan_matematika_2) == null)
        {
            $siswa_rata_underlow_pemetaan_matematika_2 = [];
        }
        if(count($siswa_underlow_pemetaan_matematika_2) ==! null)
        {
            $siswa_rata_underlow_pemetaan_matematika_2 = $siswa_underlow_pemetaan_matematika_2;
        }

        if(count($siswa_high_pemetaan_indonesia_2) == null)
        {
            $siswa_rata_high_pemetaan_indonesia_2 = [];
        }
        if(count($siswa_high_pemetaan_indonesia_2) ==! null)
        {
            $siswa_rata_high_pemetaan_indonesia_2 = $siswa_high_pemetaan_indonesia_2;
        }

        if(count($siswa_pass_pemetaan_indonesia_2) == null)
        {
            $siswa_rata_pass_pemetaan_indonesia_2 = [];
        }
        if(count($siswa_pass_pemetaan_indonesia_2) ==! null)
        {
            $siswa_rata_pass_pemetaan_indonesia_2 = $siswa_pass_pemetaan_indonesia_2;
        }

        if(count($siswa_low_pemetaan_indonesia_2) == null)
        {
            $siswa_rata_low_pemetaan_indonesia_2 = [];
        }
        if(count($siswa_low_pemetaan_indonesia_2) ==! null)
        {
            $siswa_rata_low_pemetaan_indonesia_2 = $siswa_low_pemetaan_indonesia_2;
        }

        if(count($siswa_underlow_pemetaan_indonesia_2) == null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_2 = [];
        }
        if(count($siswa_underlow_pemetaan_indonesia_2) ==! null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_2 = $siswa_underlow_pemetaan_indonesia_2;
        }
        // kelas 3 -----------------------
        if(count($siswa_high_pemetaan_matematika_3) == null)
        {
            $siswa_rata_high_pemetaan_matematika_3 = [];
        }
        if(count($siswa_high_pemetaan_matematika_3) ==! null)
        {
            $siswa_rata_high_pemetaan_matematika_3 = $siswa_high_pemetaan_matematika_3;
        }

        if(count($siswa_pass_pemetaan_matematika_3) == null)
        {
            $siswa_rata_pass_pemetaan_matematika_3 = [];
        }
        if(count($siswa_pass_pemetaan_matematika_3) ==! null)
        {
            $siswa_rata_pass_pemetaan_matematika_3 = $siswa_pass_pemetaan_matematika_3;
        }

        if(count($siswa_low_pemetaan_matematika_3) == null)
        {
            $siswa_rata_low_pemetaan_matematika_3 = [];
        }
        if(count($siswa_low_pemetaan_matematika_3) ==! null)
        {
            $siswa_rata_low_pemetaan_matematika_3 = $siswa_low_pemetaan_matematika_3;
        }

        if(count($siswa_underlow_pemetaan_matematika_3) == null)
        {
            $siswa_rata_underlow_pemetaan_matematika_3 = [];
        }
        if(count($siswa_underlow_pemetaan_matematika_3) ==! null)
        {
            $siswa_rata_underlow_pemetaan_matematika_3 = $siswa_underlow_pemetaan_matematika_3;
        }

        if(count($siswa_high_pemetaan_indonesia_3) == null)
        {
            $siswa_rata_high_pemetaan_indonesia_3 = [];
        }
        if(count($siswa_high_pemetaan_indonesia_3) ==! null)
        {
            $siswa_rata_high_pemetaan_indonesia_3 = $siswa_high_pemetaan_indonesia_3;
        }

        if(count($siswa_pass_pemetaan_indonesia_3) == null)
        {
            $siswa_rata_pass_pemetaan_indonesia_3 = [];
        }
        if(count($siswa_pass_pemetaan_indonesia_3) ==! null)
        {
            $siswa_rata_pass_pemetaan_indonesia_3 = $siswa_pass_pemetaan_indonesia_3;
        }

        if(count($siswa_low_pemetaan_indonesia_3) == null)
        {
            $siswa_rata_low_pemetaan_indonesia_3 = [];
        }
        if(count($siswa_low_pemetaan_indonesia_3) ==! null)
        {
            $siswa_rata_low_pemetaan_indonesia_3 = $siswa_low_pemetaan_indonesia_3;
        }

        if(count($siswa_underlow_pemetaan_indonesia_3) == null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_3 = [];
        }
        if(count($siswa_underlow_pemetaan_indonesia_3) ==! null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_3 = $siswa_underlow_pemetaan_indonesia_3;
        }
        // kelas 4 -----------------------
        if(count($siswa_high_pemetaan_matematika_4) == null)
        {
            $siswa_rata_high_pemetaan_matematika_4 = [];
        }
        if(count($siswa_high_pemetaan_matematika_4) ==! null)
        {
            $siswa_rata_high_pemetaan_matematika_4 = $siswa_high_pemetaan_matematika_4;
        }

        if(count($siswa_pass_pemetaan_matematika_4) == null)
        {
            $siswa_rata_pass_pemetaan_matematika_4 = [];
        }
        if(count($siswa_pass_pemetaan_matematika_4) ==! null)
        {
            $siswa_rata_pass_pemetaan_matematika_4 = $siswa_pass_pemetaan_matematika_4;
        }

        if(count($siswa_low_pemetaan_matematika_4) == null)
        {
            $siswa_rata_low_pemetaan_matematika_4 = [];
        }
        if(count($siswa_low_pemetaan_matematika_4) ==! null)
        {
            $siswa_rata_low_pemetaan_matematika_4 = $siswa_low_pemetaan_matematika_4;
        }

        if(count($siswa_underlow_pemetaan_matematika_4) == null)
        {
            $siswa_rata_underlow_pemetaan_matematika_4 = [];
        }
        if(count($siswa_underlow_pemetaan_matematika_4) ==! null)
        {
            $siswa_rata_underlow_pemetaan_matematika_4 = $siswa_underlow_pemetaan_matematika_4;
        }

        if(count($siswa_high_pemetaan_indonesia_4) == null)
        {
            $siswa_rata_high_pemetaan_indonesia_4 = [];
        }
        if(count($siswa_high_pemetaan_indonesia_4) ==! null)
        {
            $siswa_rata_high_pemetaan_indonesia_4 = $siswa_high_pemetaan_indonesia_4;
        }

        if(count($siswa_pass_pemetaan_indonesia_4) == null)
        {
            $siswa_rata_pass_pemetaan_indonesia_4 = [];
        }
        if(count($siswa_pass_pemetaan_indonesia_4) ==! null)
        {
            $siswa_rata_pass_pemetaan_indonesia_4 = $siswa_pass_pemetaan_indonesia_4;
        }

        if(count($siswa_low_pemetaan_indonesia_4) == null)
        {
            $siswa_rata_low_pemetaan_indonesia_4 = [];
        }
        if(count($siswa_low_pemetaan_indonesia_4) ==! null)
        {
            $siswa_rata_low_pemetaan_indonesia_4 = $siswa_low_pemetaan_indonesia_4;
        }

        if(count($siswa_underlow_pemetaan_indonesia_4) == null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_4 = [];
        }
        if(count($siswa_underlow_pemetaan_indonesia_4) ==! null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_4 = $siswa_underlow_pemetaan_indonesia_4;
        }
        // kelas 5 -----------------------
        if(count($siswa_high_pemetaan_matematika_5) == null)
        {
            $siswa_rata_high_pemetaan_matematika_5 = [];
        }
        if(count($siswa_high_pemetaan_matematika_5) ==! null)
        {
            $siswa_rata_high_pemetaan_matematika_5 = $siswa_high_pemetaan_matematika_5;
        }

        if(count($siswa_pass_pemetaan_matematika_5) == null)
        {
            $siswa_rata_pass_pemetaan_matematika_5 = [];
        }
        if(count($siswa_pass_pemetaan_matematika_5) ==! null)
        {
            $siswa_rata_pass_pemetaan_matematika_5 = $siswa_pass_pemetaan_matematika_5;
        }

        if(count($siswa_low_pemetaan_matematika_5) == null)
        {
            $siswa_rata_low_pemetaan_matematika_5 = [];
        }
        if(count($siswa_low_pemetaan_matematika_5) ==! null)
        {
            $siswa_rata_low_pemetaan_matematika_5 = $siswa_low_pemetaan_matematika_5;
        }

        if(count($siswa_underlow_pemetaan_matematika_5) == null)
        {
            $siswa_rata_underlow_pemetaan_matematika_5 = [];
        }
        if(count($siswa_underlow_pemetaan_matematika_5) ==! null)
        {
            $siswa_rata_underlow_pemetaan_matematika_5 = $siswa_underlow_pemetaan_matematika_5;
        }

        if(count($siswa_high_pemetaan_indonesia_5) == null)
        {
            $siswa_rata_high_pemetaan_indonesia_5 = [];
        }
        if(count($siswa_high_pemetaan_indonesia_5) ==! null)
        {
            $siswa_rata_high_pemetaan_indonesia_5 = $siswa_high_pemetaan_indonesia_5;
        }

        if(count($siswa_pass_pemetaan_indonesia_5) == null)
        {
            $siswa_rata_pass_pemetaan_indonesia_5 = [];
        }
        if(count($siswa_pass_pemetaan_indonesia_5) ==! null)
        {
            $siswa_rata_pass_pemetaan_indonesia_5 = $siswa_pass_pemetaan_indonesia_5;
        }

        if(count($siswa_low_pemetaan_indonesia_5) == null)
        {
            $siswa_rata_low_pemetaan_indonesia_5 = [];
        }
        if(count($siswa_low_pemetaan_indonesia_5) ==! null)
        {
            $siswa_rata_low_pemetaan_indonesia_5 = $siswa_low_pemetaan_indonesia_5;
        }

        if(count($siswa_underlow_pemetaan_indonesia_5) == null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_5 = [];
        }
        if(count($siswa_underlow_pemetaan_indonesia_5) ==! null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_5 = $siswa_underlow_pemetaan_indonesia_5;
        }
        // kelas 6 -----------------------
        if(count($siswa_high_pemetaan_matematika_6) == null)
        {
            $siswa_rata_high_pemetaan_matematika_6 = [];
        }
        if(count($siswa_high_pemetaan_matematika_6) ==! null)
        {
            $siswa_rata_high_pemetaan_matematika_6 = $siswa_high_pemetaan_matematika_6;
        }

        if(count($siswa_pass_pemetaan_matematika_6) == null)
        {
            $siswa_rata_pass_pemetaan_matematika_6 = [];
        }
        if(count($siswa_pass_pemetaan_matematika_6) ==! null)
        {
            $siswa_rata_pass_pemetaan_matematika_6 = $siswa_pass_pemetaan_matematika_6;
        }

        if(count($siswa_low_pemetaan_matematika_6) == null)
        {
            $siswa_rata_low_pemetaan_matematika_6 = [];
        }
        if(count($siswa_low_pemetaan_matematika_6) ==! null)
        {
            $siswa_rata_low_pemetaan_matematika_6 = $siswa_low_pemetaan_matematika_6;
        }

        if(count($siswa_underlow_pemetaan_matematika_6) == null)
        {
            $siswa_rata_underlow_pemetaan_matematika_6 = [];
        }
        if(count($siswa_underlow_pemetaan_matematika_6) ==! null)
        {
            $siswa_rata_underlow_pemetaan_matematika_6 = $siswa_underlow_pemetaan_matematika_6;
        }

        if(count($siswa_high_pemetaan_indonesia_6) == null)
        {
            $siswa_rata_high_pemetaan_indonesia_6 = [];
        }
        if(count($siswa_high_pemetaan_indonesia_6) ==! null)
        {
            $siswa_rata_high_pemetaan_indonesia_6 = $siswa_high_pemetaan_indonesia_6;
        }

        if(count($siswa_pass_pemetaan_indonesia_6) == null)
        {
            $siswa_rata_pass_pemetaan_indonesia_6 = [];
        }
        if(count($siswa_pass_pemetaan_indonesia_6) ==! null)
        {
            $siswa_rata_pass_pemetaan_indonesia_6 = $siswa_pass_pemetaan_indonesia_6;
        }

        if(count($siswa_low_pemetaan_indonesia_6) == null)
        {
            $siswa_rata_low_pemetaan_indonesia_6 = [];
        }
        if(count($siswa_low_pemetaan_indonesia_6) ==! null)
        {
            $siswa_rata_low_pemetaan_indonesia_6 = $siswa_low_pemetaan_indonesia_6;
        }

        if(count($siswa_underlow_pemetaan_indonesia_6) == null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_6 = [];
        }
        if(count($siswa_underlow_pemetaan_indonesia_6) ==! null)
        {
            $siswa_rata_underlow_pemetaan_indonesia_6 = $siswa_underlow_pemetaan_indonesia_6;
        }

        $data_1 = [count($siswa_rata_underlow_pemetaan_indonesia_1),
                        count($siswa_rata_underlow_pemetaan_matematika_1),
                        count($siswa_rata_low_pemetaan_indonesia_1),
                        count($siswa_rata_low_pemetaan_matematika_1),
                        count($siswa_rata_pass_pemetaan_indonesia_1),
                        count($siswa_rata_pass_pemetaan_matematika_1),
                        count($siswa_rata_high_pemetaan_indonesia_1),
                        count($siswa_rata_high_pemetaan_matematika_1)
                    ];
        $data_2 = [count($siswa_rata_underlow_pemetaan_indonesia_2),
                        count($siswa_rata_underlow_pemetaan_matematika_2),
                        count($siswa_rata_low_pemetaan_indonesia_2),
                        count($siswa_rata_low_pemetaan_matematika_2),
                        count($siswa_rata_pass_pemetaan_indonesia_2),
                        count($siswa_rata_pass_pemetaan_matematika_2),
                        count($siswa_rata_high_pemetaan_indonesia_2),
                        count($siswa_rata_high_pemetaan_matematika_2)
                    ];
        $data_3 = [count($siswa_rata_underlow_pemetaan_indonesia_3),
                        count($siswa_rata_underlow_pemetaan_matematika_3),
                        count($siswa_rata_low_pemetaan_indonesia_3),
                        count($siswa_rata_low_pemetaan_matematika_3),
                        count($siswa_rata_pass_pemetaan_indonesia_3),
                        count($siswa_rata_pass_pemetaan_matematika_3),
                        count($siswa_rata_high_pemetaan_indonesia_3),
                        count($siswa_rata_high_pemetaan_matematika_3)
                    ];
        $data_4 = [count($siswa_rata_underlow_pemetaan_indonesia_4),
                        count($siswa_rata_underlow_pemetaan_matematika_4),
                        count($siswa_rata_low_pemetaan_indonesia_4),
                        count($siswa_rata_low_pemetaan_matematika_4),
                        count($siswa_rata_pass_pemetaan_indonesia_4),
                        count($siswa_rata_pass_pemetaan_matematika_4),
                        count($siswa_rata_high_pemetaan_indonesia_4),
                        count($siswa_rata_high_pemetaan_matematika_4)
                    ];
        $data_5 = [count($siswa_rata_underlow_pemetaan_indonesia_5),
                        count($siswa_rata_underlow_pemetaan_matematika_5),
                        count($siswa_rata_low_pemetaan_indonesia_5),
                        count($siswa_rata_low_pemetaan_matematika_5),
                        count($siswa_rata_pass_pemetaan_indonesia_5),
                        count($siswa_rata_pass_pemetaan_matematika_5),
                        count($siswa_rata_high_pemetaan_indonesia_5),
                        count($siswa_rata_high_pemetaan_matematika_5)
                    ];
        $data_6 = [count($siswa_rata_underlow_pemetaan_indonesia_6),
                        count($siswa_rata_underlow_pemetaan_matematika_6),
                        count($siswa_rata_low_pemetaan_indonesia_6),
                        count($siswa_rata_low_pemetaan_matematika_6),
                        count($siswa_rata_pass_pemetaan_indonesia_6),
                        count($siswa_rata_pass_pemetaan_matematika_6),
                        count($siswa_rata_high_pemetaan_indonesia_6),
                        count($siswa_rata_high_pemetaan_matematika_6)
                    ];

        // kelas 1 -----------------------
        if(count($high_pemetaan_matematika_1) == null)
        {
            $rata_high_pemetaan_matematika_1 = 0;
        }
        if(count($high_pemetaan_matematika_1) ==! null)
        {
            $rata_high_pemetaan_matematika_1 = number_format(array_sum($high_pemetaan_matematika_1) / count($high_pemetaan_matematika_1), 1, '.', '');
        }

        if(count($pass_pemetaan_matematika_1) == null)
        {
            $rata_pass_pemetaan_matematika_1 = 0;
        }
        if(count($pass_pemetaan_matematika_1) ==! null)
        {
            $rata_pass_pemetaan_matematika_1 = number_format(array_sum($pass_pemetaan_matematika_1) / count($pass_pemetaan_matematika_1), 1, '.', '');
        }

        if(count($low_pemetaan_matematika_1) == null)
        {
            $rata_low_pemetaan_matematika_1 = 0;
        }
        if(count($low_pemetaan_matematika_1) ==! null)
        {
            $rata_low_pemetaan_matematika_1 = number_format(array_sum($low_pemetaan_matematika_1) / count($low_pemetaan_matematika_1), 1, '.', '');
        }

        if(count($underlow_pemetaan_matematika_1) == null)
        {
            $rata_underlow_pemetaan_matematika_1 = 0;
        }
        if(count($underlow_pemetaan_matematika_1) ==! null)
        {
            $rata_underlow_pemetaan_matematika_1 = number_format(array_sum($underlow_pemetaan_matematika_1) / count($underlow_pemetaan_matematika_1), 1, '.', '');
        }

        if(count($high_pemetaan_indonesia_1) == null)
        {
            $rata_high_pemetaan_indonesia_1 = 0;
        }
        if(count($high_pemetaan_indonesia_1) ==! null)
        {
            $rata_high_pemetaan_indonesia_1 = number_format(array_sum($high_pemetaan_indonesia_1) / count($high_pemetaan_indonesia_1), 1, '.', '');
        }

        if(count($pass_pemetaan_indonesia_1) == null)
        {
            $rata_pass_pemetaan_indonesia_1 = 0;
        }
        if(count($pass_pemetaan_indonesia_1) ==! null)
        {
            $rata_pass_pemetaan_indonesia_1 = number_format(array_sum($pass_pemetaan_indonesia_1) / count($pass_pemetaan_indonesia_1), 1, '.', '');
        }

        if(count($low_pemetaan_indonesia_1) == null)
        {
            $rata_low_pemetaan_indonesia_1 = 0;
        }
        if(count($low_pemetaan_indonesia_1) ==! null)
        {
            $rata_low_pemetaan_indonesia_1 = number_format(array_sum($low_pemetaan_indonesia_1) / count($low_pemetaan_indonesia_1), 1, '.', '');
        }

        if(count($underlow_pemetaan_indonesia_1) == null)
        {
            $rata_underlow_pemetaan_indonesia_1 = 0;
        }
        if(count($underlow_pemetaan_indonesia_1) ==! null)
        {
            $rata_underlow_pemetaan_indonesia_1 = number_format(array_sum($underlow_pemetaan_indonesia_1) / count($underlow_pemetaan_indonesia_1), 1, '.', '');
        }
        // kelas 2 -----------------------
        if(count($high_pemetaan_matematika_2) == null)
        {
            $rata_high_pemetaan_matematika_2 = 0;
        }
        if(count($high_pemetaan_matematika_2) ==! null)
        {
            $rata_high_pemetaan_matematika_2 = number_format(array_sum($high_pemetaan_matematika_2) / count($high_pemetaan_matematika_2), 1, '.', '');
        }

        if(count($pass_pemetaan_matematika_2) == null)
        {
            $rata_pass_pemetaan_matematika_2 = 0;
        }
        if(count($pass_pemetaan_matematika_2) ==! null)
        {
            $rata_pass_pemetaan_matematika_2 = number_format(array_sum($pass_pemetaan_matematika_2) / count($pass_pemetaan_matematika_2), 1, '.', '');
        }

        if(count($low_pemetaan_matematika_2) == null)
        {
            $rata_low_pemetaan_matematika_2 = 0;
        }
        if(count($low_pemetaan_matematika_2) ==! null)
        {
            $rata_low_pemetaan_matematika_2 = number_format(array_sum($low_pemetaan_matematika_2) / count($low_pemetaan_matematika_2), 1, '.', '');
        }

        if(count($underlow_pemetaan_matematika_2) == null)
        {
            $rata_underlow_pemetaan_matematika_2 = 0;
        }
        if(count($underlow_pemetaan_matematika_2) ==! null)
        {
            $rata_underlow_pemetaan_matematika_2 = number_format(array_sum($underlow_pemetaan_matematika_2) / count($underlow_pemetaan_matematika_2), 1, '.', '');
        }

        if(count($high_pemetaan_indonesia_2) == null)
        {
            $rata_high_pemetaan_indonesia_2 = 0;
        }
        if(count($high_pemetaan_indonesia_2) ==! null)
        {
            $rata_high_pemetaan_indonesia_2 = number_format(array_sum($high_pemetaan_indonesia_2) / count($high_pemetaan_indonesia_2), 1, '.', '');
        }

        if(count($pass_pemetaan_indonesia_2) == null)
        {
            $rata_pass_pemetaan_indonesia_2 = 0;
        }
        if(count($pass_pemetaan_indonesia_2) ==! null)
        {
            $rata_pass_pemetaan_indonesia_2 = number_format(array_sum($pass_pemetaan_indonesia_2) / count($pass_pemetaan_indonesia_2), 1, '.', '');
        }

        if(count($low_pemetaan_indonesia_2) == null)
        {
            $rata_low_pemetaan_indonesia_2 = 0;
        }
        if(count($low_pemetaan_indonesia_2) ==! null)
        {
            $rata_low_pemetaan_indonesia_2 = number_format(array_sum($low_pemetaan_indonesia_2) / count($low_pemetaan_indonesia_2), 1, '.', '');
        }

        if(count($underlow_pemetaan_indonesia_2) == null)
        {
            $rata_underlow_pemetaan_indonesia_2 = 0;
        }
        if(count($underlow_pemetaan_indonesia_2) ==! null)
        {
            $rata_underlow_pemetaan_indonesia_2 = number_format(array_sum($underlow_pemetaan_indonesia_2) / count($underlow_pemetaan_indonesia_2), 1, '.', '');
        }
        // kelas 3 -----------------------
        if(count($high_pemetaan_matematika_3) == null)
        {
            $rata_high_pemetaan_matematika_3 = 0;
        }
        if(count($high_pemetaan_matematika_3) ==! null)
        {
            $rata_high_pemetaan_matematika_3 = number_format(array_sum($high_pemetaan_matematika_3) / count($high_pemetaan_matematika_3), 1, '.', '');
        }

        if(count($pass_pemetaan_matematika_3) == null)
        {
            $rata_pass_pemetaan_matematika_3 = 0;
        }
        if(count($pass_pemetaan_matematika_3) ==! null)
        {
            $rata_pass_pemetaan_matematika_3 = number_format(array_sum($pass_pemetaan_matematika_3) / count($pass_pemetaan_matematika_3), 1, '.', '');
        }

        if(count($low_pemetaan_matematika_3) == null)
        {
            $rata_low_pemetaan_matematika_3 = 0;
        }
        if(count($low_pemetaan_matematika_3) ==! null)
        {
            $rata_low_pemetaan_matematika_3 = number_format(array_sum($low_pemetaan_matematika_3) / count($low_pemetaan_matematika_3), 1, '.', '');
        }

        if(count($underlow_pemetaan_matematika_3) == null)
        {
            $rata_underlow_pemetaan_matematika_3 = 0;
        }
        if(count($underlow_pemetaan_matematika_3) ==! null)
        {
            $rata_underlow_pemetaan_matematika_3 = number_format(array_sum($underlow_pemetaan_matematika_3) / count($underlow_pemetaan_matematika_3), 1, '.', '');
        }

        if(count($high_pemetaan_indonesia_3) == null)
        {
            $rata_high_pemetaan_indonesia_3 = 0;
        }
        if(count($high_pemetaan_indonesia_3) ==! null)
        {
            $rata_high_pemetaan_indonesia_3 = number_format(array_sum($high_pemetaan_indonesia_3) / count($high_pemetaan_indonesia_3), 1, '.', '');
        }

        if(count($pass_pemetaan_indonesia_3) == null)
        {
            $rata_pass_pemetaan_indonesia_3 = 0;
        }
        if(count($pass_pemetaan_indonesia_3) ==! null)
        {
            $rata_pass_pemetaan_indonesia_3 = number_format(array_sum($pass_pemetaan_indonesia_3) / count($pass_pemetaan_indonesia_3), 1, '.', '');
        }

        if(count($low_pemetaan_indonesia_3) == null)
        {
            $rata_low_pemetaan_indonesia_3 = 0;
        }
        if(count($low_pemetaan_indonesia_3) ==! null)
        {
            $rata_low_pemetaan_indonesia_3 = number_format(array_sum($low_pemetaan_indonesia_3) / count($low_pemetaan_indonesia_3), 1, '.', '');
        }

        if(count($underlow_pemetaan_indonesia_3) == null)
        {
            $rata_underlow_pemetaan_indonesia_3 = 0;
        }
        if(count($underlow_pemetaan_indonesia_3) ==! null)
        {
            $rata_underlow_pemetaan_indonesia_3 = number_format(array_sum($underlow_pemetaan_indonesia_3) / count($underlow_pemetaan_indonesia_3), 1, '.', '');
        }
        // kelas 4 -----------------------
        if(count($high_pemetaan_matematika_4) == null)
        {
            $rata_high_pemetaan_matematika_4 = 0;
        }
        if(count($high_pemetaan_matematika_4) ==! null)
        {
            $rata_high_pemetaan_matematika_4 = number_format(array_sum($high_pemetaan_matematika_4) / count($high_pemetaan_matematika_4), 1, '.', '');
        }

        if(count($pass_pemetaan_matematika_4) == null)
        {
            $rata_pass_pemetaan_matematika_4 = 0;
        }
        if(count($pass_pemetaan_matematika_4) ==! null)
        {
            $rata_pass_pemetaan_matematika_4 = number_format(array_sum($pass_pemetaan_matematika_4) / count($pass_pemetaan_matematika_4), 1, '.', '');
        }

        if(count($low_pemetaan_matematika_4) == null)
        {
            $rata_low_pemetaan_matematika_4 = 0;
        }
        if(count($low_pemetaan_matematika_4) ==! null)
        {
            $rata_low_pemetaan_matematika_4 = number_format(array_sum($low_pemetaan_matematika_4) / count($low_pemetaan_matematika_4), 1, '.', '');
        }

        if(count($underlow_pemetaan_matematika_4) == null)
        {
            $rata_underlow_pemetaan_matematika_4 = 0;
        }
        if(count($underlow_pemetaan_matematika_4) ==! null)
        {
            $rata_underlow_pemetaan_matematika_4 = number_format(array_sum($underlow_pemetaan_matematika_4) / count($underlow_pemetaan_matematika_4), 1, '.', '');
        }

        if(count($high_pemetaan_indonesia_4) == null)
        {
            $rata_high_pemetaan_indonesia_4 = 0;
        }
        if(count($high_pemetaan_indonesia_4) ==! null)
        {
            $rata_high_pemetaan_indonesia_4 = number_format(array_sum($high_pemetaan_indonesia_4) / count($high_pemetaan_indonesia_4), 1, '.', '');
        }

        if(count($pass_pemetaan_indonesia_4) == null)
        {
            $rata_pass_pemetaan_indonesia_4 = 0;
        }
        if(count($pass_pemetaan_indonesia_4) ==! null)
        {
            $rata_pass_pemetaan_indonesia_4 = number_format(array_sum($pass_pemetaan_indonesia_4) / count($pass_pemetaan_indonesia_4), 1, '.', '');
        }

        if(count($low_pemetaan_indonesia_4) == null)
        {
            $rata_low_pemetaan_indonesia_4 = 0;
        }
        if(count($low_pemetaan_indonesia_4) ==! null)
        {
            $rata_low_pemetaan_indonesia_4 = number_format(array_sum($low_pemetaan_indonesia_4) / count($low_pemetaan_indonesia_4), 1, '.', '');
        }

        if(count($underlow_pemetaan_indonesia_4) == null)
        {
            $rata_underlow_pemetaan_indonesia_4 = 0;
        }
        if(count($underlow_pemetaan_indonesia_4) ==! null)
        {
            $rata_underlow_pemetaan_indonesia_4 = number_format(array_sum($underlow_pemetaan_indonesia_4) / count($underlow_pemetaan_indonesia_4), 1, '.', '');
        }
        // kelas 5 -----------------------
        if(count($high_pemetaan_matematika_5) == null)
        {
            $rata_high_pemetaan_matematika_5 = 0;
        }
        if(count($high_pemetaan_matematika_5) ==! null)
        {
            $rata_high_pemetaan_matematika_5 = number_format(array_sum($high_pemetaan_matematika_5) / count($high_pemetaan_matematika_5), 1, '.', '');
        }

        if(count($pass_pemetaan_matematika_5) == null)
        {
            $rata_pass_pemetaan_matematika_5 = 0;
        }
        if(count($pass_pemetaan_matematika_5) ==! null)
        {
            $rata_pass_pemetaan_matematika_5 = number_format(array_sum($pass_pemetaan_matematika_5) / count($pass_pemetaan_matematika_5), 1, '.', '');
        }

        if(count($low_pemetaan_matematika_5) == null)
        {
            $rata_low_pemetaan_matematika_5 = 0;
        }
        if(count($low_pemetaan_matematika_5) ==! null)
        {
            $rata_low_pemetaan_matematika_5 = number_format(array_sum($low_pemetaan_matematika_5) / count($low_pemetaan_matematika_5), 1, '.', '');
        }

        if(count($underlow_pemetaan_matematika_5) == null)
        {
            $rata_underlow_pemetaan_matematika_5 = 0;
        }
        if(count($underlow_pemetaan_matematika_5) ==! null)
        {
            $rata_underlow_pemetaan_matematika_5 = number_format(array_sum($underlow_pemetaan_matematika_5) / count($underlow_pemetaan_matematika_5), 1, '.', '');
        }

        if(count($high_pemetaan_indonesia_5) == null)
        {
            $rata_high_pemetaan_indonesia_5 = 0;
        }
        if(count($high_pemetaan_indonesia_5) ==! null)
        {
            $rata_high_pemetaan_indonesia_5 = number_format(array_sum($high_pemetaan_indonesia_5) / count($high_pemetaan_indonesia_5), 1, '.', '');
        }

        if(count($pass_pemetaan_indonesia_5) == null)
        {
            $rata_pass_pemetaan_indonesia_5 = 0;
        }
        if(count($pass_pemetaan_indonesia_5) ==! null)
        {
            $rata_pass_pemetaan_indonesia_5 = number_format(array_sum($pass_pemetaan_indonesia_5) / count($pass_pemetaan_indonesia_5), 1, '.', '');
        }

        if(count($low_pemetaan_indonesia_5) == null)
        {
            $rata_low_pemetaan_indonesia_5 = 0;
        }
        if(count($low_pemetaan_indonesia_5) ==! null)
        {
            $rata_low_pemetaan_indonesia_5 = number_format(array_sum($low_pemetaan_indonesia_5) / count($low_pemetaan_indonesia_5), 1, '.', '');
        }

        if(count($underlow_pemetaan_indonesia_5) == null)
        {
            $rata_underlow_pemetaan_indonesia_5 = 0;
        }
        if(count($underlow_pemetaan_indonesia_5) ==! null)
        {
            $rata_underlow_pemetaan_indonesia_5 = number_format(array_sum($underlow_pemetaan_indonesia_5) / count($underlow_pemetaan_indonesia_5), 1, '.', '');
        }
        // kelas 6 -----------------------
        if(count($high_pemetaan_matematika_6) == null)
        {
            $rata_high_pemetaan_matematika_6 = 0;
        }
        if(count($high_pemetaan_matematika_6) ==! null)
        {
            $rata_high_pemetaan_matematika_6 = number_format(array_sum($high_pemetaan_matematika_6) / count($high_pemetaan_matematika_6), 1, '.', '');
        }

        if(count($pass_pemetaan_matematika_6) == null)
        {
            $rata_pass_pemetaan_matematika_6 = 0;
        }
        if(count($pass_pemetaan_matematika_6) ==! null)
        {
            $rata_pass_pemetaan_matematika_6 = number_format(array_sum($pass_pemetaan_matematika_6) / count($pass_pemetaan_matematika_6), 1, '.', '');
        }

        if(count($low_pemetaan_matematika_6) == null)
        {
            $rata_low_pemetaan_matematika_6 = 0;
        }
        if(count($low_pemetaan_matematika_6) ==! null)
        {
            $rata_low_pemetaan_matematika_6 = number_format(array_sum($low_pemetaan_matematika_6) / count($low_pemetaan_matematika_6), 1, '.', '');
        }

        if(count($underlow_pemetaan_matematika_6) == null)
        {
            $rata_underlow_pemetaan_matematika_6 = 0;
        }
        if(count($underlow_pemetaan_matematika_6) ==! null)
        {
            $rata_underlow_pemetaan_matematika_6 = number_format(array_sum($underlow_pemetaan_matematika_6) / count($underlow_pemetaan_matematika_6), 1, '.', '');
        }

        if(count($high_pemetaan_indonesia_6) == null)
        {
            $rata_high_pemetaan_indonesia_6 = 0;
        }
        if(count($high_pemetaan_indonesia_6) ==! null)
        {
            $rata_high_pemetaan_indonesia_6 = number_format(array_sum($high_pemetaan_indonesia_6) / count($high_pemetaan_indonesia_6), 1, '.', '');
        }

        if(count($pass_pemetaan_indonesia_6) == null)
        {
            $rata_pass_pemetaan_indonesia_6 = 0;
        }
        if(count($pass_pemetaan_indonesia_6) ==! null)
        {
            $rata_pass_pemetaan_indonesia_6 = number_format(array_sum($pass_pemetaan_indonesia_6) / count($pass_pemetaan_indonesia_6), 1, '.', '');
        }

        if(count($low_pemetaan_indonesia_6) == null)
        {
            $rata_low_pemetaan_indonesia_6 = 0;
        }
        if(count($low_pemetaan_indonesia_6) ==! null)
        {
            $rata_low_pemetaan_indonesia_6 = number_format(array_sum($low_pemetaan_indonesia_6) / count($low_pemetaan_indonesia_6), 1, '.', '');
        }

        if(count($underlow_pemetaan_indonesia_6) == null)
        {
            $rata_underlow_pemetaan_indonesia_6 = 0;
        }
        if(count($underlow_pemetaan_indonesia_6) ==! null)
        {
            $rata_underlow_pemetaan_indonesia_6 = number_format(array_sum($underlow_pemetaan_indonesia_6) / count($underlow_pemetaan_indonesia_6), 1, '.', '');
        }
        //dd($siswa_underlow_pemetaan_indonesia_1);
        //dd(count($high_pemetaan_indonesia_1));
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
        //dd(number_format(array_sum($underlow_pemetaan_indonesia_total)/count($underlow_pemetaan_indonesia_total), 1, '.', ''));
        $matpel = ['Agama Islam','Agama Protestan','Agama Katolik','PPKn','Bahasa Indonesia','Matematika','IPA','IPS','PJOK','SBK'];
        $matpel_pemetaan = ['Bahasa Indonesia','Matematika'];
        $islam_average = $nilai->where('mapel_id',1)->pluck('nilai')->avg();
        $protestan_average = $nilai->where('mapel_id',2)->pluck('nilai')->avg();
        $katolik_average = $nilai->where('mapel_id',3)->pluck('nilai')->avg();
        $ppkn_average = $nilai->where('mapel_id',4)->pluck('nilai')->avg();
        $indonesia_average = $nilai->where('mapel_id',5)->pluck('nilai')->avg();
        $matematika_average = $nilai->where('mapel_id',6)->pluck('nilai')->avg();

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

        if(count($high_pemetaan_matematika_total +
                                     $pass_pemetaan_matematika_total +
                                     $low_pemetaan_matematika_total +
                                     $underlow_pemetaan_matematika_total) ==! 0)
        {
            $pemetaan_matematika_total = array_sum($high_pemetaan_matematika_total +
                                     $pass_pemetaan_matematika_total +
                                     $low_pemetaan_matematika_total +
                                     $underlow_pemetaan_matematika_total)/count($high_pemetaan_matematika_total +
                                     $pass_pemetaan_matematika_total +
                                     $low_pemetaan_matematika_total +
                                     $underlow_pemetaan_matematika_total);
        }
        if(count($high_pemetaan_matematika_total +
                                     $pass_pemetaan_matematika_total +
                                     $low_pemetaan_matematika_total +
                                     $underlow_pemetaan_matematika_total) == 0)
        {
            $pemetaan_matematika_total = 0.0;
        }
        if(count($high_pemetaan_indonesia_total +
                                     $pass_pemetaan_indonesia_total +
                                     $low_pemetaan_indonesia_total +
                                     $underlow_pemetaan_indonesia_total) ==! 0)
        {
            $pemetaan_indonesia_total = array_sum($high_pemetaan_indonesia_total +
                                     $pass_pemetaan_indonesia_total +
                                     $low_pemetaan_indonesia_total +
                                     $underlow_pemetaan_indonesia_total)/count($high_pemetaan_indonesia_total +
                                     $pass_pemetaan_indonesia_total +
                                     $low_pemetaan_indonesia_total +
                                     $underlow_pemetaan_indonesia_total);
        }
        if(count($high_pemetaan_indonesia_total +
                                     $pass_pemetaan_indonesia_total +
                                     $low_pemetaan_indonesia_total +
                                     $underlow_pemetaan_indonesia_total) == 0)
        {
            $pemetaan_indonesia_total = 0.0;
        }
        $this_month = number_format(($indonesia_average + $matematika_average)/2, 1, '.', '');
        $total_average = number_format((float)($pemetaan_indonesia_total + $pemetaan_matematika_total)/2, 1,'.','');
        $last_average = number_format(($this_month - $total_average), 1, '.', '');

        $std_dev_pemetaan_indonesia_total = ($high_pemetaan_indonesia_total +
                                     $pass_pemetaan_indonesia_total +
                                     $low_pemetaan_indonesia_total +
                                     $underlow_pemetaan_indonesia_total);
        $std_dev_pemetaan_matematika_total = ($high_pemetaan_matematika_total +
                                     $pass_pemetaan_matematika_total +
                                     $low_pemetaan_matematika_total +
                                     $underlow_pemetaan_matematika_total);

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
            'data_6' => $data_6,
            'data_5' => $data_5,
            'data_4' => $data_4,
            'data_3' => $data_3,
            'data_2' => $data_2,
            'data_1' => $data_1,

            'std_dev_pemetaan_matematika_total' => $std_dev_pemetaan_matematika_total,
            'std_dev_pemetaan_indonesia_total' => $std_dev_pemetaan_indonesia_total,

            'this_month' => $this_month,
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

            'underlow_pemetaan_indonesia_1' => $underlow_pemetaan_indonesia_1,
            'low_pemetaan_indonesia_1' => $low_pemetaan_indonesia_1,
            'pass_pemetaan_indonesia_1' => $pass_pemetaan_indonesia_1,
            'high_pemetaan_indonesia_1' => $high_pemetaan_indonesia_1,
            'underlow_pemetaan_matematika_1' => $underlow_pemetaan_matematika_1,
            'low_pemetaan_matematika_1' => $low_pemetaan_matematika_1,
            'pass_pemetaan_matematika_1' => $pass_pemetaan_matematika_1,
            'high_pemetaan_matematika_1' => $high_pemetaan_matematika_1,

            'rata_underlow_pemetaan_indonesia_1' => $rata_underlow_pemetaan_indonesia_1,
            'rata_low_pemetaan_indonesia_1' => $rata_low_pemetaan_indonesia_1,
            'rata_pass_pemetaan_indonesia_1' => $rata_pass_pemetaan_indonesia_1,
            'rata_high_pemetaan_indonesia_1' => $rata_high_pemetaan_indonesia_1,
            'rata_underlow_pemetaan_matematika_1' => $rata_underlow_pemetaan_matematika_1,
            'rata_low_pemetaan_matematika_1' => $rata_low_pemetaan_matematika_1,
            'rata_pass_pemetaan_matematika_1' => $rata_pass_pemetaan_matematika_1,
            'rata_high_pemetaan_matematika_1' => $rata_high_pemetaan_matematika_1,
            'siswa_rata_underlow_pemetaan_indonesia_1' => $siswa_rata_underlow_pemetaan_indonesia_1,
            'siswa_rata_low_pemetaan_indonesia_1' => $siswa_rata_low_pemetaan_indonesia_1,
            'siswa_rata_pass_pemetaan_indonesia_1' => $siswa_rata_pass_pemetaan_indonesia_1,
            'siswa_rata_high_pemetaan_indonesia_1' => $siswa_rata_high_pemetaan_indonesia_1,
            'siswa_rata_underlow_pemetaan_matematika_1' => $siswa_rata_underlow_pemetaan_matematika_1,
            'siswa_rata_low_pemetaan_matematika_1' => $siswa_rata_low_pemetaan_matematika_1,
            'siswa_rata_pass_pemetaan_matematika_1' => $siswa_rata_pass_pemetaan_matematika_1,
            'siswa_rata_high_pemetaan_matematika_1' => $siswa_rata_high_pemetaan_matematika_1,

            'underlow_pemetaan_indonesia_2' => $underlow_pemetaan_indonesia_2,
            'low_pemetaan_indonesia_2' => $low_pemetaan_indonesia_2,
            'pass_pemetaan_indonesia_2' => $pass_pemetaan_indonesia_2,
            'high_pemetaan_indonesia_2' => $high_pemetaan_indonesia_2,
            'underlow_pemetaan_matematika_2' => $underlow_pemetaan_matematika_2,
            'low_pemetaan_matematika_2' => $low_pemetaan_matematika_2,
            'pass_pemetaan_matematika_2' => $pass_pemetaan_matematika_2,
            'high_pemetaan_matematika_2' => $high_pemetaan_matematika_2,

            'rata_underlow_pemetaan_indonesia_2' => $rata_underlow_pemetaan_indonesia_2,
            'rata_low_pemetaan_indonesia_2' => $rata_low_pemetaan_indonesia_2,
            'rata_pass_pemetaan_indonesia_2' => $rata_pass_pemetaan_indonesia_2,
            'rata_high_pemetaan_indonesia_2' => $rata_high_pemetaan_indonesia_2,
            'rata_underlow_pemetaan_matematika_2' => $rata_underlow_pemetaan_matematika_2,
            'rata_low_pemetaan_matematika_2' => $rata_low_pemetaan_matematika_2,
            'rata_pass_pemetaan_matematika_2' => $rata_pass_pemetaan_matematika_2,
            'rata_high_pemetaan_matematika_2' => $rata_high_pemetaan_matematika_2,
            'siswa_rata_underlow_pemetaan_indonesia_2' => $siswa_rata_underlow_pemetaan_indonesia_2,
            'siswa_rata_low_pemetaan_indonesia_2' => $siswa_rata_low_pemetaan_indonesia_2,
            'siswa_rata_pass_pemetaan_indonesia_2' => $siswa_rata_pass_pemetaan_indonesia_2,
            'siswa_rata_high_pemetaan_indonesia_2' => $siswa_rata_high_pemetaan_indonesia_2,
            'siswa_rata_underlow_pemetaan_matematika_2' => $siswa_rata_underlow_pemetaan_matematika_2,
            'siswa_rata_low_pemetaan_matematika_2' => $siswa_rata_low_pemetaan_matematika_2,
            'siswa_rata_pass_pemetaan_matematika_2' => $siswa_rata_pass_pemetaan_matematika_2,
            'siswa_rata_high_pemetaan_matematika_2' => $siswa_rata_high_pemetaan_matematika_2,

            'underlow_pemetaan_indonesia_3' => $underlow_pemetaan_indonesia_3,
            'low_pemetaan_indonesia_3' => $low_pemetaan_indonesia_3,
            'pass_pemetaan_indonesia_3' => $pass_pemetaan_indonesia_3,
            'high_pemetaan_indonesia_3' => $high_pemetaan_indonesia_3,
            'underlow_pemetaan_matematika_3' => $underlow_pemetaan_matematika_3,
            'low_pemetaan_matematika_3' => $low_pemetaan_matematika_3,
            'pass_pemetaan_matematika_3' => $pass_pemetaan_matematika_3,
            'high_pemetaan_matematika_3' => $high_pemetaan_matematika_3,

            'rata_underlow_pemetaan_indonesia_3' => $rata_underlow_pemetaan_indonesia_3,
            'rata_low_pemetaan_indonesia_3' => $rata_low_pemetaan_indonesia_3,
            'rata_pass_pemetaan_indonesia_3' => $rata_pass_pemetaan_indonesia_3,
            'rata_high_pemetaan_indonesia_3' => $rata_high_pemetaan_indonesia_3,
            'rata_underlow_pemetaan_matematika_3' => $rata_underlow_pemetaan_matematika_3,
            'rata_low_pemetaan_matematika_3' => $rata_low_pemetaan_matematika_3,
            'rata_pass_pemetaan_matematika_3' => $rata_pass_pemetaan_matematika_3,
            'rata_high_pemetaan_matematika_3' => $rata_high_pemetaan_matematika_3,
            'siswa_rata_underlow_pemetaan_indonesia_3' => $siswa_rata_underlow_pemetaan_indonesia_3,
            'siswa_rata_low_pemetaan_indonesia_3' => $siswa_rata_low_pemetaan_indonesia_3,
            'siswa_rata_pass_pemetaan_indonesia_3' => $siswa_rata_pass_pemetaan_indonesia_3,
            'siswa_rata_high_pemetaan_indonesia_3' => $siswa_rata_high_pemetaan_indonesia_3,
            'siswa_rata_underlow_pemetaan_matematika_3' => $siswa_rata_underlow_pemetaan_matematika_3,
            'siswa_rata_low_pemetaan_matematika_3' => $siswa_rata_low_pemetaan_matematika_3,
            'siswa_rata_pass_pemetaan_matematika_3' => $siswa_rata_pass_pemetaan_matematika_3,
            'siswa_rata_high_pemetaan_matematika_3' => $siswa_rata_high_pemetaan_matematika_3,

            'underlow_pemetaan_indonesia_4' => $underlow_pemetaan_indonesia_4,
            'low_pemetaan_indonesia_4' => $low_pemetaan_indonesia_4,
            'pass_pemetaan_indonesia_4' => $pass_pemetaan_indonesia_4,
            'high_pemetaan_indonesia_4' => $high_pemetaan_indonesia_4,
            'underlow_pemetaan_matematika_4' => $underlow_pemetaan_matematika_4,
            'low_pemetaan_matematika_4' => $low_pemetaan_matematika_4,
            'pass_pemetaan_matematika_4' => $pass_pemetaan_matematika_4,
            'high_pemetaan_matematika_4' => $high_pemetaan_matematika_4,

            'rata_underlow_pemetaan_indonesia_4' => $rata_underlow_pemetaan_indonesia_4,
            'rata_low_pemetaan_indonesia_4' => $rata_low_pemetaan_indonesia_4,
            'rata_pass_pemetaan_indonesia_4' => $rata_pass_pemetaan_indonesia_4,
            'rata_high_pemetaan_indonesia_4' => $rata_high_pemetaan_indonesia_4,
            'rata_underlow_pemetaan_matematika_4' => $rata_underlow_pemetaan_matematika_4,
            'rata_low_pemetaan_matematika_4' => $rata_low_pemetaan_matematika_4,
            'rata_pass_pemetaan_matematika_4' => $rata_pass_pemetaan_matematika_4,
            'rata_high_pemetaan_matematika_4' => $rata_high_pemetaan_matematika_4,
            'siswa_rata_underlow_pemetaan_indonesia_4' => $siswa_rata_underlow_pemetaan_indonesia_4,
            'siswa_rata_low_pemetaan_indonesia_4' => $siswa_rata_low_pemetaan_indonesia_4,
            'siswa_rata_pass_pemetaan_indonesia_4' => $siswa_rata_pass_pemetaan_indonesia_4,
            'siswa_rata_high_pemetaan_indonesia_4' => $siswa_rata_high_pemetaan_indonesia_4,
            'siswa_rata_underlow_pemetaan_matematika_4' => $siswa_rata_underlow_pemetaan_matematika_4,
            'siswa_rata_low_pemetaan_matematika_4' => $siswa_rata_low_pemetaan_matematika_4,
            'siswa_rata_pass_pemetaan_matematika_4' => $siswa_rata_pass_pemetaan_matematika_4,
            'siswa_rata_high_pemetaan_matematika_4' => $siswa_rata_high_pemetaan_matematika_4,

            'underlow_pemetaan_indonesia_5' => $underlow_pemetaan_indonesia_5,
            'low_pemetaan_indonesia_5' => $low_pemetaan_indonesia_5,
            'pass_pemetaan_indonesia_5' => $pass_pemetaan_indonesia_5,
            'high_pemetaan_indonesia_5' => $high_pemetaan_indonesia_5,
            'underlow_pemetaan_matematika_5' => $underlow_pemetaan_matematika_5,
            'low_pemetaan_matematika_5' => $low_pemetaan_matematika_5,
            'pass_pemetaan_matematika_5' => $pass_pemetaan_matematika_5,
            'high_pemetaan_matematika_5' => $high_pemetaan_matematika_5,

            'rata_underlow_pemetaan_indonesia_5' => $rata_underlow_pemetaan_indonesia_5,
            'rata_low_pemetaan_indonesia_5' => $rata_low_pemetaan_indonesia_5,
            'rata_pass_pemetaan_indonesia_5' => $rata_pass_pemetaan_indonesia_5,
            'rata_high_pemetaan_indonesia_5' => $rata_high_pemetaan_indonesia_5,
            'rata_underlow_pemetaan_matematika_5' => $rata_underlow_pemetaan_matematika_5,
            'rata_low_pemetaan_matematika_5' => $rata_low_pemetaan_matematika_5,
            'rata_pass_pemetaan_matematika_5' => $rata_pass_pemetaan_matematika_5,
            'rata_high_pemetaan_matematika_5' => $rata_high_pemetaan_matematika_5,
            'siswa_rata_underlow_pemetaan_indonesia_5' => $siswa_rata_underlow_pemetaan_indonesia_5,
            'siswa_rata_low_pemetaan_indonesia_5' => $siswa_rata_low_pemetaan_indonesia_5,
            'siswa_rata_pass_pemetaan_indonesia_5' => $siswa_rata_pass_pemetaan_indonesia_5,
            'siswa_rata_high_pemetaan_indonesia_5' => $siswa_rata_high_pemetaan_indonesia_5,
            'siswa_rata_underlow_pemetaan_matematika_5' => $siswa_rata_underlow_pemetaan_matematika_5,
            'siswa_rata_low_pemetaan_matematika_5' => $siswa_rata_low_pemetaan_matematika_5,
            'siswa_rata_pass_pemetaan_matematika_5' => $siswa_rata_pass_pemetaan_matematika_5,
            'siswa_rata_high_pemetaan_matematika_5' => $siswa_rata_high_pemetaan_matematika_5,

            'underlow_pemetaan_indonesia_6' => $underlow_pemetaan_indonesia_6,
            'low_pemetaan_indonesia_6' => $low_pemetaan_indonesia_6,
            'pass_pemetaan_indonesia_6' => $pass_pemetaan_indonesia_6,
            'high_pemetaan_indonesia_6' => $high_pemetaan_indonesia_6,
            'underlow_pemetaan_matematika_6' => $underlow_pemetaan_matematika_6,
            'low_pemetaan_matematika_6' => $low_pemetaan_matematika_6,
            'pass_pemetaan_matematika_6' => $pass_pemetaan_matematika_6,
            'high_pemetaan_matematika_6' => $high_pemetaan_matematika_6,

            'rata_underlow_pemetaan_indonesia_6' => $rata_underlow_pemetaan_indonesia_6,
            'rata_low_pemetaan_indonesia_6' => $rata_low_pemetaan_indonesia_6,
            'rata_pass_pemetaan_indonesia_6' => $rata_pass_pemetaan_indonesia_6,
            'rata_high_pemetaan_indonesia_6' => $rata_high_pemetaan_indonesia_6,
            'rata_underlow_pemetaan_matematika_6' => $rata_underlow_pemetaan_matematika_6,
            'rata_low_pemetaan_matematika_6' => $rata_low_pemetaan_matematika_6,
            'rata_pass_pemetaan_matematika_6' => $rata_pass_pemetaan_matematika_6,
            'rata_high_pemetaan_matematika_6' => $rata_high_pemetaan_matematika_6,
            'siswa_rata_underlow_pemetaan_indonesia_6' => $siswa_rata_underlow_pemetaan_indonesia_6,
            'siswa_rata_low_pemetaan_indonesia_6' => $siswa_rata_low_pemetaan_indonesia_6,
            'siswa_rata_pass_pemetaan_indonesia_6' => $siswa_rata_pass_pemetaan_indonesia_6,
            'siswa_rata_high_pemetaan_indonesia_6' => $siswa_rata_high_pemetaan_indonesia_6,
            'siswa_rata_underlow_pemetaan_matematika_6' => $siswa_rata_underlow_pemetaan_matematika_6,
            'siswa_rata_low_pemetaan_matematika_6' => $siswa_rata_low_pemetaan_matematika_6,
            'siswa_rata_pass_pemetaan_matematika_6' => $siswa_rata_pass_pemetaan_matematika_6,
            'siswa_rata_high_pemetaan_matematika_6' => $siswa_rata_high_pemetaan_matematika_6,

            'underlow_pemetaan_indonesia_total' => $underlow_pemetaan_indonesia_total,
            'low_pemetaan_indonesia_total' => $low_pemetaan_indonesia_total,
            'pass_pemetaan_indonesia_total' => $pass_pemetaan_indonesia_total,
            'high_pemetaan_indonesia_total' => $high_pemetaan_indonesia_total,

            'underlow_pemetaan_matematika_total' => $underlow_pemetaan_matematika_total,
            'low_pemetaan_matematika_total' => $low_pemetaan_matematika_total,
            'pass_pemetaan_matematika_total' => $pass_pemetaan_matematika_total,
            'high_pemetaan_matematika_total' => $high_pemetaan_matematika_total,
            'pemetaan_indonesia_total' => $pemetaan_indonesia_total,
            'pemetaan_matematika_total' => $pemetaan_matematika_total,

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
