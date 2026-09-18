<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin - Portal Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="portal-page">
    <main class="admin-login d-flex align-items-center py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-5 col-xl-4">
                    <div class="text-center mb-4">
                        <div class="admin-login-mark mx-auto mb-3">PC</div>
                        <p class="portal-eyebrow mb-2">Portal Cuti</p>
                        <h1 class="h3 fw-bold mb-2">Masuk ke panel admin</h1>
                        <p class="portal-muted mb-0">Kelola pengajuan, approval, dan rekap cuti.</p>
                    </div>

                    <div class="portal-card p-4 p-lg-5">
                        @if ($errors->any())
                            <div class="alert alert-danger d-flex align-items-start gap-2" role="alert">
                                <span aria-hidden="true">!</span>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.login.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email admin</label>
                                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" autocomplete="username" required autofocus>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <input id="password" name="password" type="password" class="form-control" autocomplete="current-password" required>
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-password" aria-label="Tampilkan password">Lihat</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Masuk ke panel</button>
                        </form>
                    </div>

                    <p class="text-center portal-muted small mt-4 mb-0">
                        <a href="{{ route('cuti.public.create') }}" class="portal-login-link">Kembali ke pengajuan cuti</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            togglePassword.textContent = isPassword ? 'Sembunyikan' : 'Lihat';
            togglePassword.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Tampilkan password');
        });
    </script>
</body>
</html>