<?php

namespace App\Imports;

use App\Models\Extra;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ExtraFirstSheetImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Extra([
            "kelas_id" => $row["kelas_id"],
            "siswa_id" => $row["siswa_id"],
            "alpa" => $row["alpa"],
            "ijin" => $row["ijin"],
            "sakit" => $row["sakit"],
            "saran" => $row["saran"],
            "ekskul" => $row["ekskul"],
            "prestasi" => $row["prestasi"],
            "pendengaran" => $row["pendengaran"],
            "penglihatan" => $row["penglihatan"],
            "gigi" => $row["gigi"],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nis' => 'required',
            '*.saran' => 'required',
            '*.pendengaran' => 'required',
            '*.penglihatan' => 'required',
            '*.gigi' => 'required',
            '*.sakit' => 'required',
            '*.ijin' => 'required',
            '*.alpa' => 'required',
        ];
    }
}
