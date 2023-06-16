<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Nilai::select('nilai_start', 'nilai_end', 'nilai_deskripsi', 'nilai_notes', 'kompetensi_inti_id', 'mapel_id', 'penilaian_id', 'guru_id', 'siswa_id', 'kelas_id', 'nilai', 'tanggal', 'tahunpel_id', 'rombel_id')->get();
    }
    public function headings(): array
    {
        return [
            'nilai_start',
            'nilai_end',
            'indikator_kompetensi',
            'deskripsi_capaian',
            'kompetensi_inti',
            'mapel',
            'penilaian',
            'guru',
            'siswa_id',
            'kelas_id',
            'nilai',
            'tanggal',
            'tahunpel_id',
            'rombel_id'
        ];
    }
}