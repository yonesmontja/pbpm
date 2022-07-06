<?php

namespace Database\Factories;

use App\Models\Nilai;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Nilai::class;
    public function definition()
    {
        return [
            'nilai_start' => '2021',
            'nilai_end' => '2022',
            'nilai_deskripsi' => $this->faker->word,
            'nilai_notes' => $this->faker->word,
            'kompetensi_inti_id' => '1',
            'mapel_id' => '1',
            'penilaian_id' => '2',
            'guru_id' => '1',
            'siswa_id' => '1',
            'kelas_id' => '1',
            'nilai' => '90',

        ];
    }
}
