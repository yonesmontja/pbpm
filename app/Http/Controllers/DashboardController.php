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
        $totalsiswa = Siswa::all()->count();
        $idsiswa = Siswa::all()->where('kelas','=','Kelas 1');
        //dd($idsiswa);
        $jumlah_siswa1 = Nilai::all()->where('kelas_id','=',1)->pluck('kelas_id','siswa_id');
        $jumlah_siswa2 = Nilai::all()->where('kelas_id','=',2)->pluck('kelas_id','siswa_id');
        $jumlah_siswa3 = Nilai::all()->where('kelas_id','=',3)->pluck('kelas_id','siswa_id');
        $jumlah_siswa4 = Nilai::all()->where('kelas_id','=',4)->pluck('kelas_id','siswa_id');
        $jumlah_siswa5 = Nilai::all()->where('kelas_id','=',5)->pluck('kelas_id','siswa_id');
        $jumlah_siswa6 = Nilai::all()->where('kelas_id','=',1);

        foreach ($idsiswa as $user) {
            $siswa_nilais_ul[] = $user->nama_depan;
        }
        //dd($siswa_nilais_ul);
        //$jumlah_siswa6_array = collect($jumlah_siswa6a)->toArray();
        //dd($jumlah_siswa6_array);
        $nilais_ul = Nilai::pluck('nilai', 'siswa_id');
        // kkm dan rentang nilai
        $kkm = 65;
        $kkm1 = $kkm + (100-$kkm)/3;
        $kkm2 = $kkm1 + (100-$kkm)/3;
        // ---------------------------------
        $high = 457;
        //kelas 1 437 s.d. 501
        for($i=437; $i<= 500; $i++)
        {
            $islam_tugas = Nilai::all()->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $islam_latihan = Nilai::all()->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $islam_ul = Nilai::all()->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $islam_ul_fix = number_format(($islam_ul), 1, '.', '');
            $islam_latihan_fix = number_format(($islam_latihan), 1, '.', '');
            $islam_tugas_fix = number_format(($islam_tugas), 1, '.', '');
            $protestan_tugas = Nilai::all()->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',1)
                                ->pluck('nilai')->avg();
            $protestan_latihan = Nilai::all()->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
            $protestan_ul = Nilai::all()->where('siswa_id','=',$i)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
            $protestan_ul_fix = number_format(($protestan_ul), 1, '.', '');
            $protestan_latihan_fix = number_format(($protestan_latihan), 1, '.', '');
            $protestan_tugas_fix = number_format(($protestan_tugas), 1, '.', '');

            $islam_harian[] = number_format(($islam_ul_fix+$islam_latihan_fix+$islam_tugas_fix)/3, 1, '.', '');
        }

        foreach($islam_harian as $i)
        {
            if($i < $kkm)
            {
                $under_low[] = $i;
            }
        }
        //dd(count($under_low));


        $siswa_ul = Nilai::all()
            -> where('penilaian_id','=',6)
            -> where('nilai','<',$kkm)
            -> count();

        $id_siswa_ul = collect(Nilai::all()-> where('nilai','<', $kkm)) -> sortBy('siswa_id');
        $siswa_h = Nilai::all()
            -> where('penilaian_id','=',6)
            -> where('nilai','>=',$kkm2)
            -> count();
        $siswa_p = Nilai::all()
            -> where('penilaian_id','=',6)
            -> whereBetween('nilai',[$kkm1, $kkm2])
            -> count();
        $siswa_l = Nilai::all()
            -> where('penilaian_id','=',6)
            -> whereBetween('nilai',[$kkm, $kkm1])
            -> count();
        //dd($siswa_p);

        //dd(Nilai::all()->where('siswa_id','=',$high)->where('mapel_id','=',1)->where('penilaian_id','=',1));
        $islam_latihan = Nilai::all()->where('siswa_id','=',$high)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();

        $islam_harian[1] = number_format(($islam_latihan), 1, '.', '');
        $islam_ul = Nilai::all()->where('siswa_id','=',$high)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',3)
                                ->pluck('nilai')->avg();
        $islam_harian[2] = number_format(($islam_ul), 1, '.', '');
        //dd($islam_harian);
        $islam_tugas4 = Nilai::all()->where('siswa_id','=',$high)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
        $islam_tugas[3] = number_format(($islam_tugas4), 1, '.', '');
        $islam_tugas5 = Nilai::all()->where('siswa_id','=',$high)
                                ->where('mapel_id','=',1)
                                ->where('penilaian_id','=',2)
                                ->pluck('nilai')->avg();
        $islam_tugas[4] = number_format(($islam_tugas5), 1, '.', '');
        //$islam_tugas = $islam_tugas1 + $islam_tugas2 +$islam_tugas3 +$islam_tugas4 +$islam_tugas5;


        //dd($islam_tugas);
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
        return view('dashboards.index',[
            'siswa_h' => $siswa_h,
            'siswa_p' => $siswa_p,
            'siswa_l' => $siswa_l,
            'siswa_ul' => $siswa_ul,
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
