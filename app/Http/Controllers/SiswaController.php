<?php

namespace App\Http\Controllers;

use PDF;
use Session;
use App\Models\Guru;
use App\Models\User;
use App\Models\Extra;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Penilaian;
use App\Imports\UserImport;
use Illuminate\Support\Str;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use App\Models\Kompetensiinti;
use App\Models\Tahunpelajaran;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SiswaController extends Controller
{
    public function index(Siswa $data_siswa)
    {
    	$data_siswa = \App\Models\Siswa::all();
    	return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
    	\App\Models\Siswa::create($request -> all());
    	//return $request -> all();
    	return redirect('/siswa')->with('sukses','berhasil diinput');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa/edit',['siswa'=>$siswa]);
    }
    public function update(Request $request, Siswa $siswa)
    {

        $siswa ->update($request->all());
        //if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
        //    $siswa->avatar= $request->file('avatar')->getClientOriginalName();
        //    $siswa->save();
        //}
        if ($request->hasFile('avatar')) {
            $siswa->delete_avatar();
            $avatar = $request->file('avatar');
            $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
            $img = Image::make($avatar->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $avatar->move('/images', $file_name);
            $siswa->avatar = $file_name;
        }
        return redirect('/siswa')->with('sukses','berhasil diupdate!');
    }
    public function test(Siswa $data_siswa)
    {
        $data_siswa = \App\Models\Siswa::all();
        $user_id = \App\Models\Siswa::all();
        $kelas = Kelas::all();
        //dd('$data_siswa');
        return view('siswa.test',['kelas' => $kelas,'data_siswa' => $data_siswa,'user_id'=> $user_id]);
    }
    public function testcreate(Request $request)
    {
        $this -> validate($request,[
            'nama_depan' => 'required|min:3',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);
        $avatar = $request->file('avatar');
        $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
        $img = Image::make($avatar->path());
        $img->resize('120', '120')
            ->save(public_path('/images') . '/small_' . $file_name);

        $avatar->move('/images', $file_name);

        //insert ke tabel Users
        $user = new User();
        $user -> role = 'siswa';
        $user -> name = $request -> nama_depan;
        $user -> email = $request -> email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        $user -> avatar = $file_name;
        $user -> save();
        //insert ke tabel Siswa
        $input = $request->all();
        $user_id = $user->id;
        //dd($user_id);
        $siswa = new Siswa();
        //dd($siswa);
        $siswa -> user_id = $user_id;
        $siswa -> nama_depan = $input['nama_depan'];
        $siswa -> nama_belakang = $input['nama_belakang'];
        $siswa -> email = $input['email'];
        $siswa -> nis = $input['nis'];
        $siswa -> nisn = $input['nisn'];
        $siswa -> jenis_kelamin = $input['jenis_kelamin'];
        $siswa -> agama = $input['agama'];
        $siswa -> alamat = $input['alamat'];
        $siswa -> kelas_id = $input['kelas_id'];
        $siswa -> avatar = $file_name;
        //$request -> request -> add(['user_id' => $user -> id]);
        //dd($request -> request -> add(['user_id' => $user -> id]));
        //$siswa = Siswa::create($request -> all());
        $siswa -> password = bcrypt('rahasia');
        //dd($siswa);

        //if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('/images/',$request->file('avatar')->getClientOriginalName());
        //    $siswa->avatar= $request->file('avatar')->getClientOriginalName();
        //    $siswa->save();
        //}

        $siswa -> save();
        //return $request -> all();
        return redirect('/test')->with('sukses','berhasil diinput');
    }

    public function testaktivasi(Request $request,$id)
    {
        $siswa = Siswa::find($id);

        $user = new \App\Models\User;
        //dd($siswa);
        $user -> role = 'siswa';
        $user -> name = $siswa->nama_depan;
        $user -> email = $siswa->email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        $user -> save();
        //dd($user);
        $status = '1';
        $request -> request -> add(['user_id' => $user -> id,'status' => $status]);
        $siswa ->update($request->all());

        //dd($siswa);

        return redirect('/test')->with('sukses', 'berhasil diaktivasi');
    }

    public function testedit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('siswa/testedit',['kelas'=>$kelas,'siswa'=>$siswa]);
    }
    public function testupdate(Request $request, Siswa $siswa)
    {

        $siswa ->update($request->all());
        $siswa->nama_depan = $request->nama_depan;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->email = $request->email;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->save();
        return redirect('/test')->with('sukses','berhasil diupdate!');
    }

    public function editnilai(Request $request)
    {


        if ($request->ajax()) {
            Nilai::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);
            $date = now();
            DB::table('penilaian_siswa')->where('nilai_id', Nilai::find($request -> pk)->id)->update([
                    $request ->name => $request -> value,
                    'updated_at' => $date,
            ]);
            return response()->json(['success' => true]);
        }
    }

    public function testdelete(Siswa $siswa)
    {
        $user ->delete_avatar();
        $siswa ->delete();
        return redirect('/test')->with('sukses','berhasil dihapus!');
    }
    public function testprofile($id, Request $request)
    {
        $siswa = \App\Models\Siswa::find($id);
        $rombel = $siswa -> kelas_id;
        //dd($rombel);
        $siswa1 = \App\Models\Siswa::all();
        $matapelajaran = \App\Models\Mapel::all();
        $penilaian = \App\Models\Penilaian::all();
        $nilai = Nilai::all();
        $data_nilai = Nilai::all();
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $rombel1 = Kelas::find($rombel);
        $rombel2 = $rombel1 -> nama;

        // data untuk Chart.js
        $categories = [];
        $data = [];
        $tescategories = [];
        $tes1 = [];
        $data5 = [];
        $categories2 = [];
        $data6 = [];
        $categories3 = [];
        $data7 = [];
        $categories7 = [];
        $data8 = [];
        $categories8 = [];
        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp ->nama_mapel;
                $data[] = $siswa -> mapel() -> wherePivot('mapel_id',$mp ->id) -> first()->pivot->nilai;
            }
        }
        foreach($siswa->mapel as $mnp){
            $data5[] = $mnp->pivot->nilai;
            $categories2[] = $mnp -> nama_mapel;
        }
        foreach($siswa->penilaian as $mnpx){
            $data6[] = $mnpx->pivot->nilai;
            $categories3[] = $mnpx -> nama_tes;
        }
        foreach($nilai as $mnp){
            if($mnp->siswa_id == $id){
                $data7[] = $mnp->nilai;
                $categories7[] = $mnp -> mapel -> nama_mapel;
            }
        }
        foreach($nilai as $mnpx){
            if($mnpx->siswa_id == $id){
                $data8[] = $mnpx->nilai;
                $categories8[] = $mnpx -> penilaian -> nama_tes;
            }
        }
        foreach($penilaian as $mp2){
            if($siswa->penilaian()->wherePivot('penilaian_id',$mp2->id)->first()){
                $tescategories[] = $mp2 ->nama_tes;
                $tes1[] = $siswa -> penilaian() -> wherePivot('penilaian_id',$mp2 ->id) -> first()->pivot->nilai;
                //dd($tes1);
            }
        }
        $nilai_start = Tahunpelajaran::all()->where('id','=',2)->pluck('tahun');
        $nilai_end = Tahunpelajaran::all()->where('id','=',1)->pluck('tahun');
        $id1 = Nilai::all()->where('siswa_id',$id)->pluck('siswa_id',$id)->first();
        $mapel1 = Nilai::all()->where('siswa_id',$id)->pluck('mapel_id')->count();
        $mapel3 = Mapel::all()->pluck('nama_mapel');
        $islam_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',1)->pluck('nilai')->avg();
        $protestan_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',2)->pluck('nilai')->avg();
        $katolik_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',3)->pluck('nilai')->avg();
        $ppkn_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',4)->pluck('nilai')->avg();
        $indonesia_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',5)->pluck('nilai')->avg();
        $matematika_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',6)->pluck('nilai')->avg();
        $ipa_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',7)->pluck('nilai')->avg();
        $ips_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',8)->pluck('nilai')->avg();
        $pjok_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',9)->pluck('nilai')->avg();
        $sbk_average = Nilai::all()->where('siswa_id',$id)->where('mapel_id',10)->pluck('nilai')->avg();
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
        $tescategories1 = collect($tescategories);
        $matpel = collect($data7)->sum();
        $average = collect($data7)->avg();
        $average_mapel = collect($matang1)->avg();
        $data2 = DB::table('penilaian_siswa')
                    ->join('mapel_siswa', 'mapel_siswa.siswa_id', '=', 'penilaian_siswa.siswa_id');

        return view('profile.index',[
        'rombel2' => $rombel2,
        'nilai_start' => $nilai_start,
        'nilai_end' => $nilai_end,
        'average_mapel' => $average_mapel,
        'islam_average'=>$islam_average,
        'protestan_average'=>$protestan_average,
        'katolik_average'=>$katolik_average,
        'ppkn_average'=>$ppkn_average,
        'indonesia_average'=>$indonesia_average,
        'matematika_average'=>$matematika_average,
        'ipa_average'=>$ipa_average,
        'ips_average'=>$ips_average,
        'pjok_average'=>$pjok_average,
        'sbk_average'=>$sbk_average,
        'mapel1'=>$mapel1,
        'siswa1'=>$siswa1,
        'guru'=>$guru,
        'kompetensiinti'=>$kompetensiinti,
        'mapel'=>$mapel,
        'data_nilai'=>$data_nilai,
        'id1'=>$id1,
        'nilai'=>$nilai,
        'categories7'=>$categories7,
        'data7'=>$data7,
        'categories8'=>$categories8,
        'data8'=>$data8,
        'data5'=>$data5,
        'categories2'=>$categories2,
        'mapel3'=>$mapel3,
        'matang1'=>$matang1,
        'tescategories1' => $tescategories1,
        'data2'=>$data2,
        'penilaian'=>$penilaian,
        'matpel'=>$matpel,
        'average'=> $average,
        'siswa'=> $siswa,
        'kelas'=> $kelas,
        'matapelajaran' => $matapelajaran,
        'categories' => $categories,
        'data' => $data,
        'tescategories' => $tescategories,
        'tes1' => $tes1]);
    }
    public function testaddnilai(Request $request, $idsiswa)
    {
        //dd($idsiswa);
        //$tes = $request->penilaian;
        $siswa = \App\Models\Siswa::find($idsiswa);
        //$tes = \App\Models\Penilaian::find($idsiswa);
        //dd($siswa);
        //if($siswa->mapel()->where('mapel_id',$request->mapel)->exists())
        //{
        //    return redirect('test/'.$idsiswa.'/profile')->with('error','data mapel sudah ada');
        //}
        //if($siswa->penilaian()->where('penilaian_id',$request->penilaian)->exists())
        //{
        //    return redirect('test/'.$idsiswa.'/profile')->with('error','data mapel sudah ada');
       // }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
        //dd($siswa);
        $siswa->penilaian()->attach($request->penilaian,['nilai' => $request->nilai]);
        //dd($tes);
        return redirect()->back()->with('sukses','nilai sukses diinput');
    }
    public function testdeletenilai(Siswa $siswa, $idmapel)
    {
        //$penilaian = Penilaian::find($idmapel);
        $siswa -> mapel() -> detach($idmapel);
        $siswa -> penilaian() -> detach($idmapel);
        return redirect()->back()->with('sukses','nilai berhasil dihapus');
    }
    public function export_excel()
    {

        return Excel::download(new SiswaExport,'siswa.xlsx');
    }
    public function import_excel(Request $request)
    {
        //$siswa = Siswa::all();
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa',$nama_file);


        // import data
        Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
        //Excel::import(new UserImport, public_path('/file_siswa/'.$nama_file));
        $siswa = Siswa::all();
        //dd($siswa);
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar= $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        // notifikasi dengan session
        Session::flash('sukses','Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/test');
    }
    public function export_PDF()
    {
        //pkai loadHTML
        //$pdf = PDF::loadHTML('<h1>DATA SISWA</h1>');
        //pkai loadView
        $students = Siswa::all();
        $data_siswa = Siswa::get();
        $pdf = PDF::loadView('export.invoice',['data_siswa'=>$data_siswa,'students' => $students]);
        return $pdf->download('data_siswa_'.date('Y-m-d_H-i-s').'.pdf');
    }
    public function cetak_PDF($id)
    {
        // cetak_PDF
        $count_tugas1 = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',1)
            ->where('mapel_id','=',1)
            ->pluck('nilai')->avg();
        $students = Siswa::find($id);
        $nama_depan = Siswa::where('id','=',$id)->select('nama_depan','nama_belakang')->pluck('nama_depan');
        $nama_belakang = Siswa::where('id','=',$id)->select('nama_depan','nama_belakang')->pluck('nama_belakang');
        $kalimat1 = $nama_depan[0];
        $kalimat2 = $nama_belakang[0];
        //dd($kalimat);
        $data_siswa = Siswa::get();
        //menghitung nilai tugas
        for($penilaian=1; $penilaian < 2; $penilaian++)
        {
            $tampung_tugas_islam = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',1)
            ->pluck('nilai')->avg();
            $nilai_tugas_islam[] = (int)$tampung_tugas_islam;
            $tampung_tugas_protestan = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',2)
            ->pluck('nilai')->avg();
            $nilai_tugas_protestan[] = (int)$tampung_tugas_protestan;
            $tampung_tugas_katolik = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',3)
            ->pluck('nilai')->avg();
            $nilai_tugas_katolik[] = (int)$tampung_tugas_katolik;
            $tampung_tugas_ppkn = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',4)
            ->pluck('nilai')->avg();
            $nilai_tugas_ppkn[] = (int)$tampung_tugas_ppkn;
            $tampung_tugas_indonesia = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',5)
            ->pluck('nilai')->avg();
            $nilai_tugas_indonesia[] = (int)$tampung_tugas_indonesia;
            $tampung_tugas_matematika = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',6)
            ->pluck('nilai')->avg();
            $nilai_tugas_matematika[] = (int)$tampung_tugas_matematika;
            $tampung_tugas_ipa = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',7)
            ->pluck('nilai')->avg();
            $nilai_tugas_ipa[] = (int)$tampung_tugas_ipa;
            $tampung_tugas_ips = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',8)
            ->pluck('nilai')->avg();
            $nilai_tugas_ips[] = (int)$tampung_tugas_ips;
            $tampung_tugas_pjok = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',9)
            ->pluck('nilai')->avg();
            $nilai_tugas_pjok[] = (int)$tampung_tugas_pjok;
            $tampung_tugas_sbk = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',10)
            ->pluck('nilai')->avg();
            $nilai_tugas_sbk[] = (int)$tampung_tugas_sbk;
        }
        //dd($nilai_tugas_indonesia);
        if($students -> agama == "Islam")
        {
            if(array_sum($nilai_tugas_islam) > 0)
            {
                for($key = 0; $key < count($nilai_tugas_islam); $key++)
            {
                if($nilai_tugas_islam[$key] > 0)
                {
                    $nilai_tugas_islam_yes[] = $nilai_tugas_islam[$key];
                }
            }
            $jml_pel_tugas_islam    =count($nilai_tugas_islam_yes);
            $sum_pel_tugas_islam    =array_sum($nilai_tugas_islam_yes);
            $rata_rata_tugas_islam  =number_format((float)$sum_pel_tugas_islam / $jml_pel_tugas_islam, 2, '.', '');
            }
            elseif(array_sum($nilai_tugas_islam) == 0)
            {
                $rata_rata_tugas_islam = 0.00;
            }
        }

        if($students -> agama == "Kristen Protestan")
        {
            if(array_sum($nilai_tugas_protestan) > 0)
            {
                for($key = 0; $key < count($nilai_tugas_protestan); $key++)
            {
                if($nilai_tugas_protestan[$key] > 0)
                {
                    $nilai_tugas_protestan_yes[] = $nilai_tugas_protestan[$key];
                }
            }
            $jml_pel_tugas_protestan    =count($nilai_tugas_protestan_yes);
            $sum_pel_tugas_protestan    =array_sum($nilai_tugas_protestan_yes);
            $rata_rata_tugas_protestan  =number_format((float)$sum_pel_tugas_protestan / $jml_pel_tugas_protestan, 2, '.', '');
            }
            elseif(array_sum($nilai_tugas_protestan) == 0)
            {
                $rata_rata_tugas_protestan = 0.00;
            }
        }

        if($students -> agama == "Katolik")
        {
            if(array_sum($nilai_tugas_katolik) > 0)
            {
                for($key = 0; $key < count($nilai_tugas_katolik); $key++)
            {
                if($nilai_tugas_katolik[$key] > 0)
                {
                    $nilai_tugas_katolik_yes[] = $nilai_tugas_katolik[$key];
                }
            }
            $jml_pel_tugas_katolik    =count($nilai_tugas_katolik_yes);
            $sum_pel_tugas_katolik    =array_sum($nilai_tugas_katolik_yes);
            $rata_rata_tugas_katolik  =number_format((float)$sum_pel_tugas_katolik / $jml_pel_tugas_katolik, 2, '.', '');
            }
            elseif(array_sum($nilai_tugas_katolik) == 0)
            {
                $rata_rata_tugas_katolik = 0.00;
            }
        }

        if(array_sum($nilai_tugas_ppkn) > 0)
        {
            for($key = 0; $key < count($nilai_tugas_ppkn); $key++)
            {
                if($nilai_tugas_ppkn[$key] > 0)
                {
                    $nilai_tugas_ppkn_yes[] = $nilai_tugas_ppkn[$key];
                }
            }
        $jml_pel_tugas_ppkn    =count($nilai_tugas_ppkn_yes);
        $sum_pel_tugas_ppkn    =array_sum($nilai_tugas_ppkn_yes);
        $rata_rata_tugas_ppkn  =number_format((float)$sum_pel_tugas_ppkn / $jml_pel_tugas_ppkn, 2, '.', '');
        }
        elseif(array_sum($nilai_tugas_ppkn) == 0)
        {
            $rata_rata_tugas_ppkn = 0.00;
        }
        //dd($rata_rata_tugas_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_tugas_indonesia));
        if(array_sum($nilai_tugas_indonesia) > 0)
        {
            for($key = 0; $key < count($nilai_tugas_indonesia); $key++)
            {
                if($nilai_tugas_indonesia[$key] > 0)
                {
                    $nilai_tugas_indonesia_yes[] = $nilai_tugas_indonesia[$key];
                }
            }
        $jml_pel_tugas_indonesia    =count($nilai_tugas_indonesia_yes);
        $sum_pel_tugas_indonesia    =array_sum($nilai_tugas_indonesia_yes);
        $rata_rata_tugas_indonesia  =number_format((float)$sum_pel_tugas_indonesia / $jml_pel_tugas_indonesia, 2, '.', '');
        }
        elseif(array_sum($nilai_tugas_indonesia) == 0)
        {
            $rata_rata_tugas_indonesia = 0.00;
        }
        //dd($rata_rata_tugas_indonesia);
        if(array_sum($nilai_tugas_matematika) > 0)
        {
            for($key = 0; $key < count($nilai_tugas_matematika); $key++)
            {
                if($nilai_tugas_matematika[$key] > 0)
                {
                    $nilai_tugas_matematika_yes[] = $nilai_tugas_matematika[$key];
                }
            }
        $jml_pel_tugas_matematika    =count($nilai_tugas_matematika_yes);
        $sum_pel_tugas_matematika    =array_sum($nilai_tugas_matematika_yes);
        $rata_rata_tugas_matematika  =number_format((float)$sum_pel_tugas_matematika / $jml_pel_tugas_matematika, 2, '.', '');
        }
        elseif(array_sum($nilai_tugas_matematika) == 0)
        {
            $rata_rata_tugas_matematika = 0.00;
        }

        if(array_sum($nilai_tugas_ipa) > 0)
        {
            for($key = 0; $key < count($nilai_tugas_ipa); $key++)
            {
                if($nilai_tugas_ipa[$key] > 0)
                {
                    $nilai_tugas_ipa_yes[] = $nilai_tugas_ipa[$key];
            }
            }
        $jml_pel_tugas_ipa    =count($nilai_tugas_ipa_yes);
        $sum_pel_tugas_ipa    =array_sum($nilai_tugas_ipa_yes);
        $rata_rata_tugas_ipa  =number_format((float)$sum_pel_tugas_ipa / $jml_pel_tugas_ipa, 2, '.', '');
        }
        elseif(array_sum($nilai_tugas_ipa) == 0)
        {
            $rata_rata_tugas_ipa = 0.00;
        }

        if(array_sum($nilai_tugas_ips) > 0)
        {
            for($key = 0; $key < count($nilai_tugas_ips); $key++)
            {
                if($nilai_tugas_ips[$key] > 0)
                {
                    $nilai_tugas_ips_yes[] = $nilai_tugas_ips[$key];
                }
            }
        $jml_pel_tugas_ips    =count($nilai_tugas_ips_yes);
        $sum_pel_tugas_ips    =array_sum($nilai_tugas_ips_yes);
        $rata_rata_tugas_ips  =number_format((float)$sum_pel_tugas_ips / $jml_pel_tugas_ips, 2, '.', '');
        }
        elseif(array_sum($nilai_tugas_ips) == 0)
        {
            $rata_rata_tugas_ips = 0.00;
        }

        if(array_sum($nilai_tugas_pjok) > 0)
        {
            for($key = 0; $key < count($nilai_tugas_pjok); $key++)
            {
                if($nilai_tugas_pjok[$key] > 0)
                {
                    $nilai_tugas_pjok_yes[] = $nilai_tugas_pjok[$key];
                }
            }
        $jml_pel_tugas_pjok    =count($nilai_tugas_pjok_yes);
        $sum_pel_tugas_pjok    =array_sum($nilai_tugas_pjok_yes);
        $rata_rata_tugas_pjok  =number_format((float)$sum_pel_tugas_pjok / $jml_pel_tugas_pjok, 2, '.', '');
        }
        elseif(array_sum($nilai_tugas_pjok) == 0)
        {
            $rata_rata_tugas_pjok = 0.00;
        }

        if(array_sum($nilai_tugas_sbk) > 0)
        {
            for($key = 0; $key < count($nilai_tugas_sbk); $key++)
            {
                if($nilai_tugas_sbk[$key] > 0)
                {
                    $nilai_tugas_sbk_yes[] = $nilai_tugas_sbk[$key];
                }
            }
        $jml_pel_tugas_sbk    =count($nilai_tugas_sbk_yes);
        $sum_pel_tugas_sbk    =array_sum($nilai_tugas_sbk_yes);
        $rata_rata_tugas_sbk  =number_format((float)$sum_pel_tugas_sbk / $jml_pel_tugas_sbk, 2, '.', '');
        }
        elseif(array_sum($nilai_tugas_sbk) == 0)
        {
            $rata_rata_tugas_sbk = 0.00;
        }

        // --------------------------------------------------------------------

        //menghitung nilai latihan
        for($penilaian=2; $penilaian < 3; $penilaian++)
        {
            $tampung_latihan_islam = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',1)
            ->pluck('nilai')->avg();
            $nilai_latihan_islam[] = (int)$tampung_latihan_islam;
            $tampung_latihan_protestan = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',2)
            ->pluck('nilai')->avg();
            $nilai_latihan_protestan[] = (int)$tampung_latihan_protestan;
            $tampung_latihan_katolik = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',3)
            ->pluck('nilai')->avg();
            $nilai_latihan_katolik[] = (int)$tampung_latihan_katolik;
            $tampung_latihan_ppkn = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',4)
            ->pluck('nilai')->avg();
            $nilai_latihan_ppkn[] = (int)$tampung_latihan_ppkn;
            $tampung_latihan_indonesia = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',5)
            ->pluck('nilai')->avg();
            $nilai_latihan_indonesia[] = (int)$tampung_latihan_indonesia;
            $tampung_latihan_matematika = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',6)
            ->pluck('nilai')->avg();
            $nilai_latihan_matematika[] = (int)$tampung_latihan_matematika;
            $tampung_latihan_ipa = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',7)
            ->pluck('nilai')->avg();
            $nilai_latihan_ipa[] = (int)$tampung_latihan_ipa;
            $tampung_latihan_ips = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',8)
            ->pluck('nilai')->avg();
            $nilai_latihan_ips[] = (int)$tampung_latihan_ips;
            $tampung_latihan_pjok = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',9)
            ->pluck('nilai')->avg();
            $nilai_latihan_pjok[] = (int)$tampung_latihan_pjok;
            $tampung_latihan_sbk = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',10)
            ->pluck('nilai')->avg();
            $nilai_latihan_sbk[] = (int)$tampung_latihan_sbk;
        }

        if($students -> agama == "Islam")
        {
            if(array_sum($nilai_latihan_islam) > 0)
            {
                for($key = 0; $key < count($nilai_latihan_islam); $key++)
                {
                    if($nilai_latihan_islam[$key] > 0)
                    {
                        $nilai_latihan_islam_yes[] = $nilai_latihan_islam[$key];
                    }
                }
            $jml_pel_latihan_islam    =count($nilai_latihan_islam_yes);
            $sum_pel_latihan_islam    =array_sum($nilai_latihan_islam_yes);
            $rata_rata_latihan_islam  =number_format((float)$sum_pel_latihan_islam / $jml_pel_latihan_islam, 2, '.', '');
            }
            elseif(array_sum($nilai_latihan_islam) == 0)
            {
                $rata_rata_latihan_islam = 0.00;
            }
        }

        if($students -> agama == "Kristen Protestan")
        {
            if(array_sum($nilai_latihan_protestan) > 0)
            {
                for($key = 0; $key < count($nilai_latihan_protestan); $key++)
            {
                if($nilai_latihan_protestan[$key] > 0)
                {
                    $nilai_latihan_protestan_yes[] = $nilai_latihan_protestan[$key];
                }
            }
            $jml_pel_latihan_protestan    =count($nilai_latihan_protestan_yes);
            $sum_pel_latihan_protestan    =array_sum($nilai_latihan_protestan_yes);
            $rata_rata_latihan_protestan  =number_format((float)$sum_pel_latihan_protestan / $jml_pel_latihan_protestan, 2, '.', '');
            }
            elseif(array_sum($nilai_latihan_protestan) == 0)
            {
                $rata_rata_latihan_protestan = 0.00;
            }
        }

        if($students -> agama == "Katolik")
        {
            if(array_sum($nilai_latihan_katolik) > 0)
            {
                for($key = 0; $key < count($nilai_latihan_katolik); $key++)
            {
                if($nilai_latihan_katolik[$key] > 0)
                {
                    $nilai_latihan_katolik_yes[] = $nilai_latihan_katolik[$key];
                }
            }
            $jml_pel_latihan_katolik    =count($nilai_latihan_katolik_yes);
            $sum_pel_latihan_katolik    =array_sum($nilai_latihan_katolik_yes);
            $rata_rata_latihan_katolik  =number_format((float)$sum_pel_latihan_katolik / $jml_pel_latihan_katolik, 2, '.', '');
            }
            elseif(array_sum($nilai_latihan_katolik) == 0)
            {
                $rata_rata_latihan_katolik = 0.00;
            }
        }

        if(array_sum($nilai_latihan_ppkn) > 0)
        {
            for($key = 0; $key < count($nilai_latihan_ppkn); $key++)
            {
                if($nilai_latihan_ppkn[$key] > 0)
                {
                    $nilai_latihan_ppkn_yes[] = $nilai_latihan_ppkn[$key];
                }
            }
        $jml_pel_latihan_ppkn    =count($nilai_latihan_ppkn_yes);
        $sum_pel_latihan_ppkn    =array_sum($nilai_latihan_ppkn_yes);
        $rata_rata_latihan_ppkn  =number_format((float)$sum_pel_latihan_ppkn / $jml_pel_latihan_ppkn, 2, '.', '');
        }
        elseif(array_sum($nilai_latihan_ppkn) == 0)
        {
            $rata_rata_latihan_ppkn = 0.00;
        }
        //dd($rata_rata_latihan_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_latihan_indonesia));
        if(array_sum($nilai_latihan_indonesia) > 0)
        {
            for($key = 0; $key < count($nilai_latihan_indonesia); $key++)
            {
                if($nilai_latihan_indonesia[$key] > 0)
                {
                    $nilai_latihan_indonesia_yes[] = $nilai_latihan_indonesia[$key];
                }
            }
        $jml_pel_latihan_indonesia    =count($nilai_latihan_indonesia_yes);
        $sum_pel_latihan_indonesia    =array_sum($nilai_latihan_indonesia_yes);
        $rata_rata_latihan_indonesia  =number_format((float)$sum_pel_latihan_indonesia / $jml_pel_latihan_indonesia, 2, '.', '');
        }
        elseif(array_sum($nilai_latihan_indonesia) == 0)
        {
            $rata_rata_latihan_indonesia = 0.00;
        }
        //dd($rata_rata_latihan_indonesia);
        if(array_sum($nilai_latihan_matematika) > 0)
        {
            for($key = 0; $key < count($nilai_latihan_matematika); $key++)
            {
                if($nilai_latihan_matematika[$key] > 0)
                {
                    $nilai_latihan_matematika_yes[] = $nilai_latihan_matematika[$key];
                }
            }
        $jml_pel_latihan_matematika    =count($nilai_latihan_matematika_yes);
        $sum_pel_latihan_matematika    =array_sum($nilai_latihan_matematika_yes);
        $rata_rata_latihan_matematika  =number_format((float)$sum_pel_latihan_matematika / $jml_pel_latihan_matematika, 2, '.', '');
        }
        elseif(array_sum($nilai_latihan_matematika) == 0)
        {
            $rata_rata_latihan_matematika = 0.00;
        }

        if(array_sum($nilai_latihan_ipa) > 0)
        {
            for($key = 0; $key < count($nilai_latihan_ipa); $key++)
            {
                if($nilai_latihan_ipa[$key] > 0)
                {
                    $nilai_latihan_ipa_yes[] = $nilai_latihan_ipa[$key];
            }
            }
        $jml_pel_latihan_ipa    =count($nilai_latihan_ipa_yes);
        $sum_pel_latihan_ipa    =array_sum($nilai_latihan_ipa_yes);
        $rata_rata_latihan_ipa  =number_format((float)$sum_pel_latihan_ipa / $jml_pel_latihan_ipa, 2, '.', '');
        }
        elseif(array_sum($nilai_latihan_ipa) == 0)
        {
            $rata_rata_latihan_ipa = 0.00;
        }

        if(array_sum($nilai_latihan_ips) > 0)
        {
            for($key = 0; $key < count($nilai_latihan_ips); $key++)
            {
                if($nilai_latihan_ips[$key] > 0)
                {
                    $nilai_latihan_ips_yes[] = $nilai_latihan_ips[$key];
                }
            }
        $jml_pel_latihan_ips    =count($nilai_latihan_ips_yes);
        $sum_pel_latihan_ips    =array_sum($nilai_latihan_ips_yes);
        $rata_rata_latihan_ips  =number_format((float)$sum_pel_latihan_ips / $jml_pel_latihan_ips, 2, '.', '');
        }
        elseif(array_sum($nilai_latihan_ips) == 0)
        {
            $rata_rata_latihan_ips = 0.00;
        }

        if(array_sum($nilai_latihan_pjok) > 0)
        {
            for($key = 0; $key < count($nilai_latihan_pjok); $key++)
            {
                if($nilai_latihan_pjok[$key] > 0)
                {
                    $nilai_latihan_pjok_yes[] = $nilai_latihan_pjok[$key];
                }
            }
        $jml_pel_latihan_pjok    =count($nilai_latihan_pjok_yes);
        $sum_pel_latihan_pjok    =array_sum($nilai_latihan_pjok_yes);
        $rata_rata_latihan_pjok  =number_format((float)$sum_pel_latihan_pjok / $jml_pel_latihan_pjok, 2, '.', '');
        }
        elseif(array_sum($nilai_latihan_pjok) == 0)
        {
            $rata_rata_latihan_pjok = 0.00;
        }

        if(array_sum($nilai_latihan_sbk) > 0)
        {
            for($key = 0; $key < count($nilai_latihan_sbk); $key++)
            {
                if($nilai_latihan_sbk[$key] > 0)
                {
                    $nilai_latihan_sbk_yes[] = $nilai_latihan_sbk[$key];
                }
            }
        $jml_pel_latihan_sbk    =count($nilai_latihan_sbk_yes);
        $sum_pel_latihan_sbk    =array_sum($nilai_latihan_sbk_yes);
        $rata_rata_latihan_sbk  =number_format((float)$sum_pel_latihan_sbk / $jml_pel_latihan_sbk, 2, '.', '');
        }
        elseif(array_sum($nilai_latihan_sbk) == 0)
        {
            $rata_rata_latihan_sbk = 0.00;
        }

        // --------------------------------------------------------------------
        //menghitung nilai ulangan harian
        for($penilaian=3; $penilaian < 4; $penilaian++)
        {
            $tampung_uh_islam = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',1)
            ->pluck('nilai')->avg();
            $nilai_uh_islam[] = (int)$tampung_uh_islam;
            $tampung_uh_protestan = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',2)
            ->pluck('nilai')->avg();
            $nilai_uh_protestan[] = (int)$tampung_uh_protestan;
            $tampung_uh_katolik = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',3)
            ->pluck('nilai')->avg();
            $nilai_uh_katolik[] = (int)$tampung_uh_katolik;
            $tampung_uh_ppkn = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',4)
            ->pluck('nilai')->avg();
            $nilai_uh_ppkn[] = (int)$tampung_uh_ppkn;
            $tampung_uh_indonesia = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',5)
            ->pluck('nilai')->avg();
            $nilai_uh_indonesia[] = (int)$tampung_uh_indonesia;
            $tampung_uh_matematika = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',6)
            ->pluck('nilai')->avg();
            $nilai_uh_matematika[] = (int)$tampung_uh_matematika;
            $tampung_uh_ipa = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',7)
            ->pluck('nilai')->avg();
            $nilai_uh_ipa[] = (int)$tampung_uh_ipa;
            $tampung_uh_ips = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',8)
            ->pluck('nilai')->avg();
            $nilai_uh_ips[] = (int)$tampung_uh_ips;
            $tampung_uh_pjok = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',9)
            ->pluck('nilai')->avg();
            $nilai_uh_pjok[] = (int)$tampung_uh_pjok;
            $tampung_uh_sbk = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',10)
            ->pluck('nilai')->avg();
            $nilai_uh_sbk[] = (int)$tampung_uh_sbk;
        }

        if($students -> agama == "Islam")
        {
            if(array_sum($nilai_uh_islam) > 0)
            {
                for($key = 0; $key < count($nilai_uh_islam); $key++)
            {
                if($nilai_uh_islam[$key] > 0)
                {
                    $nilai_uh_islam_yes[] = $nilai_uh_islam[$key];
                }
            }
            $jml_pel_uh_islam    =count($nilai_uh_islam_yes);
            $sum_pel_uh_islam    =array_sum($nilai_uh_islam_yes);
            $rata_rata_uh_islam  =number_format((float)$sum_pel_uh_islam / $jml_pel_uh_islam, 2, '.', '');
            }
            elseif(array_sum($nilai_uh_islam) == 0)
            {
                $rata_rata_uh_islam = 0.00;
            }
        }

        if($students -> agama == "Kristen Protestan")
        {
            if(array_sum($nilai_uh_protestan) > 0)
            {
                for($key = 0; $key < count($nilai_uh_protestan); $key++)
            {
                if($nilai_uh_protestan[$key] > 0)
                {
                    $nilai_uh_protestan_yes[] = $nilai_uh_protestan[$key];
                }
            }
            $jml_pel_uh_protestan    =count($nilai_uh_protestan_yes);
            $sum_pel_uh_protestan    =array_sum($nilai_uh_protestan_yes);
            $rata_rata_uh_protestan  =number_format((float)$sum_pel_uh_protestan / $jml_pel_uh_protestan, 2, '.', '');
            }
            elseif(array_sum($nilai_uh_protestan) == 0)
            {
                $rata_rata_uh_protestan = 0.00;
            }
        }

        if($students -> agama == "Katolik")
        {
            if(array_sum($nilai_uh_katolik) > 0)
            {
                for($key = 0; $key < count($nilai_uh_katolik); $key++)
            {
                if($nilai_uh_katolik[$key] > 0)
                {
                    $nilai_uh_katolik_yes[] = $nilai_uh_katolik[$key];
                }
            }
            $jml_pel_uh_katolik    =count($nilai_uh_katolik_yes);
            $sum_pel_uh_katolik    =array_sum($nilai_uh_katolik_yes);
            $rata_rata_uh_katolik  =number_format((float)$sum_pel_uh_katolik / $jml_pel_uh_katolik, 2, '.', '');
            }
            elseif(array_sum($nilai_uh_katolik) == 0)
            {
                $rata_rata_uh_katolik = 0.00;
            }
        }


            if(array_sum($nilai_uh_ppkn) > 0)
        {
            for($key = 0; $key < count($nilai_uh_ppkn); $key++)
            {
                if($nilai_uh_ppkn[$key] > 0)
                {
                    $nilai_uh_ppkn_yes[] = $nilai_uh_ppkn[$key];
                }
            }
        $jml_pel_uh_ppkn    =count($nilai_uh_ppkn_yes);
        $sum_pel_uh_ppkn    =array_sum($nilai_uh_ppkn_yes);
        $rata_rata_uh_ppkn  =number_format((float)$sum_pel_uh_ppkn / $jml_pel_uh_ppkn, 2, '.', '');
        }
        elseif(array_sum($nilai_uh_ppkn) == 0)
        {
            $rata_rata_uh_ppkn = 0.00;
        }
        //dd($rata_rata_uh_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_uh_indonesia));
        if(array_sum($nilai_uh_indonesia) > 0)
        {
            for($key = 0; $key < count($nilai_uh_indonesia); $key++)
            {
                if($nilai_uh_indonesia[$key] > 0)
                {
                    $nilai_uh_indonesia_yes[] = $nilai_uh_indonesia[$key];
                }
            }
        $jml_pel_uh_indonesia    =count($nilai_uh_indonesia_yes);
        $sum_pel_uh_indonesia    =array_sum($nilai_uh_indonesia_yes);
        $rata_rata_uh_indonesia  =number_format((float)$sum_pel_uh_indonesia / $jml_pel_uh_indonesia, 2, '.', '');
        }
        elseif(array_sum($nilai_uh_indonesia) == 0)
        {
            $rata_rata_uh_indonesia = 0.00;
        }
        //dd($rata_rata_uh_indonesia);
        if(array_sum($nilai_uh_matematika) > 0)
        {
            for($key = 0; $key < count($nilai_uh_matematika); $key++)
            {
                if($nilai_uh_matematika[$key] > 0)
                {
                    $nilai_uh_matematika_yes[] = $nilai_uh_matematika[$key];
                }
            }
        $jml_pel_uh_matematika    =count($nilai_uh_matematika_yes);
        $sum_pel_uh_matematika    =array_sum($nilai_uh_matematika_yes);
        $rata_rata_uh_matematika  =number_format((float)$sum_pel_uh_matematika / $jml_pel_uh_matematika, 2, '.', '');
        }
        elseif(array_sum($nilai_uh_matematika) == 0)
        {
            $rata_rata_uh_matematika = 0.00;
        }

        if(array_sum($nilai_uh_ipa) > 0)
        {
            for($key = 0; $key < count($nilai_uh_ipa); $key++)
            {
                if($nilai_uh_ipa[$key] > 0)
                {
                    $nilai_uh_ipa_yes[] = $nilai_uh_ipa[$key];
            }
            }
        $jml_pel_uh_ipa    =count($nilai_uh_ipa_yes);
        $sum_pel_uh_ipa    =array_sum($nilai_uh_ipa_yes);
        $rata_rata_uh_ipa  =number_format((float)$sum_pel_uh_ipa / $jml_pel_uh_ipa, 2, '.', '');
        }
        elseif(array_sum($nilai_uh_ipa) == 0)
        {
            $rata_rata_uh_ipa = 0.00;
        }

        if(array_sum($nilai_uh_ips) > 0)
        {
            for($key = 0; $key < count($nilai_uh_ips); $key++)
            {
                if($nilai_uh_ips[$key] > 0)
                {
                    $nilai_uh_ips_yes[] = $nilai_uh_ips[$key];
                }
            }
        $jml_pel_uh_ips    =count($nilai_uh_ips_yes);
        $sum_pel_uh_ips    =array_sum($nilai_uh_ips_yes);
        $rata_rata_uh_ips  =number_format((float)$sum_pel_uh_ips / $jml_pel_uh_ips, 2, '.', '');
        }
        elseif(array_sum($nilai_uh_ips) == 0)
        {
            $rata_rata_uh_ips = 0.00;
        }

        if(array_sum($nilai_uh_pjok) > 0)
        {
            for($key = 0; $key < count($nilai_uh_pjok); $key++)
            {
                if($nilai_uh_pjok[$key] > 0)
                {
                    $nilai_uh_pjok_yes[] = $nilai_uh_pjok[$key];
                }
            }
        $jml_pel_uh_pjok    =count($nilai_uh_pjok_yes);
        $sum_pel_uh_pjok    =array_sum($nilai_uh_pjok_yes);
        $rata_rata_uh_pjok  =number_format((float)$sum_pel_uh_pjok / $jml_pel_uh_pjok, 2, '.', '');
        }
        elseif(array_sum($nilai_uh_pjok) == 0)
        {
            $rata_rata_uh_pjok = 0.00;
        }

        if(array_sum($nilai_uh_sbk) > 0)
        {
            for($key = 0; $key < count($nilai_uh_sbk); $key++)
            {
                if($nilai_uh_sbk[$key] > 0)
                {
                    $nilai_uh_sbk_yes[] = $nilai_uh_sbk[$key];
                }
            }
        $jml_pel_uh_sbk    =count($nilai_uh_sbk_yes);
        $sum_pel_uh_sbk    =array_sum($nilai_uh_sbk_yes);
        $rata_rata_uh_sbk  =number_format((float)$sum_pel_uh_sbk / $jml_pel_uh_sbk, 2, '.', '');
        }
        elseif(array_sum($nilai_uh_sbk) == 0)
        {
            $rata_rata_uh_sbk = 0.00;
        }

        // --------------------------------------------------------------------
        //menghitung nilai pts
        for($penilaian=4; $penilaian < 5; $penilaian++)
        {
            $tampung_pts_islam = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',1)
            ->pluck('nilai')->avg();
            $nilai_pts_islam[] = (int)$tampung_pts_islam;
            $tampung_pts_protestan = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',2)
            ->pluck('nilai')->avg();
            $nilai_pts_protestan[] = (int)$tampung_pts_protestan;
            $tampung_pts_katolik = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',3)
            ->pluck('nilai')->avg();
            $nilai_pts_katolik[] = (int)$tampung_pts_katolik;
            $tampung_pts_ppkn = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',4)
            ->pluck('nilai')->avg();
            $nilai_pts_ppkn[] = (int)$tampung_pts_ppkn;
            $tampung_pts_indonesia = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',5)
            ->pluck('nilai')->avg();
            $nilai_pts_indonesia[] = (int)$tampung_pts_indonesia;
            $tampung_pts_matematika = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',6)
            ->pluck('nilai')->avg();
            $nilai_pts_matematika[] = (int)$tampung_pts_matematika;
            $tampung_pts_ipa = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',7)
            ->pluck('nilai')->avg();
            $nilai_pts_ipa[] = (int)$tampung_pts_ipa;
            $tampung_pts_ips = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',8)
            ->pluck('nilai')->avg();
            $nilai_pts_ips[] = (int)$tampung_pts_ips;
            $tampung_pts_pjok = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',9)
            ->pluck('nilai')->avg();
            $nilai_pts_pjok[] = (int)$tampung_pts_pjok;
            $tampung_pts_sbk = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',10)
            ->pluck('nilai')->avg();
            $nilai_pts_sbk[] = (int)$tampung_pts_sbk;
        }

        if($students -> agama == "Islam")
        {
            if(array_sum($nilai_pts_islam) > 0)
            {
                for($key = 0; $key < count($nilai_pts_islam); $key++)
            {
                if($nilai_pts_islam[$key] > 0)
                {
                    $nilai_pts_islam_yes[] = $nilai_pts_islam[$key];
                }
            }
            $jml_pel_pts_islam    =count($nilai_pts_islam_yes);
            $sum_pel_pts_islam    =array_sum($nilai_pts_islam_yes);
            $rata_rata_pts_islam  =number_format((float)$sum_pel_pts_islam / $jml_pel_pts_islam, 2, '.', '');
            }
            elseif(array_sum($nilai_pts_islam) == 0)
            {
                $rata_rata_pts_islam = 0.00;
            }
        }

        if($students -> agama == "Kristen Protestan")
        {
            if(array_sum($nilai_pts_protestan) > 0)
            {
                for($key = 0; $key < count($nilai_pts_protestan); $key++)
            {
                if($nilai_pts_protestan[$key] > 0)
                {
                    $nilai_pts_protestan_yes[] = $nilai_pts_protestan[$key];
                }
            }
            $jml_pel_pts_protestan    =count($nilai_pts_protestan_yes);
            $sum_pel_pts_protestan    =array_sum($nilai_pts_protestan_yes);
            $rata_rata_pts_protestan  =number_format((float)$sum_pel_pts_protestan / $jml_pel_pts_protestan, 2, '.', '');
            }
            elseif(array_sum($nilai_pts_protestan) == 0)
            {
                $rata_rata_pts_protestan = 0.00;
            }
        }

        if($students -> agama == "Katolik")
        {
            if(array_sum($nilai_pts_katolik) > 0)
            {
                for($key = 0; $key < count($nilai_pts_katolik); $key++)
            {
                if($nilai_pts_katolik[$key] > 0)
                {
                    $nilai_pts_katolik_yes[] = $nilai_pts_katolik[$key];
                }
            }
            $jml_pel_pts_katolik    =count($nilai_pts_katolik_yes);
            $sum_pel_pts_katolik    =array_sum($nilai_pts_katolik_yes);
            $rata_rata_pts_katolik  =number_format((float)$sum_pel_pts_katolik / $jml_pel_pts_katolik, 2, '.', '');
            }
            elseif(array_sum($nilai_pts_katolik) == 0)
            {
                $rata_rata_pts_katolik = 0.00;
            }
        }

        if(array_sum($nilai_pts_ppkn) > 0)
        {
            for($key = 0; $key < count($nilai_pts_ppkn); $key++)
            {
                if($nilai_pts_ppkn[$key] > 0)
                {
                    $nilai_pts_ppkn_yes[] = $nilai_pts_ppkn[$key];
                }
            }
        $jml_pel_pts_ppkn    =count($nilai_pts_ppkn_yes);
        $sum_pel_pts_ppkn    =array_sum($nilai_pts_ppkn_yes);
        $rata_rata_pts_ppkn  =number_format((float)$sum_pel_pts_ppkn / $jml_pel_pts_ppkn, 2, '.', '');
        }
        elseif(array_sum($nilai_pts_ppkn) == 0)
        {
            $rata_rata_pts_ppkn = 0.00;
        }
        //dd($rata_rata_pts_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_pts_indonesia));
        if(array_sum($nilai_pts_indonesia) > 0)
        {
            for($key = 0; $key < count($nilai_pts_indonesia); $key++)
            {
                if($nilai_pts_indonesia[$key] > 0)
                {
                    $nilai_pts_indonesia_yes[] = $nilai_pts_indonesia[$key];
                }
            }
        $jml_pel_pts_indonesia    =count($nilai_pts_indonesia_yes);
        $sum_pel_pts_indonesia    =array_sum($nilai_pts_indonesia_yes);
        $rata_rata_pts_indonesia  =number_format((float)$sum_pel_pts_indonesia / $jml_pel_pts_indonesia, 2, '.', '');
        }
        elseif(array_sum($nilai_pts_indonesia) == 0)
        {
            $rata_rata_pts_indonesia = 0.00;
        }
        //dd($rata_rata_pts_indonesia);
        if(array_sum($nilai_pts_matematika) > 0)
        {
            for($key = 0; $key < count($nilai_pts_matematika); $key++)
            {
                if($nilai_pts_matematika[$key] > 0)
                {
                    $nilai_pts_matematika_yes[] = $nilai_pts_matematika[$key];
                }
            }
        $jml_pel_pts_matematika    =count($nilai_pts_matematika_yes);
        $sum_pel_pts_matematika    =array_sum($nilai_pts_matematika_yes);
        $rata_rata_pts_matematika  =number_format((float)$sum_pel_pts_matematika / $jml_pel_pts_matematika, 2, '.', '');
        }
        elseif(array_sum($nilai_pts_matematika) == 0)
        {
            $rata_rata_pts_matematika = 0.00;
        }

        if(array_sum($nilai_pts_ipa) > 0)
        {
            for($key = 0; $key < count($nilai_pts_ipa); $key++)
            {
                if($nilai_pts_ipa[$key] > 0)
                {
                    $nilai_pts_ipa_yes[] = $nilai_pts_ipa[$key];
            }
            }
        $jml_pel_pts_ipa    =count($nilai_pts_ipa_yes);
        $sum_pel_pts_ipa    =array_sum($nilai_pts_ipa_yes);
        $rata_rata_pts_ipa  =number_format((float)$sum_pel_pts_ipa / $jml_pel_pts_ipa, 2, '.', '');
        }
        elseif(array_sum($nilai_pts_ipa) == 0)
        {
            $rata_rata_pts_ipa = 0.00;
        }

        if(array_sum($nilai_pts_ips) > 0)
        {
            for($key = 0; $key < count($nilai_pts_ips); $key++)
            {
                if($nilai_pts_ips[$key] > 0)
                {
                    $nilai_pts_ips_yes[] = $nilai_pts_ips[$key];
                }
            }
        $jml_pel_pts_ips    =count($nilai_pts_ips_yes);
        $sum_pel_pts_ips    =array_sum($nilai_pts_ips_yes);
        $rata_rata_pts_ips  =number_format((float)$sum_pel_pts_ips / $jml_pel_pts_ips, 2, '.', '');
        }
        elseif(array_sum($nilai_pts_ips) == 0)
        {
            $rata_rata_pts_ips = 0.00;
        }

        if(array_sum($nilai_pts_pjok) > 0)
        {
            for($key = 0; $key < count($nilai_pts_pjok); $key++)
            {
                if($nilai_pts_pjok[$key] > 0)
                {
                    $nilai_pts_pjok_yes[] = $nilai_pts_pjok[$key];
                }
            }
        $jml_pel_pts_pjok    =count($nilai_pts_pjok_yes);
        $sum_pel_pts_pjok    =array_sum($nilai_pts_pjok_yes);
        $rata_rata_pts_pjok  =number_format((float)$sum_pel_pts_pjok / $jml_pel_pts_pjok, 2, '.', '');
        }
        elseif(array_sum($nilai_pts_pjok) == 0)
        {
            $rata_rata_pts_pjok = 0.00;
        }

        if(array_sum($nilai_pts_sbk) > 0)
        {
            for($key = 0; $key < count($nilai_pts_sbk); $key++)
            {
                if($nilai_pts_sbk[$key] > 0)
                {
                    $nilai_pts_sbk_yes[] = $nilai_pts_sbk[$key];
                }
            }
        $jml_pel_pts_sbk    =count($nilai_pts_sbk_yes);
        $sum_pel_pts_sbk    =array_sum($nilai_pts_sbk_yes);
        $rata_rata_pts_sbk  =number_format((float)$sum_pel_pts_sbk / $jml_pel_pts_sbk, 2, '.', '');
        }
        elseif(array_sum($nilai_pts_sbk) == 0)
        {
            $rata_rata_pts_sbk = 0.00;
        }

        // --------------------------------------------------------------------
        //menghitung nilai pas
        for($penilaian=5; $penilaian < 6; $penilaian++)
        {
            $tampung_pas_islam = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',1)
            ->pluck('nilai')->avg();
            $nilai_pas_islam[] = (int)$tampung_pas_islam;
            $tampung_pas_protestan = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',2)
            ->pluck('nilai')->avg();
            $nilai_pas_protestan[] = (int)$tampung_pas_protestan;
            $tampung_pas_katolik = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',3)
            ->pluck('nilai')->avg();
            $nilai_pas_katolik[] = (int)$tampung_pas_katolik;
            $tampung_pas_ppkn = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',4)
            ->pluck('nilai')->avg();
            $nilai_pas_ppkn[] = (int)$tampung_pas_ppkn;
            $tampung_pas_indonesia = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',5)
            ->pluck('nilai')->avg();
            $nilai_pas_indonesia[] = (int)$tampung_pas_indonesia;
            $tampung_pas_matematika = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',6)
            ->pluck('nilai')->avg();
            $nilai_pas_matematika[] = (int)$tampung_pas_matematika;
            $tampung_pas_ipa = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',7)
            ->pluck('nilai')->avg();
            $nilai_pas_ipa[] = (int)$tampung_pas_ipa;
            $tampung_pas_ips = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',8)
            ->pluck('nilai')->avg();
            $nilai_pas_ips[] = (int)$tampung_pas_ips;
            $tampung_pas_pjok = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',9)
            ->pluck('nilai')->avg();
            $nilai_pas_pjok[] = (int)$tampung_pas_pjok;
            $tampung_pas_sbk = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',10)
            ->pluck('nilai')->avg();
            $nilai_pas_sbk[] = (int)$tampung_pas_sbk;
        }

        if($students -> agama == "Islam")
        {
            if(array_sum($nilai_pas_islam) > 0)
            {
                for($key = 0; $key < count($nilai_pas_islam); $key++)
            {
                if($nilai_pas_islam[$key] > 0)
                {
                    $nilai_pas_islam_yes[] = $nilai_pas_islam[$key];
                }
            }
            $jml_pel_pas_islam    =count($nilai_pas_islam_yes);
            $sum_pel_pas_islam    =array_sum($nilai_pas_islam_yes);
            $rata_rata_pas_islam  =number_format((float)$sum_pel_pas_islam / $jml_pel_pas_islam, 2, '.', '');
            }
            elseif(array_sum($nilai_pas_islam) == 0)
            {
                $rata_rata_pas_islam = 0.00;
            }
        }

        if($students -> agama == "Kristen Protestan")
        {
            if(array_sum($nilai_pas_protestan) > 0)
            {
                for($key = 0; $key < count($nilai_pas_protestan); $key++)
            {
                if($nilai_pas_protestan[$key] > 0)
                {
                    $nilai_pas_protestan_yes[] = $nilai_pas_protestan[$key];
                }
            }
            $jml_pel_pas_protestan    =count($nilai_pas_protestan_yes);
            $sum_pel_pas_protestan    =array_sum($nilai_pas_protestan_yes);
            $rata_rata_pas_protestan  =number_format((float)$sum_pel_pas_protestan / $jml_pel_pas_protestan, 2, '.', '');
            }
            elseif(array_sum($nilai_pas_protestan) == 0)
            {
                $rata_rata_pas_protestan = 0.00;
            }
        }

        if($students -> agama == "Katolik")
        {
            if(array_sum($nilai_pas_katolik) > 0)
            {
                for($key = 0; $key < count($nilai_pas_katolik); $key++)
            {
                if($nilai_pas_katolik[$key] > 0)
                {
                    $nilai_pas_katolik_yes[] = $nilai_pas_katolik[$key];
                }
            }
            $jml_pel_pas_katolik    =count($nilai_pas_katolik_yes);
            $sum_pel_pas_katolik    =array_sum($nilai_pas_katolik_yes);
            $rata_rata_pas_katolik  =number_format((float)$sum_pel_pas_katolik / $jml_pel_pas_katolik, 2, '.', '');
            }
            elseif(array_sum($nilai_pas_katolik) == 0)
            {
                $rata_rata_pas_katolik = 0.00;
            }
        }

        if(array_sum($nilai_pas_ppkn) > 0)
        {
            for($key = 0; $key < count($nilai_pas_ppkn); $key++)
            {
                if($nilai_pas_ppkn[$key] > 0)
                {
                    $nilai_pas_ppkn_yes[] = $nilai_pas_ppkn[$key];
                }
            }
        $jml_pel_pas_ppkn    =count($nilai_pas_ppkn_yes);
        $sum_pel_pas_ppkn    =array_sum($nilai_pas_ppkn_yes);
        $rata_rata_pas_ppkn  =number_format((float)$sum_pel_pas_ppkn / $jml_pel_pas_ppkn, 2, '.', '');
        }
        elseif(array_sum($nilai_pas_ppkn) == 0)
        {
            $rata_rata_pas_ppkn = 0.00;
        }
        //dd($rata_rata_pas_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_pas_indonesia));
        if(array_sum($nilai_pas_indonesia) > 0)
        {
            for($key = 0; $key < count($nilai_pas_indonesia); $key++)
            {
                if($nilai_pas_indonesia[$key] > 0)
                {
                    $nilai_pas_indonesia_yes[] = $nilai_pas_indonesia[$key];
                }
            }
        $jml_pel_pas_indonesia    =count($nilai_pas_indonesia_yes);
        $sum_pel_pas_indonesia    =array_sum($nilai_pas_indonesia_yes);
        $rata_rata_pas_indonesia  =number_format((float)$sum_pel_pas_indonesia / $jml_pel_pas_indonesia, 2, '.', '');
        }
        elseif(array_sum($nilai_pas_indonesia) == 0)
        {
            $rata_rata_pas_indonesia = 0.00;
        }
        //dd($rata_rata_pas_indonesia);
        if(array_sum($nilai_pas_matematika) > 0)
        {
            for($key = 0; $key < count($nilai_pas_matematika); $key++)
            {
                if($nilai_pas_matematika[$key] > 0)
                {
                    $nilai_pas_matematika_yes[] = $nilai_pas_matematika[$key];
                }
            }
        $jml_pel_pas_matematika    =count($nilai_pas_matematika_yes);
        $sum_pel_pas_matematika    =array_sum($nilai_pas_matematika_yes);
        $rata_rata_pas_matematika  =number_format((float)$sum_pel_pas_matematika / $jml_pel_pas_matematika, 2, '.', '');
        }
        elseif(array_sum($nilai_pas_matematika) == 0)
        {
            $rata_rata_pas_matematika = 0.00;
        }

        if(array_sum($nilai_pas_ipa) > 0)
        {
            for($key = 0; $key < count($nilai_pas_ipa); $key++)
            {
                if($nilai_pas_ipa[$key] > 0)
                {
                    $nilai_pas_ipa_yes[] = $nilai_pas_ipa[$key];
            }
            }
        $jml_pel_pas_ipa    =count($nilai_pas_ipa_yes);
        $sum_pel_pas_ipa    =array_sum($nilai_pas_ipa_yes);
        $rata_rata_pas_ipa  =number_format((float)$sum_pel_pas_ipa / $jml_pel_pas_ipa, 2, '.', '');
        }
        elseif(array_sum($nilai_pas_ipa) == 0)
        {
            $rata_rata_pas_ipa = 0.00;
        }

        if(array_sum($nilai_pas_ips) > 0)
        {
            for($key = 0; $key < count($nilai_pas_ips); $key++)
            {
                if($nilai_pas_ips[$key] > 0)
                {
                    $nilai_pas_ips_yes[] = $nilai_pas_ips[$key];
                }
            }
        $jml_pel_pas_ips    =count($nilai_pas_ips_yes);
        $sum_pel_pas_ips    =array_sum($nilai_pas_ips_yes);
        $rata_rata_pas_ips  =number_format((float)$sum_pel_pas_ips / $jml_pel_pas_ips, 2, '.', '');
        }
        elseif(array_sum($nilai_pas_ips) == 0)
        {
            $rata_rata_pas_ips = 0.00;
        }

        if(array_sum($nilai_pas_pjok) > 0)
        {
            for($key = 0; $key < count($nilai_pas_pjok); $key++)
            {
                if($nilai_pas_pjok[$key] > 0)
                {
                    $nilai_pas_pjok_yes[] = $nilai_pas_pjok[$key];
                }
            }
        $jml_pel_pas_pjok    =count($nilai_pas_pjok_yes);
        $sum_pel_pas_pjok    =array_sum($nilai_pas_pjok_yes);
        $rata_rata_pas_pjok  =number_format((float)$sum_pel_pas_pjok / $jml_pel_pas_pjok, 2, '.', '');
        }
        elseif(array_sum($nilai_pas_pjok) == 0)
        {
            $rata_rata_pas_pjok = 0.00;
        }

        if(array_sum($nilai_pas_sbk) > 0)
        {
            for($key = 0; $key < count($nilai_pas_sbk); $key++)
            {
                if($nilai_pas_sbk[$key] > 0)
                {
                    $nilai_pas_sbk_yes[] = $nilai_pas_sbk[$key];
                }
            }
        $jml_pel_pas_sbk    =count($nilai_pas_sbk_yes);
        $sum_pel_pas_sbk    =array_sum($nilai_pas_sbk_yes);
        $rata_rata_pas_sbk  =number_format((float)$sum_pel_pas_sbk / $jml_pel_pas_sbk, 2, '.', '');
        }
        elseif(array_sum($nilai_pas_sbk) == 0)
        {
            $rata_rata_pas_sbk = 0.00;
        }

        // --------------------------------------------------------------------
        // hitung nilai raport
        if($students -> agama == "Islam")
        {
            $raport_pengetahuan_islam = ((($rata_rata_tugas_islam
                                +$rata_rata_latihan_islam+$rata_rata_uh_islam)*2)
                                +($rata_rata_pts_islam*1)
                                +($rata_rata_pas_islam*1))/8;
            $raport_pengetahuan_agama = number_format((float)$raport_pengetahuan_islam, 1, '.', '');
        }
        if($students -> agama == "Kristen Protestan")
        {
            $raport_pengetahuan_protestan = ((($rata_rata_tugas_protestan
                                +$rata_rata_latihan_protestan+$rata_rata_uh_protestan)*2)
                                +($rata_rata_pts_protestan*1)
                                +($rata_rata_pas_protestan*1))/8;
            $raport_pengetahuan_agama = number_format((float)$raport_pengetahuan_protestan, 1, '.', '');
        }
        if($students -> agama == "Katolik")
        {
            $raport_pengetahuan_katolik = ((($rata_rata_tugas_katolik
                                +$rata_rata_latihan_katolik+$rata_rata_uh_katolik)*2)
                                +($rata_rata_pts_katolik*1)
                                +($rata_rata_pas_katolik*1))/8;
            $raport_pengetahuan_agama = number_format((float)$raport_pengetahuan_katolik, 1, '.', '');
        }
        $raport_pengetahuan_ppkn = ((($rata_rata_tugas_ppkn
                                +$rata_rata_latihan_ppkn+$rata_rata_uh_ppkn)*2)
                                +($rata_rata_pts_ppkn*1)
                                +($rata_rata_pas_ppkn*1))/8;
        $raport_pengetahuan_ppkn = number_format((float)$raport_pengetahuan_ppkn, 1, '.', '');
        $raport_pengetahuan_indonesia = ((($rata_rata_tugas_indonesia
                                +$rata_rata_latihan_indonesia+$rata_rata_uh_indonesia)*2)
                                +($rata_rata_pts_indonesia*1)
                                +($rata_rata_pas_indonesia*1))/8;
        $raport_pengetahuan_indonesia = number_format((float)$raport_pengetahuan_indonesia, 1, '.', '');
        $raport_pengetahuan_matematika = ((($rata_rata_tugas_matematika
                                +$rata_rata_latihan_matematika+$rata_rata_uh_matematika)*2)
                                +($rata_rata_pts_matematika*1)
                                +($rata_rata_pas_matematika*1))/8;
        $raport_pengetahuan_matematika = number_format((float)$raport_pengetahuan_matematika, 1, '.', '');
        $raport_pengetahuan_ipa = ((($rata_rata_tugas_ipa
                                +$rata_rata_latihan_ipa+$rata_rata_uh_ipa)*2)
                                +($rata_rata_pts_ipa*1)
                                +($rata_rata_pas_ipa*1))/8;
        $raport_pengetahuan_ipa = number_format((float)$raport_pengetahuan_ipa, 1, '.', '');
        $raport_pengetahuan_ips = ((($rata_rata_tugas_ips
                                +$rata_rata_latihan_ips+$rata_rata_uh_ips)*2)
                                +($rata_rata_pts_ips*1)
                                +($rata_rata_pas_ips*1))/8;
        $raport_pengetahuan_ips = number_format((float)$raport_pengetahuan_ips, 1, '.', '');
        $raport_pengetahuan_pjok = ((($rata_rata_tugas_pjok
                                +$rata_rata_latihan_pjok+$rata_rata_uh_pjok)*2)
                                +($rata_rata_pts_pjok*1)
                                +($rata_rata_pas_pjok*1))/8;
        $raport_pengetahuan_pjok = number_format((float)$raport_pengetahuan_pjok, 1, '.', '');
        $raport_pengetahuan_sbk = ((($rata_rata_tugas_sbk
                                +$rata_rata_latihan_sbk+$rata_rata_uh_sbk)*2)
                                +($rata_rata_pts_sbk*1)
                                +($rata_rata_pas_sbk*1))/8;
        $raport_pengetahuan_sbk = number_format((float)$raport_pengetahuan_sbk, 1, '.', '');
        $kkm = 65;
        // deskripsi agama
        if($raport_pengetahuan_agama<$kkm)
            {
                $predikat_huruf_agama = "D";
                $predikat_deskripsi_agama = "Kurang";
            }
        elseif($raport_pengetahuan_agama > $kkm && $raport_pengetahuan_agama <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_huruf_agama = "C";
                $predikat_deskripsi_agama = "Cukup";
            }
        elseif($raport_pengetahuan_agama > ($kkm+1*((100-$kkm)/3)) && $raport_pengetahuan_agama <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_agama = "B";
                $predikat_deskripsi_agama = "Baik";
            }
        elseif($raport_pengetahuan_agama > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_agama = "A";
                $predikat_deskripsi_agama = "Sangat Baik";
            }
        // -------------
        // deskripsi ppkn
        if($raport_pengetahuan_ppkn<$kkm)
            {
                $predikat_huruf_ppkn = "D";
                $predikat_deskripsi_ppkn = "Kurang";
            }
        elseif($raport_pengetahuan_ppkn > $kkm && $raport_pengetahuan_ppkn <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_huruf_ppkn = "C";
                $predikat_deskripsi_ppkn = "Cukup";
            }
        elseif($raport_pengetahuan_ppkn > ($kkm+1*((100-$kkm)/3)) && $raport_pengetahuan_ppkn <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_ppkn = "B";
                $predikat_deskripsi_ppkn = "Baik";
            }
        elseif($raport_pengetahuan_ppkn > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_ppkn = "A";
                $predikat_deskripsi_ppkn = "Sangat Baik";
            }
        // -------------
        // deskripsi indonesia
        if($raport_pengetahuan_indonesia<$kkm)
            {
                $predikat_huruf_indonesia = "D";
                $predikat_deskripsi_indonesia = "Kurang";
            }
        elseif($raport_pengetahuan_indonesia > $kkm && $raport_pengetahuan_indonesia <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_huruf_indonesia = "C";
                $predikat_deskripsi_indonesia = "Cukup";
            }
        elseif($raport_pengetahuan_indonesia > ($kkm+1*((100-$kkm)/3)) && $raport_pengetahuan_indonesia <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_indonesia = "B";
                $predikat_deskripsi_indonesia = "Baik";
            }
        elseif($raport_pengetahuan_indonesia > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_indonesia = "A";
                $predikat_deskripsi_indonesia = "Sangat Baik";
            }
        // -------------
        // deskripsi matematika
        if($raport_pengetahuan_matematika<$kkm)
            {
                $predikat_huruf_matematika = "D";
                $predikat_deskripsi_matematika = "Kurang";
            }
        elseif($raport_pengetahuan_matematika > $kkm && $raport_pengetahuan_matematika <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_huruf_matematika = "C";
                $predikat_deskripsi_matematika = "Cukup";
            }
        elseif($raport_pengetahuan_matematika > ($kkm+1*((100-$kkm)/3)) && $raport_pengetahuan_matematika <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_matematika = "B";
                $predikat_deskripsi_matematika = "Baik";
            }
        elseif($raport_pengetahuan_matematika > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_matematika = "A";
                $predikat_deskripsi_matematika = "Sangat Baik";
            }
        // -------------
        // deskripsi ipa
        if($raport_pengetahuan_ipa<$kkm)
            {
                $predikat_huruf_ipa = "D";
                $predikat_deskripsi_ipa = "Kurang";
            }
        elseif($raport_pengetahuan_ipa > $kkm && $raport_pengetahuan_ipa <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_huruf_ipa = "C";
                $predikat_deskripsi_ipa = "Cukup";
            }
        elseif($raport_pengetahuan_ipa > ($kkm+1*((100-$kkm)/3)) && $raport_pengetahuan_ipa <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_ipa = "B";
                $predikat_deskripsi_ipa = "Baik";
            }
        elseif($raport_pengetahuan_ipa > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_ipa = "A";
                $predikat_deskripsi_ipa = "Sangat Baik";
            }
        // -------------
        // deskripsi ips
        if($raport_pengetahuan_ips<$kkm)
            {
                $predikat_huruf_ips = "D";
                $predikat_deskripsi_ips = "Kurang";
            }
        elseif($raport_pengetahuan_ips > $kkm && $raport_pengetahuan_ips <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_huruf_ips = "C";
                $predikat_deskripsi_ips = "Cukup";
            }
        elseif($raport_pengetahuan_ips > ($kkm+1*((100-$kkm)/3)) && $raport_pengetahuan_ips <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_ips = "B";
                $predikat_deskripsi_ips = "Baik";
            }
        elseif($raport_pengetahuan_ips > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_ips = "A";
                $predikat_deskripsi_ips = "Sangat Baik";
            }
        // -------------
        // deskripsi pjok
        if($raport_pengetahuan_pjok<$kkm)
            {
                $predikat_huruf_pjok = "D";
                $predikat_deskripsi_pjok = "Kurang";
            }
        elseif($raport_pengetahuan_pjok > $kkm && $raport_pengetahuan_pjok <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_huruf_pjok = "C";
                $predikat_deskripsi_pjok = "Cukup";
            }
        elseif($raport_pengetahuan_pjok > ($kkm+1*((100-$kkm)/3)) && $raport_pengetahuan_pjok <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_pjok = "B";
                $predikat_deskripsi_pjok = "Baik";
            }
        elseif($raport_pengetahuan_pjok > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_pjok = "A";
                $predikat_deskripsi_pjok = "Sangat Baik";
            }
        // -------------
        // deskripsi sbk
        if($raport_pengetahuan_sbk<$kkm)
            {
                $predikat_huruf_sbk = "D";
                $predikat_deskripsi_sbk = "Kurang";
            }
        elseif($raport_pengetahuan_sbk > $kkm && $raport_pengetahuan_sbk <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_huruf_sbk = "C";
                $predikat_deskripsi_sbk = "Cukup";
            }
        elseif($raport_pengetahuan_sbk > ($kkm+1*((100-$kkm)/3)) && $raport_pengetahuan_sbk <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_sbk = "B";
                $predikat_deskripsi_sbk = "Baik";
            }
        elseif($raport_pengetahuan_sbk > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_huruf_sbk = "A";
                $predikat_deskripsi_sbk = "Sangat Baik";
            }
        // ---------------------------------------------
        if($students -> kelas == "Kelas 1")
        {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama

                                +$raport_pengetahuan_indonesia
                                +$raport_pengetahuan_matematika
                                +$raport_pengetahuan_pjok;
        }
        if($students -> kelas == "Kelas 2")
        {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama

                                +$raport_pengetahuan_indonesia
                                +$raport_pengetahuan_matematika
                                +$raport_pengetahuan_pjok;
        }
        if($students -> kelas == "Kelas 3")
        {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                                +$raport_pengetahuan_ppkn
                                +$raport_pengetahuan_indonesia
                                +$raport_pengetahuan_matematika
                                +$raport_pengetahuan_ipa
                                +$raport_pengetahuan_ips
                                +$raport_pengetahuan_pjok
                                +$raport_pengetahuan_sbk;
        }
        if($students -> kelas == "Kelas 4")
        {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                                +$raport_pengetahuan_ppkn
                                +$raport_pengetahuan_indonesia
                                +$raport_pengetahuan_matematika
                                +$raport_pengetahuan_ipa
                                +$raport_pengetahuan_ips
                                +$raport_pengetahuan_pjok
                                +$raport_pengetahuan_sbk;
        }
        if($students -> kelas == "Kelas 5")
        {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                                +$raport_pengetahuan_ppkn
                                +$raport_pengetahuan_indonesia
                                +$raport_pengetahuan_matematika
                                +$raport_pengetahuan_ipa
                                +$raport_pengetahuan_ips
                                +$raport_pengetahuan_pjok
                                +$raport_pengetahuan_sbk;
        }
        if($students -> kelas == "Kelas 6")
        {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                                +$raport_pengetahuan_ppkn
                                +$raport_pengetahuan_indonesia
                                +$raport_pengetahuan_matematika
                                +$raport_pengetahuan_ipa
                                +$raport_pengetahuan_ips
                                +$raport_pengetahuan_pjok
                                +$raport_pengetahuan_sbk;
        }

        $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
        $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan/8, 1, '.', '');

        //$jumlah_raport = number_format((float)$jumlah_raport_pengetahuan+$jumlah_raport_pengetahuan, 1, '.', '');
        //$ratarata_raport = number_format((float)($ratarata_raport_pengetahuan+$ratarata_raport_pengetahuan)/2, 1, '.', '');

        //menghitung nilai keterampilan
        for($penilaian=18; $penilaian < 22; $penilaian++)
        {
            $tampung_keterampilan_islam = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',1)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_islam[] = (int)$tampung_keterampilan_islam;
            $tampung_keterampilan_protestan = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',2)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_protestan[] = (int)$tampung_keterampilan_protestan;
            $tampung_keterampilan_katolik = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',3)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_katolik[] = (int)$tampung_keterampilan_katolik;
            $tampung_keterampilan_ppkn = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',4)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_ppkn[] = (int)$tampung_keterampilan_ppkn;
            $tampung_keterampilan_indonesia = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',5)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_indonesia[] = (int)$tampung_keterampilan_indonesia;
            $tampung_keterampilan_matematika = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',6)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_matematika[] = (int)$tampung_keterampilan_matematika;
            $tampung_keterampilan_ipa = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',7)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_ipa[] = (int)$tampung_keterampilan_ipa;
            $tampung_keterampilan_ips = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',8)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_ips[] = (int)$tampung_keterampilan_ips;
            $tampung_keterampilan_pjok = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',9)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_pjok[] = (int)$tampung_keterampilan_pjok;
            $tampung_keterampilan_sbk = Nilai::all()
            ->where('siswa_id','=',$id)
            ->where('penilaian_id','=',$penilaian)
            ->where('mapel_id','=',10)
            ->pluck('nilai')->avg();
            $nilai_keterampilan_sbk[] = (int)$tampung_keterampilan_sbk;
        }
        //dd($nilai_keterampilan_indonesia);
        if($students -> agama == "Islam")
        {
            if(array_sum($nilai_keterampilan_islam) > 0)
            {
                for($key = 0; $key < count($nilai_keterampilan_islam); $key++)
            {
                if($nilai_keterampilan_islam[$key] > 0)
                {
                    $nilai_keterampilan_islam_yes[] = $nilai_keterampilan_islam[$key];
                }
            }
            $jml_pel_keterampilan_islam    =count($nilai_keterampilan_islam_yes);
            $sum_pel_keterampilan_islam    =array_sum($nilai_keterampilan_islam_yes);
            $rata_rata_keterampilan_islam  =number_format((float)$sum_pel_keterampilan_islam / $jml_pel_keterampilan_islam, 2, '.', '');
            }
            elseif(array_sum($nilai_keterampilan_islam) == 0)
            {
                $rata_rata_keterampilan_islam = 0.00;
            }
        }

        if($students -> agama == "Kristen Protestan")
        {
            if(array_sum($nilai_keterampilan_protestan) > 0)
            {
                for($key = 0; $key < count($nilai_keterampilan_protestan); $key++)
            {
                if($nilai_keterampilan_protestan[$key] > 0)
                {
                    $nilai_keterampilan_protestan_yes[] = $nilai_keterampilan_protestan[$key];
                }
            }
            $jml_pel_keterampilan_protestan    =count($nilai_keterampilan_protestan_yes);
            $sum_pel_keterampilan_protestan    =array_sum($nilai_keterampilan_protestan_yes);
            $rata_rata_keterampilan_protestan  =number_format((float)$sum_pel_keterampilan_protestan / $jml_pel_keterampilan_protestan, 2, '.', '');
            }
            elseif(array_sum($nilai_keterampilan_protestan) == 0)
            {
                $rata_rata_keterampilan_protestan = 0.00;
            }
        }

        if($students -> agama == "Katolik")
        {
            if(array_sum($nilai_keterampilan_katolik) > 0)
            {
                for($key = 0; $key < count($nilai_keterampilan_katolik); $key++)
            {
                if($nilai_keterampilan_katolik[$key] > 0)
                {
                    $nilai_keterampilan_katolik_yes[] = $nilai_keterampilan_katolik[$key];
                }
            }
            $jml_pel_keterampilan_katolik    =count($nilai_keterampilan_katolik_yes);
            $sum_pel_keterampilan_katolik    =array_sum($nilai_keterampilan_katolik_yes);
            $rata_rata_keterampilan_katolik  =number_format((float)$sum_pel_keterampilan_katolik / $jml_pel_keterampilan_katolik, 2, '.', '');
            }
            elseif(array_sum($nilai_keterampilan_katolik) == 0)
            {
                $rata_rata_keterampilan_katolik = 0.00;
            }
        }

        if(array_sum($nilai_keterampilan_ppkn) > 0)
        {
            for($key = 0; $key < count($nilai_keterampilan_ppkn); $key++)
            {
                if($nilai_keterampilan_ppkn[$key] > 0)
                {
                    $nilai_keterampilan_ppkn_yes[] = $nilai_keterampilan_ppkn[$key];
                }
            }
        $jml_pel_keterampilan_ppkn    =count($nilai_keterampilan_ppkn_yes);
        $sum_pel_keterampilan_ppkn    =array_sum($nilai_keterampilan_ppkn_yes);
        $rata_rata_keterampilan_ppkn  =number_format((float)$sum_pel_keterampilan_ppkn / $jml_pel_keterampilan_ppkn, 2, '.', '');
        }
        elseif(array_sum($nilai_keterampilan_ppkn) == 0)
        {
            $rata_rata_keterampilan_ppkn = 0.00;
        }
        //dd($rata_rata_keterampilan_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_keterampilan_indonesia));
        if(array_sum($nilai_keterampilan_indonesia) > 0)
        {
            for($key = 0; $key < count($nilai_keterampilan_indonesia); $key++)
            {
                if($nilai_keterampilan_indonesia[$key] > 0)
                {
                    $nilai_keterampilan_indonesia_yes[] = $nilai_keterampilan_indonesia[$key];
                }
            }
        $jml_pel_keterampilan_indonesia    =count($nilai_keterampilan_indonesia_yes);
        $sum_pel_keterampilan_indonesia    =array_sum($nilai_keterampilan_indonesia_yes);
        $rata_rata_keterampilan_indonesia  =number_format((float)$sum_pel_keterampilan_indonesia / $jml_pel_keterampilan_indonesia, 2, '.', '');
        }
        elseif(array_sum($nilai_keterampilan_indonesia) == 0)
        {
            $rata_rata_keterampilan_indonesia = 0.00;
        }
        //dd($rata_rata_keterampilan_indonesia);
        if(array_sum($nilai_keterampilan_matematika) > 0)
        {
            for($key = 0; $key < count($nilai_keterampilan_matematika); $key++)
            {
                if($nilai_keterampilan_matematika[$key] > 0)
                {
                    $nilai_keterampilan_matematika_yes[] = $nilai_keterampilan_matematika[$key];
                }
            }
        $jml_pel_keterampilan_matematika    =count($nilai_keterampilan_matematika_yes);
        $sum_pel_keterampilan_matematika    =array_sum($nilai_keterampilan_matematika_yes);
        $rata_rata_keterampilan_matematika  =number_format((float)$sum_pel_keterampilan_matematika / $jml_pel_keterampilan_matematika, 2, '.', '');
        }
        elseif(array_sum($nilai_keterampilan_matematika) == 0)
        {
            $rata_rata_keterampilan_matematika = 0.00;
        }

        if(array_sum($nilai_keterampilan_ipa) > 0)
        {
            for($key = 0; $key < count($nilai_keterampilan_ipa); $key++)
            {
                if($nilai_keterampilan_ipa[$key] > 0)
                {
                    $nilai_keterampilan_ipa_yes[] = $nilai_keterampilan_ipa[$key];
            }
            }
        $jml_pel_keterampilan_ipa    =count($nilai_keterampilan_ipa_yes);
        $sum_pel_keterampilan_ipa    =array_sum($nilai_keterampilan_ipa_yes);
        $rata_rata_keterampilan_ipa  =number_format((float)$sum_pel_keterampilan_ipa / $jml_pel_keterampilan_ipa, 2, '.', '');
        }
        elseif(array_sum($nilai_keterampilan_ipa) == 0)
        {
            $rata_rata_keterampilan_ipa = 0.00;
        }

        if(array_sum($nilai_keterampilan_ips) > 0)
        {
            for($key = 0; $key < count($nilai_keterampilan_ips); $key++)
            {
                if($nilai_keterampilan_ips[$key] > 0)
                {
                    $nilai_keterampilan_ips_yes[] = $nilai_keterampilan_ips[$key];
                }
            }
        $jml_pel_keterampilan_ips    =count($nilai_keterampilan_ips_yes);
        $sum_pel_keterampilan_ips    =array_sum($nilai_keterampilan_ips_yes);
        $rata_rata_keterampilan_ips  =number_format((float)$sum_pel_keterampilan_ips / $jml_pel_keterampilan_ips, 2, '.', '');
        }
        elseif(array_sum($nilai_keterampilan_ips) == 0)
        {
            $rata_rata_keterampilan_ips = 0.00;
        }

        if(array_sum($nilai_keterampilan_pjok) > 0)
        {
            for($key = 0; $key < count($nilai_keterampilan_pjok); $key++)
            {
                if($nilai_keterampilan_pjok[$key] > 0)
                {
                    $nilai_keterampilan_pjok_yes[] = $nilai_keterampilan_pjok[$key];
                }
            }
        $jml_pel_keterampilan_pjok    =count($nilai_keterampilan_pjok_yes);
        $sum_pel_keterampilan_pjok    =array_sum($nilai_keterampilan_pjok_yes);
        $rata_rata_keterampilan_pjok  =number_format((float)$sum_pel_keterampilan_pjok / $jml_pel_keterampilan_pjok, 2, '.', '');
        }
        elseif(array_sum($nilai_keterampilan_pjok) == 0)
        {
            $rata_rata_keterampilan_pjok = 0.00;
        }

        if(array_sum($nilai_keterampilan_sbk) > 0)
        {
            for($key = 0; $key < count($nilai_keterampilan_sbk); $key++)
            {
                if($nilai_keterampilan_sbk[$key] > 0)
                {
                    $nilai_keterampilan_sbk_yes[] = $nilai_keterampilan_sbk[$key];
                }
            }
        $jml_pel_keterampilan_sbk    =count($nilai_keterampilan_sbk_yes);
        $sum_pel_keterampilan_sbk    =array_sum($nilai_keterampilan_sbk_yes);
        $rata_rata_keterampilan_sbk  =number_format((float)$sum_pel_keterampilan_sbk / $jml_pel_keterampilan_sbk, 2, '.', '');
        }
        elseif(array_sum($nilai_keterampilan_sbk) == 0)
        {
            $rata_rata_keterampilan_sbk = 0.00;
        }

        // --------------------------------------------------------------------
        // hitung nilai raport keterampilan
        if($students -> agama == "Islam")
        {
            $raport_keterampilan_islam = ((($rata_rata_keterampilan_islam
                                +$rata_rata_keterampilan_islam+$rata_rata_keterampilan_islam)*2)
                                +($rata_rata_keterampilan_islam*1)
                                +($rata_rata_keterampilan_islam*1))/8;
            $raport_keterampilan_agama = number_format((float)$raport_keterampilan_islam, 1, '.', '');
        }
        if($students -> agama == "Kristen Protestan")
        {
            $raport_keterampilan_protestan = ((($rata_rata_keterampilan_protestan
                                +$rata_rata_keterampilan_protestan+$rata_rata_keterampilan_protestan)*2)
                                +($rata_rata_keterampilan_protestan*1)
                                +($rata_rata_keterampilan_protestan*1))/8;
            $raport_keterampilan_agama = number_format((float)$raport_keterampilan_protestan, 1, '.', '');
        }
        if($students -> agama == "Katolik")
        {
            $raport_keterampilan_katolik = ((($rata_rata_keterampilan_katolik
                                +$rata_rata_keterampilan_katolik+$rata_rata_keterampilan_katolik)*2)
                                +($rata_rata_keterampilan_katolik*1)
                                +($rata_rata_keterampilan_katolik*1))/8;
            $raport_keterampilan_agama = number_format((float)$raport_keterampilan_katolik, 1, '.', '');
        }
        $raport_keterampilan_ppkn = ((($rata_rata_keterampilan_ppkn
                                +$rata_rata_keterampilan_ppkn+$rata_rata_keterampilan_ppkn)*2)
                                +($rata_rata_keterampilan_ppkn*1)
                                +($rata_rata_keterampilan_ppkn*1))/8;
        $raport_keterampilan_ppkn = number_format((float)$raport_keterampilan_ppkn, 1, '.', '');
        $raport_keterampilan_indonesia = ((($rata_rata_keterampilan_indonesia
                                +$rata_rata_keterampilan_indonesia+$rata_rata_keterampilan_indonesia)*2)
                                +($rata_rata_keterampilan_indonesia*1)
                                +($rata_rata_keterampilan_indonesia*1))/8;
        $raport_keterampilan_indonesia = number_format((float)$raport_keterampilan_indonesia, 1, '.', '');
        $raport_keterampilan_matematika = ((($rata_rata_keterampilan_matematika
                                +$rata_rata_keterampilan_matematika+$rata_rata_keterampilan_matematika)*2)
                                +($rata_rata_keterampilan_matematika*1)
                                +($rata_rata_keterampilan_matematika*1))/8;
        $raport_keterampilan_matematika = number_format((float)$raport_keterampilan_matematika, 1, '.', '');
        $raport_keterampilan_ipa = ((($rata_rata_keterampilan_ipa
                                +$rata_rata_keterampilan_ipa+$rata_rata_keterampilan_ipa)*2)
                                +($rata_rata_keterampilan_ipa*1)
                                +($rata_rata_keterampilan_ipa*1))/8;
        $raport_keterampilan_ipa = number_format((float)$raport_keterampilan_ipa, 1, '.', '');
        $raport_keterampilan_ips = ((($rata_rata_keterampilan_ips
                                +$rata_rata_keterampilan_ips+$rata_rata_keterampilan_ips)*2)
                                +($rata_rata_keterampilan_ips*1)
                                +($rata_rata_keterampilan_ips*1))/8;
        $raport_keterampilan_ips = number_format((float)$raport_keterampilan_ips, 1, '.', '');
        $raport_keterampilan_pjok = ((($rata_rata_keterampilan_pjok
                                +$rata_rata_keterampilan_pjok+$rata_rata_keterampilan_pjok)*2)
                                +($rata_rata_keterampilan_pjok*1)
                                +($rata_rata_keterampilan_pjok*1))/8;
        $raport_keterampilan_pjok = number_format((float)$raport_keterampilan_pjok, 1, '.', '');
        $raport_keterampilan_sbk = ((($rata_rata_keterampilan_sbk
                                +$rata_rata_keterampilan_sbk+$rata_rata_keterampilan_sbk)*2)
                                +($rata_rata_keterampilan_sbk*1)
                                +($rata_rata_keterampilan_sbk*1))/8;
        $raport_keterampilan_sbk = number_format((float)$raport_keterampilan_sbk, 1, '.', '');
        //------------------------------------------------------
        // deskripsi keterampilan agama
        if($raport_keterampilan_agama<$kkm)
            {
                $predikat_keterampilan_huruf_agama = "D";
                $predikat_keterampilan_deskripsi_agama = "Kurang";
            }
        elseif($raport_keterampilan_agama > $kkm && $raport_keterampilan_agama <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_agama = "C";
                $predikat_keterampilan_deskripsi_agama = "Cukup";
            }
        elseif($raport_keterampilan_agama > ($kkm+1*((100-$kkm)/3)) && $raport_keterampilan_agama <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_agama = "B";
                $predikat_keterampilan_deskripsi_agama = "Baik";
            }
        elseif($raport_keterampilan_agama > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_agama = "A";
                $predikat_keterampilan_deskripsi_agama = "Sangat Baik";
            }
        // -------------
        // deskripsi ppkn
        if($raport_keterampilan_ppkn<$kkm)
            {
                $predikat_keterampilan_huruf_ppkn = "D";
                $predikat_keterampilan_deskripsi_ppkn = "Kurang";
            }
        elseif($raport_keterampilan_ppkn > $kkm && $raport_keterampilan_ppkn <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ppkn = "C";
                $predikat_keterampilan_deskripsi_ppkn = "Cukup";
            }
        elseif($raport_keterampilan_ppkn > ($kkm+1*((100-$kkm)/3)) && $raport_keterampilan_ppkn <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ppkn = "B";
                $predikat_keterampilan_deskripsi_ppkn = "Baik";
            }
        elseif($raport_keterampilan_ppkn > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ppkn = "A";
                $predikat_keterampilan_deskripsi_ppkn = "Sangat Baik";
            }
        // -------------
        // deskripsi indonesia
        if($raport_keterampilan_indonesia<$kkm)
            {
                $predikat_keterampilan_huruf_indonesia = "D";
                $predikat_keterampilan_deskripsi_indonesia = "Kurang";
            }
        elseif($raport_keterampilan_indonesia > $kkm && $raport_keterampilan_indonesia <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_indonesia = "C";
                $predikat_keterampilan_deskripsi_indonesia = "Cukup";
            }
        elseif($raport_keterampilan_indonesia > ($kkm+1*((100-$kkm)/3)) && $raport_keterampilan_indonesia <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_indonesia = "B";
                $predikat_keterampilan_deskripsi_indonesia = "Baik";
            }
        elseif($raport_keterampilan_indonesia > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_indonesia = "A";
                $predikat_keterampilan_deskripsi_indonesia = "Sangat Baik";
            }
        // -------------
        // deskripsi matematika
        if($raport_keterampilan_matematika<$kkm)
            {
                $predikat_keterampilan_huruf_matematika = "D";
                $predikat_keterampilan_deskripsi_matematika = "Kurang";
            }
        elseif($raport_keterampilan_matematika > $kkm && $raport_keterampilan_matematika <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_matematika = "C";
                $predikat_keterampilan_deskripsi_matematika = "Cukup";
            }
        elseif($raport_keterampilan_matematika > ($kkm+1*((100-$kkm)/3)) && $raport_keterampilan_matematika <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_matematika = "B";
                $predikat_keterampilan_deskripsi_matematika = "Baik";
            }
        elseif($raport_keterampilan_matematika > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_matematika = "A";
                $predikat_keterampilan_deskripsi_matematika = "Sangat Baik";
            }
        // -------------
        // deskripsi ipa
        if($raport_keterampilan_ipa<$kkm)
            {
                $predikat_keterampilan_huruf_ipa = "D";
                $predikat_keterampilan_deskripsi_ipa = "Kurang";
            }
        elseif($raport_keterampilan_ipa > $kkm && $raport_keterampilan_ipa <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ipa = "C";
                $predikat_keterampilan_deskripsi_ipa = "Cukup";
            }
        elseif($raport_keterampilan_ipa > ($kkm+1*((100-$kkm)/3)) && $raport_keterampilan_ipa <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ipa = "B";
                $predikat_keterampilan_deskripsi_ipa = "Baik";
            }
        elseif($raport_keterampilan_ipa > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ipa = "A";
                $predikat_keterampilan_deskripsi_ipa = "Sangat Baik";
            }
        // -------------
        // deskripsi ips
        if($raport_keterampilan_ips<$kkm)
            {
                $predikat_keterampilan_huruf_ips = "D";
                $predikat_keterampilan_deskripsi_ips = "Kurang";
            }
        elseif($raport_keterampilan_ips > $kkm && $raport_keterampilan_ips <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ips = "C";
                $predikat_keterampilan_deskripsi_ips = "Cukup";
            }
        elseif($raport_keterampilan_ips > ($kkm+1*((100-$kkm)/3)) && $raport_keterampilan_ips <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ips = "B";
                $predikat_keterampilan_deskripsi_ips = "Baik";
            }
        elseif($raport_keterampilan_ips > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_ips = "A";
                $predikat_keterampilan_deskripsi_ips = "Sangat Baik";
            }
        // -------------
        // deskripsi pjok
        if($raport_keterampilan_pjok<$kkm)
            {
                $predikat_keterampilan_huruf_pjok = "D";
                $predikat_keterampilan_deskripsi_pjok = "Kurang";
            }
        elseif($raport_keterampilan_pjok > $kkm && $raport_keterampilan_pjok <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_pjok = "C";
                $predikat_keterampilan_deskripsi_pjok = "Cukup";
            }
        elseif($raport_keterampilan_pjok > ($kkm+1*((100-$kkm)/3)) && $raport_keterampilan_pjok <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_pjok = "B";
                $predikat_keterampilan_deskripsi_pjok = "Baik";
            }
        elseif($raport_keterampilan_pjok > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_pjok = "A";
                $predikat_keterampilan_deskripsi_pjok = "Sangat Baik";
            }
        // -------------
        // deskripsi sbk
        if($raport_keterampilan_sbk<$kkm)
            {
                $predikat_keterampilan_huruf_sbk = "D";
                $predikat_keterampilan_deskripsi_sbk = "Kurang";
            }
        elseif($raport_keterampilan_sbk > $kkm && $raport_keterampilan_sbk <= ($kkm+1*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_sbk = "C";
                $predikat_keterampilan_deskripsi_sbk = "Cukup";
            }
        elseif($raport_keterampilan_sbk > ($kkm+1*((100-$kkm)/3)) && $raport_keterampilan_sbk <= ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_sbk = "B";
                $predikat_keterampilan_deskripsi_sbk = "Baik";
            }
        elseif($raport_keterampilan_sbk > ($kkm+2*((100-$kkm)/3)))
            {
                $predikat_keterampilan_huruf_sbk = "A";
                $predikat_keterampilan_deskripsi_sbk = "Sangat Baik";
            }

        if($students -> kelas == "Kelas 1")
        {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama

                                +$raport_keterampilan_indonesia
                                +$raport_keterampilan_matematika
                                +$raport_keterampilan_pjok;

        }
        if($students -> kelas == "Kelas 2")
        {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama

                                +$raport_keterampilan_indonesia
                                +$raport_keterampilan_matematika
                                +$raport_keterampilan_pjok;
        }
        if($students -> kelas == "Kelas 3")
        {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                                +$raport_keterampilan_ppkn
                                +$raport_keterampilan_indonesia
                                +$raport_keterampilan_matematika
                                +$raport_keterampilan_ipa
                                +$raport_keterampilan_ips
                                +$raport_keterampilan_pjok
                                +$raport_keterampilan_sbk;
        }
        if($students -> kelas == "Kelas 4")
        {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                                +$raport_keterampilan_ppkn
                                +$raport_keterampilan_indonesia
                                +$raport_keterampilan_matematika
                                +$raport_keterampilan_ipa
                                +$raport_keterampilan_ips
                                +$raport_keterampilan_pjok
                                +$raport_keterampilan_sbk;
        }
        if($students -> kelas == "Kelas 5")
        {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                                +$raport_keterampilan_ppkn
                                +$raport_keterampilan_indonesia
                                +$raport_keterampilan_matematika
                                +$raport_keterampilan_ipa
                                +$raport_keterampilan_ips
                                +$raport_keterampilan_pjok
                                +$raport_keterampilan_sbk;
        }
        if($students -> kelas == "Kelas 6")
        {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                                +$raport_keterampilan_ppkn
                                +$raport_keterampilan_indonesia
                                +$raport_keterampilan_matematika
                                +$raport_keterampilan_ipa
                                +$raport_keterampilan_ips
                                +$raport_keterampilan_pjok
                                +$raport_keterampilan_sbk;
        }

        $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
        $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan/8, 1, '.', '');

        // -------------------------------------------------------
        // Hitung nilai raport pengetahuan dan keterampilan
        $jumlah_raport = number_format((float)$jumlah_raport_pengetahuan+$jumlah_raport_keterampilan, 1, '.', '');
        $ratarata_raport = number_format((float)($ratarata_raport_pengetahuan+$ratarata_raport_keterampilan)/2, 1, '.', '');
        //----------------------------------------------------
        //input absensi
        $sakit = Extra::all()->where('siswa_id','=',$id)->pluck('sakit')->toArray();
        $sakit = $sakit[0];
        $alpa = Extra::all()->where('siswa_id','=',$id)->pluck('alpa')->toArray();
        $alpa = $alpa[0];
        $ijin = Extra::all()->where('siswa_id','=',$id)->pluck('ijin')->toArray();
        $ijin = $ijin[0];
        //dd($alpa);

        $pdf = PDF::loadView('export.raport',
        [
            'predikat_huruf_agama' =>$predikat_huruf_agama,
            'predikat_huruf_ppkn' =>$predikat_huruf_ppkn,
            'predikat_huruf_indonesia' =>$predikat_huruf_indonesia,
            'predikat_huruf_matematika' =>$predikat_huruf_matematika,
            'predikat_huruf_ipa' =>$predikat_huruf_ipa,
            'predikat_huruf_ips' =>$predikat_huruf_ips,
            'predikat_huruf_pjok' =>$predikat_huruf_pjok,
            'predikat_huruf_sbk' =>$predikat_huruf_sbk,
            'predikat_deskripsi_agama' =>$predikat_deskripsi_agama,
            'predikat_deskripsi_ppkn' =>$predikat_deskripsi_ppkn,
            'predikat_deskripsi_indonesia' =>$predikat_deskripsi_indonesia,
            'predikat_deskripsi_matematika' =>$predikat_deskripsi_matematika,
            'predikat_deskripsi_ipa' =>$predikat_deskripsi_ipa,
            'predikat_deskripsi_ips' =>$predikat_deskripsi_ips,
            'predikat_deskripsi_pjok' =>$predikat_deskripsi_pjok,
            'predikat_deskripsi_sbk' =>$predikat_deskripsi_sbk,
            'predikat_keterampilan_huruf_agama' =>$predikat_keterampilan_huruf_agama,
            'predikat_keterampilan_huruf_ppkn' =>$predikat_keterampilan_huruf_ppkn,
            'predikat_keterampilan_huruf_indonesia' =>$predikat_keterampilan_huruf_indonesia,
            'predikat_keterampilan_huruf_matematika' =>$predikat_keterampilan_huruf_matematika,
            'predikat_keterampilan_huruf_ipa' =>$predikat_keterampilan_huruf_ipa,
            'predikat_keterampilan_huruf_ips' =>$predikat_keterampilan_huruf_ips,
            'predikat_keterampilan_huruf_pjok' =>$predikat_keterampilan_huruf_pjok,
            'predikat_keterampilan_huruf_sbk' =>$predikat_keterampilan_huruf_sbk,
            'predikat_keterampilan_deskripsi_agama' =>$predikat_keterampilan_deskripsi_agama,
            'predikat_keterampilan_deskripsi_ppkn' =>$predikat_keterampilan_deskripsi_ppkn,
            'predikat_keterampilan_deskripsi_indonesia' =>$predikat_keterampilan_deskripsi_indonesia,
            'predikat_keterampilan_deskripsi_matematika' =>$predikat_keterampilan_deskripsi_matematika,
            'predikat_keterampilan_deskripsi_ipa' =>$predikat_keterampilan_deskripsi_ipa,
            'predikat_keterampilan_deskripsi_ips' =>$predikat_keterampilan_deskripsi_ips,
            'predikat_keterampilan_deskripsi_pjok' =>$predikat_keterampilan_deskripsi_pjok,
            'predikat_keterampilan_deskripsi_sbk' =>$predikat_keterampilan_deskripsi_sbk,
            'jumlah_raport' =>$jumlah_raport,
            'ratarata_raport' =>$ratarata_raport,
            'ratarata_raport_pengetahuan' =>$ratarata_raport_pengetahuan,
            'jumlah_raport_pengetahuan' =>$jumlah_raport_pengetahuan,
            'raport_pengetahuan_agama'=>$raport_pengetahuan_agama,
            'raport_pengetahuan_ppkn'=>$raport_pengetahuan_ppkn,
            'raport_pengetahuan_indonesia'=>$raport_pengetahuan_indonesia,
            'raport_pengetahuan_matematika'=>$raport_pengetahuan_matematika,
            'raport_pengetahuan_ipa'=>$raport_pengetahuan_ipa,
            'raport_pengetahuan_ips'=>$raport_pengetahuan_ips,
            'raport_pengetahuan_pjok'=>$raport_pengetahuan_pjok,
            'raport_pengetahuan_sbk'=>$raport_pengetahuan_sbk,
            'jumlah_raport_keterampilan' =>$jumlah_raport_keterampilan,
            'ratarata_raport_keterampilan' =>$ratarata_raport_keterampilan,
            'ratarata_raport_keterampilan' =>$ratarata_raport_keterampilan,
            'jumlah_raport_keterampilan' =>$jumlah_raport_keterampilan,
            'raport_keterampilan_agama'=>$raport_keterampilan_agama,
            'raport_keterampilan_ppkn'=>$raport_keterampilan_ppkn,
            'raport_keterampilan_indonesia'=>$raport_keterampilan_indonesia,
            'raport_keterampilan_matematika'=>$raport_keterampilan_matematika,
            'raport_keterampilan_ipa'=>$raport_keterampilan_ipa,
            'raport_keterampilan_ips'=>$raport_keterampilan_ips,
            'raport_keterampilan_pjok'=>$raport_keterampilan_pjok,
            'raport_keterampilan_sbk'=>$raport_keterampilan_sbk,
            'sakit'=>$sakit,
            'alpa'=>$alpa,
            'ijin'=>$ijin,
            'data_siswa'=>$data_siswa,
            'students' => $students
        ]);
        return $pdf->download($kalimat1.'_'.$kalimat2.'_'.date('Y-m-d_H').'.pdf');
    }
    public function cover_pdf($id)
    {
        $siswa = Siswa::find($id);
        $nama_depancover = Siswa::where('id','=',$id)->select('nama_depan','nama_belakang')->pluck('nama_depan');
        $nama_belakangcover = Siswa::where('id','=',$id)->select('nama_depan','nama_belakang')->pluck('nama_belakang');
        $kalimat1cover = $nama_depancover[0];
        $kalimat2cover = $nama_belakangcover[0];
        //dd($kalimat1cover);
        $pdf = PDF::loadview('export.cover1',
        [
            'siswa' => $siswa,
        ]);
        return $pdf -> download('cover_'.$kalimat1cover.'_'.$kalimat2cover.'_'.date('Y-m-d_H').'.pdf');

    }
    public function biodata_pdf($id)
    {
        $siswa = Siswa::find($id);
        $nama_depancover = Siswa::where('id','=',$id)->select('nama_depan','nama_belakang')->pluck('nama_depan');
        $nama_belakangcover = Siswa::where('id','=',$id)->select('nama_depan','nama_belakang')->pluck('nama_belakang');
        $kalimat1cover = $nama_depancover[0];
        $kalimat2cover = $nama_belakangcover[0];
        //dd($kalimat1cover);
        $pdf = PDF::loadview('export.cover2',
        [
            'siswa' => $siswa,
        ]);
        return $pdf -> download('biodata_'.$kalimat1cover.'_'.$kalimat2cover.'_'.date('Y-m-d_H').'.pdf');

    }
}
