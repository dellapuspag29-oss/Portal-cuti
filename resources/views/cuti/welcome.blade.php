<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengajuan Cuti - TALNGATI</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100 d-flex flex-column justify-content-between">

    <!-- Header Navigation -->
    <header class="bg-white border-bottom py-3 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none text-dark gap-2">
                <span class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 40px; height: 40px;">T</span>
                <div>
                    <span class="fw-bold fs-5 d-block leading-none">TALNGATI</span>
                    <small class="text-muted d-block fs-7" style="margin-top: -3px;">Portal Pengajuan Cuti</small>
                </div>
            </a>
            <a href="{{ route('admin.login') }}" class="btn btn-outline-primary btn-sm fw-semibold">Masuk Admin</a>
        </div>
    </header>

    <!-- Main Content Hero -->
    <main class="container my-auto py-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill mb-3">Layanan Pengajuan Cuti Online</span>
                <h1 class="display-5 fw-bold text-dark mb-3">Selamat datang di Portal Pengajuan Cuti</h1>
                <p class="lead text-secondary mb-4">Ajukan cuti kerja dan cek status persetujuan secara cepat, mandiri, dan efisien.</p>
                
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('cuti.public.create') }}" class="btn btn-primary btn-lg px-4 fw-semibold shadow-sm">Mulai Pengajuan Cuti</a>
                    <a href="{{ route('cuti.public.status') }}" class="btn btn-outline-secondary btn-lg px-4 fw-semibold">Lihat Status Pengajuan</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top py-3 text-center text-muted small">
        <div class="container">
            © 2026 Portal Pengajuan Cuti. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>