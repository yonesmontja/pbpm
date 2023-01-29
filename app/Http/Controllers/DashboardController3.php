<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $underlow_pemetaan_1 = [];
        $low_pemetaan_1 = [];
        $pass_pemetaan_1 = [];
        $high_pemetaan_1 = [];
        $islam_harian_1 = [];
        for($h=0; $h< count($siswa_1); $h++)
        {
            $i = $siswa_1[$h];
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

            $islam_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $islam_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $islam_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $islam_ul_fix = number_format(($islam_ul), 1, '.', '');
            $islam_latihan_fix = number_format(($islam_latihan), 1, '.', '');
            $islam_tugas_fix = number_format(($islam_tugas), 1, '.', '');
            $protestan_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $protestan_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $protestan_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $protestan_ul_fix = number_format(($protestan_ul), 1, '.', '');
            $protestan_latihan_fix = number_format(($protestan_latihan), 1, '.', '');
            $protestan_tugas_fix = number_format(($protestan_tugas), 1, '.', '');
            $katolik_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $katolik_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $katolik_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $katolik_ul_fix = number_format(($katolik_ul), 1, '.', '');
            $katolik_latihan_fix = number_format(($katolik_latihan), 1, '.', '');
            $katolik_tugas_fix = number_format(($katolik_tugas), 1, '.', '');
            $ppkn_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ppkn_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ppkn_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ppkn_ul_fix = number_format(($ppkn_ul), 1, '.', '');
            $ppkn_latihan_fix = number_format(($ppkn_latihan), 1, '.', '');
            $ppkn_tugas_fix = number_format(($ppkn_tugas), 1, '.', '');
            $indonesia_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $indonesia_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $indonesia_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $indonesia_ul_fix = number_format(($indonesia_ul), 1, '.', '');
            $indonesia_latihan_fix = number_format(($indonesia_latihan), 1, '.', '');
            $indonesia_tugas_fix = number_format(($indonesia_tugas), 1, '.', '');
            $matematika_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $matematika_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $matematika_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $matematika_ul_fix = number_format(($matematika_ul), 1, '.', '');
            $matematika_latihan_fix = number_format(($matematika_latihan), 1, '.', '');
            $matematika_tugas_fix = number_format(($matematika_tugas), 1, '.', '');
            $ipa_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ipa_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ipa_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ipa_ul_fix = number_format(($ipa_ul), 1, '.', '');
            $ipa_latihan_fix = number_format(($ipa_latihan), 1, '.', '');
            $ipa_tugas_fix = number_format(($ipa_tugas), 1, '.', '');
            $ips_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ips_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ips_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ips_ul_fix = number_format(($ips_ul), 1, '.', '');
            $ips_latihan_fix = number_format(($ips_latihan), 1, '.', '');
            $ips_tugas_fix = number_format(($ips_tugas), 1, '.', '');
            $pjok_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $pjok_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $pjok_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $pjok_ul_fix = number_format(($pjok_ul), 1, '.', '');
            $pjok_latihan_fix = number_format(($pjok_latihan), 1, '.', '');
            $pjok_tugas_fix = number_format(($pjok_tugas), 1, '.', '');
            $sbk_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $sbk_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $sbk_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $sbk_ul_fix = number_format(($sbk_ul), 1, '.', '');
            $sbk_latihan_fix = number_format(($sbk_latihan), 1, '.', '');
            $sbk_tugas_fix = number_format(($sbk_tugas), 1, '.', '');

            $islam_harian_1[$i] = number_format(($islam_ul_fix+$islam_latihan_fix+$islam_tugas_fix)/3, 1, '.', '');
            $protestan_harian_1[$i] = number_format(($protestan_ul_fix+$protestan_latihan_fix+$protestan_tugas_fix)/3, 1, '.', '');
            $sbk_harian_1[$i] = number_format(($sbk_ul_fix+$sbk_latihan_fix+$sbk_tugas_fix)/3, 1, '.', '');
            $pjok_harian_1[$i] = number_format(($pjok_ul_fix+$pjok_latihan_fix+$pjok_tugas_fix)/3, 1, '.', '');
            $ips_harian_1[$i] = number_format(($ips_ul_fix+$ips_latihan_fix+$ips_tugas_fix)/3, 1, '.', '');
            $ipa_harian_1[$i] = number_format(($ipa_ul_fix+$ipa_latihan_fix+$ipa_tugas_fix)/3, 1, '.', '');
            $matematika_harian_1[$i] = number_format(($matematika_ul_fix+$matematika_latihan_fix+$matematika_tugas_fix)/3, 1, '.', '');
            $indonesia_harian_1[$i] = number_format(($indonesia_ul_fix+$indonesia_latihan_fix+$indonesia_tugas_fix)/3, 1, '.', '');
            $ppkn_harian_1[$i] = number_format(($ppkn_ul_fix+$ppkn_latihan_fix+$ppkn_tugas_fix)/3, 1, '.', '');
            $katolik_harian_1[$i] = number_format(($katolik_ul_fix+$katolik_latihan_fix+$katolik_tugas_fix)/3, 1, '.', '');
        }
