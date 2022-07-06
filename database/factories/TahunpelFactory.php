<?php

namespace Database\Factories;

use App\Models\Tahunpel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TahunpelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Tahunpel::class;
    public function definition()
    {
        return [
            'thn_pel' => '2022',
            'semester' => 'Genap',
            'tahun' => '2022',
            'aktif' => 'Y',
            'nama_kepsek' => 'Merkianus Kasipmabin, S.Pd',
            'kode_kepsek' => '1979 02122006051003',
            'tgl_raport' => $this -> faker -> date(),
            'tgl_raport_kelas3' => $this -> faker -> date(),
        ];
    }
}
