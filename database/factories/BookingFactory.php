<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->firstName,
            'start_date' => $this -> faker -> date,
            'end_date' => $this -> faker -> date
        ];
    }
}