// ---------------------------------
        // Pemetaan dan nilai harian kelas 2
        $underlow_pemetaan_2 = [];
        $low_pemetaan_2 = [];
        $pass_pemetaan_2 = [];
        $high_pemetaan_2 = [];
        $islam_harian_2 = [];
        for($h=0; $h< count($siswa_2); $h++)
        {
            $i = $siswa_2[$h];
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
                $underlow_pemetaan_2[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm2)
            {
                $high_pemetaan_2[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm && $rata_pemetaan_awal[$i] < $kkm1)
            {
                $low_pemetaan_2[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm1 && $rata_pemetaan_awal[$i] < $kkm2)
            {
                $pass_pemetaan_2[$i] = $rata_pemetaan_awal[$i];
            }

            $islam_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $islam_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $islam_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $islam_ul_fix = number_format(($islam_ul), 1, '.', '');
            $islam_latihan_fix = number_format(($islam_latihan), 1, '.', '');
            $islam_tugas_fix = number_format(($islam_tugas), 1, '.', '');
            $protestan_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $protestan_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $protestan_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $protestan_ul_fix = number_format(($protestan_ul), 1, '.', '');
            $protestan_latihan_fix = number_format(($protestan_latihan), 1, '.', '');
            $protestan_tugas_fix = number_format(($protestan_tugas), 1, '.', '');
            $katolik_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $katolik_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $katolik_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $katolik_ul_fix = number_format(($katolik_ul), 1, '.', '');
            $katolik_latihan_fix = number_format(($katolik_latihan), 1, '.', '');
            $katolik_tugas_fix = number_format(($katolik_tugas), 1, '.', '');
            $ppkn_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ppkn_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ppkn_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ppkn_ul_fix = number_format(($ppkn_ul), 1, '.', '');
            $ppkn_latihan_fix = number_format(($ppkn_latihan), 1, '.', '');
            $ppkn_tugas_fix = number_format(($ppkn_tugas), 1, '.', '');
            $indonesia_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $indonesia_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $indonesia_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $indonesia_ul_fix = number_format(($indonesia_ul), 1, '.', '');
            $indonesia_latihan_fix = number_format(($indonesia_latihan), 1, '.', '');
            $indonesia_tugas_fix = number_format(($indonesia_tugas), 1, '.', '');
            $matematika_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $matematika_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $matematika_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $matematika_ul_fix = number_format(($matematika_ul), 1, '.', '');
            $matematika_latihan_fix = number_format(($matematika_latihan), 1, '.', '');
            $matematika_tugas_fix = number_format(($matematika_tugas), 1, '.', '');
            $ipa_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ipa_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ipa_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ipa_ul_fix = number_format(($ipa_ul), 1, '.', '');
            $ipa_latihan_fix = number_format(($ipa_latihan), 1, '.', '');
            $ipa_tugas_fix = number_format(($ipa_tugas), 1, '.', '');
            $ips_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ips_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ips_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ips_ul_fix = number_format(($ips_ul), 1, '.', '');
            $ips_latihan_fix = number_format(($ips_latihan), 1, '.', '');
            $ips_tugas_fix = number_format(($ips_tugas), 1, '.', '');
            $pjok_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $pjok_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $pjok_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $pjok_ul_fix = number_format(($pjok_ul), 1, '.', '');
            $pjok_latihan_fix = number_format(($pjok_latihan), 1, '.', '');
            $pjok_tugas_fix = number_format(($pjok_tugas), 1, '.', '');
            $sbk_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $sbk_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $sbk_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $sbk_ul_fix = number_format(($sbk_ul), 1, '.', '');
            $sbk_latihan_fix = number_format(($sbk_latihan), 1, '.', '');
            $sbk_tugas_fix = number_format(($sbk_tugas), 1, '.', '');

            $islam_harian_2[$i] = number_format(($islam_ul_fix+$islam_latihan_fix+$islam_tugas_fix)/3, 1, '.', '');
            $protestan_harian_2[$i] = number_format(($protestan_ul_fix+$protestan_latihan_fix+$protestan_tugas_fix)/3, 1, '.', '');
            $sbk_harian_2[$i] = number_format(($sbk_ul_fix+$sbk_latihan_fix+$sbk_tugas_fix)/3, 1, '.', '');
            $pjok_harian_2[$i] = number_format(($pjok_ul_fix+$pjok_latihan_fix+$pjok_tugas_fix)/3, 1, '.', '');
            $ips_harian_2[$i] = number_format(($ips_ul_fix+$ips_latihan_fix+$ips_tugas_fix)/3, 1, '.', '');
            $ipa_harian_2[$i] = number_format(($ipa_ul_fix+$ipa_latihan_fix+$ipa_tugas_fix)/3, 1, '.', '');
            $matematika_harian_2[$i] = number_format(($matematika_ul_fix+$matematika_latihan_fix+$matematika_tugas_fix)/3, 1, '.', '');
            $indonesia_harian_2[$i] = number_format(($indonesia_ul_fix+$indonesia_latihan_fix+$indonesia_tugas_fix)/3, 1, '.', '');
            $ppkn_harian_2[$i] = number_format(($ppkn_ul_fix+$ppkn_latihan_fix+$ppkn_tugas_fix)/3, 1, '.', '');
            $katolik_harian_2[$i] = number_format(($katolik_ul_fix+$katolik_latihan_fix+$katolik_tugas_fix)/3, 1, '.', '');
        }
        // ---------------------------------
        // Pemetaan dan nilai harian kelas 3
        $underlow_pemetaan_3 = [];
        $low_pemetaan_3 = [];
        $pass_pemetaan_3 = [];
        $high_pemetaan_3 = [];
        $islam_harian_3 = [];
        for($h=0; $h< count($siswa_3); $h++)
        {
            $i = $siswa_3[$h];
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
                $underlow_pemetaan_3[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm2)
            {
                $high_pemetaan_3[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm && $rata_pemetaan_awal[$i] < $kkm1)
            {
                $low_pemetaan_3[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm1 && $rata_pemetaan_awal[$i] < $kkm2)
            {
                $pass_pemetaan_3[$i] = $rata_pemetaan_awal[$i];
            }

            $islam_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $islam_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $islam_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $islam_ul_fix = number_format(($islam_ul), 1, '.', '');
            $islam_latihan_fix = number_format(($islam_latihan), 1, '.', '');
            $islam_tugas_fix = number_format(($islam_tugas), 1, '.', '');
            $protestan_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $protestan_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $protestan_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $protestan_ul_fix = number_format(($protestan_ul), 1, '.', '');
            $protestan_latihan_fix = number_format(($protestan_latihan), 1, '.', '');
            $protestan_tugas_fix = number_format(($protestan_tugas), 1, '.', '');
            $katolik_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $katolik_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $katolik_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $katolik_ul_fix = number_format(($katolik_ul), 1, '.', '');
            $katolik_latihan_fix = number_format(($katolik_latihan), 1, '.', '');
            $katolik_tugas_fix = number_format(($katolik_tugas), 1, '.', '');
            $ppkn_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ppkn_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ppkn_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ppkn_ul_fix = number_format(($ppkn_ul), 1, '.', '');
            $ppkn_latihan_fix = number_format(($ppkn_latihan), 1, '.', '');
            $ppkn_tugas_fix = number_format(($ppkn_tugas), 1, '.', '');
            $indonesia_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $indonesia_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $indonesia_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $indonesia_ul_fix = number_format(($indonesia_ul), 1, '.', '');
            $indonesia_latihan_fix = number_format(($indonesia_latihan), 1, '.', '');
            $indonesia_tugas_fix = number_format(($indonesia_tugas), 1, '.', '');
            $matematika_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $matematika_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $matematika_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $matematika_ul_fix = number_format(($matematika_ul), 1, '.', '');
            $matematika_latihan_fix = number_format(($matematika_latihan), 1, '.', '');
            $matematika_tugas_fix = number_format(($matematika_tugas), 1, '.', '');
            $ipa_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ipa_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ipa_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ipa_ul_fix = number_format(($ipa_ul), 1, '.', '');
            $ipa_latihan_fix = number_format(($ipa_latihan), 1, '.', '');
            $ipa_tugas_fix = number_format(($ipa_tugas), 1, '.', '');
            $ips_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ips_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ips_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ips_ul_fix = number_format(($ips_ul), 1, '.', '');
            $ips_latihan_fix = number_format(($ips_latihan), 1, '.', '');
            $ips_tugas_fix = number_format(($ips_tugas), 1, '.', '');
            $pjok_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $pjok_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $pjok_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $pjok_ul_fix = number_format(($pjok_ul), 1, '.', '');
            $pjok_latihan_fix = number_format(($pjok_latihan), 1, '.', '');
            $pjok_tugas_fix = number_format(($pjok_tugas), 1, '.', '');
            $sbk_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $sbk_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $sbk_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $sbk_ul_fix = number_format(($sbk_ul), 1, '.', '');
            $sbk_latihan_fix = number_format(($sbk_latihan), 1, '.', '');
            $sbk_tugas_fix = number_format(($sbk_tugas), 1, '.', '');

            $islam_harian_3[$i] = number_format(($islam_ul_fix+$islam_latihan_fix+$islam_tugas_fix)/3, 1, '.', '');
            $protestan_harian_3[$i] = number_format(($protestan_ul_fix+$protestan_latihan_fix+$protestan_tugas_fix)/3, 1, '.', '');
            $sbk_harian_3[$i] = number_format(($sbk_ul_fix+$sbk_latihan_fix+$sbk_tugas_fix)/3, 1, '.', '');
            $pjok_harian_3[$i] = number_format(($pjok_ul_fix+$pjok_latihan_fix+$pjok_tugas_fix)/3, 1, '.', '');
            $ips_harian_3[$i] = number_format(($ips_ul_fix+$ips_latihan_fix+$ips_tugas_fix)/3, 1, '.', '');
            $ipa_harian_3[$i] = number_format(($ipa_ul_fix+$ipa_latihan_fix+$ipa_tugas_fix)/3, 1, '.', '');
            $matematika_harian_3[$i] = number_format(($matematika_ul_fix+$matematika_latihan_fix+$matematika_tugas_fix)/3, 1, '.', '');
            $indonesia_harian_3[$i] = number_format(($indonesia_ul_fix+$indonesia_latihan_fix+$indonesia_tugas_fix)/3, 1, '.', '');
            $ppkn_harian_3[$i] = number_format(($ppkn_ul_fix+$ppkn_latihan_fix+$ppkn_tugas_fix)/3, 1, '.', '');
            $katolik_harian_3[$i] = number_format(($katolik_ul_fix+$katolik_latihan_fix+$katolik_tugas_fix)/3, 1, '.', '');
        }
        // ---------------------------------
        // Pemetaan dan nilai harian kelas 4
        $underlow_pemetaan_4 = [];
        $low_pemetaan_4 = [];
        $pass_pemetaan_4 = [];
        $high_pemetaan_4 = [];
        $islam_harian_4 = [];
        for($h=0; $h< count($siswa_4); $h++)
        {
            $i = $siswa_4[$h];
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
                $underlow_pemetaan_4[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm2)
            {
                $high_pemetaan_4[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm && $rata_pemetaan_awal[$i] < $kkm1)
            {
                $low_pemetaan_4[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm1 && $rata_pemetaan_awal[$i] < $kkm2)
            {
                $pass_pemetaan_4[$i] = $rata_pemetaan_awal[$i];
            }

            $islam_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $islam_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $islam_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $islam_ul_fix = number_format(($islam_ul), 1, '.', '');
            $islam_latihan_fix = number_format(($islam_latihan), 1, '.', '');
            $islam_tugas_fix = number_format(($islam_tugas), 1, '.', '');
            $protestan_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $protestan_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $protestan_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $protestan_ul_fix = number_format(($protestan_ul), 1, '.', '');
            $protestan_latihan_fix = number_format(($protestan_latihan), 1, '.', '');
            $protestan_tugas_fix = number_format(($protestan_tugas), 1, '.', '');
            $katolik_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $katolik_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $katolik_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $katolik_ul_fix = number_format(($katolik_ul), 1, '.', '');
            $katolik_latihan_fix = number_format(($katolik_latihan), 1, '.', '');
            $katolik_tugas_fix = number_format(($katolik_tugas), 1, '.', '');
            $ppkn_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ppkn_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ppkn_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ppkn_ul_fix = number_format(($ppkn_ul), 1, '.', '');
            $ppkn_latihan_fix = number_format(($ppkn_latihan), 1, '.', '');
            $ppkn_tugas_fix = number_format(($ppkn_tugas), 1, '.', '');
            $indonesia_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $indonesia_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $indonesia_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $indonesia_ul_fix = number_format(($indonesia_ul), 1, '.', '');
            $indonesia_latihan_fix = number_format(($indonesia_latihan), 1, '.', '');
            $indonesia_tugas_fix = number_format(($indonesia_tugas), 1, '.', '');
            $matematika_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $matematika_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $matematika_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $matematika_ul_fix = number_format(($matematika_ul), 1, '.', '');
            $matematika_latihan_fix = number_format(($matematika_latihan), 1, '.', '');
            $matematika_tugas_fix = number_format(($matematika_tugas), 1, '.', '');
            $ipa_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ipa_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ipa_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ipa_ul_fix = number_format(($ipa_ul), 1, '.', '');
            $ipa_latihan_fix = number_format(($ipa_latihan), 1, '.', '');
            $ipa_tugas_fix = number_format(($ipa_tugas), 1, '.', '');
            $ips_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ips_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ips_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ips_ul_fix = number_format(($ips_ul), 1, '.', '');
            $ips_latihan_fix = number_format(($ips_latihan), 1, '.', '');
            $ips_tugas_fix = number_format(($ips_tugas), 1, '.', '');
            $pjok_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $pjok_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $pjok_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $pjok_ul_fix = number_format(($pjok_ul), 1, '.', '');
            $pjok_latihan_fix = number_format(($pjok_latihan), 1, '.', '');
            $pjok_tugas_fix = number_format(($pjok_tugas), 1, '.', '');
            $sbk_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $sbk_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $sbk_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $sbk_ul_fix = number_format(($sbk_ul), 1, '.', '');
            $sbk_latihan_fix = number_format(($sbk_latihan), 1, '.', '');
            $sbk_tugas_fix = number_format(($sbk_tugas), 1, '.', '');

            $islam_harian_4[$i] = number_format(($islam_ul_fix+$islam_latihan_fix+$islam_tugas_fix)/3, 1, '.', '');
            $protestan_harian_4[$i] = number_format(($protestan_ul_fix+$protestan_latihan_fix+$protestan_tugas_fix)/3, 1, '.', '');
            $sbk_harian_4[$i] = number_format(($sbk_ul_fix+$sbk_latihan_fix+$sbk_tugas_fix)/3, 1, '.', '');
            $pjok_harian_4[$i] = number_format(($pjok_ul_fix+$pjok_latihan_fix+$pjok_tugas_fix)/3, 1, '.', '');
            $ips_harian_4[$i] = number_format(($ips_ul_fix+$ips_latihan_fix+$ips_tugas_fix)/3, 1, '.', '');
            $ipa_harian_4[$i] = number_format(($ipa_ul_fix+$ipa_latihan_fix+$ipa_tugas_fix)/3, 1, '.', '');
            $matematika_harian_4[$i] = number_format(($matematika_ul_fix+$matematika_latihan_fix+$matematika_tugas_fix)/3, 1, '.', '');
            $indonesia_harian_4[$i] = number_format(($indonesia_ul_fix+$indonesia_latihan_fix+$indonesia_tugas_fix)/3, 1, '.', '');
            $ppkn_harian_4[$i] = number_format(($ppkn_ul_fix+$ppkn_latihan_fix+$ppkn_tugas_fix)/3, 1, '.', '');
            $katolik_harian_4[$i] = number_format(($katolik_ul_fix+$katolik_latihan_fix+$katolik_tugas_fix)/3, 1, '.', '');
        }
        // ---------------------------------
        // Pemetaan dan nilai harian kelas 6
        $underlow_pemetaan_6 = [];
        $low_pemetaan_6 = [];
        $pass_pemetaan_6 = [];
        $high_pemetaan_6 = [];
        $islam_harian_6 = [];
        for($h=0; $h< count($siswa_6); $h++)
        {
            $i = $siswa_6[$h];
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
                $underlow_pemetaan_6[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm2)
            {
                $high_pemetaan_6[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm && $rata_pemetaan_awal[$i] < $kkm1)
            {
                $low_pemetaan_6[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm1 && $rata_pemetaan_awal[$i] < $kkm2)
            {
                $pass_pemetaan_6[$i] = $rata_pemetaan_awal[$i];
            }

            $islam_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $islam_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $islam_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $islam_ul_fix = number_format(($islam_ul), 1, '.', '');
            $islam_latihan_fix = number_format(($islam_latihan), 1, '.', '');
            $islam_tugas_fix = number_format(($islam_tugas), 1, '.', '');
            $protestan_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $protestan_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $protestan_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $protestan_ul_fix = number_format(($protestan_ul), 1, '.', '');
            $protestan_latihan_fix = number_format(($protestan_latihan), 1, '.', '');
            $protestan_tugas_fix = number_format(($protestan_tugas), 1, '.', '');
            $katolik_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $katolik_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $katolik_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $katolik_ul_fix = number_format(($katolik_ul), 1, '.', '');
            $katolik_latihan_fix = number_format(($katolik_latihan), 1, '.', '');
            $katolik_tugas_fix = number_format(($katolik_tugas), 1, '.', '');
            $ppkn_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ppkn_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ppkn_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ppkn_ul_fix = number_format(($ppkn_ul), 1, '.', '');
            $ppkn_latihan_fix = number_format(($ppkn_latihan), 1, '.', '');
            $ppkn_tugas_fix = number_format(($ppkn_tugas), 1, '.', '');
            $indonesia_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $indonesia_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $indonesia_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $indonesia_ul_fix = number_format(($indonesia_ul), 1, '.', '');
            $indonesia_latihan_fix = number_format(($indonesia_latihan), 1, '.', '');
            $indonesia_tugas_fix = number_format(($indonesia_tugas), 1, '.', '');
            $matematika_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $matematika_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $matematika_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $matematika_ul_fix = number_format(($matematika_ul), 1, '.', '');
            $matematika_latihan_fix = number_format(($matematika_latihan), 1, '.', '');
            $matematika_tugas_fix = number_format(($matematika_tugas), 1, '.', '');
            $ipa_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ipa_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ipa_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ipa_ul_fix = number_format(($ipa_ul), 1, '.', '');
            $ipa_latihan_fix = number_format(($ipa_latihan), 1, '.', '');
            $ipa_tugas_fix = number_format(($ipa_tugas), 1, '.', '');
            $ips_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ips_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ips_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ips_ul_fix = number_format(($ips_ul), 1, '.', '');
            $ips_latihan_fix = number_format(($ips_latihan), 1, '.', '');
            $ips_tugas_fix = number_format(($ips_tugas), 1, '.', '');
            $pjok_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $pjok_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $pjok_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $pjok_ul_fix = number_format(($pjok_ul), 1, '.', '');
            $pjok_latihan_fix = number_format(($pjok_latihan), 1, '.', '');
            $pjok_tugas_fix = number_format(($pjok_tugas), 1, '.', '');
            $sbk_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $sbk_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $sbk_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $sbk_ul_fix = number_format(($sbk_ul), 1, '.', '');
            $sbk_latihan_fix = number_format(($sbk_latihan), 1, '.', '');
            $sbk_tugas_fix = number_format(($sbk_tugas), 1, '.', '');

            $islam_harian_6[$i] = number_format(($islam_ul_fix+$islam_latihan_fix+$islam_tugas_fix)/3, 1, '.', '');
            $protestan_harian_6[$i] = number_format(($protestan_ul_fix+$protestan_latihan_fix+$protestan_tugas_fix)/3, 1, '.', '');
            $sbk_harian_6[$i] = number_format(($sbk_ul_fix+$sbk_latihan_fix+$sbk_tugas_fix)/3, 1, '.', '');
            $pjok_harian_6[$i] = number_format(($pjok_ul_fix+$pjok_latihan_fix+$pjok_tugas_fix)/3, 1, '.', '');
            $ips_harian_6[$i] = number_format(($ips_ul_fix+$ips_latihan_fix+$ips_tugas_fix)/3, 1, '.', '');
            $ipa_harian_6[$i] = number_format(($ipa_ul_fix+$ipa_latihan_fix+$ipa_tugas_fix)/3, 1, '.', '');
            $matematika_harian_6[$i] = number_format(($matematika_ul_fix+$matematika_latihan_fix+$matematika_tugas_fix)/3, 1, '.', '');
            $indonesia_harian_6[$i] = number_format(($indonesia_ul_fix+$indonesia_latihan_fix+$indonesia_tugas_fix)/3, 1, '.', '');
            $ppkn_harian_6[$i] = number_format(($ppkn_ul_fix+$ppkn_latihan_fix+$ppkn_tugas_fix)/3, 1, '.', '');
            $katolik_harian_6[$i] = number_format(($katolik_ul_fix+$katolik_latihan_fix+$katolik_tugas_fix)/3, 1, '.', '');
        }
        // ---------------------------------
        // Pemetaan dan nilai harian kelas 5
        $underlow_pemetaan_5 = [];
        $low_pemetaan_5 = [];
        $pass_pemetaan_5 = [];
        $high_pemetaan_5 = [];
        $islam_harian_5 = [];
        for($h=0; $h< count($siswa_5); $h++)
        {
            $i = $siswa_5[$h];
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
                $underlow_pemetaan_5[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm2)
            {
                $high_pemetaan_5[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm && $rata_pemetaan_awal[$i] < $kkm1)
            {
                $low_pemetaan_5[$i] = $rata_pemetaan_awal[$i];
            }
            if($rata_pemetaan_awal[$i] >= $kkm1 && $rata_pemetaan_awal[$i] < $kkm2)
            {
                $pass_pemetaan_5[$i] = $rata_pemetaan_awal[$i];
            }

            $islam_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $islam_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $islam_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $islam_ul_fix = number_format(($islam_ul), 1, '.', '');
            $islam_latihan_fix = number_format(($islam_latihan), 1, '.', '');
            $islam_tugas_fix = number_format(($islam_tugas), 1, '.', '');
            $protestan_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $protestan_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $protestan_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',2)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $protestan_ul_fix = number_format(($protestan_ul), 1, '.', '');
            $protestan_latihan_fix = number_format(($protestan_latihan), 1, '.', '');
            $protestan_tugas_fix = number_format(($protestan_tugas), 1, '.', '');
            $katolik_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $katolik_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $katolik_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',3)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $katolik_ul_fix = number_format(($katolik_ul), 1, '.', '');
            $katolik_latihan_fix = number_format(($katolik_latihan), 1, '.', '');
            $katolik_tugas_fix = number_format(($katolik_tugas), 1, '.', '');
            $ppkn_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ppkn_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ppkn_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',4)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ppkn_ul_fix = number_format(($ppkn_ul), 1, '.', '');
            $ppkn_latihan_fix = number_format(($ppkn_latihan), 1, '.', '');
            $ppkn_tugas_fix = number_format(($ppkn_tugas), 1, '.', '');
            $indonesia_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $indonesia_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $indonesia_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',5)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $indonesia_ul_fix = number_format(($indonesia_ul), 1, '.', '');
            $indonesia_latihan_fix = number_format(($indonesia_latihan), 1, '.', '');
            $indonesia_tugas_fix = number_format(($indonesia_tugas), 1, '.', '');
            $matematika_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $matematika_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $matematika_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',6)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $matematika_ul_fix = number_format(($matematika_ul), 1, '.', '');
            $matematika_latihan_fix = number_format(($matematika_latihan), 1, '.', '');
            $matematika_tugas_fix = number_format(($matematika_tugas), 1, '.', '');
            $ipa_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ipa_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ipa_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',7)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ipa_ul_fix = number_format(($ipa_ul), 1, '.', '');
            $ipa_latihan_fix = number_format(($ipa_latihan), 1, '.', '');
            $ipa_tugas_fix = number_format(($ipa_tugas), 1, '.', '');
            $ips_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $ips_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $ips_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',8)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $ips_ul_fix = number_format(($ips_ul), 1, '.', '');
            $ips_latihan_fix = number_format(($ips_latihan), 1, '.', '');
            $ips_tugas_fix = number_format(($ips_tugas), 1, '.', '');
            $pjok_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $pjok_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $pjok_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',9)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $pjok_ul_fix = number_format(($pjok_ul), 1, '.', '');
            $pjok_latihan_fix = number_format(($pjok_latihan), 1, '.', '');
            $pjok_tugas_fix = number_format(($pjok_tugas), 1, '.', '');
            $sbk_tugas = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $sbk_latihan = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $sbk_ul = $nilai->where('siswa_id','=',$i)
                                ->where('mapel_id','=',10)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $sbk_ul_fix = number_format(($sbk_ul), 1, '.', '');
            $sbk_latihan_fix = number_format(($sbk_latihan), 1, '.', '');
            $sbk_tugas_fix = number_format(($sbk_tugas), 1, '.', '');

            $islam_harian_5[$i] = number_format(($islam_ul_fix+$islam_latihan_fix+$islam_tugas_fix)/3, 1, '.', '');
            $protestan_harian_5[$i] = number_format(($protestan_ul_fix+$protestan_latihan_fix+$protestan_tugas_fix)/3, 1, '.', '');
            $sbk_harian_5[$i] = number_format(($sbk_ul_fix+$sbk_latihan_fix+$sbk_tugas_fix)/3, 1, '.', '');
            $pjok_harian_5[$i] = number_format(($pjok_ul_fix+$pjok_latihan_fix+$pjok_tugas_fix)/3, 1, '.', '');
            $ips_harian_5[$i] = number_format(($ips_ul_fix+$ips_latihan_fix+$ips_tugas_fix)/3, 1, '.', '');
            $ipa_harian_5[$i] = number_format(($ipa_ul_fix+$ipa_latihan_fix+$ipa_tugas_fix)/3, 1, '.', '');
            $matematika_harian_5[$i] = number_format(($matematika_ul_fix+$matematika_latihan_fix+$matematika_tugas_fix)/3, 1, '.', '');
            $indonesia_harian_5[$i] = number_format(($indonesia_ul_fix+$indonesia_latihan_fix+$indonesia_tugas_fix)/3, 1, '.', '');
            $ppkn_harian_5[$i] = number_format(($ppkn_ul_fix+$ppkn_latihan_fix+$ppkn_tugas_fix)/3, 1, '.', '');
            $katolik_harian_5[$i] = number_format(($katolik_ul_fix+$katolik_latihan_fix+$katolik_tugas_fix)/3, 1, '.', '');
        }
        dd($pass_pemetaan_5);
        $matpel = ['Agama Islam','Agama Protestan','Agama Katolik','PPKn','Bahasa Indonesia','Matematika','IPA','IPS','PJOK','SBK'];
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
            'underlow_pemetaan_2' => $underlow_pemetaan_2,
            'low_pemetaan_2' => $low_pemetaan_2,
            'pass_pemetaan_2' => $pass_pemetaan_2,
            'high_pemetaan_2' => $high_pemetaan_2,
            'underlow_pemetaan_3' => $underlow_pemetaan_3,
            'low_pemetaan_3' => $low_pemetaan_3,
            'pass_pemetaan_3' => $pass_pemetaan_3,
            'high_pemetaan_3' => $high_pemetaan_3,
            'underlow_pemetaan_4' => $underlow_pemetaan_4,
            'low_pemetaan_4' => $low_pemetaan_4,
            'pass_pemetaan_4' => $pass_pemetaan_4,
            'high_pemetaan_4' => $high_pemetaan_4,
            'underlow_pemetaan_5' => $underlow_pemetaan_5,
            'low_pemetaan_5' => $low_pemetaan_5,
            'pass_pemetaan_5' => $pass_pemetaan_5,
            'high_pemetaan_5' => $high_pemetaan_5,
            'underlow_pemetaan_6' => $underlow_pemetaan_6,
            'low_pemetaan_6' => $low_pemetaan_6,
            'pass_pemetaan_6' => $pass_pemetaan_6,
            'high_pemetaan_6' => $high_pemetaan_6,

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
