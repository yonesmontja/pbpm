<?php

namespace App\Imports;

use App\Models\Sikap;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SikapImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sikap([
            "nis" => $row["nis"],
            "sikap_spiritual" => $row["sikap_spiritual"],
            "sikap_sosial" => $row["sikap_sosial"],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nis' => 'required',
            '*.sikap_spiritual' => 'required',
            '*.sikap_sosial' => 'required',
        ];
    }
}
