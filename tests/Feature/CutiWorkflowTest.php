<?php

namespace Tests\Feature;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class CutiWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_submission_saves_the_attachment_to_storage(): void
    {
        config(['filesystems.default' => 's3']);
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

    public function test_status_page_shows_aligned_applicant_details_and_a_signed_attachment_link(): void
    {
        $this->freezeTime();
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
        $attachmentUrl = URL::temporarySignedRoute(
            'cuti.public.attachment',
            now()->addMinutes(30),
            ['cuti' => $cuti],
        );

        $response = $this->get(route('cuti.public.status', ['nip' => $cuti->nip]));

        $response->assertSee('Pegawai Test');
        $response->assertSee('Cuti Tahunan');
        $response->assertSee('Lihat Lampiran');
        $response->assertSee($attachmentUrl);
    }

    public function test_signed_attachment_link_redirects_to_the_stored_pdf(): void
    {
        config(['filesystems.default' => 's3']);
        Storage::fake('s3');
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

        $response = $this->get(URL::temporarySignedRoute(
            'cuti.public.attachment',
            now()->addMinutes(30),
            ['cuti' => $cuti],
        ));

        $response->assertRedirect();
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
