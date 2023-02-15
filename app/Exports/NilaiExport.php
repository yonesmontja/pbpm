<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Nilai::all();
    }
    public function headings(): array
    {
        return [
            'nilai_start',
            'nilai',
            'kompetensi_inti_id',
            'mapel_id',
            'kelas_id',
            'penilaian_id',
            'guru_id',
            'siswa_id',
            'tahunpel_id',
            'nilai_end',
            'nilai_deskripsi',
            'nilai_notes'
        ];
    }
}
