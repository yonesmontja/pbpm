<?php

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Journal;
use App\Models\Tahunpel;
use App\Models\Kompetensiinti;
use App\Models\Langkahstrategis;
use Illuminate\Support\Facades\Auth;

function rangking5Besar()
{
    $siswa = Siswa::all();
    $siswa->map(function ($s) {
        $s->ratarataNilai = $s->ratarataNilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('ratarataNilai')->take(5);
    //dd($siswa);
    return $siswa;
}
function dataNilai()
{
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
    $id = Auth::id();
    $guru = Guru::where('user_id', '=', $id)->pluck('id')->first();
    $data_nilai = Nilai::where('guru_id', '=', $guru)->where('tahunpel_id', '=', $thn_id)->count();

    return $data_nilai;
}
function luasxGrafik()
{
    $nilai = Nilai::all();
    $sumbux = [];
    //$sumbuy = [];
    foreach ($nilai as $mnp) {
        $sumbux[] = $mnp->nilai;
        //$sumbuy[] = $mnp -> mapel -> nama_mapel;
    }
    return $sumbux;
}
function luasyGrafik()
{
    $nilai = Nilai::all();
    //$sumbux = [];
    $sumbuy = [];
    foreach ($nilai as $mnp) {
        //$sumbux[] = $mnp->nilai;
        $sumbuy[] = $mnp->mapel->nama_mapel;
    }
    return $sumbuy;
}
function totalSiswa()
{
    return DB::table('rombel_siswa')->count();
}
function totalMapel()
{
    return Mapel::count();
}
function totalOAP()
{
    $siswaOAP = Siswa::where('siswaOAP', 'like', '%OAP%')->count();
    return $siswaOAP;
}
function thnPel()
{
    $tahunPelajaranAktif = Tahunpel::where('aktif', 'Y')->first();

    if (!empty($tahunPelajaranAktif->thn_pel)) {
        $tp = $tahunPelajaranAktif->thn_pel;
    } else {
        $tp = Carbon::now()->year;
    }

    return $tp;
}

function totalAgats()
{
    $siswaAgats = Siswa::where('distrik', 'like', '%agats%')->count();
    return $siswaAgats;
}
function totalAtsj()
{
    $siswaAtsj = Siswa::where('distrik', 'like', '%atsj%')->count();
    return $siswaAtsj;
}
function totalSafan()
{
    $siswaSafan = Siswa::where('distrik', 'like', '%safan%')->count();
    return $siswaSafan;
}
function totalSuator()
{
    $siswaSuator = Siswa::where('distrik', 'like', '%suator%')->count();
    return $siswaSuator;
}
function totalSawa()
{
    $siswaSawa = Siswa::where('distrik', 'like', '%sawa%')->count();
    return $siswaSawa;
}
function totalPantai()
{
    $siswaPantai = Siswa::where('distrik', 'like', '%pantai kasuari%')->count();
    return $siswaPantai;
}
function totalSirets()
{
    $siswaSirets = Siswa::where('distrik', 'like', '%sirets%')->count();
    return $siswaSirets;
}
function totalJoerat()
{
    $siswaJoerat = Siswa::where('distrik', 'like', '%joerat%')->count();
    return $siswaJoerat;
}
function totalFayit()
{
    $siswaFayit = Siswa::where('distrik', 'like', '%fayit%')->count();
    return $siswaFayit;
}
function totalBetcbamu()
{
    $siswaBetcbamu = Siswa::where('distrik', 'like', '%Betcbamu%')->count();
    return $siswaBetcbamu;
}
function totalSuru()
{
    $siswaSuru = Siswa::where('distrik', 'like', '%Suru-suru%')->count();
    return $siswaSuru;
}
function totalPulautiga()
{
    $siswaPulautiga = Siswa::where('distrik', 'like', '%Pulau tiga%')->count();
    return $siswaPulautiga;
}
function totalJetsy()
{
    $siswaJetsy = Siswa::where('distrik', 'like', '%Jetsy%')->count();
    return $siswaJetsy;
}
function totalAyip()
{
    $siswaAyip = Siswa::where('distrik', 'like', '%Ayip%')->count();
    return $siswaAyip;
}
function totalAkat()
{
    $siswaAkat = Siswa::where('distrik', 'like', '%Akat%')->count();
    return $siswaAkat;
}
function totalDerkomour()
{
    $siswaDerkomour = Siswa::where('distrik', 'like', '%Der komour%')->count();
    return $siswaDerkomour;
}
function totalKolfbrasa()
{
    $siswaKolfbrasa = Siswa::where('distrik', 'like', '%Kolfbrasa%')->count();
    return $siswaKolfbrasa;
}
function totalKopay()
{
    $siswaKopay = Siswa::where('distrik', 'like', '%Kopay%')->count();
    return $siswaKopay;
}
function totalUnir()
{
    $siswaUnir = Siswa::where('distrik', 'like', '%Unir Siraw%')->count();
    return $siswaUnir;
}
function totalGuru()
{
    return Guru::count();
}
function totalJournal()
{
    return Journal::count();
}
function totalStrategis()
{
    return Langkahstrategis::count();
}
function totalKi()
{
    return Kompetensiinti::count();
}
function totalKelas1()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '1')->count() + DB::table('rombel_siswa')->where('rombel_id', '=', '2')->count();
}
function totalKelas1Percentage()
{
    return totalKelas1() / totalSiswa() * 100;
}
function totalKelas1A()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '1')->count();
}
function totalKelas1B()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '2')->count();
}
function totalKelas2()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '3')->count() + DB::table('rombel_siswa')->where('rombel_id', '=', '4')->count();
}
function totalKelas2Percentage()
{
    return totalKelas2() / totalSiswa() * 100;
}
function totalKelas2A()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '3')->count();
}
function totalKelas2B()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '4')->count();
}
function totalKelas3()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '5')->count() + DB::table('rombel_siswa')->where('rombel_id', '=', '6')->count();
}
function totalKelas3Percentage()
{
    return totalKelas3() / totalSiswa() * 100;
}
function totalKelas3A()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '5')->count();
}
function totalKelas3B()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '6')->count();
}
function totalKelas4()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '7')->count() + DB::table('rombel_siswa')->where('rombel_id', '=', '8')->count();
}
function totalKelas4Percentage()
{
    return totalKelas4() / totalSiswa() * 100;
}
function totalKelas4A()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '7')->count();
}
function totalKelas4B()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '8')->count();
}
function totalKelas5()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '9')->count() + DB::table('rombel_siswa')->where('rombel_id', '=', '10')->count();
}
function totalKelas5Percentage()
{
    return totalKelas5() / totalSiswa() * 100;
}
function totalKelas5A()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '9')->count();
}
function totalKelas5B()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '10')->count();
}
function totalKelas6()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '11')->count() + DB::table('rombel_siswa')->where('rombel_id', '=', '12')->count();
}
function totalKelas6Percentage()
{
    return totalKelas6() / totalSiswa() * 100;
}
function totalKelas6A()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '11')->count();
}
function totalKelas6B()
{
    return DB::table('rombel_siswa')->where('rombel_id', '=', '12')->count();
}
function journal_this_week()
{
    $dateS = Carbon::now()->startOfMonth()->subMonth(0);
    $dateE = Carbon::now();
    $weekS = Carbon::now()->startOfWeek()->subWeek(0);
    $weekE = Carbon::now();
    $journal_this_week = Journal::select('created_at', 'slug')
        ->whereBetween('created_at', [$weekS, $weekE])
        ->count('slug');
    $jurnal = Journal::all()->count();
    return $journal_this_week;
}

