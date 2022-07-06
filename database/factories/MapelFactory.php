<?php

namespace Database\Factories;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Factories\Factory;

class MapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Mapel::class;
    public function definition()
    {
        return [

            'kode' => 'mapel1',
            'nama_mapel' => 'Pendidikan Agama Islam dan Budi Pekerti',
            'semester' => 'Genap',
            'guru_id' => 1,
            'kelompok' => 'A',
            'tambahan_sub' => 'KEIMANAN',
            'kd_singkat' => '3.1',
            'is_sikap' => '1',
            'avatar' => 'photo.png'
        ];
    }
}
