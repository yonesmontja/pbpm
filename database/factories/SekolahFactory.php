<?php

namespace Database\Factories;

use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

class SekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Sekolah::class;
    public function definition()
    {
        return [
            'nama'=> 'SD Inpres Dabolding',
            'npsn' => 'NPSN',
            'alamat' => 'Jl. Pahlawan, Kalomdol, Pegunungan Bintang',
            'kode_pos' => 'kode_pos',
            'no_telp' => '081285795133',
            'kelurahan' => 'Dabolding',
            'kecamatan' => 'Kalomdol',
            'kota' => 'Pegunungan Bintang',
            'provinsi' => 'Papua',
            'email' => 'sd_dabolding@gmail.com',
            'website' => 'sd_dabolding.ac.id',
            'kepsek' => 'Merkianus Kasipmabin, S.Pd',
            'nip_kepsek' => 'nip_kepsek',
            'logo' => 'logo',
            'sebutan_kepala' => 'Kepala Sekolah',
            'nss' => 'nss',
            'kop_1' => 'kop_1',
            'kop_2' => 'kop_2',
        ];
    }
}
