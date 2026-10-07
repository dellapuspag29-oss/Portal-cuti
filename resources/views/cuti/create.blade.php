<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengajuan Cuti | TALNGATI</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green-dark: #173F3A;
            --green: #315C4B;
            --green-main: #2F8064;
            --green-light: #EAF4EF;

            --orange: #E39B3B;
            --orange-light: #FFF4DF;

            --cream: #F7F8F4;
            --white: #FFFFFF;

            --text: #25332E;
            --muted: #75817C;
            --border: #DDE5E0;

            --danger: #D9534F;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--cream);
            color: var(--text);
            min-height: 100vh;
        }

        /* =========================================================
           PAGE
        ========================================================= */

        .page {
            min-height: 100vh;
            display: flex;
        }

        /* =========================================================
           SIDEBAR
        ========================================================= */

        .sidebar {
            width: 270px;
            min-height: 100vh;
            background: var(--green-dark);
            color: white;
            padding: 32px 24px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 20;

            animation: sidebarIn .7s ease both;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 45px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-dark);
            font-weight: 800;
            font-size: 18px;
        }

        .brand-text strong {
            display: block;
            font-size: 20px;
            letter-spacing: .5px;
        }

        .brand-text span {
            font-size: 11px;
            opacity: .65;
        }

        .sidebar-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            opacity: .5;
            margin-bottom: 24px;
        }

        .steps {
            position: relative;
        }

        .steps::before {
            content: "";
            position: absolute;
            left: 17px;
            top: 18px;
            bottom: 35px;
            width: 2px;
            background: rgba(255,255,255,.15);
        }

        .step {
            position: relative;
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            opacity: .45;
            transition: .3s ease;
        }

        .step.active,
        .step.completed {
            opacity: 1;
        }

        .step-number {
            width: 36px;
            height: 36px;
            flex: 0 0 36px;
            border-radius: 50%;
            background: rgba(255,255,255,.10);
            border: 2px solid rgba(255,255,255,.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
            z-index: 2;
            transition: .3s ease;
        }

        .step.active .step-number {
            background: var(--orange);
            border-color: var(--orange);
            color: var(--green-dark);
            box-shadow: 0 0 0 6px rgba(227,155,59,.13);
        }

        .step.completed .step-number {
            background: var(--green-main);
            border-color: var(--green-main);
        }

        .step-info strong {
            display: block;
            font-size: 14px;
            margin-top: 1px;
        }

        .step-info span {
            display: block;
            font-size: 11px;
            margin-top: 4px;
            opacity: .55;
            line-height: 1.4;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
            border-top: 1px solid rgba(255,255,255,.12);
        }

        .back-home {
            display: flex;
            align-items: center;
            gap: 9px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            opacity: .7;
            transition: .25s;
        }

        .back-home:hover {
            opacity: 1;
            transform: translateX(-3px);
        }

        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            width: calc(100% - 270px);
            margin-left: 270px;
            padding: 42px 50px 60px;
        }

        .topbar {
            max-width: 1050px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;

            animation: fadeDown .6s ease both;
        }

        .page-heading h1 {
            color: var(--green-dark);
            font-size: 28px;
            margin-bottom: 6px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 14px;
        }

        .secure-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid var(--border);
            padding: 9px 14px;
            border-radius: 30px;
            font-size: 12px;
            color: var(--green);
            box-shadow: 0 5px 15px rgba(23,63,58,.04);
        }

        .secure-dot {
            width: 8px;
            height: 8px;
            background: #43A879;
            border-radius: 50%;
        }

        /* =========================================================
           FORM CARD
        ========================================================= */

        .form-card {
            max-width: 1050px;
            margin: auto;
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 18px 45px rgba(23,63,58,.07);
            overflow: hidden;

            animation: cardIn .7s .12s ease both;
        }

        .card-header {
            padding: 24px 30px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-icon {
            width: 46px;
            height: 46px;
            background: var(--green-light);
            color: var(--green-main);
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-icon svg {
            width: 22px;
            height: 22px;
        }

        .card-header h2 {
            font-size: 17px;
            color: var(--green-dark);
        }

        .card-header p {
            font-size: 12px;
            color: var(--muted);
            margin-top: 4px;
        }

        .form-body {
            padding: 30px;
        }

        /* =========================================================
           SECTION
        ========================================================= */

        .form-section {
            margin-bottom: 32px;
            animation: sectionIn .55s ease both;
        }

        .form-section:nth-child(2) {
            animation-delay: .08s;
        }

        .form-section:nth-child(3) {
            animation-delay: .16s;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .section-number {
            width: 27px;
            height: 27px;
            border-radius: 8px;
            background: var(--green-dark);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }

        .section-title h3 {
            color: var(--green-dark);
            font-size: 15px;
        }

        .section-line {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* =========================================================
           GRID
        ========================================================= */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 12px;
            font-weight: 700;
            color: #43524C;
            margin-bottom: 8px;
        }

        label span {
            color: var(--danger);
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid var(--border);
            background: #FBFCFA;
            border-radius: 11px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 13px;
            color: var(--text);
            outline: none;
            transition: .25s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #A7B0AC;
        }

        input:hover,
        select:hover,
        textarea:hover {
            border-color: #B8C9C0;
        }

        input:focus,
        select:focus,
        textarea:focus {
            background: white;
            border-color: var(--green-main);
            box-shadow: 0 0 0 4px rgba(47,128,100,.10);
            transform: translateY(-1px);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
            line-height: 1.6;
        }

        input[readonly] {
            background: #F1F5F2;
            color: #65726D;
            cursor: default;
        }

        .input-hint {
            font-size: 10px;
            color: var(--muted);
            margin-top: 6px;
        }

        /* =========================================================
           SEARCH PEGAWAI
        ========================================================= */

        .search-box {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            width: 17px;
            height: 17px;
            color: #89958F;
            pointer-events: none;
        }

        .search-box input {
            padding-left: 40px;
        }

        .pegawai-results {
            position: absolute;
            z-index: 50;
            left: 0;
            right: 0;
            top: calc(100% + 7px);
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(23,63,58,.14);
            overflow: hidden;
            display: none;
            max-height: 240px;
            overflow-y: auto;
        }

        .pegawai-results.show {
            display: block;
            animation: dropdownIn .2s ease;
        }

        .pegawai-item {
            padding: 12px 14px;
            border-bottom: 1px solid #EEF2EF;
            cursor: pointer;
            transition: .2s;
        }

        .pegawai-item:last-child {
            border-bottom: 0;
        }

        .pegawai-item:hover {
            background: var(--green-light);
        }

        .pegawai-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--green-dark);
        }

        .pegawai-meta {
            font-size: 11px;
            color: var(--muted);
            margin-top: 3px;
        }

        .empty-result {
            padding: 18px;
            text-align: center;
            color: var(--muted);
            font-size: 12px;
        }

        /* =========================================================
           FILE
        ========================================================= */

        .file-box {
            border: 1.5px dashed #C7D5CD;
            background: #FAFCFA;
            border-radius: 13px;
            padding: 20px;
            transition: .25s;
            cursor: pointer;
        }

        .file-box:hover {
            border-color: var(--green-main);
            background: var(--green-light);
        }

        .file-box input {
            border: 0;
            padding: 0;
            background: transparent;
            box-shadow: none;
        }

        .file-note {
            font-size: 10px;
            color: var(--muted);
            margin-top: 8px;
        }

        /* =========================================================
           NOTICE
        ========================================================= */

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: var(--orange-light);
            border: 1px solid #F3D59F;
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 25px;
        }

        .notice-icon {
            width: 27px;
            height: 27px;
            min-width: 27px;
            background: var(--orange);
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 13px;
        }

        .notice p {
            font-size: 11px;
            color: #725329;
            line-height: 1.6;
        }

        /* =========================================================
           FOOTER ACTION
        ========================================================= */

        .form-actions {
            border-top: 1px solid var(--border);
            margin: 0 -30px -30px;
            padding: 22px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #FBFCFA;
        }

        .required-note {
            font-size: 11px;
            color: var(--muted);
        }

        .required-note span {
            color: var(--danger);
        }

        .actions-right {
            display: flex;
            gap: 10px;
        }

        .btn {
            border: 0;
            border-radius: 10px;
            padding: 12px 20px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: .25s ease;
        }

        .btn-secondary {
            background: white;
            border: 1px solid var(--border);
            color: var(--green);
        }

        .btn-secondary:hover {
            border-color: var(--green);
            transform: translateY(-2px);
        }

        .btn-primary {
            background: var(--green-main);
            color: white;
            box-shadow: 0 7px 18px rgba(47,128,100,.20);
        }

        .btn-primary:hover {
            background: var(--green-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 23px rgba(47,128,100,.25);
        }

        .btn-primary.loading {
            pointer-events: none;
            opacity: .7;
        }

        .btn-primary.loading::after {
            content: "";
            width: 12px;
            height: 12px;
            border: 2px solid rgba(255,255,255,.4);
            border-top-color: white;
            border-radius: 50%;
            display: inline-block;
            margin-left: 8px;
            vertical-align: -2px;
            animation: spin .7s linear infinite;
        }

        /* =========================================================
           ERROR
        ========================================================= */

        .alert-error {
            background: #FFF0EF;
            border: 1px solid #F0C2BF;
            color: #9E3834;
            border-radius: 11px;
            padding: 13px 15px;
            margin-bottom: 25px;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-error ul {
            padding-left: 18px;
            margin-top: 6px;
        }

        /* =========================================================
           ANIMATION
        ========================================================= */

        @keyframes sidebarIn {
            from {
                opacity: 0;
                transform: translateX(-25px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes sectionIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes dropdownIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .main {
                width: calc(100% - 220px);
                margin-left: 220px;
                padding: 30px 25px 45px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }

        @media (max-width: 700px) {

            .page {
                display: block;
            }

            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                padding: 18px 20px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .sidebar-title {
                display: none;
            }

            .steps {
                display: flex;
                gap: 8px;
            }

            .steps::before {
                display: none;
            }

            .step {
                flex: 1;
                margin: 0;
                gap: 7px;
            }

            .step-number {
                width: 30px;
                height: 30px;
                flex: 0 0 30px;
                font-size: 11px;
            }

            .step-info strong {
                font-size: 10px;
            }

            .step-info span {
                display: none;
            }

            .sidebar-bottom {
                display: none;
            }

            .main {
                width: 100%;
                margin-left: 0;
                padding: 25px 15px 40px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
            }

            .page-heading h1 {
                font-size: 23px;
            }

            .secure-badge {
                display: none;
            }

            .card-header,
            .form-body {
                padding: 20px;
            }

            .form-actions {
                margin: 0 -20px -20px;
                padding: 18px 20px;
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .actions-right {
                width: 100%;
            }

            .actions-right .btn {
                flex: 1;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-logo">T</div>

            <div class="brand-text">
                <strong>TALNGATI</strong>
                <span>Portal Pengajuan Cuti</span>
            </div>
        </div>

        <div class="sidebar-title">
            Proses Pengajuan
        </div>

        <div class="steps">

            <div class="step active" id="step1">
                <div class="step-number">1</div>

                <div class="step-info">
                    <strong>Data Pegawai</strong>
                    <span>Identitas pemohon</span>
                </div>
            </div>

            <div class="step" id="step2">
                <div class="step-number">2</div>

                <div class="step-info">
                    <strong>Detail Cuti</strong>
                    <span>Jenis dan periode cuti</span>
                </div>
            </div>

            <div class="step" id="step3">
                <div class="step-number">3</div>

                <div class="step-info">
                    <strong>Lampiran</strong>
                    <span>Dokumen pendukung</span>
                </div>
            </div>

        </div>

        <div class="sidebar-bottom">

            <a href="{{ url('/') }}" class="back-home">
                ← Kembali ke halaman utama
            </a>

        </div>

    </aside>


    <!-- =========================================================
         MAIN
    ========================================================== -->

    <main class="main">

        <div class="topbar">

            <div class="page-heading">
                <h1>Form Pengajuan Cuti</h1>
                <p>Lengkapi data berikut dengan benar sebelum mengirim pengajuan.</p>
            </div>

            <div class="secure-badge">
                <span class="secure-dot"></span>
                Data aman & terenkripsi
            </div>

        </div>


        <form
            action="{{ route('cuti.public.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-card"
            id="cutiForm"
        >

            @csrf

            <!-- HEADER -->

            <div class="card-header">

                <div class="header-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>

                <div>
                    <h2>Data Pengajuan</h2>
                    <p>Pastikan seluruh informasi yang dimasukkan sudah sesuai.</p>
                </div>

            </div>


            <div class="form-body">

                <!-- ERROR -->

                @if ($errors->any())

                    <div class="alert-error">

                        <strong>Pengajuan belum dapat dikirim.</strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif


                <!-- NOTICE -->

                <div class="notice">

                    <div class="notice-icon">!</div>

                    <p>
                        Silakan periksa kembali data pegawai, periode cuti,
                        alasan, dan dokumen pendukung sebelum mengirim pengajuan.
                    </p>

                </div>


                <!-- =================================================
                     SECTION 1
                ================================================== -->

                <section class="form-section">

                    <div class="section-title">

                        <div class="section-number">01</div>

                        <h3>Data Pegawai</h3>

                        <div class="section-line"></div>

                    </div>


                    <div class="form-grid">

                        <!-- SEARCH -->

                        <div class="form-group full">

                            <label>
                                Cari Nama Pegawai <span>*</span>
                            </label>

                            <div class="search-box">

                                <svg class="search-icon"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round">

                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>

                                </svg>

                                <input
                                    type="text"
                                    id="pegawai_search"
                                    name="pegawai_search"
                                    placeholder="Ketik nama atau NIP pegawai..."
                                    autocomplete="off"
                                >

                                <div
                                    class="pegawai-results"
                                    id="pegawaiResults"
                                ></div>

                            </div>

                            <div class="input-hint">
                                Pilih pegawai dari hasil pencarian yang tersedia.
                            </div>

                        </div>


                        <input
                            type="hidden"
                            name="pegawai_id"
                            id="pegawai_id"
                            value="{{ old('pegawai_id') }}"
                        >


                        <!-- NIP -->

                        <div class="form-group">

                            <label>NIP</label>

                            <input
                                type="text"
                                id="nip"
                                name="nip"
                                value="{{ old('nip') }}"
                                readonly
                            >

                        </div>


                        <!-- NAMA -->

                        <div class="form-group">

                            <label>Nama Pegawai</label>

                            <input
                                type="text"
                                id="nama_karyawan"
                                name="nama_karyawan"
                                value="{{ old('nama_karyawan') }}"
                                readonly
                            >

                        </div>


                        <!-- JABATAN -->

                        <div class="form-group">

                            <label>Jabatan</label>

                            <input
                                type="text"
                                id="jabatan"
                                name="jabatan"
                                value="{{ old('jabatan') }}"
                                readonly
                            >

                        </div>


                        <!-- UNIT -->

                        <div class="form-group">

                            <label>Unit Kerja</label>

                            <input
                                type="text"
                                id="unit_kerja"
                                name="unit_kerja"
                                value="{{ old('unit_kerja') }}"
                                readonly
                            >

                        </div>

                    </div>

                </section>


                <!-- =================================================
                     SECTION 2
                ================================================== -->

                <section class="form-section">

                    <div class="section-title">

                        <div class="section-number">02</div>

                        <h3>Detail Cuti</h3>

                        <div class="section-line"></div>

                    </div>


                    <div class="form-grid">

                        <!-- KATEGORI -->

                        <div class="form-group full">

                            <label>
                                Kategori Cuti <span>*</span>
                            </label>

                            <select name="kategori_cuti" required>

                                <option value="">
                                    — Pilih kategori cuti —
                                </option>

                                <option value="Cuti Tahunan"
                                    {{ old('kategori_cuti') == 'Cuti Tahunan' ? 'selected' : '' }}>
                                    Cuti Tahunan
                                </option>

                                <option value="Cuti Sakit"
                                    {{ old('kategori_cuti') == 'Cuti Sakit' ? 'selected' : '' }}>
                                    Cuti Sakit
                                </option>

                                <option value="Cuti Melahirkan"
                                    {{ old('kategori_cuti') == 'Cuti Melahirkan' ? 'selected' : '' }}>
                                    Cuti Melahirkan
                                </option>

                                <option value="Cuti Alasan Penting"
                                    {{ old('kategori_cuti') == 'Cuti Alasan Penting' ? 'selected' : '' }}>
                                    Cuti Alasan Penting
                                </option>

                                <option value="Cuti Besar"
                                    {{ old('kategori_cuti') == 'Cuti Besar' ? 'selected' : '' }}>
                                    Cuti Besar
                                </option>

                            </select>

                        </div>


                        <!-- TANGGAL MULAI -->

                        <div class="form-group">

                            <label>
                                Tanggal Mulai <span>*</span>
                            </label>

                            <input
                                type="date"
                                name="tanggal_mulai"
                                id="tanggal_mulai"
                                value="{{ old('tanggal_mulai') }}"
                                required
                            >

                        </div>


                        <!-- TANGGAL SELESAI -->

                        <div class="form-group">

                            <label>
                                Tanggal Selesai <span>*</span>
                            </label>

                            <input
                                type="date"
                                name="tanggal_selesai"
                                id="tanggal_selesai"
                                value="{{ old('tanggal_selesai') }}"
                                required
                            >

                        </div>


                        <!-- ALASAN -->

                        <div class="form-group full">

                            <label>
                                Alasan Pengajuan Cuti <span>*</span>
                            </label>

                            <textarea
                                name="alasan"
                                placeholder="Jelaskan alasan pengajuan cuti..."
                                required
                            >{{ old('alasan') }}</textarea>

                        </div>


                        <!-- ALAMAT -->

                        <div class="form-group">

                            <label>
                                Alamat Selama Cuti <span>*</span>
                            </label>

                            <textarea
                                name="alamat"
                                placeholder="Masukkan alamat selama menjalani cuti..."
                                required
                            >{{ old('alamat') }}</textarea>

                        </div>


                        <!-- TELEPON -->

                        <div class="form-group">

                            <label>
                                Nomor Telepon <span>*</span>
                            </label>

                            <input
                                type="tel"
                                name="nomor_telepon"
                                value="{{ old('nomor_telepon') }}"
                                placeholder="Contoh: 081234567890"
                                required
                            >

                            <div class="input-hint">
                                Nomor yang dapat dihubungi selama cuti.
                            </div>

                        </div>

                    </div>

                </section>


                <!-- =================================================
                     SECTION 3
                ================================================== -->

                <section class="form-section">

                    <div class="section-title">

                        <div class="section-number">03</div>

                        <h3>Dokumen Pendukung</h3>

                        <div class="section-line"></div>

                    </div>


                    <div class="form-grid">

                        <div class="form-group full">

                            <label>Lampiran</label>

                            <div class="file-box">

                                <input
                                    type="file"
                                    name="lampiran"
                                    id="lampiran"
                                    accept=".pdf,.jpg,.jpeg,.png"
                                >

                                <div class="file-note">
                                    Format yang diperbolehkan: PDF, JPG, JPEG, PNG.
                                </div>

                            </div>

                        </div>

                    </div>

                </section>


                <!-- ACTION -->

                <div class="form-actions">

                    <div class="required-note">
                        <span>*</span> Wajib diisi
                    </div>

                    <div class="actions-right">

                        <a
                            href="{{ route('cuti.public.status') }}"
                            class="btn btn-secondary"
                        >
                            Cek Status
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                            id="submitBtn"
                        >
                            Kirim Pengajuan →
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </main>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | DATA PEGAWAI
    |--------------------------------------------------------------------------
    */

    const pegawaiData = @json($pegawai ?? []);


    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const searchInput = document.getElementById('pegawai_search');
    const resultsBox = document.getElementById('pegawaiResults');

    const pegawaiId = document.getElementById('pegawai_id');
    const nipInput = document.getElementById('nip');
    const namaInput = document.getElementById('nama_karyawan');
    const jabatanInput = document.getElementById('jabatan');
    const unitInput = document.getElementById('unit_kerja');


    /*
    |--------------------------------------------------------------------------
    | SEARCH PEGAWAI
    |--------------------------------------------------------------------------
    */

    searchInput.addEventListener('input', function () {

        const keyword = this.value
            .toLowerCase()
            .trim();

        resultsBox.innerHTML = '';

        if (!keyword) {
            resultsBox.classList.remove('show');
            return;
        }


        const filtered = pegawaiData.filter(function (pegawai) {

            const nama = String(
                pegawai.nama ??
                pegawai.name ??
                ''
            ).toLowerCase();

            const nip = String(
                pegawai.nip ??
                ''
            ).toLowerCase();

            return nama.includes(keyword) ||
                   nip.includes(keyword);

        }).slice(0, 10);


        if (filtered.length === 0) {

            resultsBox.innerHTML = `
                <div class="empty-result">
                    Pegawai tidak ditemukan.
                </div>
            `;

            resultsBox.classList.add('show');

            return;
        }


        filtered.forEach(function (pegawai) {

            const nama =
                pegawai.nama ??
                pegawai.name ??
                '-';

            const nip =
                pegawai.nip ??
                '-';

            const jabatan =
                pegawai.jabatan ??
                '-';

            const unit =
                pegawai.unit_kerja ??
                '-';


            const item = document.createElement('div');

            item.className = 'pegawai-item';

            item.innerHTML = `
                <div class="pegawai-name">
                    ${escapeHtml(nama)}
                </div>

                <div class="pegawai-meta">
                    ${escapeHtml(nip)} ·
                    ${escapeHtml(jabatan)}
                </div>
            `;


            item.addEventListener('click', function () {

                pegawaiId.value =
                    pegawai.id ?? '';

                searchInput.value = nama;

                nipInput.value = nip;

                namaInput.value = nama;

                jabatanInput.value = jabatan;

                unitInput.value = unit;

                resultsBox.classList.remove('show');

                updateSteps();

            });


            resultsBox.appendChild(item);

        });


        resultsBox.classList.add('show');

    });


    /*
    |--------------------------------------------------------------------------
    | CLICK OUTSIDE SEARCH
    |--------------------------------------------------------------------------
    */

    document.addEventListener('click', function (event) {

        if (!event.target.closest('.search-box')) {
            resultsBox.classList.remove('show');
        }

    });


    /*
    |--------------------------------------------------------------------------
    | DATE VALIDATION
    |--------------------------------------------------------------------------
    */

    const mulai =
        document.getElementById('tanggal_mulai');

    const selesai =
        document.getElementById('tanggal_selesai');


    mulai.addEventListener('change', function () {

        selesai.min = this.value;

        updateSteps();

    });


    selesai.addEventListener('change', function () {

        if (
            mulai.value &&
            selesai.value < mulai.value
        ) {

            alert(
                'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.'
            );

            this.value = '';

        }

        updateSteps();

    });


    /*
    |--------------------------------------------------------------------------
    | FILE NAME
    |--------------------------------------------------------------------------
    */

    const fileInput =
        document.getElementById('lampiran');

    fileInput.addEventListener('change', function () {

        const fileBox =
            this.closest('.file-box');

        const note =
            fileBox.querySelector('.file-note');

        if (this.files.length > 0) {

            note.textContent =
                'File dipilih: ' +
                this.files[0].name;

            fileBox.style.borderColor =
                '#2F8064';

        } else {

            note.textContent =
                'Format yang diperbolehkan: PDF, JPG, JPEG, PNG.';

            fileBox.style.borderColor =
                '';

        }

        updateSteps();

    });


    /*
    |--------------------------------------------------------------------------
    | PROGRESS STEP
    |--------------------------------------------------------------------------
    */

    function updateSteps() {

        const step1 =
            document.getElementById('step1');

        const step2 =
            document.getElementById('step2');

        const step3 =
            document.getElementById('step3');


        const hasPegawai =
            pegawaiId.value !== '';

        const hasDetail =
            document.querySelector(
                '[name="kategori_cuti"]'
            ).value !== '' &&
            mulai.value !== '' &&
            selesai.value !== '';


        const hasLampiran =
            fileInput.files.length > 0;


        step1.classList.toggle(
            'completed',
            hasPegawai
        );

        step2.classList.toggle(
            'active',
            hasPegawai && !hasDetail
        );

        step2.classList.toggle(
            'completed',
            hasDetail
        );

        step3.classList.toggle(
            'active',
            hasDetail && !hasLampiran
        );

        step3.classList.toggle(
            'completed',
            hasLampiran
        );

    }


    document
        .querySelector('[name="kategori_cuti"]')
        .addEventListener(
            'change',
            updateSteps
        );


    /*
    |--------------------------------------------------------------------------
    | SUBMIT ANIMATION
    |--------------------------------------------------------------------------
    */

    document
        .getElementById('cutiForm')
        .addEventListener('submit', function () {

            const button =
                document.getElementById('submitBtn');

            button.classList.add('loading');

            button.textContent =
                'Mengirim pengajuan';

        });


    /*
    |--------------------------------------------------------------------------
    | ESCAPE HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value) {

        return String(value)
            .replaceAll('&', '&amp;')
            .replaceAll('<', '&lt;')
            .replaceAll('>', '&gt;')
            .replaceAll('"', '&quot;')
            .replaceAll("'", '&#039;');

    }


    /*
    |--------------------------------------------------------------------------
    | INITIAL
    |--------------------------------------------------------------------------
    */

    updateSteps();

</script>

</body>
</html>