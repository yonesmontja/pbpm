<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pegawai')->insert([
        	'pegawai_nama' => 'Joni',
        	'pegawai_jabatan' => 'Web Designer',
        	'pegawai_umur' => 25,
        	'pegawai_alamat' => 'Jl. Panglateh'
        ]);
    }
}