function konversi($x)
{
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";

    if ($x < 12) {
        $temp = " " . $angka[$x];
    } elseif ($x < 20) {
        $temp = konversi($x - 10) . " belas";
    } elseif ($x < 100) {
        $temp = konversi($x / 10) . " puluh" . konversi($x % 10);
    } elseif ($x < 200) {
        $temp = " seratus" . konversi($x - 100);
    } elseif ($x < 1000) {
        $temp = konversi($x / 100) . " ratus" . konversi($x % 100);
    } elseif ($x < 2000) {
        $temp = " seribu" . konversi($x - 1000);
    } elseif ($x < 1000000) {
        $temp = konversi($x / 1000) . " ribu" . konversi($x % 1000);
    } elseif ($x < 1000000000) {
        $temp = konversi($x / 1000000) . " juta" . konversi($x % 1000000);
    } elseif ($x < 1000000000000) {
        $temp = konversi($x / 1000000000) . " milyar" . konversi($x % 1000000000);
    }
    return $temp;
}

function tkoma($x)
{
    $x = stristr($x, ".");

    $angka = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = " ";

    $pjg = strlen($x);
    $pos = 1;

    while ($pos < $pjg) {
        $char = substr($x, $pos, 1);
        $pos++;
        $temp .= " " . $angka[$char];
    }
    return $temp;
}

function terbilang($x, $style = 4)
{
    if ($x < 0) {
        $hasil = "minus " . trim(konversi(x));
    } else {
        $poin = trim(tkoma($x));
        $hasil = trim(konversi($x));
    }

    switch ($style) {
        case 1:
            if ($poin) {
                $hasil = strtoupper($hasil) . ' KOMA ' . strtoupper($poin);
            } else {
                $hasil = strtoupper($hasil);
            }
            break;
        case 2:
            if ($poin) {
                $hasil = strtolower($hasil) . ' koma ' . strtolower($poin);
            } else {
                $hasil = strtolower($hasil);
            }
            break;
        case 3:
            if ($poin) {
                $hasil = ucwords($hasil) . ' Koma ' . ucwords($poin);
            } else {
                $hasil = ucwords($hasil);
            }
            break;
        default:
            if ($poin) {
                $hasil = ucfirst($hasil) . ' koma ' . $poin;
            } else {
                $hasil = ucfirst($hasil);
            }
            break;
    }
    return $hasil;
}
function set_active($uri, $output = "active")
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}
// function to calculate the standard deviation
// of array elements
function Stand_Deviation($arr)
{
    $num_of_elements = count($arr);

    $variance = 0.0;

    // calculating mean using array_sum() method

    if ($num_of_elements == !0) {
        $average = array_sum($arr) / $num_of_elements;
    }
    if ($num_of_elements == 0) {
        $average = 0;
    }

    if ($num_of_elements == !0) {
        foreach ($arr as $i) {
            // sum of squares of differences between
            // all numbers and means.
            $variance += pow(($i - $average), 2);
        }
    }
    if ($num_of_elements == 0) {
        $variance = 0;
    }
    if ($num_of_elements == !0) {
        return (float)sqrt($variance / $num_of_elements);
    }
    if ($num_of_elements == 0) {
        return 0;
    }

    function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split       = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }
}
