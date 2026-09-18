<?php

namespace App\Exports;

use App\Models\Cuti;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CutiExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    public function __construct(
        private readonly int $bulan,
        private readonly int $tahun,
    ) {}

    public function collection(): Collection
    {
        $periodStart = Carbon::create($this->tahun, $this->bulan, 1, 0, 0, 0, config('app.timezone'));
        $periodEnd = $periodStart->copy()->addMonth();

        return Cuti::query()
            ->where('created_at', '>=', $periodStart->format('Y-m-d H:i:s'))
            ->where('created_at', '<', $periodEnd->format('Y-m-d H:i:s'))
            ->latest()
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIP',
            'Nama',
            'Jabatan',
            'Unit Kerja',
            'Kategori Cuti',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Alasan',
            'Alamat',
            'Nomor Telepon',
            'Lampiran',
            'Status',
            'Waktu Pengajuan',
        ];
    }

    public function map($cuti): array
    {
        return [
            $cuti->id,
            $cuti->nip,
            $cuti->nama_karyawan,
            $cuti->jabatan,
            $cuti->unit_kerja ?? '-',
            $cuti->kategori_cuti,
            $cuti->tanggal_mulai,
            $cuti->tanggal_selesai,
            $cuti->alasan,
            $cuti->alamat,
            $cuti->nomor_telepon,
            $cuti->lampiran ?? '-',
            $cuti->status,
            $cuti->created_at?->timezone('Asia/Jakarta')->format('d/m/Y H:i'),
        ];
    }
}
