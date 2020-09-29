<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }
    public function map($siswa): array
    {
    	return[
    		$siswa->nama_lengkap(),
    		$siswa->jenis_kelamin,
    		$siswa->agama,
    		$siswa->ratarataNilai()
    	];
    }
    public function headings(): array
    {
    	return[
    		'NAMA LENGKAP',
    		'JENIS KELAMIN',
    		'AGAMA',
    		'NILAI RAPORT'
    	];
    }
}
