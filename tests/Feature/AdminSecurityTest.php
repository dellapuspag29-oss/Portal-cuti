<?php

namespace Tests\Feature;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_admin_data(): void
    {
        $response = $this->get(route('cuti.admin.index'));

        $response->assertRedirectToRoute('admin.login');
    }

    public function test_non_admin_user_cannot_access_admin_data(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('cuti.admin.index'));

        $response->assertForbidden();
    }

    public function test_admin_user_can_access_admin_data(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->get(route('cuti.admin.index'));

        $response->assertOk();
    }

    public function test_status_lookup_uses_nip_only(): void
    {
        Cuti::create([
            'nip' => '123456789',
            'nama_karyawan' => 'Pegawai Test',
            'jabatan' => 'Staf',
            'kategori_cuti' => 'Cuti Tahunan',
            'tanggal_mulai' => '2026-09-20',
            'tanggal_selesai' => '2026-09-22',
            'alasan' => 'Keperluan keluarga',
            'alamat' => 'Alamat test',
            'nomor_telepon' => '08123456789',
            'status' => 'Pending',
        ]);

        $response = $this->get(route('cuti.public.status', ['nip' => '123456789']));

        $response->assertOk();
        $response->assertSee('Cuti Tahunan');
    }
}
