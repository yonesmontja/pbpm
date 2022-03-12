<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $status_keluarga = 'Anak Kandung';
        $OAP = 'OAP';
        $role = 'siswa';
        $agama = 'Islam';
        $user_id = 'user';
        $masuk_kls_awal = 'kelas awal';
        return [
            'nama_depan' => $this->faker->firstName,
            'nama_belakang' => $this->faker->lastName,
            'nis' => $this->faker->randomDigitNotNull,
            'nisn' => $this->faker->randomDigitNotNull,
            'alamat' => $this->faker->address,
            'agama' => $agama,
            'jenis_kelamin' => $gender,
            'user_id' => $user_id,
            'kelas' => $this->faker->company,
            'tempat_lahir'=> $this->faker->city,
            'tgl_lahir'	=> $this->faker->dateTimeThisCentury()->format('Y-m-d'),
            'status_keluarga'=>	$status_keluarga,
            'anak_ke' => $this->faker->randomDigit,
            'pend_sebelum' => $this ->faker->word,
            'masuk_kls_awal' => $masuk_kls_awal,
            'tgl_masuk_awal'=>$this ->faker->date($format = 'Y-m-d', $max = 'now'),
            'nama_ayah' =>$this ->faker->firstNameMale,
            'nik' =>$this -> faker->randomNumber($nbDigits = NULL, $strict = false),
            'nama_ibu' => $this -> faker ->firstNameFemale,
            'pekerjaan_ayah' => $this -> faker -> jobTitle,
            'pekerjaan_ibu' => $this -> faker -> jobTitle,	
            'alamat_ortu' => $this -> faker -> address,
            'nama_wali' =>$this -> faker ->name,
            'pekerjaan_wali' =>$this -> faker ->jobTitle,
            'alamat_wali' => $this -> faker -> address,
            'role' => $role,	
            'siswaOAP' => $OAP,
            'distrik' => $this -> faker -> city,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('rahasia'), // password adalah rahasia
            
        ];
    }
}
