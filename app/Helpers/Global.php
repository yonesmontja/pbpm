<?php
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Journal;
use App\Models\Langkahstrategis;
use App\Models\Kompetensiinti;

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
function totalSiswa()
{
	return Siswa::count();
}
function totalOAP()
{
	$siswaOAP = Siswa::where('siswaOAP','like','%OAP%')->count();
	return $siswaOAP;
	
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
