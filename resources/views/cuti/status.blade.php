<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pengajuan Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="portal-page">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 fw-bold mb-1">Cek status pengajuan</h1>
                        <p class="portal-muted mb-0">Masukkan NIP untuk melihat riwayat pengajuan cuti.</p>
                    </div>
                    <a href="{{ route('cuti.public.create') }}" class="btn btn-outline-secondary px-3">Ajukan Cuti</a>
                </div>

                <div class="portal-card mb-4">
                    <div class="p-3 p-lg-4">
                        <form action="{{ route('cuti.public.status') }}" method="GET" class="row g-3 align-items-end">
                            <div class="col-md-9">
                                <label for="nip_search" class="form-label fw-semibold">Nomor Induk Pegawai (NIP)</label>
                                <input type="text" id="nip_search" name="nip" class="form-control" placeholder="Masukkan NIP Anda..." value="{{ $nipSearched }}" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100 fw-semibold">Cari Pengajuan</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if($nipSearched)
                    <div class="portal-card overflow-hidden">
                        <div class="portal-card-header p-3 p-lg-4">
                            <div class="portal-eyebrow mb-2">Hasil pencarian</div>
                            <h2 class="h5 mb-0">Riwayat NIP: {{ $nipSearched }}</h2>
                        </div>
                        <div class="p-3 p-lg-4">
                            <div class="table-responsive">
                                <table class="table portal-table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Nama Pegawai</th>
                                            <th>Kategori</th>
                                            <th>Unit Kerja</th>
                                            <th>Tanggal Cuti</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($riwayatCuti as $item)
                                            <tr>
                                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                                <td>{{ $item->nama_karyawan }}</td>
                                                <td><span class="badge rounded-pill text-bg-light border">{{ $item->kategori_cuti }}</span></td>
                                                <td>{{ $item->unit_kerja ?? '-' }}</td>
                                                <td>{{ $item->tanggal_mulai }} s/d {{ $item->tanggal_selesai }}</td>
                                                <td>
                                                    @if($item->status == 'Pending')
                                                        <span class="badge portal-status portal-status-pending">Pending</span>
                                                    @elseif($item->status == 'Disetujui')
                                                        <span class="badge portal-status portal-status-approved">Disetujui</span>
                                                    @else
                                                        <span class="badge portal-status portal-status-rejected">Ditolak</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">Tidak ada pengajuan cuti ditemukan untuk NIP ini.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>