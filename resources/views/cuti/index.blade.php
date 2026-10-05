<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Pengajuan Cuti - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="portal-page">
    <div class="container-fluid px-3 px-lg-4 py-4 py-lg-5">
        <div class="portal-shell">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h1 class="h3 fw-bold mb-1">Rekap pengajuan cuti</h1>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('cuti.public.create') }}" class="btn btn-primary px-3" target="_blank">Buka Form Publik</a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary px-3">Keluar</button>
                    </form>
                </div>
            </div>

            <div class="portal-card overflow-hidden">
                <div class="portal-card-header d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 p-3 p-lg-4">
                    <div>
                        <h2 class="h5 mb-1">Daftar pengajuan</h2>
                    </div>
                    <span class="badge rounded-pill text-bg-light border px-3 py-2">{{ $daftarCuti->count() }} data</span>
                </div>
                <div class="p-3 p-lg-4">

                    <form action="{{ route('cuti.admin.index') }}" method="GET" class="row g-3 align-items-end mb-4">
                        <div class="col-sm-5 col-md-3">
                            <label for="bulan" class="form-label fw-semibold">Bulan</label>
                            <select name="bulan" id="bulan" class="form-select">
                                <option value="">Semua bulan</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}" {{ (string) request('bulan') === (string) $month ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5 col-md-3">
                            <label for="tahun" class="form-label fw-semibold">Tahun</label>
                            <input type="number" name="tahun" id="tahun" class="form-control" value="{{ request('tahun') }}" min="2000" max="2100" placeholder="Contoh: 2026">
                        </div>
                        <div class="col-sm-2 col-md-auto">
                            <button type="submit" class="btn btn-outline-secondary w-100">Tampilkan</button>
                        </div>
                        <div class="col-sm-12 col-md-auto ms-md-auto">
                            <button type="submit" formaction="{{ route('cuti.admin.export') }}" class="btn btn-primary w-100" {{ request('bulan') && request('tahun') ? '' : 'disabled' }}>Unduh Excel Bulanan</button>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table portal-table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Nomor HP/WhatsApp</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Alasan</th>
                                    <th>Lampiran</th>
                                    <th class="text-center">Aksi Approval</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($daftarCuti as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nip }}</td>
                                        <td>{{ $item->nama_karyawan }}</td>
                                        <td>{{ $item->nomor_telepon }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->unit_kerja ?? '-' }}</td>
                                        <td><span class="badge rounded-pill text-bg-light border">{{ $item->kategori_cuti }}</span></td>
                                        <td>
                                            <small>
                                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d/m/Y') }} s/d <br> 
                                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}
                                            </small>
                                        </td>
                                        <td>{{ $item->alasan }}</td>
                                        <td>
                                            @if($item->lampiran)
                                                <a href="{{ route('cuti.admin.attachment', $item->id) }}" target="_blank" class="btn btn-sm btn-outline-secondary">Lihat Lampiran</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="cuti-admin-actions text-center">
                                            @if($item->status == 'Disetujui')
                                                <span class="badge portal-status portal-status-approved bg-success">Disetujui</span>
                                            @elseif($item->status == 'Ditolak')
                                                <span class="badge portal-status portal-status-rejected bg-danger">Ditolak</span>
                                            @else
                                                <div class="d-flex flex-column flex-lg-row gap-2 justify-content-center">
                                                    {{-- Tombol Approve --}}
                                                    <form action="{{ route('cuti.admin.updateStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="Disetujui">
                                                        <button type="submit" class="btn btn-sm btn-success px-3">Setujui</button>
                                                    </form>

                                                    {{-- Tombol Reject --}}
                                                    <form action="{{ route('cuti.admin.updateStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="Ditolak">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger px-3">Tolak</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center text-muted">Belum ada pengajuan cuti yang masuk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>