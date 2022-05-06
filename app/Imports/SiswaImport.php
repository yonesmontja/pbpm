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
            'nis' => $row[1],
            'nisn' => $row[2],
            'nama_depan' => $row[3],
            'nama_belakang' => $row[4],
            'jenis_kelamin' => $row[5],
            'tempat_lahir' => $row[6],
            'tgl_lahir' => $row[7],
            'agama' => $row[8],
            'status_keluarga' => $row[9],
            'anak_ke' => $row[10],
            'alamat' => $row[11],
            'pend_sebelum' => $row[12],
            'kelas' => $row[13],
            'masuk_kls_awal' => $row[14],
            'tgl_masuk_awal' => $row[15],
            'nik' => $row[16],
            'nama_ayah' => $row[17],
            'nama_ibu' => $row[18],
            'alamat_ortu' => $row[19],
            'pekerjaan_ayah' => $row[20],
            'pekerjaan_ibu' => $row[21],
            'nama_wali' => $row[22],
            'pekerjaan_wali' => $row[23],
            'alamat_wali' => $row[24],
            'email' => $row[25],
            'role' => $row[26],
            'password' => $row[27],
            'status' => $row[28],
        ]);
    }
}
