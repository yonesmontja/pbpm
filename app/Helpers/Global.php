<?php
use App\Models\Siswa;
use App\Models\Guru;

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
function totalGuru()
{
	return Guru::count();
}
