<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Project::class;
    public function definition()
    {
        return [
            'nama'=> 'Project 1',
            'status' => '1',
            'progress' => '45',
            'tanggal' => $this ->faker->date('Y-m-d', 'now'),
            'siswa_id' => '1',
            'kelas_id' => '1',
            'penilaian_id' => '1',
            'guru_id' => '1',
            'kompetensiinti_id' => '1',
            'mapel_id' => '1',
        ];
    }
}
