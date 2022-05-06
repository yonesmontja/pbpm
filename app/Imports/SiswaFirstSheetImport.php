<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SiswaFirstSheetImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
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
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'nama_depan' => $row['nama_depan'],
            'nama_belakang' => $row['nama_belakang'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tgl_lahir'],
            'agama' => $row['agama'],
            'status_keluarga' => $row['status_keluarga'],
            'anak_ke' => $row['anak_ke'],
            'alamat' => $row['alamat'],
            'pend_sebelum' => $row['pend_sebelum'],
            'kelas' => $row['kelas'],
            'kelas_id' => $row['kelas_id'],
            'masuk_kls_awal' => $row['masuk_kls_awal'],
            'tgl_masuk_awal' => $row['tgl_masuk_awal'],
            'nik' => $row['nik'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'alamat_ortu' => $row['alamat_ortu'],
            'pekerjaan_ayah' => $row['pekerjaan_ayah'],
            'pekerjaan_ibu' => $row['pekerjaan_ibu'],
            'nama_wali' => $row['nama_wali'],
            'pekerjaan_wali' => $row['pekerjaan_wali'],
            'alamat_wali' => $row['alamat_wali'],
            'email' => $row['email'],
            'role' => $row['role'],
            'password' => Hash::make($row['password_siswa']),
            'status' => $row['status'],
        ]);
    }
}
