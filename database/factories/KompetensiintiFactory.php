<?php

namespace Database\Factories;

use App\Models\Kompetensiinti;
use Illuminate\Database\Eloquent\Factories\Factory;

class KompetensiintiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Kompetensiinti::class;
    public function definition()
    {
        return [
            'kompetensi_inti' => $this -> faker -> word,
            'ki_domain' => 'Sikap',
            'level' => 'Kelas 1',
            'ki_deskripsi' => 'Kompetensi sikap',
            'id_level' => '1',
            'id_kinti' => '1',

        ];
    }
}
