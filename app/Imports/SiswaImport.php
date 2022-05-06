<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            //
            'nilai_start' => $row[1],
            'nilai_end' => $row[2],
            'nilai_deskripsi' => $row[3],
            'nilai_notes' => $row[4],
            'kompetensi_inti_id' => $row[5],
            'mapel_id' => $row[6],
            'penilaian_id' => $row[7],
            'guru_id' => $row[8],
            'siswa_id' => $row[9],
            'kelas_id' => $row[10],
            'nilai' => $row[11],

        ]);
    }
}
