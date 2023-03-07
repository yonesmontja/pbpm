<?php

namespace App\Imports;

use App\Models\Rombel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class RombelFirstSheetImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        DB::table('rombel_siswa')->insert([
            //
            'rombel_id' => $row['rombel_id'],
            'siswa_id' => $row['siswa_id'],
            'nama_depan' => $row['nama_depan'],
            'nama_belakang' => $row['nama_belakang'],
            'tahunpelajaran_id' => $row['tahunpelajaran_id'],

        ]);
    }
}
