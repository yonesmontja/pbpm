<?php

namespace App\Imports;

//use App\Models\Nilai;
//use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class NilaiImport implements WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $rowCount = 0;

    public function sheets(): array
    {
        ++$this->rowCount;
        return [
            'Worksheet' => new FirstSheetImport()
        ];
    }
    public function getRowCount(): int
    {
        return $this->rowCount;
    }
}