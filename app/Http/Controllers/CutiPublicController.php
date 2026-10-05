<?php

namespace App\Http\Controllers;

use App\Exports\CutiExport;
use App\Models\Cuti;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CutiPublicController extends Controller
{
    // Form Pengajuan Publik
    public function create()
    {
        $pegawai = User::query()
            ->whereNotNull('nip')
            ->whereNotNull('jabatan')
            ->orderBy('name')
            ->get(['id', 'nip', 'name', 'jabatan', 'unit_kerja']);

        return view('cuti.create', compact('pegawai'));
    }

    // Simpan Pengajuan
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => ['required', 'integer', 'exists:users,id'],
            'kategori_cuti' => ['required', 'in:Cuti Tahunan,Cuti Sakit,Cuti Melahirkan'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'alasan' => ['required', 'string', 'max:2000'],
            'alamat' => ['required', 'string', 'max:2000'],
            'nomor_telepon' => ['required', 'string', 'max:25', 'regex:/^[0-9+()\\-\\s]+$/'],
            'lampiran' => ['required', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        // Penguncian tanggal di sisi Backend untuk Cuti Tahunan
        if ($request->kategori_cuti === 'Cuti Tahunan') {
            $today = now()->format('Y-m-d');
            if ($request->tanggal_mulai < $today) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['tanggal_mulai' => 'Cuti Tahunan tidak dapat diajukan untuk tanggal di masa lalu.']);
            }
        }

        $pathLampiran = null;

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $namaFile = 'lampiran_cuti/' . uniqid() . '_' . $file->getClientOriginalName();

            Storage::disk('s3')->put(
                $namaFile,
                file_get_contents($file->getRealPath())
            );

            $pathLampiran = $namaFile;
        }

        $pegawai = User::whereNotNull('nip')
            ->whereNotNull('jabatan')
            ->findOrFail($request->pegawai_id);

        Cuti::create([
            'nip' => $pegawai->nip,
            'nama_karyawan' => $pegawai->name,
            'jabatan' => $pegawai->jabatan,
            'unit_kerja' => $pegawai->unit_kerja,
            'kategori_cuti' => $request->kategori_cuti,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'lampiran' => $pathLampiran,
        ]);

        return redirect()->back()->with('success', 'Pengajuan cuti berhasil dikirim! Silakan cek status di menu Cek Status Cuti.');
    }

    // Halaman Cek Status untuk Publik (Berdasarkan NIP)
    public function cekStatus(Request $request)
    {
        $riwayatCuti = collect();
        $validated = $request->validate([
            'nip' => ['nullable', 'string', 'max:50'],
        ]);

        $nipSearched = $validated['nip'] ?? null;

        if ($nipSearched) {
            $riwayatCuti = Cuti::where('nip', $nipSearched)
                ->latest()
                ->get();
        }

        return view('cuti.status', compact('riwayatCuti', 'nipSearched'));
    }

    // Rekap Data Admin (Filter Per Bulan)
    public function index(Request $request)
    {
        $query = Cuti::latest();

        if ($request->filled('bulan') && $request->filled('tahun')) {
            $periodStart = Carbon::create(
                (int) $request->tahun,
                (int) $request->bulan,
                1,
                0,
                0,
                0,
                config('app.timezone')
            );
            $periodEnd = $periodStart->copy()->addMonth();

            $query->where('created_at', '>=', $periodStart->format('Y-m-d H:i:s'))
                ->where('created_at', '<', $periodEnd->format('Y-m-d H:i:s'));
        }

        $daftarCuti = $query->get();

        return view('cuti.index', compact('daftarCuti'));
    }

    public function export(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|digits:4',
        ]);

        $filename = sprintf('rekap-cuti-%04d-%02d.xlsx', $validated['tahun'], $validated['bulan']);

        return Excel::download(
            new CutiExport($validated['bulan'], $validated['tahun']),
            $filename
        );
    }

    // Update Status Approval (Admin)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }

    public function downloadAttachment(Cuti $cuti)
    {
        if (!$cuti->lampiran) {
            return back()->with('error', 'File lampiran tidak ditemukan.');
        }

        $endpoint = rtrim(config('filesystems.disks.s3.endpoint'), '/');
        $bucket = config('filesystems.disks.s3.bucket');

        $publicUrl = sprintf('%s/object/public/%s/%s', $endpoint, $bucket, ltrim($cuti->lampiran, '/'));

        return redirect()->away($publicUrl);
    }
}