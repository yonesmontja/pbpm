<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'nis',
            'nisn',
            'nama_depan',
            'nama_belakang',
            'jenis_kelamin',
            'tempat_lahir',
            'tgl_lahir',
            'agama',
            'status_keluarga',
            'anak_ke',
            'alamat',
            'pend_sebelum',
            'kelas',
            'masuk_kls_awal',
            'tgl_masuk_awal',
            'nik',
            'nama_ayah',
            'nama_ibu',
            'alamat_ortu',
            'pekerjaan_ayah',
            'pekerjaan_ibu',
            'nama_wali',
            'pekerjaan_wali',
            'alamat_wali',
            'email',
            'role',
            'password',
            'status',
            'siswaOAP',
            'distrik',
            'avatar',
            'kelas_id',
            'user_id',
            'created_at',
            'updated_at'
        ];
    }
}
