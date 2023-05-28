<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'nama' =>"Budi Hartono",
            'jenis_kelamin' =>"Laki-Laki",
            'contact' =>123456890123,
        ]);
    }
}