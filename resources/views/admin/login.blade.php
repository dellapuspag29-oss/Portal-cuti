<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin - Portal Cuti</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100 d-flex align-items-center">
    <main class="w-100 py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-5 col-xl-4">
                    
                    <!-- Header Logo & Title -->
                    <div class="text-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm" style="width: 56px; height: 56px; font-weight: bold; font-size: 1.2rem;">
                            PC
                        </div>
                        <p class="text-uppercase text-primary fw-bold small tracking-wide mb-1">Portal Cuti</p>
                        <h1 class="h3 fw-bold mb-2 text-dark">Masuk ke panel admin</h1>
                        <p class="text-muted small mb-0">Kelola pengajuan, approval, dan rekap cuti.</p>
                    </div>

                    <!-- Form Card -->
                    <div class="card border-0 shadow-sm rounded-4 p-3 p-lg-4">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-3" role="alert">
                                    <span class="fw-bold">!</span>
                                    <div>{{ $errors->first() }}</div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.login.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold small text-secondary">Email admin</label>
                                    <input id="email" name="email" type="email" class="form-control form-control-lg fs-6" value="{{ old('email') }}" autocomplete="username" required autofocus placeholder="admin@domain.com">
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold small text-secondary">Password</label>
                                    <div class="input-group">
                                        <input id="password" name="password" type="password" class="form-control form-control-lg fs-6" autocomplete="current-password" required placeholder="••••••••">
                                        <button type="button" class="btn btn-outline-secondary px-3" id="toggle-password" aria-label="Tampilkan password">Lihat</button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg w-100 fs-6 fw-semibold shadow-sm">Masuk ke panel</button>
                            </form>
                        </div>
                    </div>

                    <!-- Footer Link -->
                    <p class="text-center text-muted small mt-4 mb-0">
                        <a href="{{ route('cuti.public.create') }}" class="text-decoration-none text-secondary hover-underline">← Kembali ke pengajuan cuti</a>
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