<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_guru'=>$this->faker->firstName,
            'kode_guru' => $this -> faker -> word,
            'email' => $this -> faker -> email,
            'jk' => 'L',
            'is_bk' => '2',
            'stat_data' => 'A',
            'status' => '1',
            'telpon' => '081285795133',
            'alamat' => $this -> faker -> address,
            'avatar' => $this -> faker -> word,
            'user_id' => $this -> faker -> randomDigitNotNull
        ];
    }
}
