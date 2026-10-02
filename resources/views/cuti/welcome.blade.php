<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f3f6f1">
    <title>Portal Pengajuan Cuti</title>
    @vite(['resources/css/app.css'])
</head>
<body class="welcome-page">
    <div class="welcome-shell">
        <header class="welcome-header">
            <a href="{{ url('/') }}" class="welcome-brand" aria-label="TALNGATI, portal pengajuan cuti, beranda">
                <span class="welcome-brand-mark" aria-hidden="true">T</span>
                <span class="welcome-brand-copy">
                    <span class="welcome-brand-name">TALNGATI</span>
                    <span class="welcome-brand-caption">Portal Pengajuan Cuti</span>
                </span>
            </a>
        </header>

        <main class="welcome-main">
            <section class="welcome-copy" aria-labelledby="welcome-title">
                <h1 id="welcome-title" class="welcome-title">Selamat datang di Portal Pengajuan Cuti</h1>
                <div class="welcome-actions">
                    <a href="{{ route('cuti.public.create') }}" class="welcome-primary-link">Mulai pengajuan</a>
                    <a href="{{ route('cuti.public.status') }}" class="welcome-secondary-link">Lihat status pengajuan</a>
                </div>
            </section>
        </main>

        <footer class="welcome-footer">© 2026 Portal Pengajuan Cuti. All rights reserved.</footer>
    </div>
</body>
</html>
