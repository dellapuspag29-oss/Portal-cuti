<?php

namespace Tests\Feature;

use App\Exports\CutiExport;
use App\Models\Cuti;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CutiExportTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create(['is_admin' => true]));
    }

    public function test_monthly_export_requires_month_and_year(): void
    {
        $response = $this->get(route('cuti.admin.export'));

        $response->assertSessionHasErrors(['bulan', 'tahun']);
    }

    public function test_monthly_export_returns_an_excel_file(): void
    {
        Cuti::create([
            'nip' => '123456789',
            'nama_karyawan' => 'Pegawai Test',
            'jabatan' => 'Staf',
            'unit_kerja' => 'Unit Test',
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => '2026-09-20',
            'tanggal_selesai' => '2026-09-22',
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'lampiran' => 'lampiran_cuti/test.pdf',
            'status' => 'Pending',
        ]);

        $response = $this->get(route('cuti.admin.export', ['bulan' => 9, 'tahun' => 2026]));

        $response->assertDownload('rekap-cuti-2026-09.xlsx');
    }

    public function test_monthly_export_uses_submission_month_instead_of_leave_start_month(): void
    {
        $submittedInSeptember = Cuti::create([
            'nip' => '123456789',
            'nama_karyawan' => 'Pegawai September',
            'jabatan' => 'Staf',
            'unit_kerja' => 'Unit Test',
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => '2026-10-01',
            'tanggal_selesai' => '2026-10-02',
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'lampiran' => 'lampiran_cuti/test.pdf',
            'status' => 'Pending',
        ]);
        $submittedInSeptember->forceFill([
            'created_at' => Carbon::create(2026, 9, 30, 23, 0, 0, 'Asia/Jakarta'),
        ])->saveQuietly();

        $submittedInOctober = Cuti::create([
            'nip' => '987654321',
            'nama_karyawan' => 'Pegawai Oktober',
            'jabatan' => 'Staf',
            'unit_kerja' => 'Unit Test',
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => '2026-09-30',
            'tanggal_selesai' => '2026-10-01',
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'lampiran' => 'lampiran_cuti/test.pdf',
            'status' => 'Pending',
        ]);
        $submittedInOctober->forceFill([
            'created_at' => Carbon::create(2026, 10, 1, 1, 0, 0, 'Asia/Jakarta'),
        ])->saveQuietly();

        $rows = (new CutiExport(9, 2026))->collection();

        $this->assertTrue($rows->contains('id', $submittedInSeptember->id));
        $this->assertFalse($rows->contains('id', $submittedInOctober->id));
    }
}
