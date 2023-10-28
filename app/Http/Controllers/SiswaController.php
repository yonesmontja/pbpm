<?php

namespace App\Http\Controllers;

use PDF;
use Session;
use Carbon\Carbon;
use App\Models\Guru;
use App\Models\User;
use App\Models\Extra;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;

use App\Models\Rombel;

use App\Models\Sekolah;
use App\Models\Tahunpel;
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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class SiswaController extends Controller
{
    public function index(Siswa $data_siswa)
    {
        $data_siswa = Siswa::orderBy('nama_depan')->get();
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        \App\Models\Siswa::create($request->all());
        //return $request -> all();
        return redirect('/siswa')->with('sukses', 'berhasil diinput');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa/edit', ['siswa' => $siswa]);
    }
    public function update(Request $request, Siswa $siswa)
    {

        $siswa->update($request->all());
        //dd($siswa);
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
                ->save('/images' . '/small_' . $file_name);
            $avatar->move('/images', $file_name);
            $siswa->avatar = $file_name;
        }
        return redirect('/siswa')->with('sukses', 'berhasil diupdate!');
    }
    public function test(Siswa $data_siswa)
    {
        $id_user = auth()->user()->id;
        $role = auth()->user()->role;
        $kelas = Kelas::all();
        $minutes = 30;
        $thn_id = Cache::remember('tahun_pelajaran', $minutes, function () {
            return Tahunpel::where('aktif', 'Y')->value('id');
        });

        $rombel1 = []; // Inisialisasi variabel $rombel1 sebagai array kosong.
        $cacheKey = 'user_' . $id_user . '_role_' . $role; // Membuat kunci unik berdasarkan user dan role.

        $tampung = Cache::remember($cacheKey, $minutes, function () use ($id_user, $role, $thn_id) {
            if ($role == 'guru') {
                $id_guru = Guru::where('user_id', $id_user)->value('id');
                $rombel2 = Rombel::where('guru_id', $id_guru)->where('tahunpelajaran_id', $thn_id)->value('id');

                return Siswa::join('rombel_siswa', 'siswa.id', '=', 'rombel_siswa.siswa_id')
                ->where('rombel_siswa.rombel_id', $rombel2)
                ->where('rombel_siswa.tahunpelajaran_id', $thn_id)
                ->get();
            } elseif ($role == 'admin' || $role == 'tata_usaha') {
                $rombel1 = DB::table('rombel_siswa')->where('tahunpelajaran_id', $thn_id)->pluck('siswa_id')->toArray();

                return Siswa::whereIn('id', $rombel1)
                ->whereHas('rombel', function ($query) use ($thn_id) {
                    $query->where('rombel_siswa.tahunpelajaran_id', $thn_id);
                })
                ->get();
            }

            return [];
        });
        //dd($tampung);
        return view('siswa.test', [
            'kelas' => $kelas,
            'tampung' => $tampung,
            'rombel1' => $rombel1,
            'thn_id' => $thn_id,
        ]);
    }


    public function testcreate(Request $request)
    {
        $this->validate($request, [
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
        ->save('images/siswa' . '/small_' . $file_name);

        $avatar->move('images/siswa/', $file_name);

        //insert ke tabel Users
        $user = new User();
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->avatar = $file_name;
        $user->save();
        //insert ke tabel Siswa
        $input = $request->all();
        $user_id = $user->id;
        //dd($user_id);
        $siswa = new Siswa();
        //dd($siswa);
        $siswa->user_id = $user_id;
        $siswa->nama_depan = $input['nama_depan'];
        $siswa->nama_belakang = $input['nama_belakang'];
        $siswa->email = $input['email'];
        $siswa->nis = $input['nis'];
        $siswa->nisn = $input['nisn'];
        $siswa->jenis_kelamin = $input['jenis_kelamin'];
        $siswa->agama = $input['agama'];
        $siswa->alamat = $input['alamat'];
        $siswa->kelas_id = $input['kelas_id'];
        $siswa->avatar = $file_name;
        //$request -> request -> add(['user_id' => $user -> id]);
        //dd($request -> request -> add(['user_id' => $user -> id]));
        //$siswa = Siswa::create($request -> all());
        $siswa->password = bcrypt('rahasia');
        //dd($siswa);

        //if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('/images/',$request->file('avatar')->getClientOriginalName());
        //    $siswa->avatar= $request->file('avatar')->getClientOriginalName();
        //    $siswa->save();
        //}

        $siswa->save();
        //return $request -> all();
        return redirect('/test')->with('sukses', 'berhasil diinput');
    }

    public function testaktivasi(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        //dd($siswa);
        $user = new User;

        $user->role = 'siswa';
        $user->name = $siswa->nama_depan;
        $user->email = $siswa->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();
        //dd($user);
        $status = '1';
        $request->request->add(['user_id' => $user->id, 'status' => $status]);
        $siswa->update([
            'user_id' => $user->id,
        ]);

        //dd($siswa);

        return redirect('/test')->with('sukses', 'berhasil diaktivasi');
    }

    public function testedit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $guru = Guru::where('user_id', '=', auth()->user()->id)->pluck('id')->first();
        return view('siswa.testedit', [
            'kelas' => $kelas,
            'siswa' => $siswa,
            'guru' => $guru,
        ]);
    }
    public function testupdate(Request $request, Siswa $siswa)
    {
        $siswa_id = $siswa->id;
        //dd($siswa_id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $siswa->delete_avatar();
            $avatar = $request->file('avatar')->move('images/siswa/', $request->file('avatar')->getClientOriginalName() . "." . $request->file('avatar')->getClientOriginalExtension());

            $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
            $img = Image::make($avatar);
            $img->resize('120', '120')->save('images/siswa' . '/small_' . $file_name);
            $avatar->move('images/siswa', $file_name);
            $siswa->avatar = $file_name;
        }
        $siswa->nama_depan = $request->nama_depan;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->email = $request->email;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->save();
        $date = now();
        DB::table('rombel_siswa')->where('siswa_id', '=', $siswa_id)->update([
            'siswa_id'      => $siswa_id,

            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),

            'created_at' => $date,
            'updated_at' => $date
        ]);
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'tata_usaha') {
            return redirect('/test')->with('sukses', 'berhasil diupdate!');
        }
        if (auth()->user()->role == 'guru') {
            //return Redirect::route('testsiswaprofile', ['siswa' => $siswa_id])->with('sukses', 'berhasil diupdate!');
            return redirect('/test')->with('sukses', 'berhasil diupdate!');
        }
    }

    public function editnilai(Request $request)
    {
        if ($request->ajax()) {
            Nilai::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);
            $date = now();
            DB::table('penilaian_siswa')->where('nilai_id', Nilai::find($request->pk)->id)->update([
                $request->name => $request->value,
                'updated_at' => $date,
            ]);
            DB::table('mapel_siswa')->where('nilai_id', Nilai::find($request->pk)->id)->update([
                $request->name => $request->value,
                'updated_at' => $date,
            ]);
            return response()->json(['success' => true]);
        }
    }

    public function testdelete(Siswa $siswa)
    {
        //dd($siswa);
        $siswa->delete_avatar();
        $siswa->delete();
        return redirect('/test')->with('sukses', 'berhasil dihapus!');
    }
    public function testprofile($id, Request $request)
    {
        // kkm dan rentang nilai
        $kkm_0 = 50;
        $kkm = number_format((float)$kkm_0, 1, '.', '');
        $kkm1 = $kkm + (100 - $kkm) / 3;
        $kkm2 = $kkm1 + (100 - $kkm) / 3;
        $user = User::find($id);
        $siswa = Siswa::find($id);

        $siswa1 = Siswa::where('id', '=', $id);
        // $matapelajaran = Mapel::all();
        $penilaian = Penilaian::all();
        $tahunpel = Tahunpel::all();
        $tahunpel = Tahunpel::where('aktif', 'Y')->get();
        foreach ($tahunpel as $thn) {
            $semester_aktif = $thn->semester;
            $kepsek_aktif = $thn->nama_kepsek;
            $nip_kepsek = $thn->kode_kepsek;
            $tanggal_raport = Carbon::parse($thn->tgl_raport)->isoFormat('D MMMM Y');
            $tanggal_raport_kls6 = $thn->tgl_raport_kelas3;
            $tahun_pelajaran = $thn->thn_pel;
            $tahun_aktif = $thn->tahun;
            $thn_id = $thn->id;
        }
        $rombel_awal = DB::table('rombel_siswa')->where('siswa_id', $id)->get();
        //dd($rombel_awal);
        foreach ($rombel_awal as $rombels) {
            //dd($rombels->tahunpelajaran_id == $thn_id);
            if ($rombels->tahunpelajaran_id == $thn_id) {
                $rombel = $thn_id;
                $rombel_id = $rombels->rombel_id;
            };
            $rombel = $thn_id;
            $rombel_id = $rombels->rombel_id;
        }
        //dd($rombel_id);
        $nilai = Nilai::where('siswa_id', '=', $id)->get();
        $data_nilai = Nilai::where('siswa_id', '=', $id)->get();
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        $guru_profile = Guru::where('user_id', '=', auth()->user()->id)->pluck('id')->first();

        $kelas = Kelas::all();
        $rombel3 = Rombel::all();
        $rombel2 = DB::table('rombels')->where('id', $rombel_id)->pluck('rombel')->first();
        //dd($rombel2);
        //$rombel2 = $rombel1->rombel;
        //dd($rombel2);
        // data untuk Chart.js
        // $categories = [];
        // $data = [];
        $tescategories = [];
        //$tes1 = [];
        // $data5 = [];
        //$categories2 = [];
        // $data6 = [];
        // $categories3 = [];
        $data7 = [];
        $categories7 = [];
        $data8 = [];
        $categories8 = [];
        // foreach ($matapelajaran as $mp) {
        //     if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
        //         $categories[] = $mp->nama_mapel;
        //         $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
        //     }
        // }
        // foreach ($siswa->mapel as $mnp) {
        //     $data5[] = $mnp->pivot->nilai;
        //     $categories2[] = $mnp->nama_mapel;
        // }
        // foreach ($siswa->penilaian as $mnpx) {
        //     $data6[] = $mnpx->pivot->nilai;
        //     $categories3[] = $mnpx->nama_tes;
        // }
        foreach ($nilai as $mnp) {
            if ($mnp->siswa_id == $id) {
                $data7[] = $mnp->nilai;
                $categories7[] = $mnp->mapel->nama_mapel;
            }
        }
        foreach ($nilai as $mnpx) {
            if ($mnpx->siswa_id == $id) {
                $data8[] = $mnpx->nilai;
                $categories8[] = $mnpx->penilaian->nama_tes;
            }
        }
        // foreach ($penilaian as $mp2) {
        //     if ($siswa->penilaian()->wherePivot('penilaian_id', $mp2->id)->first()) {
        //         $tescategories[] = $mp2->nama_tes;
        //         $tes1[] = $siswa->penilaian()->wherePivot('penilaian_id', $mp2->id)->first()->pivot->nilai;
        //         //dd($tes1);
        //     }
        // }
        //dd($tes1);
        $nilai_start = Tahunpel::all()->where('id', '=', 2)->pluck('tahun');
        $nilai_end = Tahunpel::all()->where('id', '=', 1)->pluck('tahun');
        $id1 = Nilai::where('siswa_id', $id)->pluck('siswa_id')->first();
        //dd($id1);
        $mapel1 = Nilai::where('siswa_id', $id)->pluck('mapel_id')->count();

        //dd($mapel3);
        $islam_average = Nilai::where('siswa_id', $id)->where('mapel_id', 1)->pluck('nilai')->avg();
        $protestan_average = Nilai::where('siswa_id', $id)->where('mapel_id', 2)->pluck('nilai')->avg();
        $katolik_average = Nilai::where('siswa_id', $id)->where('mapel_id', 3)->pluck('nilai')->avg();
        $ppkn_average = Nilai::where('siswa_id', $id)->where('mapel_id', 4)->pluck('nilai')->avg();
        $indonesia_average = Nilai::where('siswa_id', $id)->where('mapel_id', 5)->pluck('nilai')->avg();
        $matematika_average = Nilai::where('siswa_id', $id)->where('mapel_id', 6)->pluck('nilai')->avg();
        $ipa_average = Nilai::where('siswa_id', $id)->where('mapel_id', 7)->pluck('nilai')->avg();
        $ips_average = Nilai::where('siswa_id', $id)->where('mapel_id', 8)->pluck('nilai')->avg();
        $pjok_average = Nilai::where('siswa_id', $id)->where('mapel_id', 9)->pluck('nilai')->avg();
        $sbk_average = Nilai::where('siswa_id', $id)->where('mapel_id', 10)->pluck('nilai')->avg();

        if (
            $rombel == 1 || $rombel == 2 || $rombel == 3 || $rombel == 4
        ) {

            if (
                $siswa->agama == 'islam' || $siswa->agama == "Islam"
            ) {
                $agama_average = (int)$islam_average;
                $mapel3[0] = "Agama Islam";
                $mapel3[1] = "PPKn";
                $mapel3[2] = "B.Indonesia";
                $mapel3[3] = "Matematika";

                $mapel3[4] = "PJOK";
                $mapel3[5] = "SBK";
            }
            if (
                $siswa->agama == 'katolik' || $siswa->agama == "Katolik"
            ) {
                $agama_average = (int)$katolik_average;
                $mapel3[0] = "Agama Katolik";
                $mapel3[1] = "PPKn";
                $mapel3[2] = "B.Indonesia";
                $mapel3[3] = "Matematika";

                $mapel3[4] = "PJOK";
                $mapel3[5] = "SBK";
            }
            if ($siswa->agama == 'kristen protestan' || $siswa->agama == "Kristen Protestan") {
                $agama_average = (int)$protestan_average;
                $mapel3[0] = "Agama Kristen";
                $mapel3[1] = "PPKn";
                $mapel3[2] = "B.Indonesia";
                $mapel3[3] = "Matematika";

                $mapel3[4] = "PJOK";
                $mapel3[5] = "SBK";
            }
            $matang1[0] = (int)$agama_average;
            $matang1[1] = (int)$ppkn_average;
            $matang1[2] = (int)$indonesia_average;
            $matang1[3] = (int)$matematika_average;
            $matang1[4] = (int)$pjok_average;
            $matang1[5] = (int)$sbk_average;
            $average_mapel = collect($matang1)->avg();
        }
        if ($rombel == 5 || $rombel == 6 || $rombel == 7 || $rombel == 8 || $rombel == 9 || $rombel == 10 || $rombel == 11 || $rombel == 12) {

            if ($siswa->agama == 'islam' || $siswa->agama == "Islam") {
                $agama_average = (int)$islam_average;
                $mapel3[0] = "Agama Islam";
                $mapel3[1] = "PPKn";
                $mapel3[2] = "B.Indonesia";
                $mapel3[3] = "Matematika";
                $mapel3[4] = "IPA";
                $mapel3[5] = "IPS";
                $mapel3[6] = "PJOK";
                $mapel3[7] = "SBK";
            }
            if (
                $siswa->agama == 'katolik' || $siswa->agama == "Katolik"
            ) {
                $agama_average = (int)$katolik_average;
                $mapel3[0] = "Agama Katolik";
                $mapel3[1] = "PPKn";
                $mapel3[2] = "B.Indonesia";
                $mapel3[3] = "Matematika";
                $mapel3[4] = "IPA";
                $mapel3[5] = "IPS";
                $mapel3[6] = "PJOK";
                $mapel3[7] = "SBK";
            }
            if ($siswa->agama == 'kristen protestan' || $siswa->agama == "Kristen Protestan") {
                $agama_average = (int)$protestan_average;
                $mapel3[0] = "Agama Kristen";
                $mapel3[1] = "PPKn";
                $mapel3[2] = "B.Indonesia";
                $mapel3[3] = "Matematika";
                $mapel3[4] = "IPA";
                $mapel3[5] = "IPS";
                $mapel3[6] = "PJOK";
                $mapel3[7] = "SBK";
            }
            $matang1[0] = (int)$agama_average;
            $matang1[1] = (int)$ppkn_average;
            $matang1[2] = (int)$indonesia_average;
            $matang1[3] = (int)$matematika_average;
            $matang1[4] = (int)$ipa_average;
            $matang1[5] = (int)$ips_average;
            $matang1[6] = (int)$pjok_average;
            $matang1[7] = (int)$sbk_average;
            $average_mapel = collect($matang1)->avg();
        }
        $tescategories1 = collect($tescategories);
        $matpel = collect($data7)->sum();
        $average = collect($data7)->avg();
        $average_mapel = collect($matang1)->avg();
        $data2 = DB::table('penilaian_siswa')
        ->join('mapel_siswa', 'mapel_siswa.siswa_id', '=', 'penilaian_siswa.siswa_id');
        //dd($data2);
        return view('profile.index', [
            'user' => $user,
            'kkm' => $kkm,
            'kkm1' => $kkm1,
            'kkm2' => $kkm2,
            'rombel2' => $rombel2,
            'rombel3' => $rombel3,
            //'rombel1' => $rombel1,
            'nilai_start' => $nilai_start,
            'nilai_end' => $nilai_end,
            'average_mapel' => $average_mapel,
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
            'mapel1' => $mapel1,
            'siswa1' => $siswa1,
            'guru' => $guru,
            'guru_profile' => $guru_profile,
            'kompetensiinti' => $kompetensiinti,
            'mapel' => $mapel,
            'data_nilai' => $data_nilai,
            'id1' => $id1,
            'nilai' => $nilai,
            'categories7' => $categories7,
            'data7' => $data7,
            'categories8' => $categories8,
            'data8' => $data8,
            // 'data5' => $data5,
            //'categories2' => $categories2,
            'mapel3' => $mapel3,
            'matang1' => $matang1,
            'tescategories1' => $tescategories1,
            'data2' => $data2,
            'penilaian' => $penilaian,
            'tahunpel' => $tahunpel,
            'matpel' => $matpel,
            'average' => $average,
            'siswa' => $siswa,
            'kelas' => $kelas,
            // 'matapelajaran' => $matapelajaran,
            // 'categories' => $categories,
            // 'data' => $data,
            // 'tescategories' => $tescategories,
            // 'tes1' => $tes1
        ]);
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
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        //dd($siswa);
        $siswa->penilaian()->attach($request->penilaian, ['nilai' => $request->nilai]);
        //dd($tes);
        return redirect()->back()->with('sukses', 'nilai sukses diinput');
    }
    public function testdeletenilai(Siswa $siswa, $idnilai)
    {
        $nilai = Nilai::find($idnilai);
        //dd($nilai);
        //$siswa->mapel()->detach($idnilai);
        //$siswa->penilaian()->detach($idnilai);
        $nilai->delete();
        return redirect()->back()->with('sukses', 'nilai berhasil dihapus');
    }
    public function export_excel()
    {

        return Excel::download(new SiswaExport, 'siswa.xlsx');
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
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa', $nama_file);


        // import data
        Excel::import(
            new SiswaImport,
            public_path('/file_siswa/' . $nama_file)
        );
        //Excel::import(new UserImport, public_path('/file_siswa/'.$nama_file));
        $siswa = Siswa::all();
        //dd($siswa);
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        // notifikasi dengan session
        Session::flash('sukses', 'Berhasil Diimport!');

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
        $pdf = PDF::loadView('export.invoice', ['data_siswa' => $data_siswa, 'students' => $students]);
        return $pdf->download('data_siswa_' . date('Y-m-d_H-i-s') . '.pdf');
    }
    public function cetak_PDF($id)
    {
        // cetak_PDF
        //data sekolah
        $kepsek = Sekolah::all();
        //dd($kepsek);
        foreach ($kepsek as $k) {
            $kepala = $k->kepsek;
            $nip = $k->nip_kepsek;
            $kecamatan = $k->kecamatan;
        }

        //dd($semester_aktif);
        //-----------------------------------
        $tahunpel = Tahunpel::where('aktif', 'Y')->get();
        foreach ($tahunpel as $thn) {
            $semester_aktif = $thn->semester;
            $kepsek_aktif = $thn->nama_kepsek;
            $nip_kepsek = $thn->kode_kepsek;
            $tanggal_raport = Carbon::parse($thn->tgl_raport)->isoFormat('D MMMM Y');
            $tanggal_raport_kls6 = $thn->tgl_raport_kelas3;
            $tahun_pelajaran = $thn->thn_pel;
            $tahun_aktif = $thn->tahun;
            $thn_id = $thn->id;
        }
        $semester = Tahunpelajaran::all()->pluck('semester');
        //dd($semester);
        $rombel = DB::table('rombel_siswa')->where('siswa_id', '=', $id)->where('tahunpelajaran_id', '=', $thn_id)->pluck('rombel_id')->first();
        $rombel1 = Rombel::find($rombel);
        //dd($rombel1->guru->nama_guru);
        $students = Siswa::find($id);
        $deskripsi_sikap_spiritual = DB::table('extra')->where('rombel_id', '=', $rombel)->where('siswa_id', '=', $id)->pluck('saran')->first();
        $deskripsi_sikap_sosial = DB::table('extra')->where('rombel_id', '=', $rombel)->where('siswa_id', '=', $id)->pluck('ekskul')->first();
        $catatan_wali_kelas = DB::table('extra')->where('rombel_id', '=', $rombel)->where('siswa_id', '=', $id)->pluck('prestasi')->first();

        $nama_rombel = Rombel::find($rombel)->rombel;
        $rombel_kelas = DB::table('rombel_siswa')->where('siswa_id', '=', $id)->pluck('rombel_id')->first();
        $rombel_kelas_raport = Rombel::find($rombel_kelas)->kelas_id;
        $nama_depan = Siswa::where('id', '=', $id)->select('nama_depan', 'nama_belakang')->pluck('nama_depan');
        $nama_belakang = Siswa::where('id', '=', $id)->select('nama_depan', 'nama_belakang')->pluck('nama_belakang');
        $kalimat1 = $nama_depan[0];
        $kalimat2 = $nama_belakang[0];
        //$kelas = Kelas::find($students->kelas_id);
        //dd($kelas);
        $kelas_siswa = Kelas::find($students->kelas_id)->nama;
        //dd($kelas_siswa);
        if ($kelas_siswa == 'Kelas 1') {
            $kelas_naik = 'II';
        }
        if ($kelas_siswa == 'Kelas 2') {
            $kelas_naik = 'III';
        }
        if ($kelas_siswa == 'Kelas 3') {
            $kelas_naik = 'IV';
        }
        if ($kelas_siswa == 'Kelas 4') {
            $kelas_naik = 'V';
        }
        if ($kelas_siswa == 'Kelas 5') {
            $kelas_naik = 'VI';
        }
        if ($kelas_siswa == 'Kelas 6') {
            $kelas_naik = 'SMP';
        }

        //$data_siswa = Siswa::get();
        // wali kelas di raport
        if ($rombel == 1) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 2
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 3
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 4
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 5
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 6
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 7
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 8
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 9
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 10
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 11
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 12
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
                $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 13
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 14
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 15
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 16
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 17
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 18
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 19
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 20
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 21
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 22
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 23
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        if (
            $rombel == 24
        ) {
            $wali_kelas = $rombel1->guru->nama_guru;
            $nip_guru =
            $rombel1->guru->kode_guru;
        }
        //dd($wali_kelas);
        //menghitung nilai tugas
        for ($penilaian = 1; $penilaian < 2; $penilaian++) {
            $tampung_tugas_islam = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 1)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_islam[] = (int)$tampung_tugas_islam;
            $tampung_tugas_protestan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 2)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_protestan[] = (int)$tampung_tugas_protestan;
            $tampung_tugas_katolik = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 3)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_katolik[] = (int)$tampung_tugas_katolik;
            $tampung_tugas_ppkn = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 4)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_ppkn[] = (int)$tampung_tugas_ppkn;
            $tampung_tugas_indonesia = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 5)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_indonesia[] = (int)$tampung_tugas_indonesia;
            $tampung_tugas_matematika = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 6)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_matematika[] = (int)$tampung_tugas_matematika;
            $tampung_tugas_ipa = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 7)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_ipa[] = (int)$tampung_tugas_ipa;
            $tampung_tugas_ips = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 8)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_ips[] = (int)$tampung_tugas_ips;
            $tampung_tugas_pjok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 9)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_pjok[] = (int)$tampung_tugas_pjok;
            $tampung_tugas_sbk = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 10)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_sbk[] = (int)$tampung_tugas_sbk;
            $tampung_tugas_mulok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 11)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_tugas_mulok[] = (int)$tampung_tugas_mulok;
        }
        //dd(array_sum($nilai_tugas_protestan));
        //dd($nilai_tugas_mulok);
        if ($students->agama == "Islam" || $students->agama == "islam") {
            if (array_sum($nilai_tugas_islam) > 0) {
                for ($key = 0; $key < count($nilai_tugas_islam); $key++) {
                    if ($nilai_tugas_islam[$key] > 0) {
                        $nilai_tugas_islam_yes[] = $nilai_tugas_islam[$key];
                    }
                }
                $jml_pel_tugas_islam    = count($nilai_tugas_islam_yes);
                $sum_pel_tugas_islam    = array_sum($nilai_tugas_islam_yes);
                $rata_rata_tugas_islam  = number_format((float)$sum_pel_tugas_islam / $jml_pel_tugas_islam, 2, '.', '');
            } elseif (array_sum($nilai_tugas_islam) == 0) {
                $rata_rata_tugas_islam = 0.00;
            }
        }

        if (
            $students->agama == "Kristen Protestan" || $students->agama == "kristen protestan"
        ) {
            if (array_sum($nilai_tugas_protestan) > 0) {
                for ($key = 0; $key < count($nilai_tugas_protestan); $key++) {
                    if ($nilai_tugas_protestan[$key] > 0) {
                        $nilai_tugas_protestan_yes[] = $nilai_tugas_protestan[$key];
                    }
                }
                $jml_pel_tugas_protestan    = count($nilai_tugas_protestan_yes);
                $sum_pel_tugas_protestan    = array_sum($nilai_tugas_protestan_yes);
                $rata_rata_tugas_protestan  = number_format((float)$sum_pel_tugas_protestan / $jml_pel_tugas_protestan, 2, '.', '');
            } elseif (array_sum($nilai_tugas_protestan) == 0) {
                $rata_rata_tugas_protestan = 0.00;
            }
        }

        if (
            $students->agama == "Katolik" || $students->agama == "katolik"
        ) {
            if (array_sum($nilai_tugas_katolik) > 0) {
                for ($key = 0; $key < count($nilai_tugas_katolik); $key++) {
                    if ($nilai_tugas_katolik[$key] > 0) {
                        $nilai_tugas_katolik_yes[] = $nilai_tugas_katolik[$key];
                    }
                }
                $jml_pel_tugas_katolik    = count($nilai_tugas_katolik_yes);
                $sum_pel_tugas_katolik    = array_sum($nilai_tugas_katolik_yes);
                $rata_rata_tugas_katolik  = number_format((float)$sum_pel_tugas_katolik / $jml_pel_tugas_katolik, 2, '.', '');
            } elseif (array_sum($nilai_tugas_katolik) == 0) {
                $rata_rata_tugas_katolik = 0.00;
            }
        }

        if (array_sum($nilai_tugas_ppkn) > 0) {
            for ($key = 0; $key < count($nilai_tugas_ppkn); $key++) {
                if ($nilai_tugas_ppkn[$key] > 0) {
                    $nilai_tugas_ppkn_yes[] = $nilai_tugas_ppkn[$key];
                }
            }
            $jml_pel_tugas_ppkn    = count($nilai_tugas_ppkn_yes);
            $sum_pel_tugas_ppkn    = array_sum($nilai_tugas_ppkn_yes);
            $rata_rata_tugas_ppkn  = number_format((float)$sum_pel_tugas_ppkn / $jml_pel_tugas_ppkn, 2, '.', '');
        } elseif (array_sum($nilai_tugas_ppkn) == 0) {
            $rata_rata_tugas_ppkn = 0.00;
        }
        //dd($rata_rata_tugas_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_tugas_indonesia));
        if (array_sum($nilai_tugas_indonesia) > 0) {
            for ($key = 0; $key < count($nilai_tugas_indonesia); $key++) {
                if ($nilai_tugas_indonesia[$key] > 0) {
                    $nilai_tugas_indonesia_yes[] = $nilai_tugas_indonesia[$key];
                }
            }
            $jml_pel_tugas_indonesia    = count($nilai_tugas_indonesia_yes);
            $sum_pel_tugas_indonesia    = array_sum($nilai_tugas_indonesia_yes);
            $rata_rata_tugas_indonesia  = number_format(
                (float)$sum_pel_tugas_indonesia / $jml_pel_tugas_indonesia,
                2,
                '.',
                ''
            );
        } elseif (array_sum($nilai_tugas_indonesia) == 0) {
            $rata_rata_tugas_indonesia = 0.00;
        }
        //dd($rata_rata_tugas_indonesia);
        if (array_sum($nilai_tugas_matematika) > 0) {
            for ($key = 0; $key < count($nilai_tugas_matematika); $key++) {
                if ($nilai_tugas_matematika[$key] > 0) {
                    $nilai_tugas_matematika_yes[] = $nilai_tugas_matematika[$key];
                }
            }
            $jml_pel_tugas_matematika    = count($nilai_tugas_matematika_yes);
            $sum_pel_tugas_matematika    = array_sum($nilai_tugas_matematika_yes);
            $rata_rata_tugas_matematika  = number_format((float)$sum_pel_tugas_matematika / $jml_pel_tugas_matematika, 2, '.', '');
        } elseif (array_sum($nilai_tugas_matematika) == 0) {
            $rata_rata_tugas_matematika = 0.00;
        }

        if (array_sum($nilai_tugas_ipa) > 0) {
            for ($key = 0; $key < count($nilai_tugas_ipa); $key++) {
                if ($nilai_tugas_ipa[$key] > 0) {
                    $nilai_tugas_ipa_yes[] = $nilai_tugas_ipa[$key];
                }
            }
            $jml_pel_tugas_ipa    = count($nilai_tugas_ipa_yes);
            $sum_pel_tugas_ipa    = array_sum($nilai_tugas_ipa_yes);
            $rata_rata_tugas_ipa  = number_format((float)$sum_pel_tugas_ipa / $jml_pel_tugas_ipa, 2, '.', '');
        } elseif (array_sum($nilai_tugas_ipa) == 0) {
            $rata_rata_tugas_ipa = 0.00;
        }

        if (array_sum($nilai_tugas_ips) > 0) {
            for ($key = 0; $key < count($nilai_tugas_ips); $key++) {
                if ($nilai_tugas_ips[$key] > 0) {
                    $nilai_tugas_ips_yes[] = $nilai_tugas_ips[$key];
                }
            }
            $jml_pel_tugas_ips    = count($nilai_tugas_ips_yes);
            $sum_pel_tugas_ips    = array_sum($nilai_tugas_ips_yes);
            $rata_rata_tugas_ips  = number_format((float)$sum_pel_tugas_ips / $jml_pel_tugas_ips, 2, '.', '');
        } elseif (array_sum($nilai_tugas_ips) == 0) {
            $rata_rata_tugas_ips = 0.00;
        }

        if (array_sum($nilai_tugas_pjok) > 0) {
            for ($key = 0; $key < count($nilai_tugas_pjok); $key++) {
                if ($nilai_tugas_pjok[$key] > 0) {
                    $nilai_tugas_pjok_yes[] = $nilai_tugas_pjok[$key];
                }
            }
            $jml_pel_tugas_pjok    = count($nilai_tugas_pjok_yes);
            $sum_pel_tugas_pjok    = array_sum($nilai_tugas_pjok_yes);
            $rata_rata_tugas_pjok  = number_format((float)$sum_pel_tugas_pjok / $jml_pel_tugas_pjok, 2, '.', '');
        } elseif (array_sum($nilai_tugas_pjok) == 0) {
            $rata_rata_tugas_pjok = 0.00;
        }

        if (array_sum($nilai_tugas_sbk) > 0) {
            for ($key = 0; $key < count($nilai_tugas_sbk); $key++) {
                if ($nilai_tugas_sbk[$key] > 0) {
                    $nilai_tugas_sbk_yes[] = $nilai_tugas_sbk[$key];
                }
            }
            $jml_pel_tugas_sbk    = count($nilai_tugas_sbk_yes);
            $sum_pel_tugas_sbk    = array_sum($nilai_tugas_sbk_yes);
            $rata_rata_tugas_sbk  = number_format((float)$sum_pel_tugas_sbk / $jml_pel_tugas_sbk, 2, '.', '');
        } elseif (array_sum($nilai_tugas_sbk) == 0) {
            $rata_rata_tugas_sbk = 0.00;
        }

        if (array_sum($nilai_tugas_mulok) > 0) {
            for ($key = 0; $key < count($nilai_tugas_mulok); $key++) {
                if ($nilai_tugas_mulok[$key] > 0) {
                    $nilai_tugas_mulok_yes[] = $nilai_tugas_mulok[$key];
                }
            }
            $jml_pel_tugas_mulok    = count($nilai_tugas_mulok_yes);
            $sum_pel_tugas_mulok    = array_sum($nilai_tugas_mulok_yes);
            $rata_rata_tugas_mulok  = number_format((float)$sum_pel_tugas_mulok / $jml_pel_tugas_mulok, 2, '.', '');
        } elseif (array_sum($nilai_tugas_mulok) == 0) {
            $rata_rata_tugas_mulok = 0.00;
        }
        //dd($rata_rata_tugas_mulok);
        // --------------------------------------------------------------------

        //menghitung nilai latihan
        for ($penilaian = 2; $penilaian < 3; $penilaian++) {
            $tampung_latihan_islam = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 1)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_islam[] = (int)$tampung_latihan_islam;
            $tampung_latihan_protestan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 2)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_protestan[] = (int)$tampung_latihan_protestan;
            $tampung_latihan_katolik = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 3)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_katolik[] = (int)$tampung_latihan_katolik;
            $tampung_latihan_ppkn = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 4)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_ppkn[] = (int)$tampung_latihan_ppkn;
            $tampung_latihan_indonesia = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 5)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_indonesia[] = (int)$tampung_latihan_indonesia;
            $tampung_latihan_matematika = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 6)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_matematika[] = (int)$tampung_latihan_matematika;
            $tampung_latihan_ipa = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 7)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_ipa[] = (int)$tampung_latihan_ipa;
            $tampung_latihan_ips = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 8)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_ips[] = (int)$tampung_latihan_ips;
            $tampung_latihan_pjok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 9)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_pjok[] = (int)$tampung_latihan_pjok;
            $tampung_latihan_sbk = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 10)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_sbk[] = (int)$tampung_latihan_sbk;
            $tampung_latihan_mulok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 11)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_latihan_mulok[] = (int)$tampung_latihan_mulok;
        }
        //dd($nilai_latihan_mulok);
        if (
            $students->agama == "Islam" || $students->agama == "islam"
        ) {
            if (array_sum($nilai_latihan_islam) > 0) {
                for ($key = 0; $key < count($nilai_latihan_islam); $key++) {
                    if ($nilai_latihan_islam[$key] > 0) {
                        $nilai_latihan_islam_yes[] = $nilai_latihan_islam[$key];
                    }
                }
                $jml_pel_latihan_islam    = count($nilai_latihan_islam_yes);
                $sum_pel_latihan_islam    = array_sum($nilai_latihan_islam_yes);
                $rata_rata_latihan_islam  = number_format((float)$sum_pel_latihan_islam / $jml_pel_latihan_islam, 2, '.', '');
            } elseif (array_sum($nilai_latihan_islam) == 0) {
                $rata_rata_latihan_islam = 0.00;
            }
        }

        if (
            $students->agama == "Kristen Protestan" || $students->agama == "kristen protestan"
        ) {
            if (array_sum($nilai_latihan_protestan) > 0) {
                for ($key = 0; $key < count($nilai_latihan_protestan); $key++) {
                    if ($nilai_latihan_protestan[$key] > 0) {
                        $nilai_latihan_protestan_yes[] = $nilai_latihan_protestan[$key];
                    }
                }
                $jml_pel_latihan_protestan    = count($nilai_latihan_protestan_yes);
                $sum_pel_latihan_protestan    = array_sum($nilai_latihan_protestan_yes);
                $rata_rata_latihan_protestan  = number_format((float)$sum_pel_latihan_protestan / $jml_pel_latihan_protestan, 2, '.', '');
            } elseif (array_sum($nilai_latihan_protestan) == 0) {
                $rata_rata_latihan_protestan = 0.00;
            }
        }

        if (
            $students->agama == "Katolik" || $students->agama == "katolik"
        ) {
            if (array_sum($nilai_latihan_katolik) > 0) {
                for ($key = 0; $key < count($nilai_latihan_katolik); $key++) {
                    if ($nilai_latihan_katolik[$key] > 0) {
                        $nilai_latihan_katolik_yes[] = $nilai_latihan_katolik[$key];
                    }
                }
                $jml_pel_latihan_katolik    = count($nilai_latihan_katolik_yes);
                $sum_pel_latihan_katolik    = array_sum($nilai_latihan_katolik_yes);
                $rata_rata_latihan_katolik  = number_format((float)$sum_pel_latihan_katolik / $jml_pel_latihan_katolik, 2, '.', '');
            } elseif (array_sum($nilai_latihan_katolik) == 0) {
                $rata_rata_latihan_katolik = 0.00;
            }
        }

        if (array_sum($nilai_latihan_ppkn) > 0) {
            for ($key = 0; $key < count($nilai_latihan_ppkn); $key++) {
                if ($nilai_latihan_ppkn[$key] > 0) {
                    $nilai_latihan_ppkn_yes[] = $nilai_latihan_ppkn[$key];
                }
            }
            $jml_pel_latihan_ppkn    = count($nilai_latihan_ppkn_yes);
            $sum_pel_latihan_ppkn    = array_sum($nilai_latihan_ppkn_yes);
            $rata_rata_latihan_ppkn  = number_format((float)$sum_pel_latihan_ppkn / $jml_pel_latihan_ppkn, 2, '.', '');
        } elseif (array_sum($nilai_latihan_ppkn) == 0) {
            $rata_rata_latihan_ppkn = 0.00;
        }
        //dd($rata_rata_latihan_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_latihan_indonesia));
        if (array_sum($nilai_latihan_indonesia) > 0) {
            for ($key = 0; $key < count($nilai_latihan_indonesia); $key++) {
                if ($nilai_latihan_indonesia[$key] > 0) {
                    $nilai_latihan_indonesia_yes[] = $nilai_latihan_indonesia[$key];
                }
            }
            $jml_pel_latihan_indonesia    = count($nilai_latihan_indonesia_yes);
            $sum_pel_latihan_indonesia    = array_sum($nilai_latihan_indonesia_yes);
            $rata_rata_latihan_indonesia  = number_format((float)$sum_pel_latihan_indonesia / $jml_pel_latihan_indonesia, 2, '.', '');
        } elseif (array_sum($nilai_latihan_indonesia) == 0) {
            $rata_rata_latihan_indonesia = 0.00;
        }
        //dd($rata_rata_latihan_indonesia);
        if (array_sum($nilai_latihan_matematika) > 0) {
            for ($key = 0; $key < count($nilai_latihan_matematika); $key++) {
                if ($nilai_latihan_matematika[$key] > 0) {
                    $nilai_latihan_matematika_yes[] = $nilai_latihan_matematika[$key];
                }
            }
            $jml_pel_latihan_matematika    = count($nilai_latihan_matematika_yes);
            $sum_pel_latihan_matematika    = array_sum($nilai_latihan_matematika_yes);
            $rata_rata_latihan_matematika  = number_format((float)$sum_pel_latihan_matematika / $jml_pel_latihan_matematika, 2, '.', '');
        } elseif (array_sum($nilai_latihan_matematika) == 0) {
            $rata_rata_latihan_matematika = 0.00;
        }

        if (array_sum($nilai_latihan_ipa) > 0) {
            for ($key = 0; $key < count($nilai_latihan_ipa); $key++) {
                if ($nilai_latihan_ipa[$key] > 0) {
                    $nilai_latihan_ipa_yes[] = $nilai_latihan_ipa[$key];
                }
            }
            $jml_pel_latihan_ipa    = count($nilai_latihan_ipa_yes);
            $sum_pel_latihan_ipa    = array_sum($nilai_latihan_ipa_yes);
            $rata_rata_latihan_ipa  = number_format((float)$sum_pel_latihan_ipa / $jml_pel_latihan_ipa, 2, '.', '');
        } elseif (array_sum($nilai_latihan_ipa) == 0) {
            $rata_rata_latihan_ipa = 0.00;
        }

        if (array_sum($nilai_latihan_ips) > 0) {
            for ($key = 0; $key < count($nilai_latihan_ips); $key++) {
                if ($nilai_latihan_ips[$key] > 0) {
                    $nilai_latihan_ips_yes[] = $nilai_latihan_ips[$key];
                }
            }
            $jml_pel_latihan_ips    = count($nilai_latihan_ips_yes);
            $sum_pel_latihan_ips    = array_sum($nilai_latihan_ips_yes);
            $rata_rata_latihan_ips  = number_format((float)$sum_pel_latihan_ips / $jml_pel_latihan_ips, 2, '.', '');
        } elseif (array_sum($nilai_latihan_ips) == 0) {
            $rata_rata_latihan_ips = 0.00;
        }

        if (array_sum($nilai_latihan_pjok) > 0) {
            for ($key = 0; $key < count($nilai_latihan_pjok); $key++) {
                if ($nilai_latihan_pjok[$key] > 0) {
                    $nilai_latihan_pjok_yes[] = $nilai_latihan_pjok[$key];
                }
            }
            $jml_pel_latihan_pjok    = count($nilai_latihan_pjok_yes);
            $sum_pel_latihan_pjok    = array_sum($nilai_latihan_pjok_yes);
            $rata_rata_latihan_pjok  = number_format((float)$sum_pel_latihan_pjok / $jml_pel_latihan_pjok, 2, '.', '');
        } elseif (array_sum($nilai_latihan_pjok) == 0) {
            $rata_rata_latihan_pjok = 0.00;
        }

        if (array_sum($nilai_latihan_sbk) > 0) {
            for ($key = 0; $key < count($nilai_latihan_sbk); $key++) {
                if ($nilai_latihan_sbk[$key] > 0) {
                    $nilai_latihan_sbk_yes[] = $nilai_latihan_sbk[$key];
                }
            }
            $jml_pel_latihan_sbk    = count($nilai_latihan_sbk_yes);
            $sum_pel_latihan_sbk    = array_sum($nilai_latihan_sbk_yes);
            $rata_rata_latihan_sbk  = number_format((float)$sum_pel_latihan_sbk / $jml_pel_latihan_sbk, 2, '.', '');
        } elseif (array_sum($nilai_latihan_sbk) == 0) {
            $rata_rata_latihan_sbk = 0.00;
        }

        if (array_sum($nilai_latihan_mulok) > 0) {
            for ($key = 0; $key < count($nilai_latihan_mulok); $key++) {
                if ($nilai_latihan_mulok[$key] > 0) {
                    $nilai_latihan_mulok_yes[] = $nilai_latihan_mulok[$key];
                }
            }
            $jml_pel_latihan_mulok    = count($nilai_latihan_mulok_yes);
            $sum_pel_latihan_mulok    = array_sum($nilai_latihan_mulok_yes);
            $rata_rata_latihan_mulok  = number_format((float)$sum_pel_latihan_mulok / $jml_pel_latihan_mulok, 2, '.', '');
        } elseif (array_sum($nilai_latihan_mulok) == 0) {
            $rata_rata_latihan_mulok = 0.00;
        }

        // --------------------------------------------------------------------
        //menghitung nilai ulangan harian
        for ($penilaian = 3; $penilaian < 4; $penilaian++) {
            $tampung_uh_islam = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 1)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_islam[] = (int)$tampung_uh_islam;
            $tampung_uh_protestan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 2)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_protestan[] = (int)$tampung_uh_protestan;
            $tampung_uh_katolik = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 3)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_katolik[] = (int)$tampung_uh_katolik;
            $tampung_uh_ppkn = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 4)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_ppkn[] = (int)$tampung_uh_ppkn;
            $tampung_uh_indonesia = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 5)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_indonesia[] = (int)$tampung_uh_indonesia;
            $tampung_uh_matematika = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 6)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_matematika[] = (int)$tampung_uh_matematika;
            $tampung_uh_ipa = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 7)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_ipa[] = (int)$tampung_uh_ipa;
            $tampung_uh_ips = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 8)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_ips[] = (int)$tampung_uh_ips;
            $tampung_uh_pjok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 9)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_pjok[] = (int)$tampung_uh_pjok;
            $tampung_uh_sbk = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 10)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_sbk[] = (int)$tampung_uh_sbk;
            $tampung_uh_mulok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 11)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_uh_mulok[] = (int)$tampung_uh_mulok;
        }

        if (
            $students->agama == "Islam" || $students->agama == "islam"
        ) {
            if (array_sum($nilai_uh_islam) > 0) {
                for ($key = 0; $key < count($nilai_uh_islam); $key++) {
                    if ($nilai_uh_islam[$key] > 0) {
                        $nilai_uh_islam_yes[] = $nilai_uh_islam[$key];
                    }
                }
                $jml_pel_uh_islam    = count($nilai_uh_islam_yes);
                $sum_pel_uh_islam    = array_sum($nilai_uh_islam_yes);
                $rata_rata_uh_islam  = number_format((float)$sum_pel_uh_islam / $jml_pel_uh_islam, 2, '.', '');
            } elseif (array_sum($nilai_uh_islam) == 0) {
                $rata_rata_uh_islam = 0.00;
            }
        }

        if (
            $students->agama == "Kristen Protestan" || $students->agama == "kristen protestan"
        ) {
            if (array_sum($nilai_uh_protestan) > 0) {
                for ($key = 0; $key < count($nilai_uh_protestan); $key++) {
                    if ($nilai_uh_protestan[$key] > 0) {
                        $nilai_uh_protestan_yes[] = $nilai_uh_protestan[$key];
                    }
                }
                $jml_pel_uh_protestan    = count($nilai_uh_protestan_yes);
                $sum_pel_uh_protestan    = array_sum($nilai_uh_protestan_yes);
                $rata_rata_uh_protestan  = number_format((float)$sum_pel_uh_protestan / $jml_pel_uh_protestan, 2, '.', '');
            } elseif (array_sum($nilai_uh_protestan) == 0) {
                $rata_rata_uh_protestan = 0.00;
            }
        }

        if (
            $students->agama == "Katolik" || $students->agama == "katolik"
        ) {
            if (array_sum($nilai_uh_katolik) > 0) {
                for ($key = 0; $key < count($nilai_uh_katolik); $key++) {
                    if ($nilai_uh_katolik[$key] > 0) {
                        $nilai_uh_katolik_yes[] = $nilai_uh_katolik[$key];
                    }
                }
                $jml_pel_uh_katolik    = count($nilai_uh_katolik_yes);
                $sum_pel_uh_katolik    = array_sum($nilai_uh_katolik_yes);
                $rata_rata_uh_katolik  = number_format((float)$sum_pel_uh_katolik / $jml_pel_uh_katolik, 2, '.', '');
            } elseif (array_sum($nilai_uh_katolik) == 0) {
                $rata_rata_uh_katolik = 0.00;
            }
        }


        if (array_sum($nilai_uh_ppkn) > 0) {
            for ($key = 0; $key < count($nilai_uh_ppkn); $key++) {
                if ($nilai_uh_ppkn[$key] > 0) {
                    $nilai_uh_ppkn_yes[] = $nilai_uh_ppkn[$key];
                }
            }
            $jml_pel_uh_ppkn    = count($nilai_uh_ppkn_yes);
            $sum_pel_uh_ppkn    = array_sum($nilai_uh_ppkn_yes);
            $rata_rata_uh_ppkn  = number_format((float)$sum_pel_uh_ppkn / $jml_pel_uh_ppkn, 2, '.', '');
        } elseif (array_sum($nilai_uh_ppkn) == 0) {
            $rata_rata_uh_ppkn = 0.00;
        }
        //dd($rata_rata_uh_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_uh_indonesia));
        if (array_sum($nilai_uh_indonesia) > 0) {
            for ($key = 0; $key < count($nilai_uh_indonesia); $key++) {
                if ($nilai_uh_indonesia[$key] > 0) {
                    $nilai_uh_indonesia_yes[] = $nilai_uh_indonesia[$key];
                }
            }
            $jml_pel_uh_indonesia    = count($nilai_uh_indonesia_yes);
            $sum_pel_uh_indonesia    = array_sum($nilai_uh_indonesia_yes);
            $rata_rata_uh_indonesia  = number_format((float)$sum_pel_uh_indonesia / $jml_pel_uh_indonesia, 2, '.', '');
        } elseif (array_sum($nilai_uh_indonesia) == 0) {
            $rata_rata_uh_indonesia = 0.00;
        }
        //dd($rata_rata_uh_indonesia);
        if (array_sum($nilai_uh_matematika) > 0) {
            for ($key = 0; $key < count($nilai_uh_matematika); $key++) {
                if ($nilai_uh_matematika[$key] > 0) {
                    $nilai_uh_matematika_yes[] = $nilai_uh_matematika[$key];
                }
            }
            $jml_pel_uh_matematika    = count($nilai_uh_matematika_yes);
            $sum_pel_uh_matematika    = array_sum($nilai_uh_matematika_yes);
            $rata_rata_uh_matematika  = number_format((float)$sum_pel_uh_matematika / $jml_pel_uh_matematika, 2, '.', '');
        } elseif (array_sum($nilai_uh_matematika) == 0) {
            $rata_rata_uh_matematika = 0.00;
        }

        if (array_sum($nilai_uh_ipa) > 0) {
            for ($key = 0; $key < count($nilai_uh_ipa); $key++) {
                if ($nilai_uh_ipa[$key] > 0) {
                    $nilai_uh_ipa_yes[] = $nilai_uh_ipa[$key];
                }
            }
            $jml_pel_uh_ipa    = count($nilai_uh_ipa_yes);
            $sum_pel_uh_ipa    = array_sum($nilai_uh_ipa_yes);
            $rata_rata_uh_ipa  = number_format((float)$sum_pel_uh_ipa / $jml_pel_uh_ipa, 2, '.', '');
        } elseif (array_sum($nilai_uh_ipa) == 0) {
            $rata_rata_uh_ipa = 0.00;
        }

        if (array_sum($nilai_uh_ips) > 0) {
            for ($key = 0; $key < count($nilai_uh_ips); $key++) {
                if ($nilai_uh_ips[$key] > 0) {
                    $nilai_uh_ips_yes[] = $nilai_uh_ips[$key];
                }
            }
            $jml_pel_uh_ips    = count($nilai_uh_ips_yes);
            $sum_pel_uh_ips    = array_sum($nilai_uh_ips_yes);
            $rata_rata_uh_ips  = number_format((float)$sum_pel_uh_ips / $jml_pel_uh_ips, 2, '.', '');
        } elseif (array_sum($nilai_uh_ips) == 0) {
            $rata_rata_uh_ips = 0.00;
        }

        if (array_sum($nilai_uh_pjok) > 0) {
            for ($key = 0; $key < count($nilai_uh_pjok); $key++) {
                if ($nilai_uh_pjok[$key] > 0) {
                    $nilai_uh_pjok_yes[] = $nilai_uh_pjok[$key];
                }
            }
            $jml_pel_uh_pjok    = count($nilai_uh_pjok_yes);
            $sum_pel_uh_pjok    = array_sum($nilai_uh_pjok_yes);
            $rata_rata_uh_pjok  = number_format((float)$sum_pel_uh_pjok / $jml_pel_uh_pjok, 2, '.', '');
        } elseif (array_sum($nilai_uh_pjok) == 0) {
            $rata_rata_uh_pjok = 0.00;
        }

        if (array_sum($nilai_uh_sbk) > 0) {
            for ($key = 0; $key < count($nilai_uh_sbk); $key++) {
                if ($nilai_uh_sbk[$key] > 0) {
                    $nilai_uh_sbk_yes[] = $nilai_uh_sbk[$key];
                }
            }
            $jml_pel_uh_sbk    = count($nilai_uh_sbk_yes);
            $sum_pel_uh_sbk    = array_sum($nilai_uh_sbk_yes);
            $rata_rata_uh_sbk  = number_format((float)$sum_pel_uh_sbk / $jml_pel_uh_sbk, 2, '.', '');
        } elseif (array_sum($nilai_uh_sbk) == 0) {
            $rata_rata_uh_sbk = 0.00;
        }
        if (array_sum($nilai_uh_mulok) > 0) {
            for ($key = 0; $key < count($nilai_uh_mulok); $key++) {
                if ($nilai_uh_mulok[$key] > 0) {
                    $nilai_uh_mulok_yes[] = $nilai_uh_mulok[$key];
                }
            }
            $jml_pel_uh_mulok    = count($nilai_uh_mulok_yes);
            $sum_pel_uh_mulok    = array_sum($nilai_uh_mulok_yes);
            $rata_rata_uh_mulok  = number_format((float)$sum_pel_uh_mulok / $jml_pel_uh_mulok, 2, '.', '');
        } elseif (array_sum($nilai_uh_mulok) == 0) {
            $rata_rata_uh_mulok = 0.00;
        }

        // --------------------------------------------------------------------
        //menghitung nilai pts
        for ($penilaian = 4; $penilaian < 5; $penilaian++) {
            $tampung_pts_islam = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 1)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_islam[] = (int)$tampung_pts_islam;
            $tampung_pts_protestan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 2)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_protestan[] = (int)$tampung_pts_protestan;
            $tampung_pts_katolik = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 3)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_katolik[] = (int)$tampung_pts_katolik;
            $tampung_pts_ppkn = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 4)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_ppkn[] = (int)$tampung_pts_ppkn;
            $tampung_pts_indonesia = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 5)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_indonesia[] = (int)$tampung_pts_indonesia;
            $tampung_pts_matematika = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 6)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_matematika[] = (int)$tampung_pts_matematika;
            $tampung_pts_ipa = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 7)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_ipa[] = (int)$tampung_pts_ipa;
            $tampung_pts_ips = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 8)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_ips[] = (int)$tampung_pts_ips;
            $tampung_pts_pjok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 9)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_pjok[] = (int)$tampung_pts_pjok;
            $tampung_pts_sbk = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 10)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_sbk[] = (int)$tampung_pts_sbk;
            $tampung_pts_mulok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 11)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pts_mulok[] = (int)$tampung_pts_mulok;
        }

        if (
            $students->agama == "Islam" || $students->agama == "islam"
        ) {
            if (array_sum($nilai_pts_islam) > 0) {
                for ($key = 0; $key < count($nilai_pts_islam); $key++) {
                    if ($nilai_pts_islam[$key] > 0) {
                        $nilai_pts_islam_yes[] = $nilai_pts_islam[$key];
                    }
                }
                $jml_pel_pts_islam    = count($nilai_pts_islam_yes);
                $sum_pel_pts_islam    = array_sum($nilai_pts_islam_yes);
                $rata_rata_pts_islam  = number_format((float)$sum_pel_pts_islam / $jml_pel_pts_islam, 2, '.', '');
            } elseif (array_sum($nilai_pts_islam) == 0) {
                $rata_rata_pts_islam = 0.00;
            }
        }

        if (
            $students->agama == "Kristen Protestan" || $students->agama == "kristen protestan"
        ) {
            if (array_sum($nilai_pts_protestan) > 0) {
                for ($key = 0; $key < count($nilai_pts_protestan); $key++) {
                    if ($nilai_pts_protestan[$key] > 0) {
                        $nilai_pts_protestan_yes[] = $nilai_pts_protestan[$key];
                    }
                }
                $jml_pel_pts_protestan    = count($nilai_pts_protestan_yes);
                $sum_pel_pts_protestan    = array_sum($nilai_pts_protestan_yes);
                $rata_rata_pts_protestan  = number_format((float)$sum_pel_pts_protestan / $jml_pel_pts_protestan, 2, '.', '');
            } elseif (array_sum($nilai_pts_protestan) == 0) {
                $rata_rata_pts_protestan = 0.00;
            }
        }

        if (
            $students->agama == "Katolik" || $students->agama == "katolik"
        ) {
            if (array_sum($nilai_pts_katolik) > 0) {
                for ($key = 0; $key < count($nilai_pts_katolik); $key++) {
                    if ($nilai_pts_katolik[$key] > 0) {
                        $nilai_pts_katolik_yes[] = $nilai_pts_katolik[$key];
                    }
                }
                $jml_pel_pts_katolik    = count($nilai_pts_katolik_yes);
                $sum_pel_pts_katolik    = array_sum($nilai_pts_katolik_yes);
                $rata_rata_pts_katolik  = number_format((float)$sum_pel_pts_katolik / $jml_pel_pts_katolik, 2, '.', '');
            } elseif (array_sum($nilai_pts_katolik) == 0) {
                $rata_rata_pts_katolik = 0.00;
            }
        }

        if (array_sum($nilai_pts_ppkn) > 0) {
            for ($key = 0; $key < count($nilai_pts_ppkn); $key++) {
                if ($nilai_pts_ppkn[$key] > 0) {
                    $nilai_pts_ppkn_yes[] = $nilai_pts_ppkn[$key];
                }
            }
            $jml_pel_pts_ppkn    = count($nilai_pts_ppkn_yes);
            $sum_pel_pts_ppkn    = array_sum($nilai_pts_ppkn_yes);
            $rata_rata_pts_ppkn  = number_format((float)$sum_pel_pts_ppkn / $jml_pel_pts_ppkn, 2, '.', '');
        } elseif (array_sum($nilai_pts_ppkn) == 0) {
            $rata_rata_pts_ppkn = 0.00;
        }
        //dd($rata_rata_pts_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_pts_indonesia));
        if (array_sum($nilai_pts_indonesia) > 0) {
            for ($key = 0; $key < count($nilai_pts_indonesia); $key++) {
                if ($nilai_pts_indonesia[$key] > 0) {
                    $nilai_pts_indonesia_yes[] = $nilai_pts_indonesia[$key];
                }
            }
            $jml_pel_pts_indonesia    = count($nilai_pts_indonesia_yes);
            $sum_pel_pts_indonesia    = array_sum($nilai_pts_indonesia_yes);
            $rata_rata_pts_indonesia  = number_format((float)$sum_pel_pts_indonesia / $jml_pel_pts_indonesia, 2, '.', '');
        } elseif (array_sum($nilai_pts_indonesia) == 0) {
            $rata_rata_pts_indonesia = 0.00;
        }
        //dd($rata_rata_pts_indonesia);
        if (array_sum($nilai_pts_matematika) > 0) {
            for ($key = 0; $key < count($nilai_pts_matematika); $key++) {
                if ($nilai_pts_matematika[$key] > 0) {
                    $nilai_pts_matematika_yes[] = $nilai_pts_matematika[$key];
                }
            }
            $jml_pel_pts_matematika    = count($nilai_pts_matematika_yes);
            $sum_pel_pts_matematika    = array_sum($nilai_pts_matematika_yes);
            $rata_rata_pts_matematika  = number_format((float)$sum_pel_pts_matematika / $jml_pel_pts_matematika, 2, '.', '');
        } elseif (array_sum($nilai_pts_matematika) == 0) {
            $rata_rata_pts_matematika = 0.00;
        }

        if (array_sum($nilai_pts_ipa) > 0) {
            for ($key = 0; $key < count($nilai_pts_ipa); $key++) {
                if ($nilai_pts_ipa[$key] > 0) {
                    $nilai_pts_ipa_yes[] = $nilai_pts_ipa[$key];
                }
            }
            $jml_pel_pts_ipa    = count($nilai_pts_ipa_yes);
            $sum_pel_pts_ipa    = array_sum($nilai_pts_ipa_yes);
            $rata_rata_pts_ipa  = number_format((float)$sum_pel_pts_ipa / $jml_pel_pts_ipa, 2, '.', '');
        } elseif (array_sum($nilai_pts_ipa) == 0) {
            $rata_rata_pts_ipa = 0.00;
        }

        if (array_sum($nilai_pts_ips) > 0) {
            for ($key = 0; $key < count($nilai_pts_ips); $key++) {
                if ($nilai_pts_ips[$key] > 0) {
                    $nilai_pts_ips_yes[] = $nilai_pts_ips[$key];
                }
            }
            $jml_pel_pts_ips    = count($nilai_pts_ips_yes);
            $sum_pel_pts_ips    = array_sum($nilai_pts_ips_yes);
            $rata_rata_pts_ips  = number_format((float)$sum_pel_pts_ips / $jml_pel_pts_ips, 2, '.', '');
        } elseif (array_sum($nilai_pts_ips) == 0) {
            $rata_rata_pts_ips = 0.00;
        }

        if (array_sum($nilai_pts_pjok) > 0) {
            for ($key = 0; $key < count($nilai_pts_pjok); $key++) {
                if ($nilai_pts_pjok[$key] > 0) {
                    $nilai_pts_pjok_yes[] = $nilai_pts_pjok[$key];
                }
            }
            $jml_pel_pts_pjok    = count($nilai_pts_pjok_yes);
            $sum_pel_pts_pjok    = array_sum($nilai_pts_pjok_yes);
            $rata_rata_pts_pjok  = number_format((float)$sum_pel_pts_pjok / $jml_pel_pts_pjok, 2, '.', '');
        } elseif (array_sum($nilai_pts_pjok) == 0) {
            $rata_rata_pts_pjok = 0.00;
        }

        if (array_sum($nilai_pts_sbk) > 0) {
            for ($key = 0; $key < count($nilai_pts_sbk); $key++) {
                if ($nilai_pts_sbk[$key] > 0) {
                    $nilai_pts_sbk_yes[] = $nilai_pts_sbk[$key];
                }
            }
            $jml_pel_pts_sbk    = count($nilai_pts_sbk_yes);
            $sum_pel_pts_sbk    = array_sum($nilai_pts_sbk_yes);
            $rata_rata_pts_sbk  = number_format((float)$sum_pel_pts_sbk / $jml_pel_pts_sbk, 2, '.', '');
        } elseif (array_sum($nilai_pts_sbk) == 0) {
            $rata_rata_pts_sbk = 0.00;
        }

        if (array_sum($nilai_pts_mulok) > 0) {
            for ($key = 0; $key < count($nilai_pts_mulok); $key++) {
                if ($nilai_pts_mulok[$key] > 0) {
                    $nilai_pts_mulok_yes[] = $nilai_pts_mulok[$key];
                }
            }
            $jml_pel_pts_mulok    = count($nilai_pts_mulok_yes);
            $sum_pel_pts_mulok    = array_sum($nilai_pts_mulok_yes);
            $rata_rata_pts_mulok  = number_format((float)$sum_pel_pts_mulok / $jml_pel_pts_mulok, 2, '.', '');
        } elseif (array_sum($nilai_pts_mulok) == 0) {
            $rata_rata_pts_mulok = 0.00;
        }

        // --------------------------------------------------------------------
        //menghitung nilai pas
        for ($penilaian = 5; $penilaian < 6; $penilaian++) {
            $tampung_pas_islam = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 1)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_islam[] = (int)$tampung_pas_islam;
            $tampung_pas_protestan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 2)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_protestan[] = (int)$tampung_pas_protestan;
            $tampung_pas_katolik = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 3)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_katolik[] = (int)$tampung_pas_katolik;
            $tampung_pas_ppkn = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 4)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_ppkn[] = (int)$tampung_pas_ppkn;
            $tampung_pas_indonesia = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 5)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_indonesia[] = (int)$tampung_pas_indonesia;
            $tampung_pas_matematika = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 6)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_matematika[] = (int)$tampung_pas_matematika;
            $tampung_pas_ipa = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 7)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_ipa[] = (int)$tampung_pas_ipa;
            $tampung_pas_ips = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 8)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_ips[] = (int)$tampung_pas_ips;
            $tampung_pas_pjok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 9)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_pjok[] = (int)$tampung_pas_pjok;
            $tampung_pas_sbk = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 10)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_sbk[] = (int)$tampung_pas_sbk;
            $tampung_pas_mulok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 11)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_pas_mulok[] = (int)$tampung_pas_mulok;
        }

        if (
            $students->agama == "Islam" || $students->agama == "islam"
        ) {
            if (array_sum($nilai_pas_islam) > 0) {
                for ($key = 0; $key < count($nilai_pas_islam); $key++) {
                    if ($nilai_pas_islam[$key] > 0) {
                        $nilai_pas_islam_yes[] = $nilai_pas_islam[$key];
                    }
                }
                $jml_pel_pas_islam    = count($nilai_pas_islam_yes);
                $sum_pel_pas_islam    = array_sum($nilai_pas_islam_yes);
                $rata_rata_pas_islam  = number_format((float)$sum_pel_pas_islam / $jml_pel_pas_islam, 2, '.', '');
            } elseif (array_sum($nilai_pas_islam) == 0) {
                $rata_rata_pas_islam = 0.00;
            }
        }

        if (
            $students->agama == "Kristen Protestan" || $students->agama == "kristen protestan"
        ) {
            if (array_sum($nilai_pas_protestan) > 0) {
                for ($key = 0; $key < count($nilai_pas_protestan); $key++) {
                    if ($nilai_pas_protestan[$key] > 0) {
                        $nilai_pas_protestan_yes[] = $nilai_pas_protestan[$key];
                    }
                }
                $jml_pel_pas_protestan    = count($nilai_pas_protestan_yes);
                $sum_pel_pas_protestan    = array_sum($nilai_pas_protestan_yes);
                $rata_rata_pas_protestan  = number_format((float)$sum_pel_pas_protestan / $jml_pel_pas_protestan, 2, '.', '');
            } elseif (array_sum($nilai_pas_protestan) == 0) {
                $rata_rata_pas_protestan = 0.00;
            }
        }
        //dd($rata_rata_pas_protestan);
        if ($students->agama == "Katolik" || $students->agama == "katolik") {
            if (array_sum($nilai_pas_katolik) > 0) {
                for ($key = 0; $key < count($nilai_pas_katolik); $key++) {
                    if ($nilai_pas_katolik[$key] > 0) {
                        $nilai_pas_katolik_yes[] = $nilai_pas_katolik[$key];
                    }
                }
                $jml_pel_pas_katolik    = count($nilai_pas_katolik_yes);
                $sum_pel_pas_katolik    = array_sum($nilai_pas_katolik_yes);
                $rata_rata_pas_katolik  = number_format((float)$sum_pel_pas_katolik / $jml_pel_pas_katolik, 2, '.', '');
            } elseif (array_sum($nilai_pas_katolik) == 0) {
                $rata_rata_pas_katolik = 0.00;
            }
        }

        if (array_sum($nilai_pas_ppkn) > 0) {
            for ($key = 0; $key < count($nilai_pas_ppkn); $key++) {
                if ($nilai_pas_ppkn[$key] > 0) {
                    $nilai_pas_ppkn_yes[] = $nilai_pas_ppkn[$key];
                }
            }
            $jml_pel_pas_ppkn    = count($nilai_pas_ppkn_yes);
            $sum_pel_pas_ppkn    = array_sum($nilai_pas_ppkn_yes);
            $rata_rata_pas_ppkn  = number_format((float)$sum_pel_pas_ppkn / $jml_pel_pas_ppkn, 2, '.', '');
        } elseif (array_sum($nilai_pas_ppkn) == 0) {
            $rata_rata_pas_ppkn = 0.00;
        }
        //dd($rata_rata_pas_ppkn);
        //dd("jumlah elemen array: ".array_sum($nilai_pas_indonesia));
        if (array_sum($nilai_pas_indonesia) > 0) {
            for ($key = 0; $key < count($nilai_pas_indonesia); $key++) {
                if ($nilai_pas_indonesia[$key] > 0) {
                    $nilai_pas_indonesia_yes[] = $nilai_pas_indonesia[$key];
                }
            }
            $jml_pel_pas_indonesia    = count($nilai_pas_indonesia_yes);
            $sum_pel_pas_indonesia    = array_sum($nilai_pas_indonesia_yes);
            $rata_rata_pas_indonesia  = number_format((float)$sum_pel_pas_indonesia / $jml_pel_pas_indonesia, 2, '.', '');
        } elseif (array_sum($nilai_pas_indonesia) == 0) {
            $rata_rata_pas_indonesia = 0.00;
        }
        //dd($rata_rata_pas_indonesia);
        if (array_sum($nilai_pas_matematika) > 0) {
            for ($key = 0; $key < count($nilai_pas_matematika); $key++) {
                if ($nilai_pas_matematika[$key] > 0) {
                    $nilai_pas_matematika_yes[] = $nilai_pas_matematika[$key];
                }
            }
            $jml_pel_pas_matematika    = count($nilai_pas_matematika_yes);
            $sum_pel_pas_matematika    = array_sum($nilai_pas_matematika_yes);
            $rata_rata_pas_matematika  = number_format((float)$sum_pel_pas_matematika / $jml_pel_pas_matematika, 2, '.', '');
        } elseif (array_sum($nilai_pas_matematika) == 0) {
            $rata_rata_pas_matematika = 0.00;
        }

        if (array_sum($nilai_pas_ipa) > 0) {
            for ($key = 0; $key < count($nilai_pas_ipa); $key++) {
                if ($nilai_pas_ipa[$key] > 0) {
                    $nilai_pas_ipa_yes[] = $nilai_pas_ipa[$key];
                }
            }
            $jml_pel_pas_ipa    = count($nilai_pas_ipa_yes);
            $sum_pel_pas_ipa    = array_sum($nilai_pas_ipa_yes);
            $rata_rata_pas_ipa  = number_format((float)$sum_pel_pas_ipa / $jml_pel_pas_ipa, 2, '.', '');
        } elseif (array_sum($nilai_pas_ipa) == 0) {
            $rata_rata_pas_ipa = 0.00;
        }

        if (array_sum($nilai_pas_ips) > 0) {
            for ($key = 0; $key < count($nilai_pas_ips); $key++) {
                if ($nilai_pas_ips[$key] > 0) {
                    $nilai_pas_ips_yes[] = $nilai_pas_ips[$key];
                }
            }
            $jml_pel_pas_ips    = count($nilai_pas_ips_yes);
            $sum_pel_pas_ips    = array_sum($nilai_pas_ips_yes);
            $rata_rata_pas_ips  = number_format((float)$sum_pel_pas_ips / $jml_pel_pas_ips, 2, '.', '');
        } elseif (array_sum($nilai_pas_ips) == 0) {
            $rata_rata_pas_ips = 0.00;
        }

        if (array_sum($nilai_pas_pjok) > 0) {
            for ($key = 0; $key < count($nilai_pas_pjok); $key++) {
                if ($nilai_pas_pjok[$key] > 0) {
                    $nilai_pas_pjok_yes[] = $nilai_pas_pjok[$key];
                }
            }
            $jml_pel_pas_pjok    = count($nilai_pas_pjok_yes);
            $sum_pel_pas_pjok    = array_sum($nilai_pas_pjok_yes);
            $rata_rata_pas_pjok  = number_format((float)$sum_pel_pas_pjok / $jml_pel_pas_pjok, 2, '.', '');
        } elseif (array_sum($nilai_pas_pjok) == 0) {
            $rata_rata_pas_pjok = 0.00;
        }

        if (array_sum($nilai_pas_sbk) > 0) {
            for ($key = 0; $key < count($nilai_pas_sbk); $key++) {
                if ($nilai_pas_sbk[$key] > 0) {
                    $nilai_pas_sbk_yes[] = $nilai_pas_sbk[$key];
                }
            }
            $jml_pel_pas_sbk    = count($nilai_pas_sbk_yes);
            $sum_pel_pas_sbk    = array_sum($nilai_pas_sbk_yes);
            $rata_rata_pas_sbk  = number_format((float)$sum_pel_pas_sbk / $jml_pel_pas_sbk, 2, '.', '');
        } elseif (array_sum($nilai_pas_sbk) == 0) {
            $rata_rata_pas_sbk = 0.00;
        }

        if (array_sum($nilai_pas_mulok) > 0) {
            for ($key = 0; $key < count($nilai_pas_mulok); $key++) {
                if ($nilai_pas_mulok[$key] > 0) {
                    $nilai_pas_mulok_yes[] = $nilai_pas_mulok[$key];
                }
            }
            $jml_pel_pas_mulok    = count($nilai_pas_mulok_yes);
            $sum_pel_pas_mulok    = array_sum($nilai_pas_mulok_yes);
            $rata_rata_pas_mulok  = number_format((float)$sum_pel_pas_mulok / $jml_pel_pas_mulok, 2, '.', '');
        } elseif (array_sum($nilai_pas_mulok) == 0) {
            $rata_rata_pas_mulok = 0.00;
        }

        // --------------------------------------------------------------------
        // hitung nilai raport
        if ($students->agama == "Islam" || $students->agama == "islam") {
            $semua_nilai_proses = [$rata_rata_tugas_islam, $rata_rata_latihan_islam, $rata_rata_uh_islam];
            $raport_pengetahuan_islam = ((max($semua_nilai_proses) * 2)
                + ($rata_rata_pts_islam * 1)
                + ($rata_rata_pas_islam * 1)) / 4;
            $raport_pengetahuan_agama = number_format((float)$raport_pengetahuan_islam, 1, '.', '');
        }
        //dd($raport_pengetahuan_islam);
        if ($students->agama == "Kristen Protestan" || $students->agama == "kristen protestan") {
            $semua_nilai_proses = [$rata_rata_tugas_protestan, $rata_rata_latihan_protestan, $rata_rata_uh_protestan];
            $raport_pengetahuan_protestan = (((max($semua_nilai_proses)) * 2)
                + ($rata_rata_pts_protestan * 1)
                + ($rata_rata_pas_protestan * 1)) / 4;
            $raport_pengetahuan_agama = number_format((float)$raport_pengetahuan_protestan, 1, '.', '');
        }
        //dd($rata_rata_tugas_protestan);
        if ($students->agama == "Katolik" || $students->agama == "katolik") {
            $semua_nilai_proses = [$rata_rata_tugas_katolik, $rata_rata_latihan_katolik, $rata_rata_uh_katolik];
            $raport_pengetahuan_katolik = (((max($semua_nilai_proses)) * 2)
                + ($rata_rata_pts_katolik * 1)
                + ($rata_rata_pas_katolik * 1)) / 4;
            $raport_pengetahuan_agama = number_format((float)$raport_pengetahuan_katolik, 1, '.', '');
        }
        $raport_pengetahuan_ppkn = (((max(
            [$rata_rata_tugas_ppkn, $rata_rata_latihan_ppkn, $rata_rata_uh_ppkn]
        )) * 2) + ($rata_rata_pts_ppkn * 1) + ($rata_rata_pas_ppkn * 1)) / 4;
        $raport_pengetahuan_ppkn = number_format((float)$raport_pengetahuan_ppkn, 1, '.', '');
        //dd($raport_pengetahuan_ppkn);
        $raport_pengetahuan_indonesia = (((max([
            $rata_rata_tugas_ppkn, $rata_rata_latihan_ppkn, $rata_rata_uh_ppkn
        ])) * 2)
            + ($rata_rata_pts_indonesia * 1)
            + ($rata_rata_pas_indonesia * 1)) / 4;
        $raport_pengetahuan_indonesia = number_format((float)$raport_pengetahuan_indonesia, 1, '.', '');
        $raport_pengetahuan_matematika = (((max([
            $rata_rata_tugas_matematika, $rata_rata_latihan_matematika, $rata_rata_uh_matematika
        ])) * 2)
            + ($rata_rata_pts_matematika * 1)
            + ($rata_rata_pas_matematika * 1)) / 4;
        $raport_pengetahuan_matematika = number_format((float)$raport_pengetahuan_matematika, 1, '.', '');
        //dd($raport_pengetahuan_matematika);
        $raport_pengetahuan_ipa = (((max([
            $rata_rata_tugas_ipa, $rata_rata_latihan_ipa, $rata_rata_uh_ipa
        ])) * 2)
            + ($rata_rata_pts_ipa * 1)
            + ($rata_rata_pas_ipa * 1)) / 4;
        $raport_pengetahuan_ipa = number_format((float)$raport_pengetahuan_ipa, 1, '.', '');
        $raport_pengetahuan_ips = (((max([
            $rata_rata_tugas_ips, $rata_rata_latihan_ips, $rata_rata_uh_ips
        ])) * 2)
            + ($rata_rata_pts_ips * 1)
            + ($rata_rata_pas_ips * 1)) / 4;
        $raport_pengetahuan_ips = number_format((float)$raport_pengetahuan_ips, 1, '.', '');
        $raport_pengetahuan_pjok = (((max([
            $rata_rata_tugas_pjok, $rata_rata_latihan_pjok, $rata_rata_uh_pjok
        ])) * 2)
            + ($rata_rata_pts_pjok * 1)
            + ($rata_rata_pas_pjok * 1)) / 4;
        $raport_pengetahuan_pjok = number_format((float)$raport_pengetahuan_pjok, 1, '.', '');
        $raport_pengetahuan_sbk = (((max([
            $rata_rata_tugas_sbk, $rata_rata_latihan_sbk, $rata_rata_uh_sbk
        ])) * 2)
            + ($rata_rata_pts_sbk * 1)
            + ($rata_rata_pas_sbk * 1)) / 4;
        $raport_pengetahuan_sbk = number_format((float)$raport_pengetahuan_sbk, 1, '.', '');
        $raport_pengetahuan_mulok = (((max([
            $rata_rata_tugas_mulok, $rata_rata_latihan_mulok, $rata_rata_uh_mulok
        ])) * 2)
            + ($rata_rata_pts_mulok * 1)
            + ($rata_rata_pas_mulok * 1)) / 4;
        $raport_pengetahuan_mulok = number_format((float)$raport_pengetahuan_mulok, 1, '.', '');
        $kkm = 50;
        // hitung deskripsi agama
        if ($students->agama == "Islam" || $students->agama == "islam") {
            $predikat_pengetahuan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', 5)
                ->where('mapel_id', '=', 1)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai_notes')->toArray();
            $predikat_keterampilan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', 19)
                ->where('mapel_id', '=', 1)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai_notes')->toArray();
            //dd(implode($predikat));
        }
        //dd($raport_pengetahuan_islam);
        if ($students->agama == "Kristen Protestan" || $students->agama == "kristen protestan") {
            $predikat_pengetahuan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', 5)
                ->where('mapel_id', '=', 2)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai_notes')->toArray();
            $predikat_keterampilan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', 19)
                ->where('mapel_id', '=', 2)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai_notes')->toArray();
            //dd(implode($predikat));
        }
        //dd($rata_rata_tugas_protestan);
        if ($students->agama == "Katolik" || $students->agama == "katolik") {
            $predikat_pengetahuan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', 5)
                ->where('mapel_id', '=', 3)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai_notes')->toArray();
            $predikat_keterampilan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', 19)
                ->where('mapel_id', '=', 3)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai_notes')->toArray();
            //dd(implode($predikat));
        }

        if ($raport_pengetahuan_agama < $kkm) {
            $predikat_huruf_agama1 = "kurang";
            $predikat_huruf_agama = "D";
            $predikat_deskripsi_agama = " dalam | " . implode(", ", $predikat_pengetahuan);
        } elseif ($raport_pengetahuan_agama >= $kkm && $raport_pengetahuan_agama <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikat_huruf_agama1 = "cukup";
            $predikat_huruf_agama = "C";
            $predikat_deskripsi_agama = " dalam | " . implode(", ", $predikat_pengetahuan);
        } elseif ($raport_pengetahuan_agama > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_agama <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_agama1 = "baik";
            $predikat_huruf_agama = "B";
            $predikat_deskripsi_agama = " dalam | " . implode(", ", $predikat_pengetahuan);
        } elseif ($raport_pengetahuan_agama > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_agama1 = "sangat baik";
            $predikat_huruf_agama = "A";
            $predikat_deskripsi_agama = " dalam | " . implode(", ", $predikat_pengetahuan);
        }
        // -------------
        // deskripsi ppkn
        $predikat_pengetahuan_ppkn = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 5)
            ->where('mapel_id', '=', 4)
            ->where('tahunpel_id', '=', $thn_id)
        ->pluck('nilai_notes')->toArray();
        //dd($predikat_pengetahuan_ppkn);
        $predikat_keterampilan_ppkn = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 19)
            ->where('mapel_id', '=', 4)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        //dd(implode($predikat));
        if ($raport_pengetahuan_ppkn < $kkm) {
            $predikat_huruf_ppkn1 = "kurang";
            $predikat_huruf_ppkn = "D";
            $predikat_deskripsi_ppkn = " dalam | " . implode(", ", $predikat_pengetahuan_ppkn);
        } elseif (
            $raport_pengetahuan_ppkn >= $kkm && $raport_pengetahuan_ppkn <= ($kkm + 1 * ((100 - $kkm) / 3))
        ) {
            $predikat_huruf_ppkn1 = "cukup";
            $predikat_huruf_ppkn = "C";
            $predikat_deskripsi_ppkn = " dalam | " . implode(", ", $predikat_pengetahuan_ppkn);
        } elseif ($raport_pengetahuan_ppkn > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_ppkn <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_ppkn1 = "baik";
            $predikat_huruf_ppkn = "B";
            $predikat_deskripsi_ppkn = " dalam | " . implode(", ", $predikat_pengetahuan_ppkn);
        } elseif ($raport_pengetahuan_ppkn > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_ppkn1 = "sangat baik";
            $predikat_huruf_ppkn = "A";
            $predikat_deskripsi_ppkn = " dalam | " . implode(", ", $predikat_pengetahuan_ppkn);
        }
        // -------------
        // deskripsi indonesia
        $predikat_pengetahuan_bi = Nilai::all()
            ->where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 5)
            ->where('mapel_id', '=', 5)
            ->where('tahunpel_id', '=', $thn_id)
        ->pluck('nilai_notes')->toArray();
        $predikat_keterampilan_bi = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 19)
            ->where('mapel_id', '=', 5)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        //dd(implode($predikat_pengetahuan_bi));
        if ($raport_pengetahuan_indonesia < $kkm) {
            $predikat_huruf_bi = "kurang";
            $predikat_huruf_indonesia = "D";
            $predikat_deskripsi_indonesia = " dalam | " . implode(", ", $predikat_pengetahuan_bi);
        } elseif ($raport_pengetahuan_indonesia >= $kkm && $raport_pengetahuan_indonesia <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikat_huruf_bi = "cukup";
            $predikat_huruf_indonesia = "C";
            $predikat_deskripsi_indonesia = " dalam | " . implode(", ", $predikat_pengetahuan_bi);
        } elseif ($raport_pengetahuan_indonesia > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_indonesia <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_bi = "baik";
            $predikat_huruf_indonesia = "B";
            $predikat_deskripsi_indonesia = " dalam | " . implode(", ", $predikat_pengetahuan_bi);
        } elseif ($raport_pengetahuan_indonesia > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_bi = "sangat baik";
            $predikat_huruf_indonesia = "A";
            $predikat_deskripsi_indonesia = " dalam | " . implode(", ", $predikat_pengetahuan_bi);
        }
        // -------------
        //dd($predikat_deskripsi_indonesia);
        // deskripsi matematika
        $predikat_pengetahuan_math = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 5)
            ->where('mapel_id', '=', 6)
            ->where('tahunpel_id', '=', $thn_id)
        ->pluck('nilai_notes')->toArray();
        $predikat_keterampilan_math = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 19)
            ->where('mapel_id', '=', 6)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        //dd(implode($predikat));
        if ($raport_pengetahuan_matematika < $kkm) {
            $predikat_huruf_math = "kurang";
            $predikat_huruf_matematika = "D";
            $predikat_deskripsi_matematika = " dalam | " . implode(", ", $predikat_pengetahuan_math);
        } elseif ($raport_pengetahuan_matematika >= $kkm && $raport_pengetahuan_matematika <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikat_huruf_math = "cukup";
            $predikat_huruf_matematika = "C";
            $predikat_deskripsi_matematika = " dalam | " . implode(", ", $predikat_pengetahuan_math);
        } elseif ($raport_pengetahuan_matematika > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_matematika <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_math = "baik";
            $predikat_huruf_matematika = "B";
            $predikat_deskripsi_matematika = " dalam | " . implode(", ", $predikat_pengetahuan_math);
        } elseif ($raport_pengetahuan_matematika > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_math = "sangat baik";
            $predikat_huruf_matematika = "A";
            $predikat_deskripsi_matematika = " dalam | " . implode(", ", $predikat_pengetahuan_math);
        }
        // -------------
        // deskripsi ipa
        $predikat_pengetahuan_ipa = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 5)
            ->where('mapel_id', '=', 7)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        $predikat_keterampilan_ipa = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 19)
            ->where('mapel_id', '=', 7)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        //dd(implode($predikat));
        if ($raport_pengetahuan_ipa < $kkm) {
            $predikat_huruf_ipa1 = "kurang";
            $predikat_huruf_ipa = "D";
            $predikat_deskripsi_ipa = " dalam | " . implode(", ", $predikat_pengetahuan_ipa);
        } elseif ($raport_pengetahuan_ipa >= $kkm && $raport_pengetahuan_ipa <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikat_huruf_ipa1 = "cukup";
            $predikat_huruf_ipa = "C";
            $predikat_deskripsi_ipa = " dalam | " . implode(", ", $predikat_pengetahuan_ipa);
        } elseif ($raport_pengetahuan_ipa > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_ipa <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_ipa1 = "baik";
            $predikat_huruf_ipa = "B";
            $predikat_deskripsi_ipa = " dalam | " . implode(", ", $predikat_pengetahuan_ipa);
        } elseif ($raport_pengetahuan_ipa > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_ipa1 = "sangat baik";
            $predikat_huruf_ipa = "A";
            $predikat_deskripsi_ipa = " dalam | " . implode(", ", $predikat_pengetahuan_ipa);
        }
        // -------------
        // deskripsi ips
        $predikat_pengetahuan_ips = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 5)
            ->where('mapel_id', '=', 8)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        $predikat_keterampilan_ips = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 19)
            ->where('mapel_id', '=', 8)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        //dd(implode($predikat));
        if ($raport_pengetahuan_ips < $kkm) {
            $predikat_huruf_ips1 = "kurang";
            $predikat_huruf_ips = "D";
            $predikat_deskripsi_ips = " dalam | " . implode(", ", $predikat_pengetahuan_ips);
        } elseif ($raport_pengetahuan_ips >= $kkm && $raport_pengetahuan_ips <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikat_huruf_ips1 = "cukup";
            $predikat_huruf_ips = "C";
            $predikat_deskripsi_ips = " dalam | " . implode(", ", $predikat_pengetahuan_ips);
        } elseif ($raport_pengetahuan_ips > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_ips <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_ips1 = "baik";
            $predikat_huruf_ips = "B";
            $predikat_deskripsi_ips = " dalam | " . implode(", ", $predikat_pengetahuan_ips);
        } elseif ($raport_pengetahuan_ips > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_ips1 = "sangat baik";
            $predikat_huruf_ips = "A";
            $predikat_deskripsi_ips = " dalam | " . implode(", ", $predikat_pengetahuan_ips);
        }
        // -------------
        // deskripsi pjok
        $predikat_pengetahuan_pjok = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 5)
            ->where('mapel_id', '=', 9)
            ->where('tahunpel_id', '=', $thn_id)
        ->pluck('nilai_notes')->toArray();
        $predikat_keterampilan_pjok = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 19)
            ->where('mapel_id', '=', 9)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        //dd(implode($predikat));
        if ($raport_pengetahuan_pjok < $kkm) {
            $predikat_huruf_pjok1 = "kurang";
            $predikat_huruf_pjok = "D";
            $predikat_deskripsi_pjok = " dalam | " . implode(", ", $predikat_pengetahuan_pjok);
        } elseif (
            $raport_pengetahuan_pjok >= $kkm && $raport_pengetahuan_pjok <= ($kkm + 1 * ((100 - $kkm) / 3))
        ) {
            $predikat_huruf_pjok1 = "cukup";
            $predikat_huruf_pjok = "C";
            $predikat_deskripsi_pjok = " dalam | " . implode(", ", $predikat_pengetahuan_pjok);
        } elseif ($raport_pengetahuan_pjok > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_pjok <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_pjok1 = "baik";
            $predikat_huruf_pjok = "B";
            $predikat_deskripsi_pjok = " dalam | " . implode(", ", $predikat_pengetahuan_pjok);
        } elseif ($raport_pengetahuan_pjok > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_pjok1 = "sangat baik";
            $predikat_huruf_pjok = "A";
            $predikat_deskripsi_pjok = " dalam | " . implode(", ", $predikat_pengetahuan_pjok);
        }
        // -------------
        // deskripsi sbk
        $predikat_pengetahuan_sbk = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 5)
            ->where('mapel_id', '=', 10)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        $predikat_keterampilan_sbk = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 19)
            ->where('mapel_id', '=', 10)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        //dd(implode($predikat));
        if ($raport_pengetahuan_sbk < $kkm) {
            $predikat_huruf_sbk1 = "kurang";
            $predikat_huruf_sbk = "D";
            $predikat_deskripsi_sbk = " dalam | " . implode(", ", $predikat_pengetahuan_sbk);
        } elseif ($raport_pengetahuan_sbk >= $kkm && $raport_pengetahuan_sbk <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikat_huruf_sbk1 = "cukup";
            $predikat_huruf_sbk = "C";
            $predikat_deskripsi_sbk = " dalam | " . implode(", ", $predikat_pengetahuan_sbk);
        } elseif ($raport_pengetahuan_sbk > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_sbk <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_sbk1 = "baik";
            $predikat_huruf_sbk = "B";
            $predikat_deskripsi_sbk = " dalam | " . implode(", ", $predikat_pengetahuan_sbk);
        } elseif ($raport_pengetahuan_sbk > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_sbk1 = "sangat baik";
            $predikat_huruf_sbk = "A";
            $predikat_deskripsi_sbk = " dalam | " . implode(", ", $predikat_pengetahuan_sbk);
        }
        // ---------------------------------------------
        // -------------
        // deskripsi mulok
        $predikat_pengetahuan_mulok = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 5)
            ->where('mapel_id', '=', 11)
            ->where('tahunpel_id', '=', $thn_id)
        ->pluck('nilai_notes')->toArray();
        $predikat_keterampilan_mulok = Nilai::where('siswa_id', '=', $id)
            ->where('penilaian_id', '=', 19)
            ->where('mapel_id', '=', 11)
            ->where('tahunpel_id', '=', $thn_id)
            ->pluck('nilai_notes')->toArray();
        //dd(implode($predikat));
        if ($raport_pengetahuan_mulok < $kkm) {
            $predikat_huruf_mulok1 = "kurang";
            $predikat_huruf_mulok = "D";
            $predikat_deskripsi_mulok = " dalam | " . implode(", ", $predikat_pengetahuan_mulok);
        } elseif ($raport_pengetahuan_mulok >= $kkm && $raport_pengetahuan_mulok <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikat_huruf_mulok1 = "cukup";
            $predikat_huruf_mulok = "C";
            $predikat_deskripsi_mulok = " dalam | " . implode(", ", $predikat_pengetahuan_mulok);
        } elseif ($raport_pengetahuan_mulok > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_pengetahuan_mulok <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_mulok1 = "baik";
            $predikat_huruf_mulok = "B";
            $predikat_deskripsi_mulok = " dalam | " . implode(", ", $predikat_pengetahuan_mulok);
        } elseif ($raport_pengetahuan_mulok > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikat_huruf_mulok1 = "sangat baik";
            $predikat_huruf_mulok = "A";
            $predikat_deskripsi_mulok = " dalam | " . implode(", ", $predikat_pengetahuan_mulok);
        }
        // ---------------------------------------------
        if ($rombel == 1) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_pjok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 6, 1, '.', '');
        }
        if (
            $rombel == 2
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_pjok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 6, 1, '.', '');
        }
        if (
            $rombel == 3
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_pjok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 6, 1, '.', '');
        }
        if (
            $rombel == 4
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_pjok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 6, 1, '.', '');
        }
        if (
            $rombel == 5
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 8, 1, '.', '');
        }
        if (
            $rombel == 6
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 8, 1, '.', '');
        }
        if (
            $rombel == 7
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 8, 1, '.', '');
        }
        if (
            $rombel == 8
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 8, 1, '.', '');
        }
        if (
            $rombel == 9
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 8, 1, '.', '');
        }
        if (
            $rombel == 10
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 8, 1, '.', '');
        }
        if (
            $rombel == 11
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 8, 1, '.', '');
        }
        if (
            $rombel == 12
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 13
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 14
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 15
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 16
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 17
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 18
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 19
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 20
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 21
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 22
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 23
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        if (
            $rombel == 24
        ) {
            $jumlah_raport_pengetahuan = $raport_pengetahuan_agama
                + $raport_pengetahuan_ppkn
                + $raport_pengetahuan_indonesia
                + $raport_pengetahuan_matematika
                + $raport_pengetahuan_ipa
                + $raport_pengetahuan_ips
                + $raport_pengetahuan_pjok
                + $raport_pengetahuan_sbk
                + $raport_pengetahuan_mulok;
            $jumlah_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan, 1, '.', '');
            $ratarata_raport_pengetahuan = number_format((float)$jumlah_raport_pengetahuan / 9, 1, '.', '');
        }
        //$jumlah_raport = number_format((float)$jumlah_raport_pengetahuan+$jumlah_raport_pengetahuan, 1, '.', '');
        //$ratarata_raport = number_format((float)($ratarata_raport_pengetahuan+$ratarata_raport_pengetahuan)/2, 1, '.', '');

        //menghitung nilai keterampilan
        for (
            $penilaian = 18;
            $penilaian < 22;
            $penilaian++
        ) {
            $tampung_keterampilan_islam = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 1)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_islam[] = (int)$tampung_keterampilan_islam;
            $tampung_keterampilan_protestan = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 2)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_protestan[] = (int)$tampung_keterampilan_protestan;
            $tampung_keterampilan_katolik = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 3)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_katolik[] = (int)$tampung_keterampilan_katolik;
            $tampung_keterampilan_ppkn = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 4)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_ppkn[] = (int)$tampung_keterampilan_ppkn;
            $tampung_keterampilan_indonesia = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 5)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_indonesia[] = (int)$tampung_keterampilan_indonesia;
            $tampung_keterampilan_matematika = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 6)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_matematika[] = (int)$tampung_keterampilan_matematika;
            $tampung_keterampilan_ipa = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 7)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_ipa[] = (int)$tampung_keterampilan_ipa;
            $tampung_keterampilan_ips = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 8)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_ips[] = (int)$tampung_keterampilan_ips;
            $tampung_keterampilan_pjok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 9)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_pjok[] = (int)$tampung_keterampilan_pjok;
            $tampung_keterampilan_sbk = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 10)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_sbk[] = (int)$tampung_keterampilan_sbk;
            $tampung_keterampilan_mulok = Nilai::where('siswa_id', '=', $id)
                ->where('penilaian_id', '=', $penilaian)
                ->where('mapel_id', '=', 11)
                ->where('tahunpel_id', '=', $thn_id)
                ->pluck('nilai')->avg();
            $nilai_keterampilan_mulok[] = (int)$tampung_keterampilan_mulok;
        }
        //dd($nilai_keterampilan_indonesia);
        if ($students->agama == "Islam" || $students->agama == "islam") {
            if (array_sum($nilai_keterampilan_islam) > 0) {
                for ($key = 0; $key < count($nilai_keterampilan_islam); $key++) {
                    if ($nilai_keterampilan_islam[$key] > 0) {
                        $nilai_keterampilan_islam_yes[] = $nilai_keterampilan_islam[$key];
                    }
                }
                $jml_pel_keterampilan_islam    = count($nilai_keterampilan_islam_yes);
                $sum_pel_keterampilan_islam    = array_sum($nilai_keterampilan_islam_yes);
                $rata_rata_keterampilan_islam  = number_format((float)$sum_pel_keterampilan_islam / $jml_pel_keterampilan_islam, 2, '.', '');
            } elseif (array_sum($nilai_keterampilan_islam) == 0) {
                $rata_rata_keterampilan_islam = 0.00;
            }
        }

        if (
            $students->agama == "Kristen Protestan" || $students->agama == "kristen protestan"
        ) {
            if (array_sum($nilai_keterampilan_protestan) > 0) {
                for ($key = 0; $key < count($nilai_keterampilan_protestan); $key++) {
                    if ($nilai_keterampilan_protestan[$key] > 0) {
                        $nilai_keterampilan_protestan_yes[] = $nilai_keterampilan_protestan[$key];
                    }
                }
                $jml_pel_keterampilan_protestan    = count($nilai_keterampilan_protestan_yes);
                $sum_pel_keterampilan_protestan    = array_sum($nilai_keterampilan_protestan_yes);
                $rata_rata_keterampilan_protestan  = number_format((float)$sum_pel_keterampilan_protestan / $jml_pel_keterampilan_protestan, 2, '.', '');
            } elseif (array_sum($nilai_keterampilan_protestan) == 0) {
                $rata_rata_keterampilan_protestan = 0.00;
            }
        }

        if (
            $students->agama == "Katolik" || $students->agama == "katolik"
        ) {
            if (array_sum($nilai_keterampilan_katolik) > 0) {
                for ($key = 0; $key < count($nilai_keterampilan_katolik); $key++) {
                    if ($nilai_keterampilan_katolik[$key] > 0) {
                        $nilai_keterampilan_katolik_yes[] = $nilai_keterampilan_katolik[$key];
                    }
                }
                $jml_pel_keterampilan_katolik    = count($nilai_keterampilan_katolik_yes);
                $sum_pel_keterampilan_katolik    = array_sum($nilai_keterampilan_katolik_yes);
                $rata_rata_keterampilan_katolik  = number_format((float)$sum_pel_keterampilan_katolik / $jml_pel_keterampilan_katolik, 2, '.', '');
            } elseif (array_sum($nilai_keterampilan_katolik) == 0) {
                $rata_rata_keterampilan_katolik = 0.00;
            }
        }

        if (array_sum($nilai_keterampilan_ppkn) > 0) {
            for ($key = 0; $key < count($nilai_keterampilan_ppkn); $key++) {
                if ($nilai_keterampilan_ppkn[$key] > 0) {
                    $nilai_keterampilan_ppkn_yes[] = $nilai_keterampilan_ppkn[$key];
                }
            }
            $jml_pel_keterampilan_ppkn    = count($nilai_keterampilan_ppkn_yes);
            $sum_pel_keterampilan_ppkn    = array_sum($nilai_keterampilan_ppkn_yes);
            $rata_rata_keterampilan_ppkn  = number_format((float)$sum_pel_keterampilan_ppkn / $jml_pel_keterampilan_ppkn, 2, '.', '');
        } elseif (array_sum($nilai_keterampilan_ppkn) == 0) {
            $rata_rata_keterampilan_ppkn = 0.00;
        }
        //dd($rata_rata_keterampilan_ppkn);
        //dd("jumlah elemen array: " . array_sum($nilai_keterampilan_indonesia));
        if (array_sum($nilai_keterampilan_indonesia) > 0) {
            for ($key = 0; $key < count($nilai_keterampilan_indonesia); $key++) {
                if ($nilai_keterampilan_indonesia[$key] > 0) {
                    $nilai_keterampilan_indonesia_yes[] = $nilai_keterampilan_indonesia[$key];
                }
            }
            $jml_pel_keterampilan_indonesia    = count($nilai_keterampilan_indonesia_yes);
            $sum_pel_keterampilan_indonesia    = array_sum($nilai_keterampilan_indonesia_yes);
            $rata_rata_keterampilan_indonesia  = number_format((float)$sum_pel_keterampilan_indonesia / $jml_pel_keterampilan_indonesia, 2, '.', '');
        } elseif (array_sum($nilai_keterampilan_indonesia) == 0) {
            $rata_rata_keterampilan_indonesia = 0.00;
        }
        //dd($rata_rata_keterampilan_indonesia);
        if (array_sum($nilai_keterampilan_matematika) > 0) {
            for ($key = 0; $key < count($nilai_keterampilan_matematika); $key++) {
                if ($nilai_keterampilan_matematika[$key] > 0) {
                    $nilai_keterampilan_matematika_yes[] = $nilai_keterampilan_matematika[$key];
                }
            }
            $jml_pel_keterampilan_matematika    = count($nilai_keterampilan_matematika_yes);
            $sum_pel_keterampilan_matematika    = array_sum($nilai_keterampilan_matematika_yes);
            $rata_rata_keterampilan_matematika  = number_format((float)$sum_pel_keterampilan_matematika / $jml_pel_keterampilan_matematika, 2, '.', '');
        } elseif (array_sum($nilai_keterampilan_matematika) == 0) {
            $rata_rata_keterampilan_matematika = 0.00;
        }

        if (array_sum($nilai_keterampilan_ipa) > 0) {
            for ($key = 0; $key < count($nilai_keterampilan_ipa); $key++) {
                if ($nilai_keterampilan_ipa[$key] > 0) {
                    $nilai_keterampilan_ipa_yes[] = $nilai_keterampilan_ipa[$key];
                }
            }
            $jml_pel_keterampilan_ipa    = count($nilai_keterampilan_ipa_yes);
            $sum_pel_keterampilan_ipa    = array_sum($nilai_keterampilan_ipa_yes);
            $rata_rata_keterampilan_ipa  = number_format((float)$sum_pel_keterampilan_ipa / $jml_pel_keterampilan_ipa, 2, '.', '');
        } elseif (array_sum($nilai_keterampilan_ipa) == 0) {
            $rata_rata_keterampilan_ipa = 0.00;
        }

        if (array_sum($nilai_keterampilan_ips) > 0) {
            for ($key = 0; $key < count($nilai_keterampilan_ips); $key++) {
                if ($nilai_keterampilan_ips[$key] > 0) {
                    $nilai_keterampilan_ips_yes[] = $nilai_keterampilan_ips[$key];
                }
            }
            $jml_pel_keterampilan_ips    = count($nilai_keterampilan_ips_yes);
            $sum_pel_keterampilan_ips    = array_sum($nilai_keterampilan_ips_yes);
            $rata_rata_keterampilan_ips  = number_format((float)$sum_pel_keterampilan_ips / $jml_pel_keterampilan_ips, 2, '.', '');
        } elseif (array_sum($nilai_keterampilan_ips) == 0) {
            $rata_rata_keterampilan_ips = 0.00;
        }

        if (array_sum($nilai_keterampilan_pjok) > 0) {
            for ($key = 0; $key < count($nilai_keterampilan_pjok); $key++) {
                if ($nilai_keterampilan_pjok[$key] > 0) {
                    $nilai_keterampilan_pjok_yes[] = $nilai_keterampilan_pjok[$key];
                }
            }
            $jml_pel_keterampilan_pjok    = count($nilai_keterampilan_pjok_yes);
            $sum_pel_keterampilan_pjok    = array_sum($nilai_keterampilan_pjok_yes);
            $rata_rata_keterampilan_pjok  = number_format((float)$sum_pel_keterampilan_pjok / $jml_pel_keterampilan_pjok, 2, '.', '');
        } elseif (array_sum($nilai_keterampilan_pjok) == 0) {
            $rata_rata_keterampilan_pjok = 0.00;
        }

        if (array_sum($nilai_keterampilan_sbk) > 0) {
            for ($key = 0; $key < count($nilai_keterampilan_sbk); $key++) {
                if ($nilai_keterampilan_sbk[$key] > 0) {
                    $nilai_keterampilan_sbk_yes[] = $nilai_keterampilan_sbk[$key];
                }
            }
            $jml_pel_keterampilan_sbk    = count($nilai_keterampilan_sbk_yes);
            $sum_pel_keterampilan_sbk    = array_sum($nilai_keterampilan_sbk_yes);
            $rata_rata_keterampilan_sbk  = number_format((float)$sum_pel_keterampilan_sbk / $jml_pel_keterampilan_sbk, 2, '.', '');
        } elseif (array_sum($nilai_keterampilan_sbk) == 0) {
            $rata_rata_keterampilan_sbk = 0.00;
        }

        if (array_sum($nilai_keterampilan_mulok) > 0) {
            for ($key = 0; $key < count($nilai_keterampilan_mulok); $key++) {
                if ($nilai_keterampilan_mulok[$key] > 0) {
                    $nilai_keterampilan_mulok_yes[] = $nilai_keterampilan_mulok[$key];
                }
            }
            $jml_pel_keterampilan_mulok    = count($nilai_keterampilan_mulok_yes);
            $sum_pel_keterampilan_mulok    = array_sum($nilai_keterampilan_mulok_yes);
            $rata_rata_keterampilan_mulok  = number_format((float)$sum_pel_keterampilan_mulok / $jml_pel_keterampilan_mulok, 2, '.', '');
        } elseif (array_sum($nilai_keterampilan_mulok) == 0) {
            $rata_rata_keterampilan_mulok = 0.00;
        }

        // --------------------------------------------------------------------
        // hitung nilai raport keterampilan
        if ($students->agama == "Islam" || $students->agama == "islam") {
            $raport_keterampilan_islam = ((($rata_rata_keterampilan_islam
                + $rata_rata_keterampilan_islam + $rata_rata_keterampilan_islam) * 2)
                + ($rata_rata_keterampilan_islam * 1)
                + ($rata_rata_keterampilan_islam * 1)) / 8;
            $raport_keterampilan_agama = number_format((float)$raport_keterampilan_islam, 1, '.', '');
        }
        if ($students->agama == "Kristen Protestan" || $students->agama == "kristen protestan") {
            $raport_keterampilan_protestan = ((($rata_rata_keterampilan_protestan
                + $rata_rata_keterampilan_protestan + $rata_rata_keterampilan_protestan) * 2)
                + ($rata_rata_keterampilan_protestan * 1)
                + ($rata_rata_keterampilan_protestan * 1)) / 8;
            $raport_keterampilan_agama = number_format((float)$raport_keterampilan_protestan, 1, '.', '');
        }
        if ($students->agama == "Katolik" || $students->agama == "katolik") {
            $raport_keterampilan_katolik = ((($rata_rata_keterampilan_katolik
                + $rata_rata_keterampilan_katolik + $rata_rata_keterampilan_katolik) * 2)
                + ($rata_rata_keterampilan_katolik * 1)
                + ($rata_rata_keterampilan_katolik * 1)) / 8;
            $raport_keterampilan_agama = number_format((float)$raport_keterampilan_katolik, 1, '.', '');
        }
        $raport_keterampilan_ppkn = ((($rata_rata_keterampilan_ppkn
            + $rata_rata_keterampilan_ppkn + $rata_rata_keterampilan_ppkn) * 2)
            + ($rata_rata_keterampilan_ppkn * 1)
            + ($rata_rata_keterampilan_ppkn * 1)) / 8;
        $raport_keterampilan_ppkn = number_format((float)$raport_keterampilan_ppkn, 1, '.', '');
        $raport_keterampilan_indonesia = ((($rata_rata_keterampilan_indonesia
            + $rata_rata_keterampilan_indonesia + $rata_rata_keterampilan_indonesia) * 2)
            + ($rata_rata_keterampilan_indonesia * 1)
            + ($rata_rata_keterampilan_indonesia * 1)) / 8;
        $raport_keterampilan_indonesia = number_format((float)$raport_keterampilan_indonesia, 1, '.', '');
        $raport_keterampilan_matematika = ((($rata_rata_keterampilan_matematika
            + $rata_rata_keterampilan_matematika + $rata_rata_keterampilan_matematika) * 2)
            + ($rata_rata_keterampilan_matematika * 1)
            + ($rata_rata_keterampilan_matematika * 1)) / 8;
        $raport_keterampilan_matematika = number_format((float)$raport_keterampilan_matematika, 1, '.', '');
        $raport_keterampilan_ipa = ((($rata_rata_keterampilan_ipa
            + $rata_rata_keterampilan_ipa + $rata_rata_keterampilan_ipa) * 2)
            + ($rata_rata_keterampilan_ipa * 1)
            + ($rata_rata_keterampilan_ipa * 1)) / 8;
        $raport_keterampilan_ipa = number_format((float)$raport_keterampilan_ipa, 1, '.', '');
        $raport_keterampilan_ips = ((($rata_rata_keterampilan_ips
            + $rata_rata_keterampilan_ips + $rata_rata_keterampilan_ips) * 2)
            + ($rata_rata_keterampilan_ips * 1)
            + ($rata_rata_keterampilan_ips * 1)) / 8;
        $raport_keterampilan_ips = number_format((float)$raport_keterampilan_ips, 1, '.', '');
        $raport_keterampilan_pjok = ((($rata_rata_keterampilan_pjok
            + $rata_rata_keterampilan_pjok + $rata_rata_keterampilan_pjok) * 2)
            + ($rata_rata_keterampilan_pjok * 1)
            + ($rata_rata_keterampilan_pjok * 1)) / 8;
        $raport_keterampilan_pjok = number_format((float)$raport_keterampilan_pjok, 1, '.', '');
        $raport_keterampilan_sbk = ((($rata_rata_keterampilan_sbk
            + $rata_rata_keterampilan_sbk + $rata_rata_keterampilan_sbk) * 2)
            + ($rata_rata_keterampilan_sbk * 1)
            + ($rata_rata_keterampilan_sbk * 1)) / 8;
        $raport_keterampilan_sbk = number_format((float)$raport_keterampilan_sbk, 1, '.', '');
        $raport_keterampilan_mulok = ((($rata_rata_keterampilan_mulok
            + $rata_rata_keterampilan_mulok + $rata_rata_keterampilan_mulok) * 2)
            + ($rata_rata_keterampilan_mulok * 1)
            + ($rata_rata_keterampilan_mulok * 1)) / 8;
        $raport_keterampilan_mulok = number_format((float)$raport_keterampilan_mulok, 1, '.', '');
        //dd($raport_keterampilan_indonesia);
        //------------------------------------------------------
        // deskripsi keterampilan agama
        if ($raport_keterampilan_agama < $kkm) {
            $predikathuruf = "kurang";
            $predikat_keterampilan_huruf_agama = "D";
            $predikat_keterampilan_deskripsi_agama = " dalam | " . implode(", ", $predikat_keterampilan);
        } elseif ($raport_keterampilan_agama >= $kkm && $raport_keterampilan_agama <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf = "cukup";
            $predikat_keterampilan_huruf_agama = "C";
            $predikat_keterampilan_deskripsi_agama = " dalam | " . implode($predikat_keterampilan);
        } elseif ($raport_keterampilan_agama > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_agama <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf = "baik";
            $predikat_keterampilan_huruf_agama = "B";
            $predikat_keterampilan_deskripsi_agama = " dalam | " . implode($predikat_keterampilan);
        } elseif ($raport_keterampilan_agama > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf = "sangat baik";
            $predikat_keterampilan_huruf_agama = "A";
            $predikat_keterampilan_deskripsi_agama = " dalam | " . implode($predikat_keterampilan);
        }
        // -------------
        // deskripsi ppkn
        if ($raport_keterampilan_ppkn < $kkm) {
            $predikathuruf_ppkn = "kurang";
            $predikat_keterampilan_huruf_ppkn = "D";
            $predikat_keterampilan_deskripsi_ppkn = " dalam | " . implode(", ", $predikat_keterampilan_ppkn);
        } elseif ($raport_keterampilan_ppkn >= $kkm && $raport_keterampilan_ppkn <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf_ppkn = "cukup";
            $predikat_keterampilan_huruf_ppkn = "C";
            $predikat_keterampilan_deskripsi_ppkn = " dalam | " . implode(", ", $predikat_keterampilan_ppkn);
        } elseif ($raport_keterampilan_ppkn > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_ppkn <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_ppkn = "baik";
            $predikat_keterampilan_huruf_ppkn = "B";
            $predikat_keterampilan_deskripsi_ppkn = " dalam | " . implode(", ", $predikat_keterampilan_ppkn);
        } elseif ($raport_keterampilan_ppkn > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_ppkn = "sangat baik";
            $predikat_keterampilan_huruf_ppkn = "A";
            $predikat_keterampilan_deskripsi_ppkn = " dalam | " . implode(", ", $predikat_keterampilan_ppkn);
        }
        // -------------
        // deskripsi indonesia
        if ($raport_keterampilan_indonesia < $kkm) {
            $predikathuruf_bi = "kurang";
            $predikat_keterampilan_huruf_indonesia = "D";
            $predikat_keterampilan_deskripsi_indonesia = " dalam | " . implode(", ", $predikat_keterampilan_bi);
        } elseif ($raport_keterampilan_indonesia >= $kkm && $raport_keterampilan_indonesia <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf_bi = "cukup";
            $predikat_keterampilan_huruf_indonesia = "C";
            $predikat_keterampilan_deskripsi_indonesia = " dalam | " . implode(", ", $predikat_keterampilan_bi);
        } elseif ($raport_keterampilan_indonesia > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_indonesia <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_bi = "baik";
            $predikat_keterampilan_huruf_indonesia = "B";
            $predikat_keterampilan_deskripsi_indonesia = " dalam | " . implode(", ", $predikat_keterampilan_bi);
        } elseif ($raport_keterampilan_indonesia > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_bi = "sangat baik";
            $predikat_keterampilan_huruf_indonesia = "A";
            $predikat_keterampilan_deskripsi_indonesia = " dalam | " . implode(", ", $predikat_keterampilan_bi);
        }
        // -------------
        //dd($kkm);
        //dd($raport_keterampilan_indonesia);
        //dd($raport_keterampilan_indonesia >= $kkm);
        //dd($raport_keterampilan_indonesia > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_indonesia <= ($kkm + 2 * ((100 - $kkm) / 3)));
        //dd($predikathuruf_bi);
        // deskripsi matematika
        if ($raport_keterampilan_matematika < $kkm) {
            $predikathuruf_math = "kurang";
            $predikat_keterampilan_huruf_matematika = "D";
            $predikat_keterampilan_deskripsi_matematika = " dalam | " . implode(", ", $predikat_keterampilan_math);
        } elseif ($raport_keterampilan_matematika >= $kkm && $raport_keterampilan_matematika <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf_math = "cukup";
            $predikat_keterampilan_huruf_matematika = "C";
            $predikat_keterampilan_deskripsi_matematika = " dalam | " . implode(", ", $predikat_keterampilan_math);
        } elseif ($raport_keterampilan_matematika > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_matematika <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_math = "baik";
            $predikat_keterampilan_huruf_matematika = "B";
            $predikat_keterampilan_deskripsi_matematika = " dalam | " . implode(", ", $predikat_keterampilan_math);
        } elseif ($raport_keterampilan_matematika > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_math = "sangat baik";
            $predikat_keterampilan_huruf_matematika = "A";
            $predikat_keterampilan_deskripsi_matematika = " dalam | " . implode(", ", $predikat_keterampilan_math);
        }
        // -------------
        // deskripsi ipa
        if ($raport_keterampilan_ipa < $kkm) {
            $predikathuruf_ipa = "kurang";
            $predikat_keterampilan_huruf_ipa = "D";
            $predikat_keterampilan_deskripsi_ipa = " dalam | " . implode(", ", $predikat_keterampilan_ipa);
        } elseif ($raport_keterampilan_ipa >= $kkm && $raport_keterampilan_ipa <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf_ipa = "cukup";
            $predikat_keterampilan_huruf_ipa = "C";
            $predikat_keterampilan_deskripsi_ipa = " dalam | " . implode(", ", $predikat_keterampilan_ipa);
        } elseif ($raport_keterampilan_ipa > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_ipa <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_ipa = "baik";
            $predikat_keterampilan_huruf_ipa = "B";
            $predikat_keterampilan_deskripsi_ipa = " dalam | " . implode($predikat_keterampilan_ipa);
        } elseif ($raport_keterampilan_ipa > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_ipa = "sangat baik";
            $predikat_keterampilan_huruf_ipa = "A";
            $predikat_keterampilan_deskripsi_ipa = " dalam | " . implode($predikat_keterampilan_ipa);
        }
        // -------------
        // deskripsi ips
        if ($raport_keterampilan_ips < $kkm) {
            $predikathuruf_ips = "kurang";
            $predikat_keterampilan_huruf_ips = "D";
            $predikat_keterampilan_deskripsi_ips = " dalam | " . implode(", ", $predikat_keterampilan_ips);
        } elseif ($raport_keterampilan_ips >= $kkm && $raport_keterampilan_ips <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf_ips = "cukup";
            $predikat_keterampilan_huruf_ips = "C";
            $predikat_keterampilan_deskripsi_ips = " dalam | " . implode($predikat_keterampilan_ips);
        } elseif ($raport_keterampilan_ips > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_ips <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_ips = "baik";
            $predikat_keterampilan_huruf_ips = "B";
            $predikat_keterampilan_deskripsi_ips = " dalam | " . implode($predikat_keterampilan_ips);
        } elseif ($raport_keterampilan_ips > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_ips = "sangat baik";
            $predikat_keterampilan_huruf_ips = "A";
            $predikat_keterampilan_deskripsi_ips = " dalam | " . implode($predikat_keterampilan_ips);
        }
        // -------------
        // deskripsi pjok
        if ($raport_keterampilan_pjok < $kkm) {
            $predikathuruf_pjok = "kurang";
            $predikat_keterampilan_huruf_pjok = "D";
            $predikat_keterampilan_deskripsi_pjok = " dalam | " . implode(", ", $predikat_keterampilan_pjok);
        } elseif ($raport_keterampilan_pjok >= $kkm && $raport_keterampilan_pjok <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf_pjok = "cukup";
            $predikat_keterampilan_huruf_pjok = "C";
            $predikat_keterampilan_deskripsi_pjok = " dalam | " . implode($predikat_keterampilan_pjok);
        } elseif ($raport_keterampilan_pjok > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_pjok <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_pjok = "baik";
            $predikat_keterampilan_huruf_pjok = "B";
            $predikat_keterampilan_deskripsi_pjok = " dalam | " . implode($predikat_keterampilan_pjok);
        } elseif ($raport_keterampilan_pjok > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_pjok = "sangat baik";
            $predikat_keterampilan_huruf_pjok = "A";
            $predikat_keterampilan_deskripsi_pjok = " dalam | " . implode($predikat_keterampilan_pjok);
        }
        // -------------
        // deskripsi sbk
        if ($raport_keterampilan_sbk < $kkm) {
            $predikathuruf_sbk = "kurang";
            $predikat_keterampilan_huruf_sbk = "D";
            $predikat_keterampilan_deskripsi_sbk = " dalam | " . implode(", ", $predikat_keterampilan_sbk);
        } elseif ($raport_keterampilan_sbk >= $kkm && $raport_keterampilan_sbk <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf_sbk = "cukup";
            $predikat_keterampilan_huruf_sbk = "C";
            $predikat_keterampilan_deskripsi_sbk = " dalam | " . implode($predikat_keterampilan_sbk);
        } elseif ($raport_keterampilan_sbk > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_sbk <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_sbk = "baik";
            $predikat_keterampilan_huruf_sbk = "B";
            $predikat_keterampilan_deskripsi_sbk = " dalam | " . implode($predikat_keterampilan_sbk);
        } elseif ($raport_keterampilan_sbk > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_sbk = "sangat baik";
            $predikat_keterampilan_huruf_sbk = "A";
            $predikat_keterampilan_deskripsi_sbk = " dalam | " . implode(", ", $predikat_keterampilan_sbk);
        }
        // -------------
        // deskripsi mulok
        if ($raport_keterampilan_mulok < $kkm) {
            $predikathuruf_mulok = "kurang";
            $predikat_keterampilan_huruf_mulok = "D";
            $predikat_keterampilan_deskripsi_mulok = " dalam | " . implode(", ", $predikat_keterampilan_mulok);
        } elseif ($raport_keterampilan_mulok >= $kkm && $raport_keterampilan_mulok <= ($kkm + 1 * ((100 - $kkm) / 3))) {
            $predikathuruf_mulok = "cukup";
            $predikat_keterampilan_huruf_mulok = "C";
            $predikat_keterampilan_deskripsi_mulok = " dalam | " . implode($predikat_keterampilan_mulok);
        } elseif ($raport_keterampilan_mulok > ($kkm + 1 * ((100 - $kkm) / 3)) && $raport_keterampilan_mulok <= ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_mulok = "baik";
            $predikat_keterampilan_huruf_mulok = "B";
            $predikat_keterampilan_deskripsi_mulok = " dalam | " . implode($predikat_keterampilan_mulok);
        } elseif ($raport_keterampilan_mulok > ($kkm + 2 * ((100 - $kkm) / 3))) {
            $predikathuruf_mulok = "sangat baik";
            $predikat_keterampilan_huruf_mulok = "A";
            $predikat_keterampilan_deskripsi_mulok = " dalam | " . implode(", ", $predikat_keterampilan_mulok);
        }
        // beda bentuk raport untuk kelas 1, 2 dan 3, 4, 5, dan 6
        if ($rombel == 1) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 6, 1, '.', '');
        }
        if (
            $rombel == 2
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 6, 1, '.', '');
        }
        if (
            $rombel == 3
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 6, 1, '.', '');
        }
        if (
            $rombel == 4
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 6, 1, '.', '');
        }
        if (
            $rombel == 5
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 8, 1, '.', '');
        }
        if (
            $rombel == 6
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 8, 1, '.', '');
        }
        if (
            $rombel == 7
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 8, 1, '.', '');
        }
        if (
            $rombel == 8
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 8, 1, '.', '');
        }
        if (
            $rombel == 9
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 8, 1, '.', '');
        }
        if (
            $rombel == 10
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 8, 1, '.', '');
        }
        if (
            $rombel == 11
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 8, 1, '.', '');
        }
        if (
            $rombel == 12
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
                + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 13
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 14
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 15
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 16
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 17
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 18
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 19
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 20
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 21
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 22
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 23
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }
        if (
            $rombel == 24
        ) {
            $jumlah_raport_keterampilan = $raport_keterampilan_agama
            + $raport_keterampilan_ppkn
                + $raport_keterampilan_indonesia
                + $raport_keterampilan_matematika
                + $raport_keterampilan_ipa
                + $raport_keterampilan_ips
                + $raport_keterampilan_pjok
                + $raport_keterampilan_sbk
                + $raport_keterampilan_mulok;
            $jumlah_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan, 1, '.', '');
            $ratarata_raport_keterampilan = number_format((float)$jumlah_raport_keterampilan / 9, 1, '.', '');
        }

        // -------------------------------------------------------
        // Hitung nilai raport pengetahuan dan keterampilan
        $jumlah_raport = number_format((float)$jumlah_raport_pengetahuan + $jumlah_raport_keterampilan, 1, '.', '');
        $ratarata_raport = number_format((float)($ratarata_raport_pengetahuan + $ratarata_raport_keterampilan) / 2, 1, '.', '');
        //----------------------------------------------------
        //input absensi
        //dd(Extra::all()->where('siswa_id', '=', $id)->pluck('sakit'));
        //dd(Extra::all()->where('siswa_id', '=', $id)->pluck('sakit')->isEmpty());
        if (Extra::where('siswa_id', '=', $id)->where('rombel_id', '=', $rombel)->pluck('sakit')->isEmpty()) {
            $sakit1 = 0;
        } else {

            $sakit = Extra::where('siswa_id', '=', $id)->where('rombel_id', '=', $rombel)->pluck('sakit');
            $sakit1 = $sakit[0];
        }

        if (Extra::where(
            'siswa_id',
            '=',
            $id
        )->where('rombel_id', '=', $rombel)->pluck('alpa')->isEmpty()) {
            $alpa1 = 0;
        } else {

            $alpa = Extra::where('siswa_id', '=', $id)->where('rombel_id', '=', $rombel)->pluck('alpa');
            $alpa1 = $alpa[0];
        }

        if (Extra::where(
            'siswa_id',
            '=',
            $id
        )->where('rombel_id', '=', $rombel)->pluck('ijin')->isEmpty()) {
            $ijin1 = 0;
        } else {

            $ijin = Extra::where('siswa_id', '=', $id)->where('rombel_id', '=', $rombel)->pluck('ijin');
            $ijin1 = $ijin[0];
        }

        $pdf = PDF::loadView(
            'export.raport1',
            [
                'kelas_siswa' => $kelas_siswa,
                'kelas_naik' => $kelas_naik,
                'deskripsi_sikap_spiritual' => $deskripsi_sikap_spiritual,
                'deskripsi_sikap_sosial' => $deskripsi_sikap_sosial,
                'catatan_wali_kelas' => $catatan_wali_kelas,
                'rombel_kelas_raport' => $rombel_kelas_raport,
                'nama_rombel' => $nama_rombel,
                'rombel1' => $rombel1,
                'wali_kelas' => $wali_kelas,
                'nip_guru' => $nip_guru,
                'semester_aktif' => $semester_aktif,
                'kepsek_aktif' => $kepsek_aktif,
                'nip_kepsek' => $nip_kepsek,
                'tanggal_raport' => $tanggal_raport,
                'tanggal_raport_kls6' => $tanggal_raport_kls6,
                'tahun_pelajaran' => $tahun_pelajaran,
                'tahun_aktif' => $tahun_aktif,
                'kecamatan' => $kecamatan,
                'kepala' => $kepala,
                'nip' => $nip,
                'semester' => $semester,
                'predikathuruf' => $predikathuruf,
                'predikathuruf_bi' => $predikathuruf_bi,
                'predikathuruf_math' => $predikathuruf_math,
                'predikathuruf_pjok' => $predikathuruf_pjok,
                'predikathuruf_sbk' => $predikathuruf_sbk,
                'predikathuruf_mulok' => $predikathuruf_mulok,
                'predikathuruf_ipa' => $predikathuruf_ipa,
                'predikathuruf_ips' => $predikathuruf_ips,
                'predikathuruf_ppkn' => $predikathuruf_ppkn,
                'predikat_huruf_agama1' => $predikat_huruf_agama1,
                'predikat_huruf_ppkn1' => $predikat_huruf_ppkn1,
                'predikat_huruf_bi' => $predikat_huruf_bi,
                'predikat_huruf_math' => $predikat_huruf_math,
                'predikat_huruf_ipa1' => $predikat_huruf_ipa1,
                'predikat_huruf_ips1' => $predikat_huruf_ips1,
                'predikat_huruf_pjok1' => $predikat_huruf_pjok1,
                'predikat_huruf_sbk1' => $predikat_huruf_sbk1,
                'predikat_huruf_mulok1' => $predikat_huruf_mulok1,
                'predikat_huruf_agama' => $predikat_huruf_agama,
                'predikat_huruf_ppkn' => $predikat_huruf_ppkn,
                'predikat_huruf_indonesia' => $predikat_huruf_indonesia,
                'predikat_huruf_matematika' => $predikat_huruf_matematika,
                'predikat_huruf_ipa' => $predikat_huruf_ipa,
                'predikat_huruf_ips' => $predikat_huruf_ips,
                'predikat_huruf_pjok' => $predikat_huruf_pjok,
                'predikat_huruf_sbk' => $predikat_huruf_sbk,
                'predikat_huruf_mulok' => $predikat_huruf_mulok,
                'predikat_deskripsi_agama' => $predikat_deskripsi_agama,
                'predikat_deskripsi_ppkn' => $predikat_deskripsi_ppkn,
                'predikat_deskripsi_indonesia' => $predikat_deskripsi_indonesia,
                'predikat_deskripsi_matematika' => $predikat_deskripsi_matematika,
                'predikat_deskripsi_ipa' => $predikat_deskripsi_ipa,
                'predikat_deskripsi_ips' => $predikat_deskripsi_ips,
                'predikat_deskripsi_pjok' => $predikat_deskripsi_pjok,
                'predikat_deskripsi_sbk' => $predikat_deskripsi_sbk,
                'predikat_deskripsi_mulok' => $predikat_deskripsi_mulok,
                'predikat_keterampilan_huruf_agama' => $predikat_keterampilan_huruf_agama,
                'predikat_keterampilan_huruf_ppkn' => $predikat_keterampilan_huruf_ppkn,
                'predikat_keterampilan_huruf_indonesia' => $predikat_keterampilan_huruf_indonesia,
                'predikat_keterampilan_huruf_matematika' => $predikat_keterampilan_huruf_matematika,
                'predikat_keterampilan_huruf_ipa' => $predikat_keterampilan_huruf_ipa,
                'predikat_keterampilan_huruf_ips' => $predikat_keterampilan_huruf_ips,
                'predikat_keterampilan_huruf_pjok' => $predikat_keterampilan_huruf_pjok,
                'predikat_keterampilan_huruf_sbk' => $predikat_keterampilan_huruf_sbk,
                'predikat_keterampilan_huruf_mulok' => $predikat_keterampilan_huruf_mulok,
                'predikat_keterampilan_deskripsi_agama' => $predikat_keterampilan_deskripsi_agama,
                'predikat_keterampilan_deskripsi_ppkn' => $predikat_keterampilan_deskripsi_ppkn,
                'predikat_keterampilan_deskripsi_indonesia' => $predikat_keterampilan_deskripsi_indonesia,
                'predikat_keterampilan_deskripsi_matematika' => $predikat_keterampilan_deskripsi_matematika,
                'predikat_keterampilan_deskripsi_ipa' => $predikat_keterampilan_deskripsi_ipa,
                'predikat_keterampilan_deskripsi_ips' => $predikat_keterampilan_deskripsi_ips,
                'predikat_keterampilan_deskripsi_pjok' => $predikat_keterampilan_deskripsi_pjok,
                'predikat_keterampilan_deskripsi_sbk' => $predikat_keterampilan_deskripsi_sbk,
                'predikat_keterampilan_deskripsi_mulok' => $predikat_keterampilan_deskripsi_mulok,
                'jumlah_raport' => $jumlah_raport,
                'ratarata_raport' => $ratarata_raport,
                'ratarata_raport_pengetahuan' => $ratarata_raport_pengetahuan,
                'jumlah_raport_pengetahuan' => $jumlah_raport_pengetahuan,
                'raport_pengetahuan_agama' => $raport_pengetahuan_agama,
                'raport_pengetahuan_ppkn' => $raport_pengetahuan_ppkn,
                'raport_pengetahuan_indonesia' => $raport_pengetahuan_indonesia,
                'raport_pengetahuan_matematika' => $raport_pengetahuan_matematika,
                'raport_pengetahuan_ipa' => $raport_pengetahuan_ipa,
                'raport_pengetahuan_ips' => $raport_pengetahuan_ips,
                'raport_pengetahuan_pjok' => $raport_pengetahuan_pjok,
                'raport_pengetahuan_sbk' => $raport_pengetahuan_sbk,
                'raport_pengetahuan_mulok' => $raport_pengetahuan_mulok,
                'jumlah_raport_keterampilan' => $jumlah_raport_keterampilan,
                'ratarata_raport_keterampilan' => $ratarata_raport_keterampilan,
                'ratarata_raport_keterampilan' => $ratarata_raport_keterampilan,
                'jumlah_raport_keterampilan' => $jumlah_raport_keterampilan,
                'raport_keterampilan_agama' => $raport_keterampilan_agama,
                'raport_keterampilan_ppkn' => $raport_keterampilan_ppkn,
                'raport_keterampilan_indonesia' => $raport_keterampilan_indonesia,
                'raport_keterampilan_matematika' => $raport_keterampilan_matematika,
                'raport_keterampilan_ipa' => $raport_keterampilan_ipa,
                'raport_keterampilan_ips' => $raport_keterampilan_ips,
                'raport_keterampilan_pjok' => $raport_keterampilan_pjok,
                'raport_keterampilan_sbk' => $raport_keterampilan_sbk,
                'raport_keterampilan_mulok' => $raport_keterampilan_mulok,
                'sakit1' => $sakit1,
                'alpa1' => $alpa1,
                'ijin1' => $ijin1,
                //'data_siswa' => $data_siswa,
                'students' => $students
            ]
        );
        return $pdf->download($kalimat1 . '_' . $kalimat2 . '_' . $id . '_' . date('Y-m-d_H') . '.pdf');
    }
    public function cover_pdf($id)
    {
        $siswa = Siswa::find($id);
        $nama_depancover = Siswa::where('id', '=', $id)->select('nama_depan', 'nama_belakang')->pluck('nama_depan');
        $nama_belakangcover = Siswa::where('id', '=', $id)->select('nama_depan', 'nama_belakang')->pluck('nama_belakang');
        $kalimat1cover = $nama_depancover[0];
        $kalimat2cover = $nama_belakangcover[0];
        //dd($kalimat1cover);
        $pdf = PDF::loadview(
            'export.cover1',
            [
                'siswa' => $siswa,
            ]
        );
        return $pdf->download('cover_' . $kalimat1cover . '_' . $kalimat2cover . '_' . date('Y-m-d_H') . '.pdf');
    }
    public function biodata_pdf($id)
    {
        $siswa = Siswa::find($id);
        $nama_depancover = Siswa::where('id', '=', $id)->select('nama_depan', 'nama_belakang')->pluck('nama_depan');
        $nama_belakangcover = Siswa::where('id', '=', $id)->select('nama_depan', 'nama_belakang')->pluck('nama_belakang');
        $kalimat1cover = $nama_depancover[0];
        $kalimat2cover = $nama_belakangcover[0];
        //dd($kalimat1cover);
        $pdf = PDF::loadview(
            'export.cover2',
            [
                'siswa' => $siswa,
            ]
        );
        return $pdf->download('biodata_' . $kalimat1cover . '_' . $kalimat2cover . '_' . date('Y-m-d_H') . '.pdf');
    }
}
