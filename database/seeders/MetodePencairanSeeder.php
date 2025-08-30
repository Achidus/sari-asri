<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodePencairanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('metode_pencairan')->truncate(); // kosongkan dulu

        DB::table('metode_pencairan')->insert([
            [
                'nasabah_id' => 1, // boleh kamu sesuaikan
                'nama_metode_pencairan' => 'Transfer',
                'no_rek' => '1234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nasabah_id' => 1, // boleh kamu sesuaikan
                'nama_metode_pencairan' => 'Cash',
                'no_rek' => '-', // tidak perlu isi rekening
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
