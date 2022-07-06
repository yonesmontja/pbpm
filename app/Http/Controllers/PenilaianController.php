<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PenilaianController extends Controller
{
    //
    public function profile($id)
    {
    	$mapel = Mapel::all();
        $penilaian1 = Penilaian::find($id);
        $jml_kelas_penilaian = Nilai::where('penilaian_id','=',$id)->where('kelas_id','=',1)->pluck('penilaian_id','kelas_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('kelas_id','=',2)->pluck('penilaian_id','kelas_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('kelas_id','=',3)->pluck('penilaian_id','kelas_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('kelas_id','=',4)->pluck('penilaian_id','kelas_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('kelas_id','=',5)->pluck('penilaian_id','kelas_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('kelas_id','=',6)->pluck('penilaian_id','kelas_id')->count();
        //dd(Nilai::where('penilaian_id','=',$id)->where('kelas_id','=',1)->pluck('penilaian_id','kelas_id')->count());
        $jml_mapel_penilaian = Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',1)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',2)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',3)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',4)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',5)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',6)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',7)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',8)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',9)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',10)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',11)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',12)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('penilaian_id','=',$id)->where('mapel_id','=',13)->pluck('penilaian_id','mapel_id')->count();
        $jml_siswa_penilaian = Nilai::where('penilaian_id','=',$id)->select('siswa_id','penilaian_id')->pluck('penilaian_id','siswa_id')->count();
        //dd($jml_siswa_penilaian);
        $nilai = Nilai::all()->where('penilaian_id',$id);

        $nilai1 = Nilai::all();
        $tes2 = [];
        $nama_tes = "Tugas 2";
        foreach($nilai1 as $key){
            if($penilaian1->where('nama_tes','=',$nama_tes)){
                $tes2[] = $key->penilaian->nama_tes;
            }
        }
        //dd($tes2);
        //foreach($nilai -)
        $mapel = Mapel::all();


        //dd($nama_siswa);


        $nilai_rata_siswa = Nilai::all()->where('penilaian_id','=',$id);
        //hitung nilai rata-rata kelas untuk semua mapel
        $rata_kelas1 = Nilai::all()->where('penilaian_id','=',$id)->pluck('nilai')->avg();
        $rata_kelas = number_format((float)$rata_kelas1, 1, '.', '');
        //-----------------------------------------------


        //$nilai = Nilai::all();
        $user = User::all();
        // hitung nilai rata-rata per mapel $chart_nilai[] untuk ditampilkan di grafik
        for($bulan=1; $bulan < 7; $bulan++){
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where penilaian_id='$id' AND month(created_at)='$bulan'"))->first();
            //$chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            (int)$chart_nilai1[] = Nilai::whereMonth('created_at','=',$bulan)->where('penilaian_id','=',$id)->pluck('nilai')->avg();
            //(int)$chart_nilai1[] = Nilai::whereMonth('created_at','=',$bulan)->pluck('nilai')->avg();

            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($chart_nilai1);
        // ambil data nilai siswa 3 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(3);
        $weekE = Carbon::now()->startOfWeek();
        for($mapel=1; $mapel < 11; $mapel++)
        {
            $mapel_last_3month[] = Nilai::where('mapel_id','=',$mapel)->where('penilaian_id','=',$id)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$dateS,$dateE])
            ->avg('nilai');
            $mapel_last_3week[] = Nilai::where('mapel_id','=',$mapel)->where('penilaian_id','=',$id)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$weekS,$weekE])
            ->avg('nilai');
        }
        $TotalSpent3 = DB::table('nilai')->where('penilaian_id','=',$id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent3 = DB::table('nilai')->where('penilaian_id','=',$id)
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
            $mapel_last_2month[] = Nilai::where('mapel_id','=',$mapel)->where('penilaian_id','=',$id)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$dateS,$dateE])
            ->avg('nilai');
             $mapel_last_2week[] = Nilai::where('mapel_id','=',$mapel)->where('penilaian_id','=',$id)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$weekS,$weekE])
            ->avg('nilai');
        }
        $TotalSpent2 = DB::table('nilai')->where('penilaian_id','=',$id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent2 = DB::table('nilai')->where('penilaian_id','=',$id)
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
            $mapel_last_month_old = Nilai::where('mapel_id','=',$mapel)->where('penilaian_id','=',$id)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$dateS,$dateE])
            ->avg('nilai');
            $mapel_last_month [] = number_format((float)$mapel_last_month_old, 2, '.', '');
            $mapel_last_week_old = Nilai::where('mapel_id','=',$mapel)->where('penilaian_id','=',$id)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$weekS,$weekE])
            ->avg('nilai');
            $mapel_last_week[] = number_format((float)$mapel_last_week_old, 2, '.', '');
        }
        for($penilaian = 1; $penilaian < 6; $penilaian++)
        {
            $penilaian_old = Nilai::where('penilaian_id','=',$penilaian)->where('penilaian_id','=',$id)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$dateS, $dateE])
                -> avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id','=',$penilaian)->where('penilaian_id','=',$id)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$weekS, $weekE])
                -> avg('nilai');
            //$penilaian_week_old = Nilai::where('penilaian_id','=',$penilaian)
            //    -> select('created_at','nilai')
            //    -> whereBetween('created_at',[$weekS, $weekE])
            //    -> avg('nilai');
            $penilaian_last_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_last_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        //dd($penilaian_last_week);
        $TotalSpent1 = DB::table('nilai')->where('penilaian_id','=',$id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent1 = DB::table('nilai')->where('penilaian_id','=',$id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $last1month_average = number_format((float)$TotalSpent1, 2, '.', '');
        $last1week_average = number_format((float)$weekSpent1, 2, '.', '');

        // ambil data nilai siswa bulan ini sumber https://www.codegrepper.com/code-examples/php/get+last+month+data+in+laravel
        $this_month = Nilai::whereMonth('created_at', date('m'))->where('penilaian_id','=',$id)
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
            $mapel_this_month_old = Nilai::where('mapel_id','=',$mapel)->where('penilaian_id','=',$id)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$dateS,$dateE])
            ->avg('nilai');
            $mapel_this_month[] = number_format((float)$mapel_this_month_old, 2, '.', '');
            $mapel_this_week_old = Nilai::where('mapel_id','=',$mapel)->where('penilaian_id','=',$id)
            ->select('created_at','nilai')
            ->whereBetween('created_at',[$weekS,$weekE])
            ->avg('nilai');
            $mapel_this_week[] = number_format((float)$mapel_this_week_old, 2, '.', '');
        }
        for($penilaian = 1; $penilaian < 6; $penilaian++)
        {
            $penilaian_old = Nilai::where('penilaian_id','=',$penilaian)->where('penilaian_id','=',$id)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$dateS, $dateE])
                -> avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id','=',$penilaian)->where('penilaian_id','=',$id)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$weekS, $weekE])
                -> avg('nilai');
            $penilaian_this_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_this_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        $penilaian_list = ['Tugas','Latihan','UH','PTS','PAS'];
        //dd($penilaian_this_week);
        $TotalSpent0 = Nilai::where('penilaian_id','=',$id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent0 = Nilai::where('penilaian_id','=',$id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $last0month_average = number_format((float)$TotalSpent0, 2, '.', '');
        $last0week_average = number_format((float)$weekSpent0, 2, '.', '');
        $last_average = 0.00;
        $last_week_average = 0.00;
        if($last1month_average > 0.00)
        {
            $last_average = number_format((float)(($last0month_average - $last1month_average)/$last1month_average*100), 2, '.', '');  // Outputs in two dp

        }
        elseif($last1week_average > 0.00)
        {

            $last_week_average = number_format((float)(($last0week_average-$last1week_average)/$last1week_average*100), 2, '.', '');
        }
        elseif($last1month_average == 0)
        {
            $last_average = 0;

        }
        elseif($last1week_average == 0)
        {

            $last_week_average = 0;
        }
        //dd($last_average);

        $matpel = ['Agama Islam','Agama Protestan','Agama Katolik','PPKn','Bahasa Indonesia','Matematika','IPA','IPS','PJOK','SBK'];
        $islam_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',1)->pluck('nilai')->avg();
        $protestan_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',2)->pluck('nilai')->avg();
        $katolik_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',3)->pluck('nilai')->avg();
        $ppkn_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',4)->pluck('nilai')->avg();
        $indonesia_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',5)->pluck('nilai')->avg();
        $matematika_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',6)->pluck('nilai')->avg();
        $ipa_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',7)->pluck('nilai')->avg();
        $ips_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',8)->pluck('nilai')->avg();
        $pjok_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',9)->pluck('nilai')->avg();
        $sbk_average = Nilai::all()->where('penilaian_id','=',$id)->where('mapel_id',10)->pluck('nilai')->avg();
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
    	return view('penilaian.profile',[
            'penilaian1' => $penilaian1,
            'nilai' => $nilai,
            'mapel'=>$mapel,

            'jml_kelas_penilaian' => $jml_kelas_penilaian,
            'nilai_rata_siswa' => $nilai_rata_siswa,

            'mapel' => $mapel,
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
            'sumbuy'=>$sumbuy,
        ]);

    }
    public function index()
    {
    	$data_penilaian = Penilaian::all();
    	return view('penilaian.index',['data_penilaian' => $data_penilaian]);
    }
     public function penilaiancreate(Request $request)
    {
        $this -> validate($request,[
            'nama_tes' => 'required|min:3',
            'kode' => 'required',
            'semester' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);
        $avatar = $request->file('avatar')->move(public_path('storage\penilaian'),$request->file('avatar')->getClientOriginalName().".".$request->file('avatar')->getClientOriginalExtension());
        $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
        $img = Image::make($avatar);
        $img->resize('120', '120')->save(public_path('storage\penilaian') . '\small_' . $file_name);
        $avatar->move(public_path('storage\penilaian'), $file_name);
        //insert ke tabel penilaian
        $penilaian = new Penilaian();
        $penilaian -> nama_tes = $request -> nama_tes;
        $penilaian -> kode = $request -> kode;
        $penilaian -> semester = $request -> semester;
        $penilaian -> avatar = $file_name;

        $penilaian -> save();
        //return $request -> all();
        return redirect('/penilaian')->with('sukses','berhasil diinput');
    }
    public function penilaianedit(Penilaian $penilaian)
    {
        return view('penilaian.penilaianedit',['penilaian'=>$penilaian]);
    }
    public function penilaianupdate(Request $request, Penilaian $penilaian)
    {
        $this->validate($request, [
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if ($request->hasFile('avatar'))
        {
            $penilaian->delete_avatar();
            $avatar = $request->file('avatar')->move(public_path('storage\penilaian'),$request->file('avatar')->getClientOriginalName().".".$request->file('avatar')->getClientOriginalExtension());
            //dd($avatar);
            $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
            //dd($file_name);
            $img = Image::make($avatar);
            //dd($img);
            $img->resize('120', '120')->save(public_path('storage\penilaian') . '\small_' . $file_name);
            //dd($img);
            $avatar->move(public_path('storage\penilaian'), $file_name);
            $penilaian->avatar = $file_name;
        }
        else
        {
            $file_name = 'default.jpg';
        }

        $input = $request->all();
        $penilaian -> nama_tes = $input['nama_tes'];
        $penilaian -> kode = $input['kode'];
        $penilaian -> semester = $input['semester'];
        $penilaian -> avatar = $file_name;

        $penilaian->save();
        return redirect('/penilaian')->with('sukses','berhasil diupdate!');
    }
    public function penilaiandelete(Penilaian $penilaian)
    {
        $penilaian ->delete_avatar();
        $penilaian ->delete();
        return redirect('/penilaian')->with('sukses','berhasil dihapus!');
    }
}
