<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Rombel;
use App\Models\Penilaian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class GuruController extends Controller
{
    //
    public function profile($id)
    {
        $guru = Guru::find($id);
        // nama kelas rombel dari si wali kelas yg profilenya ditampilkan
        $wali_kelas = Rombel::where('guru_id', $id)->pluck('rombel')->first();
        //id dari guru yang menjadi wali kelas dari rombel ini
        $rombel = Rombel::where('guru_id', $id)->pluck('id')->first();
        //hitung jumlah siswa dari rombel ini
        $murid_wali = DB::table('rombel_siswa')->where('rombel_id', $rombel)->count();
        // menghitung jumlah mapel yang diampu oleh guru. Berdasarkan nilai yang sudah masuk.
        $jml_mapel_guru = Nilai::where('guru_id', '=', $id)->pluck('guru_id', 'mapel_id')->count();
        $nama_mapel_guru = Nilai::where('guru_id', '=', $id)->pluck('guru_id', 'mapel_id')->toArray();
        //dd($nama_mapel_guru);
        $penilaian1 = Penilaian::find($id);

        $jml_kelas_penilaian = Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 1)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 2)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 3)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 4)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 5)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 6)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 7)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 8)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 9)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 10)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 11)->pluck('guru_id', 'rombel_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('rombel_id', '=', 12)->pluck('guru_id', 'rombel_id')->count();
        //dd(Nilai::where('guru_id','=',$id)->where('rombel_id','=',1)->pluck('guru_id','rombel_id')->count());
        $jml_mapel_penilaian = Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 1)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 2)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 3)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 4)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 5)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 6)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 18)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 19)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 20)->pluck('penilaian_id', 'guru_id')->count() +
            Nilai::where('guru_id', '=', $id)->where('penilaian_id', '=', 21)->pluck('penilaian_id', 'guru_id')->count();
        $jml_siswa_penilaian = Nilai::where('guru_id', '=', $id)->select('siswa_id', 'penilaian_id')->pluck('penilaian_id', 'siswa_id')->count();


        //hitung nilai rata-rata kelas untuk semua mapel
        $rata_kelas1 = Nilai::all()->where('penilaian_id', '=', $id)->pluck('nilai')->avg();
        $rata_kelas = number_format((float)$rata_kelas1, 1, '.', '');
        //-----------------------------------------------

        $nilai = Nilai::all()->where('guru_id', '=', $id);
        $nilai1 = Nilai::all()->where('guru_id', '=', $id)->where('penilaian_id', '=', 6)->avg('nilai');
        //dd($nilai1);
        $user = User::all();
        // hitung nilai rata-rata per mapel $chart_nilai[] untuk ditampilkan di grafik
        for ($bulan = 1; $bulan < 7; $bulan++) {
            $chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where guru_id='$id' AND month(tanggal)='$bulan'"))->first();
            //$chart_penilaian     = collect(DB::SELECT("SELECT count(penilaian_id) AS jumlah from nilai where month(tanggal)='$bulan'"))->first();
            (int)$chart_nilai1[] = Nilai::whereMonth('tanggal', '=', $bulan)->where('penilaian_id', '=', $id)->pluck('nilai')->avg();
            //(int)$chart_nilai1[] = Nilai::whereMonth('tanggal','=',$bulan)->pluck('nilai')->avg();

            $jumlah_penilaian[] = $chart_penilaian->jumlah;
        }
        //dd($chart_nilai1);
        // ambil data nilai siswa 3 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(3);
        $weekE = Carbon::now()->startOfWeek();

        $mapel_last_3month = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$dateS, $dateE])
            ->avg('nilai');

        $mapel_last_3week = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$weekS, $weekE])
            ->avg('nilai');

        $TotalSpent3 = DB::table('nilai')->where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$dateS, $dateE])
            ->avg('nilai');
        $weekSpent3 = DB::table('nilai')->where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$weekS, $weekE])
            ->avg('nilai');
        $last3month_average = number_format((float)$TotalSpent3, 2, '.', '');
        $last3week_average = number_format((float)$weekSpent3, 2, '.', '');

        // ambil data nilai siswa 2 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(2);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(2);
        $weekE = Carbon::now()->startOfWeek();

        $mapel_last_2month = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$dateS, $dateE])
            ->avg('nilai');
        $mapel_last_2week = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$weekS, $weekE])
            ->avg('nilai');

        $TotalSpent2 = DB::table('nilai')->where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$dateS, $dateE])
            ->avg('nilai');
        $weekSpent2 = DB::table('nilai')->where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$weekS, $weekE])
            ->avg('nilai');
        $last2month_average = number_format((float)$TotalSpent2, 2, '.', '');
        $last2week_average = number_format((float)$weekSpent2, 2, '.', '');

        // ambil data nilai siswa 1 bulan lalu, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(1);
        $dateE = Carbon::now()->startOfMonth();
        $weekS = Carbon::now()->startOfWeek()->subWeek(1);
        $weekE = Carbon::now()->startOfWeek();

        $mapel_last_month_old = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$dateS, $dateE])
            ->avg('nilai');
        $mapel_last_month = number_format((float)$mapel_last_month_old, 2, '.', '');
        $mapel_last_week_old = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$weekS, $weekE])
            ->avg('nilai');
        $mapel_last_week = number_format((float)$mapel_last_week_old, 2, '.', '');

        for ($penilaian = 1; $penilaian < 6; $penilaian++) {
            $penilaian_old = Nilai::where('penilaian_id', '=', $penilaian)->where('guru_id', '=', $id)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id', '=', $penilaian)->where('guru_id', '=', $id)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $penilaian_last_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_last_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        //dd($penilaian_last_week);
        $TotalSpent1 = DB::table('nilai')->where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$dateS, $dateE])
            ->avg('nilai');
        $weekSpent1 = DB::table('nilai')->where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$weekS, $weekE])
            ->avg('nilai');
        $last1month_average = number_format((float)$TotalSpent1, 2, '.', '');
        $last1week_average = number_format((float)$weekSpent1, 2, '.', '');

        // ambil data nilai siswa bulan ini sumber https://www.codegrepper.com/code-examples/php/get+last+month+data+in+laravel
        $this_month = Nilai::whereMonth('tanggal', date('m'))->where('guru_id', '=', $id)
            ->whereYear('tanggal', date('Y'))
            ->get(['nilai', 'tanggal'])
            ->avg('nilai');
        $this_month = number_format((float)$this_month, 2, '.', '');

        // ambil data nilai siswa bulan ini, kemudian hitung rata-rata
        $dateS = Carbon::now()->startOfMonth()->subMonth(0);
        $dateE = Carbon::now();
        $weekS = Carbon::now()->startOfWeek()->subWeek(0);
        $weekE = Carbon::now();

        $mapel_this_month_old = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$dateS, $dateE])
            ->avg('nilai');
        $mapel_this_month = number_format((float)$mapel_this_month_old, 2, '.', '');
        $mapel_this_week_old = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$weekS, $weekE])
            ->avg('nilai');
        $mapel_this_week = number_format((float)$mapel_this_week_old, 2, '.', '');

        for ($penilaian = 1; $penilaian < 6; $penilaian++) {
            $penilaian_old = Nilai::where('penilaian_id', '=', $penilaian)->where('guru_id', '=', $id)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$dateS, $dateE])
                ->avg('nilai');
            $penilaian_week_old = Nilai::where('penilaian_id', '=', $penilaian)->where('guru_id', '=', $id)
                ->select('tanggal', 'nilai')
                ->whereBetween('tanggal', [$weekS, $weekE])
                ->avg('nilai');
            $penilaian_this_month[] = number_format((float)$penilaian_old, 2, '.', '');
            $penilaian_this_week[] = number_format((float)$penilaian_week_old, 2, '.', '');
        }
        $penilaian_list = ['Tugas', 'Latihan', 'UH', 'PTS', 'PAS'];
        //dd($penilaian_this_week);
        $TotalSpent0 = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$dateS, $dateE])
            ->avg('nilai');
        $weekSpent0 = Nilai::where('guru_id', '=', $id)
            ->select('tanggal', 'nilai')
            ->whereBetween('tanggal', [$weekS, $weekE])
            ->avg('nilai');
        $last0month_average = number_format((float)$TotalSpent0, 2, '.', '');
        $last0week_average = number_format((float)$weekSpent0, 2, '.', '');

        $last_average = 0.00;
        $last_week_average = 0.00;
        if ($last1month_average > 0.00) {
            $last_average = number_format((float)(($last0month_average - $last1month_average) / $last1month_average * 100), 2, '.', '');  // Outputs in two dp

        } elseif ($last1week_average > 0.00) {

            $last_week_average = number_format((float)(($last0week_average - $last1week_average) / $last1week_average * 100), 2, '.', '');
        } elseif ($last1month_average == 0) {
            $last_average = 0;
        } elseif ($last1week_average == 0) {

            $last_week_average = 0;
        }

        $mapel = Mapel::all();
        return view('guru.profile', [
            'guru' => $guru,
            'wali_kelas' => $wali_kelas,
            'murid_wali' => $murid_wali,

            'penilaian1' => $penilaian1,
            'mapel' => $mapel,
            'jml_kelas_penilaian' => $jml_kelas_penilaian,
            'nilai' => $nilai,
            'nilai1' => $nilai1,
            'jml_mapel_guru' => $jml_mapel_guru,

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
    public function index()
    {
        $data_guru = Guru::all();

    	return view('guru.index',['data_guru' => $data_guru]);
    }
    public function gurucreate(Request $request)
    {
        $this -> validate($request,[
            'nama_guru' => 'required|min:3',
            'kode_guru' => 'required',
            'email' => 'required|email|unique:users',
            'jk' => 'required',
            'status' => 'required',

            'alamat' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);
        $avatar = $request->file('avatar')->move('images/guru', $request->file('avatar')->getClientOriginalName() . "." . $request->file('avatar')->getClientOriginalExtension());
        $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
        $img = Image::make($avatar);
        $img->resize('120', '120')->save('images/guru' . '/small_' . $file_name);
        $avatar->move('images/guru', $file_name);
        //insert ke tabel Users
        $user = new User();
        $user -> role = 'guru';
        $user -> name = $request -> nama_guru;
        $user -> email = $request -> email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        $user -> avatar = $file_name;
        $user -> save();
        //insert ke tabel Guru
        $input = $request->all();
        $user_id = $user->id;
        $guru = new Guru();
        //$request -> request -> add(['user_id' => $user -> id]);
        $guru -> user_id = $user_id;
        $guru -> nama_guru = $input['nama_guru'];
        $guru -> telpon = $input['telpon'];
        $guru -> alamat = $input['alamat'];
        $guru -> kode_guru = $input['kode_guru'];
        $guru -> jk = $input['jk'];
        $guru -> is_bk = $input['is_bk'];
        $guru -> stat_data = $input['stat_data'];
        $guru -> status = $input['status'];
        $guru -> email = $input['email'];
        $guru -> avatar = $file_name;
        $guru->save();
        //return $request -> all();
        return redirect('/guru')->with('sukses','berhasil diinput');
    }
    public function guruedit(Guru $guru)
    {
        //dd($guru->status);
        return view('guru/guruedit',['guru'=>$guru]);
    }
    public function guruupdate(Request $request, Guru $guru)
    {
        //dd($request->hasFile('avatar'));
        $guru ->update($request->all());
        //dd($guru->user_id);

        if ($request->hasFile('avatar')) {
            $guru->delete_avatar();
            $avatar = $request->file('avatar')->move('images/guru/', $request->file('avatar')->getClientOriginalName() . "." . $request->file('avatar')->getClientOriginalExtension());

            $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
            $img = Image::make($avatar);
            $img->resize('120', '120')->save('images/guru' . '/small_' . $file_name);
            $avatar->move('images/guru', $file_name);
            $guru->avatar = $file_name;
        }
        $user = User::find($guru->user_id);
        $date = now();
        $input = $request->all();
        DB::table('users')->where('id', '=', $user->id)->update([
            'name'      => $request->input('nama_guru'),

            'email' => $request->input('email'),
            'role' => 'guru',

            'created_at' => $date,
            'updated_at' => $date
        ]);
        //$guru = new Guru();
        //$request -> request -> add(['user_id' => $user -> id]);
        // $guru -> user_id = $input['user_id'];
        // $guru -> nama_guru = $input['nama_guru'];
        // $guru -> telpon = $input['telpon'];
        // $guru -> alamat = $input['alamat'];
        // $guru -> kode_guru = $input['kode_guru'];
        // $guru -> jk = $input['jk'];
        // $guru -> is_bk = $input['is_bk'];
        // $guru -> stat_data = $input['stat_data'];
        // $guru -> status = $input['status'];
        // $guru -> email = $input['email'];
        // $guru -> avatar = $file_name;

        $guru->save();
        return redirect('/guru')->with('sukses','berhasil diupdate!');
    }
    public function gurudelete(Guru $guru)
    {
        $guru ->delete_avatar();
        $guru ->delete();
        return redirect('/guru')->with('sukses','berhasil dihapus!');
    }
}
