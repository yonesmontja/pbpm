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

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['gurus'] = Guru::all();
        $data['title'] = 'Mapel';
        $data['q'] = $request->query('q');
        //dd($data['q']);
        $data['mapel'] = Mapel::where('nama_mapel', 'like', '%' . $data['q'] . '%')->get();
        return view('mapel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['gurus'] = Guru::all();
        $data['title'] = 'Add Mapel';
        return view('mapel.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_mapel' => 'required',
            'kode' => 'required',
        ]);
        $avatar = $request->file('avatar')->move(public_path('storage\mapel'),$request->file('avatar')->getClientOriginalName().".".$request->file('avatar')->getClientOriginalExtension());
        $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
        $img = Image::make($avatar);
        $img->resize('120', '120')->save(public_path('storage\mapel') . '\small_' . $file_name);
        $avatar->move(public_path('storage\mapel'), $file_name);
        //insert ke tabel Mapel
        $mapel = new Mapel();
        $mapel -> kode = $request -> kode;
        $mapel -> nama_mapel = $request->nama_mapel;
        $mapel -> semester = $request -> semester;
        $mapel -> kelompok = $request -> kelompok;
        $mapel -> is_sikap = $request -> is_sikap;
        $mapel -> tambahan_sub = $request -> tambahan_sub;
        $mapel -> kd_singkat = $request -> kd_singkat;
        $mapel -> guru_id = $request -> guru_id;
        $mapel -> avatar = $file_name;
        $mapel->save();
        return redirect()->route('mapel.index')->with('success', 'Mapel added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        $mapel1 = Mapel::find($mapel->id);
        $penilaian1 = Penilaian::find($mapel->id);
        $jml_kelas_penilaian = Nilai::where('mapel_id','=',$mapel->id)->where('kelas_id','=',1)->pluck('mapel_id','kelas_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('kelas_id','=',2)->pluck('mapel_id','kelas_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('kelas_id','=',3)->pluck('mapel_id','kelas_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('kelas_id','=',4)->pluck('mapel_id','kelas_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('kelas_id','=',5)->pluck('mapel_id','kelas_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('kelas_id','=',6)->pluck('mapel_id','kelas_id')->count();
        //dd(Nilai::where('mapel_id','=',$mapel->id)->where('kelas_id','=',1)->pluck('mapel_id','kelas_id')->count());
        $jml_mapel_penilaian = Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',1)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',2)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',3)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',4)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',5)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',6)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',18)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',19)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',20)->pluck('penilaian_id','mapel_id')->count()+
                             Nilai::where('mapel_id','=',$mapel->id)->where('penilaian_id','=',21)->pluck('penilaian_id','mapel_id')->count();
        $jml_siswa_penilaian = Nilai::where('mapel_id','=',$mapel->id)->select('siswa_id','penilaian_id')->pluck('penilaian_id','siswa_id')->count();


        //hitung nilai rata-rata kelas untuk semua mapel
        $rata_kelas1 = Nilai::all()->where('penilaian_id','=',$mapel->id)->pluck('nilai')->avg();
        $rata_kelas = number_format((float)$rata_kelas1, 1, '.', '');
        //-----------------------------------------------


        $nilai = Nilai::all()->where('mapel_id','=',$mapel->id);
        $user = User::all();
        // hitung nilai rata-rata per mapel $chart_nilai[] untuk ditampilkan di grafik
        for($bulan=1; $bulan < 7; $bulan++){
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where penilaian_id='$mapel->id' AND month(created_at)='$bulan'"))->first();
            //$chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(created_at)='$bulan'"))->first();
            (int)$chart_nilai1[] = Nilai::whereMonth('created_at','=',$bulan)->where('penilaian_id','=',$mapel->id)->pluck('nilai')->avg();
            //(int)$chart_nilai1[] = Nilai::whereMonth('created_at','=',$bulan)->pluck('nilai')->avg();

            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($chart_nilai1);
        // ambil data nilai siswa 3 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(3);
        $weekE = Carbon::now()->startOfWeek();

        $mapel_last_3month = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');

        $mapel_last_3week = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');

        $TotalSpent3 = DB::table('nilai')->where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent3 = DB::table('nilai')->where('mapel_id','=',$mapel->id)
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

        $mapel_last_2month = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $mapel_last_2week = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');

        $TotalSpent2 = DB::table('nilai')->where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent2 = DB::table('nilai')->where('mapel_id','=',$mapel->id)
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

        $mapel_last_month_old = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $mapel_last_month = number_format((float)$mapel_last_month_old, 2, '.', '');
        $mapel_last_week_old = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $mapel_last_week = number_format((float)$mapel_last_week_old, 2, '.', '');

        for($penilaian = 1; $penilaian < 6; $penilaian++)
        {
            $penilaian_old = Nilai::where('penilaian_id','=',$penilaian)->where('mapel_id','=',$mapel->id)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$dateS, $dateE])
                -> avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id','=',$penilaian)->where('mapel_id','=',$mapel->id)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$weekS, $weekE])
                -> avg('nilai');
            $penilaian_last_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_last_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        //dd($penilaian_last_week);
        $TotalSpent1 = DB::table('nilai')->where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent1 = DB::table('nilai')->where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $last1month_average = number_format((float)$TotalSpent1, 2, '.', '');
        $last1week_average = number_format((float)$weekSpent1, 2, '.', '');

        // ambil data nilai siswa bulan ini sumber https://www.codegrepper.com/code-examples/php/get+last+month+data+in+laravel
        $this_month = Nilai::whereMonth('created_at', date('m'))->where('mapel_id','=',$mapel->id)
            ->whereYear('created_at', date('Y'))
            ->get(['nilai','created_at'])
            ->avg('nilai');
        $this_month = number_format((float)$this_month, 2, '.', '');

        // ambil data nilai siswa bulan ini, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(0);
        $dateE = Carbon::now();
        $weekS = Carbon::now()->startOfWeek()->subWeek(0);
        $weekE = Carbon::now();

        $mapel_this_month_old = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $mapel_this_month = number_format((float)$mapel_this_month_old, 2, '.', '');
        $mapel_this_week_old = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$weekS,$weekE])
        ->avg('nilai');
        $mapel_this_week = number_format((float)$mapel_this_week_old, 2, '.', '');

        for($penilaian = 1; $penilaian < 6; $penilaian++)
        {
            $penilaian_old = Nilai::where('penilaian_id','=',$penilaian)->where('mapel_id','=',$mapel->id)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$dateS, $dateE])
                -> avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id','=',$penilaian)->where('mapel_id','=',$mapel->id)
                -> select('created_at','nilai')
                -> whereBetween('created_at',[$weekS, $weekE])
                -> avg('nilai');
            $penilaian_this_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_this_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        $penilaian_list = ['Tugas','Latihan','UH','PTS','PAS'];
        //dd($penilaian_this_week);
        $TotalSpent0 = Nilai::where('mapel_id','=',$mapel->id)
        ->select('created_at','nilai')
        ->whereBetween('created_at',[$dateS,$dateE])
        ->avg('nilai');
        $weekSpent0 = Nilai::where('mapel_id','=',$mapel->id)
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

        $data['title'] = $mapel->nama_mapel;
        $data['mapel'] = $mapel;
        $mapel = Mapel::all();
        return view('mapel.show', [
            'data' => $data,
            'penilaian1' => $penilaian1,
            'mapel'=>$mapel,
            'jml_kelas_penilaian' => $jml_kelas_penilaian,
            'nilai' => $nilai,
            'mapel1' => $mapel1,
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


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
        $data['gurus'] = Guru::all();
        $data['title'] = 'Edit Mapel';
        $data['mapel'] = $mapel;
        return view('mapel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        //
        $request->validate([
            'nama_mapel' => 'required',
        ]);
        //$usertest ->update($request->all());
        if ($request->hasFile('avatar')) {
            $mapel->delete_avatar();
            $avatar = $request->file('avatar')->move(public_path('storage\mapel'),$request->file('avatar')->getClientOriginalName().".".$request->file('avatar')->getClientOriginalExtension());
            //dd($avatar);
            $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
            //dd($file_name);
            $img = Image::make($avatar);
            //dd($img);
            $img->resize('120', '120')->save(public_path('storage\mapel') . '\small_' . $file_name);
            //dd($img);
            $avatar->move(public_path('storage\mapel'), $file_name);
            $mapel->avatar = $file_name;
        }
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->kode = $request->kode;
        $mapel->semester = $request->semester;
        $mapel->is_sikap = $request->is_sikap;
        $mapel->tambahan_sub = $request->tambahan_sub;
        $mapel->guru_id = $request->guru_id;
        $mapel->kd_singkat = $request->kd_singkat;
        $mapel->kelompok = $request->kelompok;
        $mapel->save();
        return redirect()->route('mapel.index')->with('success', 'Mapel edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        //
        $mapel->delete_avatar();
        $mapel->delete();
        return redirect()->route('mapel.index')->with('success', 'Mapel deleted successfully');
    }
}
