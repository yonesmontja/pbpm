<?php
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Journal;
use App\Models\Tahunpel;
use App\Models\Kompetensiinti;
use App\Models\Langkahstrategis;

function rangking5Besar()
{
	$siswa = Siswa::all();
	$siswa->map(function($s){
		$s->ratarataNilai = $s->ratarataNilai();
		return $s;
	});
	$siswa = $siswa->sortByDesc('ratarataNilai')->take(5);
        //dd($siswa);
	return $siswa;
}
function luasxGrafik()
{
    $nilai = Nilai::all();
    $sumbux = [];
    //$sumbuy = [];
    foreach($nilai as $mnp){
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
    foreach($nilai as $mnp){
                //$sumbux[] = $mnp->nilai;
                $sumbuy[] = $mnp -> mapel -> nama_mapel;
        }
    return $sumbuy;
}
function totalSiswa()
{
	return Siswa::count();
}
function totalMapel()
{
	return Mapel::count();
}
function totalOAP()
{
	$siswaOAP = Siswa::where('siswaOAP','like','%OAP%')->count();
	return $siswaOAP;

}
function thnPel()
{
    $tp = Tahunpel::first()->thn_pel;
    return $tp;
}
function totalAgats()
{
	$siswaAgats = Siswa::where('distrik','like','%agats%')->count();
	return $siswaAgats;
}
function totalAtsj()
{
	$siswaAtsj = Siswa::where('distrik','like','%atsj%')->count();
	return $siswaAtsj;
}
function totalSafan()
{
	$siswaSafan = Siswa::where('distrik','like','%safan%')->count();
	return $siswaSafan;
}
function totalSuator()
{
	$siswaSuator = Siswa::where('distrik','like','%suator%')->count();
	return $siswaSuator;
}
function totalSawa()
{
	$siswaSawa = Siswa::where('distrik','like','%sawa%')->count();
	return $siswaSawa;
}
function totalPantai()
{
	$siswaPantai = Siswa::where('distrik','like','%pantai kasuari%')->count();
	return $siswaPantai;
}
function totalSirets()
{
	$siswaSirets = Siswa::where('distrik','like','%sirets%')->count();
	return $siswaSirets;
}
function totalJoerat()
{
	$siswaJoerat = Siswa::where('distrik','like','%joerat%')->count();
	return $siswaJoerat;
}
function totalFayit()
{
	$siswaFayit = Siswa::where('distrik','like','%fayit%')->count();
	return $siswaFayit;
}
function totalBetcbamu()
{
	$siswaBetcbamu = Siswa::where('distrik','like','%Betcbamu%')->count();
	return $siswaBetcbamu;
}
function totalSuru()
{
	$siswaSuru = Siswa::where('distrik','like','%Suru-suru%')->count();
	return $siswaSuru;
}
function totalPulautiga()
{
	$siswaPulautiga = Siswa::where('distrik','like','%Pulau tiga%')->count();
	return $siswaPulautiga;
}
function totalJetsy()
{
	$siswaJetsy = Siswa::where('distrik','like','%Jetsy%')->count();
	return $siswaJetsy;
}
function totalAyip()
{
	$siswaAyip = Siswa::where('distrik','like','%Ayip%')->count();
	return $siswaAyip;
}
function totalAkat()
{
	$siswaAkat = Siswa::where('distrik','like','%Akat%')->count();
	return $siswaAkat;
}
function totalDerkomour()
{
	$siswaDerkomour = Siswa::where('distrik','like','%Der komour%')->count();
	return $siswaDerkomour;
}
function totalKolfbrasa()
{
	$siswaKolfbrasa = Siswa::where('distrik','like','%Kolfbrasa%')->count();
	return $siswaKolfbrasa;
}
function totalKopay()
{
	$siswaKopay = Siswa::where('distrik','like','%Kopay%')->count();
	return $siswaKopay;
}
function totalUnir()
{
	$siswaUnir = Siswa::where('distrik','like','%Unir Siraw%')->count();
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
    return Siswa::all()->where('kelas','=','Kelas 1')->pluck('kelas')->count();
}
function totalKelas1Percentage()
{
    return totalKelas1()/totalSiswa()*100;
}
function totalKelas2()
{
    return Siswa::all()->where('kelas','=','Kelas 2')->pluck('kelas')->count();
}
function totalKelas2Percentage()
{
    return totalKelas2()/totalSiswa()*100;
}
function totalKelas3()
{
    return Siswa::all()->where('kelas','=','Kelas 3')->pluck('kelas')->count();
}
function totalKelas3Percentage()
{
    return totalKelas3()/totalSiswa()*100;
}
function totalKelas4()
{
    return Siswa::all()->where('kelas','=','Kelas 4')->pluck('kelas')->count();
}
function totalKelas4Percentage()
{
    return totalKelas4()/totalSiswa()*100;
}
function totalKelas5()
{
    return Siswa::all()->where('kelas','=','Kelas 5')->pluck('kelas')->count();
}
function totalKelas5Percentage()
{
    return totalKelas5()/totalSiswa()*100;
}
function totalKelas6()
{
    return Siswa::all()->where('kelas','=','Kelas 6')->pluck('kelas')->count();
}
function totalKelas6Percentage()
{
    return totalKelas6()/totalSiswa()*100;
}
