<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="portal-page">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 fw-bold mb-1">Pengajuan cuti</h1>
                    </div>
                    <a href="{{ route('cuti.public.status') }}" class="btn btn-outline-secondary px-3">Cek Status</a>
                </div>

                <div class="portal-card overflow-hidden">
                    <div class="portal-card-header p-3 p-lg-4">
                        <h2 class="h5 mb-1">Formulir pengajuan</h2>
                        <p class="portal-muted small mb-0">Kolom bertanda * wajib diisi sebelum formulir dikirim.</p>
                    </div>
                    <div class="p-3 p-lg-4">

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('cuti.public.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="pegawai_search" class="form-label fw-semibold">Cari Pegawai <span class="text-danger">*</span></label>
                                <input type="search" id="pegawai_search" class="form-control" placeholder="Ketik nama atau NIP pegawai..." autocomplete="off">
                                <input type="hidden" name="pegawai_id" id="pegawai_id" value="{{ old('pegawai_id') }}">
                                <div id="pegawai_results" class="portal-search-result list-group mt-2"></div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label for="nip" class="form-label fw-semibold">NIP</label>
                                    <input type="text" id="nip" class="form-control bg-light" value="{{ old('nip') }}" readonly required>
                                </div>
                                <div class="col-md-3">
                                    <label for="nama_karyawan" class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" id="nama_karyawan" class="form-control bg-light" value="{{ old('nama_karyawan') }}" readonly required>
                                </div>
                                <div class="col-md-3">
                                    <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
                                    <input type="text" id="jabatan" class="form-control bg-light" value="{{ old('jabatan') }}" readonly required>
                                </div>
                                <div class="col-md-3">
                                    <label for="unit_kerja" class="form-label fw-semibold">Unit Kerja</label>
                                    <input type="text" id="unit_kerja" class="form-control bg-light" value="{{ old('unit_kerja') }}" readonly required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="kategori_cuti" class="form-label fw-semibold">Kategori Cuti <span class="text-danger">*</span></label>
                                <select name="kategori_cuti" id="kategori_cuti" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Cuti Tahunan" {{ old('kategori_cuti') == 'Cuti Tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                                    <option value="Cuti Sakit" {{ old('kategori_cuti') == 'Cuti Sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                                    <option value="Cuti Melahirkan" {{ old('kategori_cuti') == 'Cuti Melahirkan' ? 'selected' : '' }}>Cuti Melahirkan</option>
                                </select>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_mulai" class="form-label fw-semibold">Tanggal Mulai <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_selesai" class="form-label fw-semibold">Tanggal Selesai <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="alasan" class="form-label fw-semibold">Alasan Cuti <span class="text-danger">*</span></label>
                                <textarea name="alasan" id="alasan" class="form-control" rows="2" required>{{ old('alasan') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label fw-semibold">Alamat Selama Menjalankan Cuti <span class="text-danger">*</span></label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label fw-semibold">Nomor Telepon / WhatsApp Yang Aktif <span class="text-danger">*</span></label>
                                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}" placeholder="08xxxxxxxxxx" required>
                            </div>

                            <div class="mb-3">
                                <label for="lampiran" class="form-label fw-semibold">Lampiran Bukti <span class="text-danger">*</span> <span class="portal-muted fw-normal">(PDF, maksimal 2 MB)</span></label>
                                <input type="file" name="lampiran" id="lampiran" class="form-control" accept="application/pdf" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Kirim Pengajuan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const pegawai = @json($pegawai);
        const searchInput = document.getElementById('pegawai_search');
        const results = document.getElementById('pegawai_results');
        const pegawaiId = document.getElementById('pegawai_id');
        const nipInput = document.getElementById('nip');
        const namaInput = document.getElementById('nama_karyawan');
        const jabatanInput = document.getElementById('jabatan');
        const unitKerjaInput = document.getElementById('unit_kerja');

        function tampilkanHasil(keyword = '') {
            const query = keyword.trim().toLowerCase();
            if(!query) { results.innerHTML = ''; return; }
            const cocok = pegawai.filter((item) =>
                item.name.toLowerCase().includes(query) || item.nip.toLowerCase().includes(query)
            ).slice(0, 8);

            results.innerHTML = '';
            cocok.forEach((item) => {
                const pilihan = document.createElement('button');
                pilihan.type = 'button';
                pilihan.className = 'list-group-item list-group-item-action';
                const nama = document.createElement('strong');
                nama.textContent = item.name;
                const detail = document.createElement('small');
                detail.className = 'text-muted';
                detail.textContent = `${item.nip} - ${item.jabatan} - ${item.unit_kerja ?? '-'}`;
                pilihan.append(nama, document.createElement('br'), detail);
                pilihan.addEventListener('click', () => {
                    pegawaiId.value = item.id;
                    searchInput.value = item.name;
                    nipInput.value = item.nip;
                    namaInput.value = item.name;
                    jabatanInput.value = item.jabatan;
                    unitKerjaInput.value = item.unit_kerja ?? '-';
                    results.innerHTML = '';
                });
                results.appendChild(pilihan);
            });
        }

        searchInput.addEventListener('input', () => tampilkanHasil(searchInput.value));

        // Logic Penguncian Tanggal Berdasarkan Kategori
        const kategoriSelect = document.getElementById('kategori_cuti');
        const tglMulaiInput = document.getElementById('tanggal_mulai');
        const today = new Date().toISOString().split('T')[0];

        kategoriSelect.addEventListener('change', function() {
            if (this.value === 'Cuti Tahunan') {
                tglMulaiInput.setAttribute('min', today);
            } else {
                tglMulaiInput.removeAttribute('min');
            }
        });
    </script>
</body>
</html>