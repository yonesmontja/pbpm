<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Kelas::class;
    public function definition()
    {
        return [
            'nama' => $this -> faker -> word,
            'level_id' => 1,
            'avatar' => 'photo.png'
        ];
    }
}
