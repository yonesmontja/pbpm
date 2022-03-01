<?php

namespace App\Imports;

use App\Models\Ipa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class IpaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ipa([
            "nis" => $row["nis"],
            "nilai_pengetahuan" => $row["nilai_pengetahuan"],
            "ppeng" => $row["ppeng"],
            "deskripsi_pengetahuan" => $row["deskripsi_pengetahuan"],
            "nilai_keterampilan" => $row["nilai_keterampilan"],
            "pketr" => $row["pketr"],
            "deskripsi_keterampilan" => $row["deskripsi_keterampilan"],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.nis' => 'required',
            '*.nilai_pengetahuan' => 'required',
            '*.ppeng' => 'required',
            '*.deskripsi_pengetahuan' => 'required',
            '*.nilai_keterampilan' => 'required',
            '*.pketr' => 'required',
            '*.deskripsi_keterampilan' => 'required',
        ];
    }
}
