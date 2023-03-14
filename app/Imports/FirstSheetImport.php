<?php

namespace App\Imports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FirstSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nilai([
            //
            'nilai_start' => $row['nilai_start'],
            'nilai_end' => $row['nilai_end'],
            'nilai_deskripsi' => $row['materi'],
            'nilai_notes' => $row['indikator_kompetensi'],
            'kompetensi_inti_id' => $row['kompetensi_inti'],
            'mapel_id' => $row['mapel'],
            'penilaian_id' => $row['penilaian'],
            'guru_id' => $row['guru'],
            'kelas_id' => $row['kelas'],
            'siswa_id' => $row['nama_siswa'],
            'nilai' => $row['nilai_siswa'],
            'tahunpel_id' => $row['tahun_pelajaran'],
            'rombel_id' => $row['rombel'],
        ]);
    }
}
