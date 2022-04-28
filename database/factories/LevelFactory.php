<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Level::class;
    public function definition()
    {
        return [
            'level' => $this -> faker -> word,
        ];
    }
}
