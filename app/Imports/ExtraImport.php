<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExtraImport implements WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function sheets(): array
    {
        return [
            0 => new ExtraFirstSheetImport()
        ];
    }
}
