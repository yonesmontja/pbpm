<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Tahunpel;
use App\Models\Penilaian;
use App\Models\Kompetensiinti;
use App\Models\Tahunpelajaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
    	$nilai = Nilai::all();
        $user = User::all();
        $id = Auth::id();
        $guru = Guru::where('user_id', '=', $id)->pluck('id')->first();
        $siswaall = Siswa::all();
        $idsiswa_1 = $siswaall->where('kelas','=','Kelas 1');
        $idsiswa_2 = $siswaall->where('kelas','=','Kelas 2');
        $idsiswa_3 = $siswaall->where('kelas','=','Kelas 3');
        $idsiswa_4 = $siswaall->where('kelas','=','Kelas 4');
        $idsiswa_5 = $siswaall->where('kelas','=','Kelas 5');
        $idsiswa_6 = $siswaall->where('kelas','=','Kelas 6');
        // menampung id siswa per kelas
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
        //dd($siswa_6);
        // kkm dan rentang nilai
        $kkm = 65;
        $kkm1 = $kkm + (100-$kkm)/3;
        $kkm2 = $kkm1 + (100-$kkm)/3;
        // ---------------------------------
        // Pemetaan kelas 1
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

        foreach ($nilai->where('penilaian_id', '=', 6) as $m => $n)
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
        //dd($siswa_low_pemetaan_indonesia_1);
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
        // $sumbux = [];
        // $sumbuy = [];
        // foreach($nilai as $mnp){
        //         $sumbux[] = $mnp->nilai;
        //         //$sumbuy[] = $mnp -> mapel -> nama_mapel;
        // }
        // foreach($nilai as $mnp){
        //     //$sumbux[] = $mnp->nilai;
        //     $sumbuy[] = $mnp -> mapel -> nama_mapel;
        // }
        // inisiasi
        $hpit = 0;
        $hpmt = 0;
        $ppit = 0;
        $ppmt = 0;
        $lpit = 0;
        $lpmt = 0;
        $ulpit = 0;
        $ulpmt = 0;

        if($high_pemetaan_indonesia_total ==! 0)
        {
            $hpit = number_format(array_sum($high_pemetaan_indonesia_total) / count($high_pemetaan_indonesia_total), 1, '.', '');
        }
        if($high_pemetaan_indonesia_total == 0)
        {
            $hpit = 0;
        }
        //dd($hpit);
        if($high_pemetaan_matematika_total ==! 0)
        {
            $hpmt = number_format(array_sum($high_pemetaan_matematika_total) / count($high_pemetaan_matematika_total), 1, '.', '');
        }
        if($high_pemetaan_matematika_total == 0)
        {
            $hpmt = 0;
        }

        if($pass_pemetaan_indonesia_total ==! 0)
        {
            $ppit = number_format(array_sum($pass_pemetaan_indonesia_total) / count($pass_pemetaan_indonesia_total), 1, '.', '');
        }
        if($pass_pemetaan_indonesia_total == 0)
        {
            $ppit = 0;
        }
        if($pass_pemetaan_matematika_total ==! 0)
        {
            $ppmt = number_format(array_sum($pass_pemetaan_matematika_total) / count($pass_pemetaan_matematika_total), 1, '.', '');
        }
        if($pass_pemetaan_matematika_total == 0)
        {
            $ppmt = 0;
        }

        if($low_pemetaan_indonesia_total ==! 0)
        {
            $lpit = number_format(array_sum($low_pemetaan_indonesia_total) / count($low_pemetaan_indonesia_total), 1, '.', '');
        }
        if($low_pemetaan_indonesia_total == 0)
        {
            $lpit = 0;
        }
        if($low_pemetaan_matematika_total ==! 0)
        {
            $lpmt = number_format(array_sum($low_pemetaan_matematika_total) / count($low_pemetaan_matematika_total), 1, '.', '');
        }
        if($low_pemetaan_matematika_total == 0)
        {
            $lpmt = 0;
        }

        if($underlow_pemetaan_indonesia_total ==! 0)
        {
            $ulpit = number_format(array_sum($underlow_pemetaan_indonesia_total) / count($underlow_pemetaan_indonesia_total), 1, '.', '');
        }
        if($underlow_pemetaan_indonesia_total == 0)
        {
            $ulpit = 0;
        }
        if($underlow_pemetaan_matematika_total ==! 0)
        {
            $ulpmt = number_format(array_sum($underlow_pemetaan_matematika_total) / count($underlow_pemetaan_matematika_total), 1, '.', '');
        }
        if($underlow_pemetaan_matematika_total == 0)
        {
            $ulpmt = 0;
        }

        return view('dashboards.index',[
            'data_6' => $data_6,
            'data_5' => $data_5,
            'data_4' => $data_4,
            'data_3' => $data_3,
            'data_2' => $data_2,
            'data_1' => $data_1,

            'guru' => $guru,

            'hpit' => $hpit,
            'hpmt' => $hpmt,
            'ppmt' => $ppmt,
            'ppit' => $ppit,
            'lpit' => $lpit,
            'lpmt' => $lpmt,
            'ulpmt' => $ulpmt,
            'ulpit' => $ulpit,

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
            // 'sumbux'=>$sumbux,
            // 'sumbuy'=>$sumbuy
        ]);
    }
    public function dashboard_siswa()
    {
        // kkm dan rentang nilai
        // Retrieve the currently authenticated user...
        $user = Auth::user();
        // Retrieve the currently authenticated user's ID...
        $id = Auth::id();
        $user1 = User::find($id);
        //dd($user1->siswa->nama_depan);
        $kkm = 65;
        $kkm1 = $kkm + (100-$kkm)/3;
        $kkm2 = $kkm1 + (100-$kkm)/3;
        return view('dashboards.dashboard_siswa',[
            'kkm' => $kkm,
            'kkm1' => $kkm1,
            'kkm2' => $kkm2,
            'user' => $user,
            'user1' => $user1,
            'id' => $id,
        ]);
    }
    public function dashboard_guru()
    {
        // kkm dan rentang nilai
        // Retrieve the currently authenticated user...
        //$user = Auth::user();
        // Retrieve the currently authenticated user's ID...
        $id = Auth::id();
        //dd($id);
        //$user1 = User::find($id)->pluck('id');

        //dd($user1);
        $guru = Guru::where('user_id', '=', $id)->pluck('id')->first();
        $nama_guru = Guru::where('user_id', '=', $id)->pluck('nama_guru')->first();
        //dd($nama_guru);

        //$data_siswa = Siswa::orderBy('nama_depan')->get();

        //$kelas = Kelas::all();
        //$rombel = Rombel::all();

        if (auth()->user()->role == 'guru') {
            // mengambil data siswa yang sudah memiliki rombel dan menampilkannya sesuai user()->role == guru
            // langkah pertama ambil id user yg role == guru dan sedang buka route /test
            $id_user = auth()->user()->id;
            // lalu cari id guru dengan user_id == $id_user
            $id_guru = Guru::where('user_id', '=', $id_user)->pluck('id')->first();
            // lalu tampilkan data siswa rombel yang memiliki guru_id == $id_guru
            $rombel2 = Rombel::where('guru_id', '=', $id_guru)->pluck('id')->first();
            $rombel23 = Rombel::where('guru_id', '=', $id_guru)->pluck('kelas_id')->first();
            $rombel3 = DB::table('rombel_siswa')->where('rombel_id', '=', $rombel2)->pluck('siswa_id')->toArray();
            //dd($rombel3);
            $tampung_islam = [];
            $tampung_katolik = [];
            $tampung_protestan = [];
            $tampung_female = [];
            $tampung_male = [];
            //dd($tampung_islam);
            foreach ($rombel3 as $z => $zefa) {
                if (Siswa::where('kelas_id', '=', $rombel23)->find($zefa)->jenis_kelamin == 'Perempuan') {
                    $tampung_female[] = Siswa::where('kelas_id', '=', $rombel23)->find($zefa);
                }
                if (Siswa::where('kelas_id', '=', $rombel23)->find($zefa)->jenis_kelamin == 'Laki-laki') {
                    $tampung_male[] = Siswa::where('kelas_id', '=', $rombel23)->find($zefa);
                }
                if (Siswa::where('kelas_id', '=', $rombel23)->find($zefa)->agama == 'Islam' || Siswa::where('kelas_id', '=', $rombel23)->find($zefa)->agama == 'islam') {
                    $tampung_islam[] = Siswa::where('kelas_id', '=', $rombel23)->find($zefa);
                }
                if (Siswa::where('kelas_id', '=', $rombel23)->find($zefa)->agama == 'katolik' || Siswa::where('kelas_id', '=', $rombel23)->find($zefa)->agama == 'Katolik') {
                    $tampung_katolik[] = Siswa::where('kelas_id', '=', $rombel23)->find($zefa);
                }
                if (
                    Siswa::where('kelas_id', '=', $rombel23)->find($zefa)->agama == 'Kristen Protestan' || Siswa::where('kelas_id', '=', $rombel23)->find($zefa)->agama == 'kristen protestan'
                ) {
                    $tampung_protestan[] = Siswa::where('kelas_id', '=', $rombel23)->find($zefa);
                }
            }
        }

        $kkm = 65;
        $kkm1 = $kkm + (100 - $kkm) / 3;
        $kkm2 = $kkm1 + (100 - $kkm) / 3;
        //$data_nilai = Nilai::where('guru_id', '=', $guru)->count();

        //$kompetensiinti = Kompetensiinti::all();
        //$mapel = Mapel::all();
        //$siswa = Siswa::all();
        //$penilaian = Penilaian::all();

        $nama_rombel = Rombel::where('guru_id', '=', $guru)->pluck('rombel')->first();
        $guru_rombel = Rombel::where('guru_id', '=', $guru)->pluck('id')->first();
        $kelas_rombel = Rombel::where('guru_id', '=', $guru)->pluck('kelas_id')->first();
        //dd($kelas_rombel);
        //dd($guru_rombel);
        //$rombel = DB::table('rombel_siswa')->where('rombel_id', '=', $guru_rombel)->pluck('rombel_id')->first();
        //dd($guru);
        //$kelas = Kelas::where('guru_id', '=', $guru)->pluck('nama');

        //dd($kelas);
        //$nilai_start = Tahunpelajaran::where('id', '=', 2)->pluck('tahun');
        //$nilai_end = Tahunpelajaran::where('id', '=', 1)->pluck('tahun');
        //$kelas_sub = Siswa::where('kelas_id', 0)->get();
        //$tahunpel = Tahunpel::all();
        //$rombel = Rombel::all();
        //dd($kelas_sub);
        // for ($bulan = 1; $bulan < 7; $bulan++) {
        //     $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
        //     $jumlah_penilaian[] = $chart_penilaian->jumlah;
        // }
        return view('dashboards.dashboard_guru', [
            'tampung_islam' => $tampung_islam,
            'tampung_katolik' => $tampung_katolik,
            'tampung_protestan' => $tampung_protestan,
            'tampung_female' => $tampung_female,
            'tampung_male' => $tampung_male,
            'kkm' => $kkm,
            'kkm1' => $kkm1,
            'kkm2' => $kkm2,
            //'user' => $user,
            //'user1' => $user1,
            'id' => $id,
            //'rombel' => $rombel,
            'nama_rombel' => $nama_rombel,
            'guru_rombel' => $guru_rombel,
            'kelas_rombel' => $kelas_rombel,
            'jumlah_penilaian' => $jumlah_penilaian,
            'kelas_sub' => $kelas_sub,
            'nilai_start' => $nilai_start,
            'nilai_end' => $nilai_end,
            'tahunpel' => $tahunpel,
            //'kelas' => $kelas,
            //'penilaian' => //,
            //'siswa' => $siswa,
            //'mapel' => $mapel,
            //'kompetensiinti' => $kompetensiinti,
            //'data_nilai' => $data_nilai,
            'guru' => $guru,
            'nama_guru' => $nama_guru
        ]);
    }
}
