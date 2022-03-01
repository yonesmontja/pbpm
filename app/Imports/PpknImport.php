<?php

namespace App\Imports;

use App\Models\Ppkn;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PpknImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ppkn([
            'nis' => $row[0],
            'nilai_pengetahuan' => $row[1],
            'ppeng' => $row[2],
            'deskripsi_pengetahuan' => $row[3],
            'nilai_keterampilan' => $row[4],
            'pketr' => $row[5],
            'deskripsi_keterampilan' => $row[6],
            'nisn' => $row[7],
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
