<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil PegawaiSeeder secara otomatis
        $this->call([
            PegawaiSeeder::class,
        ]);
    }
}
