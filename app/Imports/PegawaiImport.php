<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PegawaiImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?Model
    {
        // Berhenti jika baris kosong / NIP tidak ada
        if (empty($row['nip']) || empty($row['nama'])) {
            return null;
        }

        $nip = (string) $row['nip'];

        return User::updateOrCreate(
            ['nip' => $nip],
            [
                'name' => $row['nama'],
                'email' => $nip.'@portalcuti.local',
                'password' => Hash::make('password123'),
                'jabatan' => $row['jabatan'] ?? '-',
                'unit_kerja' => $row['unit_kerja'] ?? '-',
            ],
        );
    }
}
