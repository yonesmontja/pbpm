<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //
            'name' => $row[1],

            'email' => $row[21],
            'role' => $row[22],
            'remember_token' => Str::random(60),
            'password' => bcrypt('rahasia'),
        ]);
    }
}
