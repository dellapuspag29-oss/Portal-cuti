<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengajuan Cuti - TALNGATI</title>


    <style>

        /* =========================================================
           RESET
        ========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #f4f8f6;
            color: #173f3a;

            min-height: 100vh;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        a {
            text-decoration: none;
        }


        /* =========================================================
           PAGE
        ========================================================= */

        .page {
            position: relative;

            min-height: 100vh;

            overflow: hidden;

            background: #f4f8f6;
        }


        /* =========================================================
           DECORATIVE ORBS
        ========================================================= */

        .ambient-orb {
            position: fixed;

            border-radius: 50%;

            pointer-events: none;

            z-index: 0;
        }

        .orb-one {
            width: 310px;
            height: 310px;

            right: -145px;
            top: 180px;

            background: #c9ebe1;

            opacity: .72;

            animation: floatOne 10s ease-in-out infinite;
        }

        .orb-two {
            width: 220px;
            height: 220px;

            left: -130px;
            bottom: 50px;

            background: #f7dda0;

            opacity: .70;

            animation: floatTwo 12s ease-in-out infinite;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            position: relative;
            z-index: 10;

            width: 100%;

            background: rgba(248, 252, 251, .96);

            border-bottom: 1px solid #d7ebe8;

            backdrop-filter: blur(8px);
        }

        .header-inner {
            width: min(1080px, calc(100% - 40px));

            min-height: 72px;

            margin: 0 auto;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        /* =========================================================
           BRAND
        ========================================================= */

        .brand {
            display: flex;

            align-items: center;

            gap: 12px;

            color: #173f3a;
        }

        .brand-icon {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            border-radius: 9px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #315c4b;

            color: white;
        }

        .brand-icon svg {
            width: 22px;
            height: 22px;
        }

        .brand-name {
            display: block;

            font-size: 16px;

            line-height: 1.2;

            font-weight: 800;

            letter-spacing: -.3px;
        }

        .brand-subtitle {
            display: block;

            margin-top: 3px;

            font-size: 9px;

            line-height: 1;

            font-weight: 500;

            letter-spacing: 1.4px;

            text-transform: uppercase;

            color: #7d8a82;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            position: relative;

            z-index: 1;

            width: min(900px, calc(100% - 40px));

            margin: 0 auto;

            padding: 45px 0 55px;
        }


        /* =========================================================
           TOP AREA
        ========================================================= */

        .page-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;

            animation: fadeUp .55s ease-out both;
        }

        .page-heading small {
            display: block;

            margin-bottom: 5px;

            font-size: 12px;

            font-weight: 800;

            letter-spacing: 1.4px;

            text-transform: uppercase;

            color: #2f8064;
        }

        .page-heading h1 {
            font-size: 32px;

            line-height: 1.2;

            font-weight: 800;

            letter-spacing: -1px;

            color: #173f3a;
        }

        .page-heading p {
            margin-top: 7px;

            font-size: 14px;

            color: #70827a;
        }


        /* =========================================================
           STATUS BUTTON
        ========================================================= */

        .status-button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            min-height: 44px;

            padding: 0 17px;

            border: 1px solid #c8d9d0;

            border-radius: 9px;

            color: #267052;

            background: rgba(255,255,255,.75);

            font-size: 14px;

            font-weight: 800;

            transition: .2s ease;
        }

        .status-button svg {
            width: 16px;
            height: 16px;
        }

        .status-button:hover {
            background: #e6f1eb;

            transform: translateY(-2px);
        }


        /* =========================================================
           FORM CARD
        ========================================================= */

        .form-card {
            overflow: visible;

            background: rgba(255,255,255,.97);

            border: 1px solid #d7ebe8;

            border-radius: 17px;

            box-shadow:
                0 20px 50px rgba(38, 122, 112, .10);

            animation: cardIn .7s .08s ease-out both;
        }


        /* =========================================================
           FORM CARD HEADER
        ========================================================= */

        .form-card-header {
            position: relative;

            padding: 25px 28px;

            border-bottom: 1px solid #e3eeeb;

            background: #fbfdfc;

            border-radius: 17px 17px 0 0;
        }

        .form-card-header::before {
            content: "";

            position: absolute;

            left: 28px;
            top: 0;

            width: 45px;
            height: 3px;

            border-radius: 0 0 5px 5px;

            background: #e39b3b;
        }

        .form-card-header h2 {
            font-size: 20px;

            font-weight: 800;

            color: #203f38;
        }

        .form-card-header p {
            margin-top: 5px;

            font-size: 13px;

            line-height: 1.6;

            color: #778981;
        }


        /* =========================================================
           FORM CONTENT
        ========================================================= */

        .form-content {
            padding: 28px;
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .alert {
            padding: 13px 15px;

            margin-bottom: 22px;

            border-radius: 10px;

            font-size: 13px;

            line-height: 1.6;

            animation: fadeUp .4s ease-out both;
        }

        .alert-success {
            background: #e8f5f1;

            border: 1px solid #c9e7dd;

            color: #286c5d;
        }

        .alert-danger {
            background: #fff0ee;

            border: 1px solid #f1d0ca;

            color: #a84b40;
        }

        .alert-danger ul {
            padding-left: 18px;
        }


        /* =========================================================
           FORM SECTIONS
        ========================================================= */

        .form-section {
            margin-bottom: 27px;
        }

        .section-title {
            display: flex;

            align-items: center;

            gap: 9px;

            margin-bottom: 15px;

            padding-bottom: 10px;

            border-bottom: 1px solid #edf1ef;
        }

        .section-number {
            width: 25px;
            height: 25px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #e8f5f1;

            color: #2f8064;

            font-size: 12px;

            font-weight: 800;
        }

        .section-title span:last-child {
            font-size: 14px;

            font-weight: 800;

            color: #34564d;
        }


        /* =========================================================
           FORM GRID
        ========================================================= */

        .form-grid {
            display: grid;

            grid-template-columns: repeat(2, minmax(0, 1fr));

            gap: 17px;
        }

        .form-grid-4 {
            display: grid;

            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 14px;
        }

        .field {
            margin-bottom: 17px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field-label {
            display: block;

            margin-bottom: 7px;

            font-size: 13px;

            font-weight: 800;

            color: #304d45;
        }

        .required {
            color: #d66b54;
        }

        .field-help {
            font-size: 11px;

            color: #8b9892;

            font-weight: 500;
        }


        /* =========================================================
           INPUT
        ========================================================= */

        .input,
        .select,
        .textarea,
        .file-input {
            width: 100%;

            border: 1px solid #d3e0da;

            border-radius: 9px;

            background: #fff;

            color: #263f38;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .input,
        .select {
            height: 46px;

            padding: 0 13px;

            font-size: 13px;
        }

        .textarea {
            min-height: 92px;

            padding: 12px 13px;

            resize: vertical;

            font-size: 13px;

            line-height: 1.6;
        }

        .input::placeholder,
        .textarea::placeholder {
            color: #a1ada7;
        }

        .input:focus,
        .select:focus,
        .textarea:focus,
        .file-input:focus {
            border-color: #5a9c84;

            box-shadow:
                0 0 0 3px rgba(90, 156, 132, .13);
        }

        .readonly {
            background: #f3f7f5;

            color: #64776f;

            cursor: not-allowed;
        }


        /* =========================================================
           SEARCH PEGawai
        ========================================================= */

        .search-wrapper {
            position: relative;
        }

        .search-box {
            position: relative;
        }

        .search-icon {
            position: absolute;

            left: 13px;
            top: 50%;

            width: 17px;
            height: 17px;

            transform: translateY(-50%);

            color: #729087;

            pointer-events: none;
        }

        .search-input {
            padding-left: 40px;
        }


        /* =========================================================
           SEARCH RESULTS
        ========================================================= */

        .search-results {
            position: relative;

            z-index: 20;

            margin-top: 7px;
        }

        .search-result {
            width: 100%;

            display: block;

            padding: 11px 13px;

            text-align: left;

            border: 1px solid #dce8e3;

            border-bottom: 0;

            background: #fff;

            color: #304d45;

            cursor: pointer;

            transition: .18s ease;
        }

        .search-result:first-child {
            border-radius: 9px 9px 0 0;
        }

        .search-result:last-child {
            border-bottom: 1px solid #dce8e3;

            border-radius: 0 0 9px 9px;
        }

        .search-result:only-child {
            border-bottom: 1px solid #dce8e3;

            border-radius: 9px;
        }

        .search-result:hover {
            background: #eef7f3;

            transform: translateX(2px);
        }

        .result-name {
            display: block;

            font-size: 13px;

            font-weight: 800;

            color: #23463d;
        }

        .result-detail {
            display: block;

            margin-top: 3px;

            font-size: 11px;

            color: #809089;
        }


        /* =========================================================
           FILE INPUT
        ========================================================= */

        .file-input {
            min-height: 46px;

            padding: 9px;

            font-size: 12px;

            background: #fbfcfb;
        }

        .file-input::file-selector-button {
            margin-right: 10px;

            padding: 7px 12px;

            border: 0;

            border-radius: 7px;

            background: #e8f5f1;

            color: #286c5d;

            font-size: 12px;

            font-weight: 800;

            cursor: pointer;
        }


        /* =========================================================
           SUBMIT
        ========================================================= */

        .submit-area {
            margin-top: 28px;

            padding-top: 23px;

            border-top: 1px solid #e9efec;
        }

        .submit-button {
            width: 100%;

            min-height: 53px;

            border: 0;

            border-radius: 10px;

            display: flex;

            align-items: center;
            justify-content: center;

            gap: 9px;

            background: #e39b3b;

            color: #173f3a;

            font-size: 15px;

            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 7px 16px rgba(227, 155, 59, .16);

            transition:
                transform .2s ease,
                background .2s ease,
                box-shadow .2s ease;
        }

        .submit-button:hover {
            background: #efad4c;

            transform: translateY(-2px);

            box-shadow:
                0 10px 22px rgba(227, 155, 59, .22);
        }

        .submit-button:active {
            transform: translateY(0);
        }

        .submit-button svg {
            width: 18px;
            height: 18px;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            position: relative;

            z-index: 2;

            width: min(900px, calc(100% - 40px));

            margin: 0 auto;

            padding-bottom: 27px;

            font-size: 13px;

            line-height: 1.6;

            color: #789087;
        }


        /* =========================================================
           ANIMATIONS
        ========================================================= */

        @keyframes fadeUp {

            from {
                opacity: 0;

                transform: translateY(12px);
            }

            to {
                opacity: 1;

                transform: translateY(0);
            }

        }

        @keyframes cardIn {

            from {
                opacity: 0;

                transform:
                    translateY(18px)
                    scale(.985);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }

        }

        @keyframes floatOne {

            0%,
            100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(-12px, -14px, 0);
            }

        }

        @keyframes floatTwo {

            0%,
            100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(12px, -10px, 0);
            }

        }

        @keyframes spin {

            to {
                transform: rotate(360deg);
            }

        }


        /* =========================================================
           RESPONSIVE TABLET
        ========================================================= */

        @media (max-width: 850px) {

            .form-grid-4 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

        }


        /* =========================================================
           RESPONSIVE MOBILE
        ========================================================= */

        @media (max-width: 600px) {

            .header-inner {
                width: calc(100% - 40px);
            }

            .main {
                width: calc(100% - 40px);

                padding: 35px 0 45px;
            }

            .page-top {
                align-items: flex-start;

                flex-direction: column;

                gap: 17px;

                margin-bottom: 20px;
            }

            .page-heading h1 {
                font-size: 28px;
            }

            .page-heading p {
                font-size: 13px;
            }

            .status-button {
                width: 100%;
            }

            .form-card-header {
                padding: 21px 19px;
            }

            .form-card-header::before {
                left: 19px;
            }

            .form-content {
                padding: 21px 19px;
            }

            .form-grid,
            .form-grid-4 {
                grid-template-columns: 1fr;

                gap: 0;
            }

            .field {
                margin-bottom: 17px;
            }

            .section-title {
                margin-bottom: 14px;
            }

            .section-title span:last-child {
                font-size: 13px;
            }

            .input,
            .select {
                height: 47px;
            }

            .textarea {
                min-height: 100px;
            }

            .footer {
                width: calc(100% - 40px);
            }

            .orb-one {
                width: 250px;
                height: 250px;

                right: -125px;

                top: 180px;
            }

            .orb-two {
                width: 180px;
                height: 180px;

                left: -105px;

                bottom: 70px;
            }

        }


        /* =========================================================
           REDUCE MOTION
        ========================================================= */

        @media (prefers-reduced-motion: reduce) {

            .page-top,
            .form-card {
                animation: none;
            }

            .ambient-orb {
                animation: none;
            }

            .status-button,
            .submit-button,
            .search-result {
                transition: none;
            }

        }

    </style>

</head>


<body>

<div class="page">


    <!-- =========================================================
         BACKGROUND ORBS
    ========================================================== -->

    <span class="ambient-orb orb-one"></span>

    <span class="ambient-orb orb-two"></span>


    <!-- =========================================================
         HEADER
    ========================================================== -->

    <header class="header">

        <div class="header-inner">

            <a
                href="{{ url('/') }}"
                class="brand"
                aria-label="TALNGATI Beranda"
            >

                <span class="brand-icon">

                    <!-- Leaf -->

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M20.8 3.2C13.3 3.1 7.5 5.1 4.4 9.1c-2.5 3.2-1.8 7.6 1.2 9.5 2.9 1.8 6.8.8 8.9-2.1 2.5-3.5 2.7-7.8 2.7-7.8" />
                        <path d="M3.7 20.3c2.5-4.3 5.8-6.7 10.1-8.4" />
                    </svg>

                </span>


                <span>

                    <span class="brand-name">
                        TALNGATI
                    </span>

                    <span class="brand-subtitle">
                        Portal Cuti Digital
                    </span>

                </span>

            </a>

        </div>

    </header>


    <!-- =========================================================
         MAIN
    ========================================================== -->

    <main class="main">


        <!-- =====================================================
             PAGE HEADING
        ====================================================== -->

        <div class="page-top">

            <div class="page-heading">

                <small>
                    Layanan Pengajuan Cuti Online
                </small>

                <h1>
                    Pengajuan Cuti
                </h1>

                <p>
                    Lengkapi data berikut untuk mengajukan cuti Anda.
                </p>

            </div>


            <a
                href="{{ route('cuti.public.status') }}"
                class="status-button"
            >

                <!-- Search icon -->

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                </svg>

                Cek Status

            </a>

        </div>


        <!-- =====================================================
             FORM CARD
        ====================================================== -->

        <div class="form-card">


            <!-- FORM HEADER -->

            <div class="form-card-header">

                <h2>
                    Formulir Pengajuan
                </h2>

                <p>
                    Kolom bertanda
                    <strong>*</strong>
                    wajib diisi sebelum formulir dikirim.
                </p>

            </div>


            <!-- FORM CONTENT -->

            <div class="form-content">


                <!-- =================================================
                     SUCCESS
                ================================================== -->

                @if(session('success'))

                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif


                <!-- =================================================
                     ERRORS
                ================================================== -->

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- =================================================
                     FORM
                ================================================== -->

                <form
                    action="{{ route('cuti.public.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf


                    <!-- =================================================
                         SECTION 1 - PEGAWAI
                    ================================================== -->

                    <div class="form-section">

                        <div class="section-title">

                            <span class="section-number">
                                1
                            </span>

                            <span>
                                Data Pegawai
                            </span>

                        </div>


                        <!-- SEARCH -->

                        <div class="field">

                            <label
                                for="pegawai_search"
                                class="field-label"
                            >
                                Cari Pegawai
                                <span class="required">*</span>
                            </label>


                            <div class="search-wrapper">

                                <div class="search-box">

                                    <!-- Search icon -->

                                    <svg
                                        class="search-icon"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <circle cx="11" cy="11" r="7"></circle>
                                        <path d="m20 20-4-4"></path>
                                    </svg>


                                    <input
                                        type="search"
                                        id="pegawai_search"
                                        class="input search-input"
                                        placeholder="Ketik nama atau NIP pegawai..."
                                        autocomplete="off"
                                    >

                                </div>


                                <input
                                    type="hidden"
                                    name="pegawai_id"
                                    id="pegawai_id"
                                    value="{{ old('pegawai_id') }}"
                                >


                                <div
                                    id="pegawai_results"
                                    class="search-results"
                                ></div>

                            </div>

                        </div>


                        <!-- DATA PEGAWAI -->

                        <div class="form-grid-4">

                            <div class="field">

                                <label
                                    for="nip"
                                    class="field-label"
                                >
                                    NIP
                                </label>

                                <input
                                    type="text"
                                    id="nip"
                                    class="input readonly"
                                    value="{{ old('nip') }}"
                                    readonly
                                    required
                                >

                            </div>


                            <div class="field">

                                <label
                                    for="nama_karyawan"
                                    class="field-label"
                                >
                                    Nama Lengkap
                                </label>

                                <input
                                    type="text"
                                    id="nama_karyawan"
                                    class="input readonly"
                                    value="{{ old('nama_karyawan') }}"
                                    readonly
                                    required
                                >

                            </div>


                            <div class="field">

                                <label
                                    for="jabatan"
                                    class="field-label"
                                >
                                    Jabatan
                                </label>

                                <input
                                    type="text"
                                    id="jabatan"
                                    class="input readonly"
                                    value="{{ old('jabatan') }}"
                                    readonly
                                    required
                                >

                            </div>


                            <div class="field">

                                <label
                                    for="unit_kerja"
                                    class="field-label"
                                >
                                    Unit Kerja
                                </label>

                                <input
                                    type="text"
                                    id="unit_kerja"
                                    class="input readonly"
                                    value="{{ old('unit_kerja') }}"
                                    readonly
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         SECTION 2 - CUTI
                    ================================================== -->

                    <div class="form-section">

                        <div class="section-title">

                            <span class="section-number">
                                2
                            </span>

                            <span>
                                Detail Cuti
                            </span>

                        </div>


                        <!-- KATEGORI -->

                        <div class="field">

                            <label
                                for="kategori_cuti"
                                class="field-label"
                            >
                                Kategori Cuti
                                <span class="required">*</span>
                            </label>


                            <select
                                name="kategori_cuti"
                                id="kategori_cuti"
                                class="select"
                                required
                            >

                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                <option
                                    value="Cuti Tahunan"
                                    {{ old('kategori_cuti') == 'Cuti Tahunan' ? 'selected' : '' }}
                                >
                                    Cuti Tahunan
                                </option>

                                <option
                                    value="Cuti Sakit"
                                    {{ old('kategori_cuti') == 'Cuti Sakit' ? 'selected' : '' }}
                                >
                                    Cuti Sakit
                                </option>

                                <option
                                    value="Cuti Melahirkan"
                                    {{ old('kategori_cuti') == 'Cuti Melahirkan' ? 'selected' : '' }}
                                >
                                    Cuti Melahirkan
                                </option>

                            </select>

                        </div>


                        <!-- TANGGAL -->

                        <div class="form-grid">

                            <div class="field">

                                <label
                                    for="tanggal_mulai"
                                    class="field-label"
                                >
                                    Tanggal Mulai
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_mulai"
                                    id="tanggal_mulai"
                                    class="input"
                                    value="{{ old('tanggal_mulai') }}"
                                    required
                                >

                            </div>


                            <div class="field">

                                <label
                                    for="tanggal_selesai"
                                    class="field-label"
                                >
                                    Tanggal Selesai
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_selesai"
                                    id="tanggal_selesai"
                                    class="input"
                                    value="{{ old('tanggal_selesai') }}"
                                    required
                                >

                            </div>

                        </div>


                        <!-- ALASAN -->

                        <div class="field">

                            <label
                                for="alasan"
                                class="field-label"
                            >
                                Alasan Cuti
                                <span class="required">*</span>
                            </label>

                            <textarea
                                name="alasan"
                                id="alasan"
                                class="textarea"
                                rows="3"
                                placeholder="Tuliskan alasan pengajuan cuti..."
                                required
                            >{{ old('alasan') }}</textarea>

                        </div>


                        <!-- ALAMAT -->

                        <div class="field">

                            <label
                                for="alamat"
                                class="field-label"
                            >
                                Alamat Selama Menjalankan Cuti
                                <span class="required">*</span>
                            </label>

                            <textarea
                                name="alamat"
                                id="alamat"
                                class="textarea"
                                rows="3"
                                placeholder="Masukkan alamat yang dapat dihubungi selama cuti..."
                                required
                            >{{ old('alamat') }}</textarea>

                        </div>


                        <!-- TELEPON -->

                        <div class="field">

                            <label
                                for="nomor_telepon"
                                class="field-label"
                            >
                                Nomor Telepon / WhatsApp Yang Aktif
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="nomor_telepon"
                                id="nomor_telepon"
                                class="input"
                                value="{{ old('nomor_telepon') }}"
                                placeholder="08xxxxxxxxxx"
                                required
                            >

                        </div>

                    </div>


                    <!-- =================================================
                         SECTION 3 - LAMPIRAN
                    ================================================== -->

                    <div class="form-section">

                        <div class="section-title">

                            <span class="section-number">
                                3
                            </span>

                            <span>
                                Lampiran
                            </span>

                        </div>


                        <div class="field">

                            <label
                                for="lampiran"
                                class="field-label"
                            >
                                Lampiran Bukti

                                <span class="required">
                                    *
                                </span>

                                <span class="field-help">
                                    (PDF, maksimal 2 MB)
                                </span>

                            </label>


                            <input
                                type="file"
                                name="lampiran"
                                id="lampiran"
                                class="file-input"
                                accept="application/pdf"
                                required
                            >

                        </div>

                    </div>


                    <!-- =================================================
                         SUBMIT
                    ================================================== -->

                    <div class="submit-area">

                        <button
                            type="submit"
                            class="submit-button"
                        >

                            <!-- Send icon -->

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m22 2-7 20-4-9-9-4Z"></path>
                                <path d="M22 2 11 13"></path>
                            </svg>

                            Kirim Pengajuan

                        </button>

                    </div>


                </form>

            </div>

        </div>

    </main>


    <!-- =========================================================
         FOOTER
    ========================================================== -->

    <footer class="footer">

        <p>
            © 2026 Dinas Lingkungan Hidup · TALNGATI
        </p>

    </footer>

</div>


<!-- =============================================================
     JAVASCRIPT
============================================================= -->

<script>

    /*
    |--------------------------------------------------------------------------
    | DATA PEGAWAI
    |--------------------------------------------------------------------------
    */

    const pegawai = @json($pegawai);


    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById('pegawai_search');

    const results =
        document.getElementById('pegawai_results');

    const pegawaiId =
        document.getElementById('pegawai_id');

    const nipInput =
        document.getElementById('nip');

    const namaInput =
        document.getElementById('nama_karyawan');

    const jabatanInput =
        document.getElementById('jabatan');

    const unitKerjaInput =
        document.getElementById('unit_kerja');


    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN HASIL PENCARIAN
    |--------------------------------------------------------------------------
    */

    function tampilkanHasil(keyword = '') {

        const query =
            keyword.trim().toLowerCase();


        if (!query) {

            results.innerHTML = '';

            return;
        }


        const cocok =
            pegawai
                .filter((item) => {

                    const nama =
                        String(item.name ?? '').toLowerCase();

                    const nip =
                        String(item.nip ?? '').toLowerCase();

                    return (
                        nama.includes(query) ||
                        nip.includes(query)
                    );

                })
                .slice(0, 8);


        results.innerHTML = '';


        cocok.forEach((item) => {

            const pilihan =
                document.createElement('button');


            pilihan.type = 'button';

            pilihan.className = 'search-result';


            const nama =
                document.createElement('span');

            nama.className = 'result-name';

            nama.textContent =
                item.name;


            const detail =
                document.createElement('span');

            detail.className =
                'result-detail';

            detail.textContent =
                `${item.nip} - ${item.jabatan} - ${item.unit_kerja ?? '-'}`;


            pilihan.append(
                nama,
                detail
            );


            /*
            |--------------------------------------------------------------------------
            | PILIH PEGAWAI
            |--------------------------------------------------------------------------
            */

            pilihan.addEventListener('click', () => {

                pegawaiId.value =
                    item.id;

                searchInput.value =
                    item.name;

                nipInput.value =
                    item.nip;

                namaInput.value =
                    item.name;

                jabatanInput.value =
                    item.jabatan;

                unitKerjaInput.value =
                    item.unit_kerja ?? '-';


                results.innerHTML = '';


                /*
                | Efek setelah pegawai dipilih
                */

                [
                    nipInput,
                    namaInput,
                    jabatanInput,
                    unitKerjaInput
                ].forEach((element) => {

                    element.animate(
                        [
                            {
                                backgroundColor: '#e8f5f1'
                            },
                            {
                                backgroundColor: '#f3f7f5'
                            }
                        ],
                        {
                            duration: 500,
                            easing: 'ease-out'
                        }
                    );

                });

            });


            results.appendChild(pilihan);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | SEARCH EVENT
    |--------------------------------------------------------------------------
    */

    searchInput.addEventListener(
        'input',
        () => tampilkanHasil(searchInput.value)
    );


    /*
    |--------------------------------------------------------------------------
    | CLOSE SEARCH WHEN CLICK OUTSIDE
    |--------------------------------------------------------------------------
    */

    document.addEventListener('click', (event) => {

        if (
            !searchInput.contains(event.target) &&
            !results.contains(event.target)
        ) {

            results.innerHTML = '';

        }

    });


    /*
    |--------------------------------------------------------------------------
    | LOGIC TANGGAL BERDASARKAN KATEGORI
    |--------------------------------------------------------------------------
    */

    const kategoriSelect =
        document.getElementById('kategori_cuti');

    const tglMulaiInput =
        document.getElementById('tanggal_mulai');

    const today =
        new Date()
            .toISOString()
            .split('T')[0];


    kategoriSelect.addEventListener(
        'change',
        function () {

            if (this.value === 'Cuti Tahunan') {

                tglMulaiInput.setAttribute(
                    'min',
                    today
                );

            } else {

                tglMulaiInput.removeAttribute(
                    'min'
                );

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | CEGAH TANGGAL SELESAI SEBELUM TANGGAL MULAI
    |--------------------------------------------------------------------------
    */

    const tglSelesaiInput =
        document.getElementById('tanggal_selesai');


    tglMulaiInput.addEventListener(
        'change',
        function () {

            if (this.value) {

                tglSelesaiInput.setAttribute(
                    'min',
                    this.value
                );

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | VALIDASI FILE PDF
    |--------------------------------------------------------------------------
    */

    const lampiranInput =
        document.getElementById('lampiran');


    lampiranInput.addEventListener(
        'change',
        function () {

            const file =
                this.files[0];


            if (!file) {
                return;
            }


            const maxSize =
                2 * 1024 * 1024;


            if (file.type !== 'application/pdf') {

                alert(
                    'Lampiran harus berupa file PDF.'
                );

                this.value = '';

                return;
            }


            if (file.size > maxSize) {

                alert(
                    'Ukuran file maksimal 2 MB.'
                );

                this.value = '';

                return;
            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | ANIMASI BUTTON SAAT SUBMIT
    |--------------------------------------------------------------------------
    */

    const form =
        document.querySelector('form');

    const submitButton =
        document.querySelector('.submit-button');


    form.addEventListener(
        'submit',
        function () {

            submitButton.style.opacity = '.75';

            submitButton.style.pointerEvents = 'none';

            submitButton.innerHTML = `

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    style="
                        width:18px;
                        height:18px;
                        animation:spin .8s linear infinite;
                    "
                >
                    <circle
                        cx="12"
                        cy="12"
                        r="9"
                        opacity=".3"
                    ></circle>

                    <path d="M21 12a9 9 0 0 1-9 9"></path>

                </svg>

                Mengirim Pengajuan...

            `;

        }
    );

</script>


</body>

</html>