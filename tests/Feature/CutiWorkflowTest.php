<?php

namespace Tests\Feature;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CutiWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_submission_saves_the_attachment_to_storage(): void
    {
        Storage::fake('s3');
        $pegawai = User::factory()->create([
            'nip' => '123456789',
            'jabatan' => 'Staf',
        ]);

        $response = $this->post(route('cuti.public.store'), [
            'pegawai_id' => $pegawai->id,
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => now()->addDay()->toDateString(),
            'tanggal_selesai' => now()->addDays(2)->toDateString(),
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'lampiran' => UploadedFile::fake()->create('surat.pdf', 100, 'application/pdf'),
        ]);

        $response->assertSessionHas('success');
        $cuti = Cuti::firstOrFail();
        $this->assertSame('Pending', $cuti->status);
        Storage::disk('s3')->assertExists($cuti->lampiran);
    }

    public function test_status_page_shows_final_decision_without_a_public_attachment_link(): void
    {
        $cuti = Cuti::create([
            'nip' => '123456789',
            'nama_karyawan' => 'Pegawai Test',
            'jabatan' => 'Staf',
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => '2026-10-06',
            'tanggal_selesai' => '2026-10-07',
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'lampiran' => 'lampiran_cuti/surat.pdf',
            'status' => 'Disetujui',
        ]);
        Cuti::create([
            'nip' => '123456789',
            'nama_karyawan' => 'Pegawai Test',
            'jabatan' => 'Staf',
            'kategori_cuti' => 'Cuti Sakit',
            'tanggal_mulai' => '2026-10-08',
            'tanggal_selesai' => '2026-10-09',
            'alasan' => 'Sakit',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'status' => 'Ditolak',
        ]);

        $response = $this->get(route('cuti.public.status', ['nip' => $cuti->nip]));

        $response->assertSee('Pegawai Test');
        $response->assertSee('Cuti Tahunan');
        $response->assertSee('Disetujui');
        $response->assertSee('Ditolak');
        $response->assertDontSee('Lihat Lampiran');
    }

    public function test_admin_attachment_link_redirects_to_the_stored_pdf(): void
    {
        Storage::fake('s3');
        $admin = User::factory()->create(['is_admin' => true]);
        $cuti = Cuti::create([
            'nip' => '123456789',
            'nama_karyawan' => 'Pegawai Test',
            'jabatan' => 'Staf',
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => '2026-10-06',
            'tanggal_selesai' => '2026-10-07',
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'lampiran' => 'lampiran_cuti/surat.pdf',
        ]);
        Storage::disk('s3')->put($cuti->lampiran, '%PDF-1.4 test');

        $response = $this->actingAs($admin)->get(route('cuti.admin.attachment', $cuti));

        $response->assertRedirect();
    }

    public function test_public_users_cannot_access_the_admin_attachment_route(): void
    {
        $cuti = Cuti::create([
            'nip' => '123456789',
            'nama_karyawan' => 'Pegawai Test',
            'jabatan' => 'Staf',
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => '2026-10-06',
            'tanggal_selesai' => '2026-10-07',
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'lampiran' => 'lampiran_cuti/surat.pdf',
        ]);

        $response = $this->get(route('cuti.admin.attachment', $cuti));

        $response->assertRedirectToRoute('admin.login');
    }

    public function test_admin_can_see_and_update_pending_approval_actions(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $cuti = Cuti::create([
            'nip' => '123456789',
            'nama_karyawan' => 'Pegawai Test',
            'jabatan' => 'Staf',
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => '2026-10-06',
            'tanggal_selesai' => '2026-10-07',
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
        ]);

        $indexResponse = $this->actingAs($admin)->get(route('cuti.admin.index'));
        $indexResponse->assertSee('Setujui');
        $indexResponse->assertSee('Tolak');

        $updateResponse = $this->patch(route('cuti.admin.updateStatus', $cuti), [
            'status' => 'Disetujui',
        ]);

        $updateResponse->assertSessionHas('success');
        $this->assertDatabaseHas('cutis', [
            'id' => $cuti->id,
            'status' => 'Disetujui',
        ]);
    }
}
