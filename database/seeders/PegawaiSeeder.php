<?php

namespace Database\Seeders;

use App\Imports\PegawaiImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        // Taruh file data_pegawai.xlsx kamu di folder storage/app/
        $filePath = storage_path('app/data_pegawai.xlsx');

        if (file_exists($filePath)) {
            Excel::import(new PegawaiImport, $filePath);
            $this->command->info('349 Data pegawai berhasil diimpor!');
        } else {
            $this->command->error('File data_pegawai.xlsx tidak ditemukan di folder storage/app/');
        }
    }
}
