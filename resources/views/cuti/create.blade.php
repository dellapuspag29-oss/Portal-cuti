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
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Inter,
                "Segoe UI",
                Arial,
                sans-serif;

            background: #f4f8f6;
            color: #173f3a;
            min-height: 100vh;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
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
            background:
                linear-gradient(
                    135deg,
                    #f4f8f6 0%,
                    #f7fbf9 55%,
                    #eef7f3 100%
                );
        }


        /* =========================================================
           BACKGROUND DECORATION
        ========================================================= */

        .orb {
            position: fixed;
            z-index: 0;
            pointer-events: none;
            border-radius: 50%;
        }

        .orb-green {
            width: 330px;
            height: 330px;

            top: 170px;
            right: -150px;

            background: #c9ebe1;

            opacity: .85;

            animation: floatingGreen 9s ease-in-out infinite;
        }

        .orb-yellow {
            width: 230px;
            height: 230px;

            left: -120px;
            bottom: 40px;

            background: #f8dda0;

            opacity: .82;

            animation: floatingYellow 11s ease-in-out infinite;
        }

        .orb-small {
            width: 75px;
            height: 75px;

            top: 115px;
            right: 12%;

            background: #f3c873;

            opacity: .18;

            animation: pulseOrb 5s ease-in-out infinite;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            position: relative;
            z-index: 10;

            background: rgba(248, 252, 251, .96);

            border-bottom: 1px solid #d7ebe8;

            backdrop-filter: blur(10px);

            box-shadow:
                0 3px 18px rgba(23, 63, 58, .04);
        }

        .header-inner {
            width: min(1050px, calc(100% - 40px));

            min-height: 74px;

            margin: auto;

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
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #315c4b;

            color: white;

            box-shadow:
                0 5px 12px rgba(49, 92, 75, .20);
        }

        .brand-icon svg {
            width: 23px;
            height: 23px;
        }

        .brand-name {
            display: block;

            font-size: 16px;
            font-weight: 800;

            letter-spacing: -.2px;
        }

        .brand-subtitle {
            display: block;

            margin-top: 3px;

            font-size: 9px;
            font-weight: 600;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            color: #7d8a82;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            position: relative;
            z-index: 2;

            width: min(930px, calc(100% - 40px));

            margin: auto;

            padding: 48px 0 45px;
        }


        /* =========================================================
           PAGE INTRO
        ========================================================= */

        .intro {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;

            gap: 25px;

            margin-bottom: 25px;

            animation: fadeUp .65s ease both;
        }

        .eyebrow {
            margin-bottom: 7px;

            color: #2f8064;

            font-size: 13px;
            font-weight: 800;

            letter-spacing: .4px;
        }

        .intro h1 {
            color: #173f3a;

            font-size: 34px;
            line-height: 1.15;

            letter-spacing: -1.1px;

            font-weight: 850;
        }

        .intro p {
            margin-top: 8px;

            color: #70827a;

            font-size: 14px;
            line-height: 1.6;
        }


        /* =========================================================
           STATUS BUTTON
        ========================================================= */

        .status-btn {
            flex-shrink: 0;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            min-height: 44px;

            padding: 0 17px;

            border: 1px solid #bfd9ce;
            border-radius: 9px;

            background: rgba(255,255,255,.8);

            color: #267052;

            font-size: 13px;
            font-weight: 800;

            transition: all .25s ease;
        }

        .status-btn svg {
            width: 16px;
            height: 16px;
        }

        .status-btn:hover {
            background: #e7f5ef;

            border-color: #9bc7b7;

            transform: translateY(-2px);

            box-shadow:
                0 7px 18px rgba(38, 112, 82, .10);
        }


        /* =========================================================
           FORM CARD
        ========================================================= */

        .form-card {
            position: relative;

            background: rgba(255,255,255,.97);

            border: 1px solid #d4e9e2;

            border-radius: 17px;

            overflow: visible;

            box-shadow:
                0 18px 45px rgba(23, 63, 58, .10);

            animation: cardAppear .75s .08s ease both;
        }

        .form-card::before {
            content: "";

            position: absolute;

            left: 25px;
            right: 25px;
            top: 0;

            height: 4px;

            background:
                linear-gradient(
                    90deg,
                    #315c4b,
                    #2f8064,
                    #e39b3b
                );

            border-radius: 0 0 8px 8px;
        }


        /* =========================================================
           FORM HEADER
        ========================================================= */

        .form-header {
            padding: 28px 30px 23px;

            border-bottom: 1px solid #e4efeb;

            background: #fbfdfc;

            border-radius: 17px 17px 0 0;
        }

        .form-header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;
        }

        .form-header h2 {
            color: #203f38;

            font-size: 21px;
            font-weight: 800;
        }

        .form-header p {
            margin-top: 5px;

            color: #7a8b84;

            font-size: 13px;
        }

        .form-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #fff1d7;

            color: #d08020;
        }

        .form-icon svg {
            width: 22px;
            height: 22px;
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .form-content {
            padding: 29px 30px 30px;
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .alert {
            margin-bottom: 23px;

            padding: 13px 15px;

            border-radius: 10px;

            font-size: 13px;

            line-height: 1.6;

            animation: fadeUp .4s ease both;
        }

        .alert-success {
            color: #276c5d;

            background: #e4f5ef;

            border: 1px solid #bfe3d6;
        }

        .alert-danger {
            color: #a3473d;

            background: #fff0ed;

            border: 1px solid #f1d0ca;
        }

        .alert-danger ul {
            padding-left: 18px;
        }


        /* =========================================================
           SECTION
        ========================================================= */

        .section {
            margin-bottom: 29px;

            animation: fadeUp .55s ease both;
        }

        .section:nth-child(2) {
            animation-delay: .08s;
        }

        .section:nth-child(3) {
            animation-delay: .14s;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 17px;

            padding-bottom: 11px;

            border-bottom: 1px solid #e8efec;
        }

        .number {
            width: 27px;
            height: 27px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #315c4b;

            color: white;

            font-size: 12px;
            font-weight: 800;

            box-shadow:
                0 4px 10px rgba(49, 92, 75, .16);
        }

        .section-title strong {
            color: #31564c;

            font-size: 14px;
            font-weight: 800;
        }


        /* =========================================================
           GRID
        ========================================================= */

        .grid-2 {
            display: grid;

            grid-template-columns: repeat(2, minmax(0, 1fr));

            gap: 17px;
        }

        .grid-4 {
            display: grid;

            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 14px;
        }


        /* =========================================================
           FIELD
        ========================================================= */

        .field {
            margin-bottom: 17px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .label {
            display: block;

            margin-bottom: 7px;

            color: #304d45;

            font-size: 12px;
            font-weight: 800;
        }

        .required {
            color: #db704b;
        }

        .hint {
            color: #929e99;

            font-size: 10px;
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

            border: 1px solid #cbded6;

            border-radius: 9px;

            outline: none;

            background: #fff;

            color: #29453d;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                transform .2s ease,
                background .2s ease;
        }

        .input,
        .select {
            height: 46px;

            padding: 0 13px;

            font-size: 13px;
        }

        .textarea {
            min-height: 95px;

            padding: 12px 13px;

            resize: vertical;

            font-size: 13px;

            line-height: 1.6;
        }

        .input::placeholder,
        .textarea::placeholder {
            color: #a1aea8;
        }

        .input:hover,
        .select:hover,
        .textarea:hover,
        .file-input:hover {
            border-color: #9dc4b5;
        }

        .input:focus,
        .select:focus,
        .textarea:focus,
        .file-input:focus {
            border-color: #3c8a6d;

            background: #fdfffe;

            box-shadow:
                0 0 0 3px rgba(60, 138, 109, .12);

            transform: translateY(-1px);
        }

        .readonly {
            background: #f1f6f3;

            color: #667b72;

            cursor: not-allowed;
        }


        /* =========================================================
           SEARCH PEGAWAI
        ========================================================= */

        .search-wrap {
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

            color: #6b9182;

            pointer-events: none;
        }

        .search-input {
            padding-left: 40px;
        }


        /* =========================================================
           SEARCH RESULT
        ========================================================= */

        .results {
            position: relative;

            z-index: 30;

            margin-top: 7px;
        }

        .result {
            width: 100%;

            display: block;

            padding: 12px 14px;

            border: 1px solid #d7e7e1;

            border-bottom: 0;

            background: white;

            color: #28483f;

            text-align: left;

            cursor: pointer;

            transition:
                background .2s ease,
                transform .2s ease;
        }

        .result:first-child {
            border-radius: 9px 9px 0 0;
        }

        .result:last-child {
            border-bottom: 1px solid #d7e7e1;

            border-radius: 0 0 9px 9px;
        }

        .result:only-child {
            border-bottom: 1px solid #d7e7e1;

            border-radius: 9px;
        }

        .result:hover {
            background: #eaf6f1;

            transform: translateX(3px);
        }

        .result-name {
            display: block;

            font-size: 13px;
            font-weight: 800;
        }

        .result-info {
            display: block;

            margin-top: 3px;

            color: #82928b;

            font-size: 10px;
        }


        /* =========================================================
           FILE
        ========================================================= */

        .file-box {
            padding: 15px;

            border: 1px dashed #b9d4c9;

            border-radius: 11px;

            background: #f8fcfa;

            transition: all .25s ease;
        }

        .file-box:hover {
            border-color: #65a58d;

            background: #f1faf6;
        }

        .file-input {
            min-height: 44px;

            padding: 8px;

            background: white;

            font-size: 12px;
        }

        .file-input::file-selector-button {
            margin-right: 9px;

            padding: 7px 12px;

            border: 0;

            border-radius: 7px;

            background: #315c4b;

            color: white;

            font-size: 11px;
            font-weight: 800;

            cursor: pointer;

            transition: background .2s ease;
        }

        .file-input::file-selector-button:hover {
            background: #244a3c;
        }


        /* =========================================================
           SUBMIT
        ========================================================= */

        .submit-area {
            margin-top: 30px;

            padding-top: 24px;

            border-top: 1px solid #e4eeea;
        }

        .submit-btn {
            position: relative;

            width: 100%;

            min-height: 53px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            border: 0;
            border-radius: 10px;

            background: #e39b3b;

            color: #173f3a;

            font-size: 14px;
            font-weight: 850;

            cursor: pointer;

            box-shadow:
                0 8px 18px rgba(227, 155, 59, .22);

            overflow: hidden;

            transition:
                transform .22s ease,
                background .22s ease,
                box-shadow .22s ease;
        }

        .submit-btn::before {
            content: "";

            position: absolute;

            top: 0;
            left: -100%;

            width: 55%;
            height: 100%;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,.28),
                    transparent
                );

            transform: skewX(-20deg);

            transition: left .6s ease;
        }

        .submit-btn:hover {
            background: #f0ad4b;

            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(227, 155, 59, .28);
        }

        .submit-btn:hover::before {
            left: 140%;
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn svg {
            width: 18px;
            height: 18px;

            transition: transform .25s ease;
        }

        .submit-btn:hover svg {
            transform: translateX(4px);
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            position: relative;
            z-index: 2;

            width: min(930px, calc(100% - 40px));

            margin: auto;

            padding-bottom: 28px;

            color: #789087;

            font-size: 12px;
        }


        /* =========================================================
           ANIMATION
        ========================================================= */

        @keyframes fadeUp {

            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        @keyframes cardAppear {

            from {
                opacity: 0;
                transform:
                    translateY(20px)
                    scale(.985);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0)
                    scale(1);
            }

        }

        @keyframes floatingGreen {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(-14px, -18px);
            }

        }

        @keyframes floatingYellow {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(15px, -12px);
            }

        }

        @keyframes pulseOrb {

            0%,
            100% {
                transform: scale(1);
                opacity: .18;
            }

            50% {
                transform: scale(1.12);
                opacity: .27;
            }

        }

        @keyframes spin {

            to {
                transform: rotate(360deg);
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 800px) {

            .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 600px) {

            .header-inner {
                width: calc(100% - 40px);
            }

            .main {
                width: calc(100% - 40px);

                padding-top: 35px;
            }

            .intro {
                flex-direction: column;

                align-items: stretch;

                gap: 17px;
            }

            .intro h1 {
                font-size: 29px;
            }

            .status-btn {
                width: 100%;
            }

            .form-header {
                padding: 24px 20px 20px;
            }

            .form-content {
                padding: 24px 20px;
            }

            .form-card::before {
                left: 20px;
                right: 20px;
            }

            .grid-2,
            .grid-4 {
                grid-template-columns: 1fr;

                gap: 0;
            }

            .field {
                margin-bottom: 17px;
            }

            .footer {
                width: calc(100% - 40px);
            }

            .orb-green {
                width: 250px;
                height: 250px;

                right: -125px;
            }

            .orb-yellow {
                width: 175px;
                height: 175px;

                left: -95px;
            }

            .orb-small {
                display: none;
            }

        }


        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }

        }

    </style>

</head>


<body>

<div class="page">


    <!-- =========================================================
         DECORATION
    ========================================================== -->

    <div class="orb orb-green"></div>

    <div class="orb orb-yellow"></div>

    <div class="orb orb-small"></div>


    <!-- =========================================================
         HEADER
    ========================================================== -->

    <header class="header">

        <div class="header-inner">

            <a
                href="{{ url('/') }}"
                class="brand"
            >

                <span class="brand-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M20.8 3.2C13.3 3.1 7.5 5.1 4.4 9.1c-2.5 3.2-1.8 7.6 1.2 9.5 2.9 1.8 6.8.8 8.9-2.1 2.5-3.5 2.7-7.8 2.7-7.8"/>

                        <path d="M3.7 20.3c2.5-4.3 5.8-6.7 10.1-8.4"/>

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


        <!-- INTRO -->

        <div class="intro">

            <div>

                <div class="eyebrow">
                    Layanan Pengajuan Cuti Online
                </div>

                <h1>
                    Pengajuan Cuti
                </h1>

                <p>
                    Lengkapi data berikut untuk mengajukan cuti Anda.
                </p>

            </div>


            <a
                href="{{ route('cuti.public.status') }}"
                class="status-btn"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <circle
                        cx="11"
                        cy="11"
                        r="7"
                    ></circle>

                    <path
                        d="m20 20-4-4"
                    ></path>

                </svg>

                Lihat Status

            </a>

        </div>


        <!-- =====================================================
             FORM CARD
        ====================================================== -->

        <div class="form-card">


            <!-- FORM HEADER -->

            <div class="form-header">

                <div class="form-header-top">

                    <div>

                        <h2>
                            Formulir Pengajuan Cuti
                        </h2>

                        <p>
                            Isi data dengan benar sebelum mengirim pengajuan.
                        </p>

                    </div>


                    <div class="form-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <rect
                                x="3"
                                y="4"
                                width="18"
                                height="17"
                                rx="2"
                            ></rect>

                            <path
                                d="M8 2v4M16 2v4M3 9h18"
                            ></path>

                            <path
                                d="M8 13h3M8 17h5"
                            ></path>

                        </svg>

                    </div>

                </div>

            </div>


            <!-- FORM CONTENT -->

            <div class="form-content">


                {{-- SUCCESS --}}

                @if(session('success'))

                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>

                @endif


                {{-- ERRORS --}}

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
                         SECTION 1
                    ================================================== -->

                    <div class="section">

                        <div class="section-title">

                            <span class="number">
                                1
                            </span>

                            <strong>
                                Data Pegawai
                            </strong>

                        </div>


                        <!-- SEARCH -->

                        <div class="field">

                            <label
                                for="pegawai_search"
                                class="label"
                            >

                                Cari Pegawai

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <div class="search-wrap">

                                <div class="search-box">

                                    <svg
                                        class="search-icon"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <circle
                                            cx="11"
                                            cy="11"
                                            r="7"
                                        ></circle>

                                        <path
                                            d="m20 20-4-4"
                                        ></path>

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
                                    class="results"
                                ></div>

                            </div>

                        </div>


                        <!-- DATA PEGAWAI -->

                        <div class="grid-4">

                            <div class="field">

                                <label
                                    for="nip"
                                    class="label"
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
                                    class="label"
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
                                    class="label"
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
                                    class="label"
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
                         SECTION 2
                    ================================================== -->

                    <div class="section">

                        <div class="section-title">

                            <span class="number">
                                2
                            </span>

                            <strong>
                                Detail Cuti
                            </strong>

                        </div>


                        <!-- KATEGORI -->

                        <div class="field">

                            <label
                                for="kategori_cuti"
                                class="label"
                            >

                                Kategori Cuti

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <select
                                name="kategori_cuti"
                                id="kategori_cuti"
                                class="select"
                                required
                            >

                                <option value="">
                                    -- Pilih Kategori Cuti --
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

                        <div class="grid-2">

                            <div class="field">

                                <label
                                    for="tanggal_mulai"
                                    class="label"
                                >

                                    Tanggal Mulai

                                    <span class="required">
                                        *
                                    </span>

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
                                    class="label"
                                >

                                    Tanggal Selesai

                                    <span class="required">
                                        *
                                    </span>

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
                                class="label"
                            >

                                Alasan Cuti

                                <span class="required">
                                    *
                                </span>

                            </label>

                            <textarea
                                name="alasan"
                                id="alasan"
                                class="textarea"
                                rows="4"
                                placeholder="Tuliskan alasan pengajuan cuti..."
                                required
                            >{{ old('alasan') }}</textarea>

                        </div>


                        <!-- ALAMAT -->

                        <div class="field">

                            <label
                                for="alamat"
                                class="label"
                            >

                                Alamat Selama Cuti

                                <span class="required">
                                    *
                                </span>

                            </label>

                            <textarea
                                name="alamat"
                                id="alamat"
                                class="textarea"
                                rows="3"
                                placeholder="Masukkan alamat selama menjalankan cuti..."
                                required
                            >{{ old('alamat') }}</textarea>

                        </div>


                        <!-- TELEPON -->

                        <div class="field">

                            <label
                                for="nomor_telepon"
                                class="label"
                            >

                                Nomor Telepon / WhatsApp Aktif

                                <span class="required">
                                    *
                                </span>

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
                         SECTION 3
                    ================================================== -->

                    <div class="section">

                        <div class="section-title">

                            <span class="number">
                                3
                            </span>

                            <strong>
                                Lampiran
                            </strong>

                        </div>


                        <div class="file-box">

                            <div class="field">

                                <label
                                    for="lampiran"
                                    class="label"
                                >

                                    Lampiran Bukti

                                    <span class="required">
                                        *
                                    </span>

                                    <span class="hint">
                                        PDF, maksimal 2 MB
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

                    </div>


                    <!-- =================================================
                         SUBMIT
                    ================================================== -->

                    <div class="submit-area">

                        <button
                            type="submit"
                            class="submit-btn"
                            id="submitBtn"
                        >

                            <span>
                                Kirim Pengajuan
                            </span>


                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path
                                    d="M5 12h14"
                                ></path>

                                <path
                                    d="m13 6 6 6-6 6"
                                ></path>

                            </svg>

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

        © 2026 Dinas Lingkungan Hidup · TALNGATI

    </footer>

</div>


<script>

    /* =========================================================
       DATA PEGAWAI
    ========================================================= */

    const pegawai = @json($pegawai);


    /* =========================================================
       ELEMENT
    ========================================================= */

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


    /* =========================================================
       SEARCH PEGAWAI
    ========================================================= */

    function tampilkanPegawai(keyword = '') {

        const query =
            keyword.trim().toLowerCase();


        if (!query) {

            results.innerHTML = '';

            return;

        }


        const data =
            pegawai
                .filter(item => {

                    const nama =
                        String(item.name ?? '')
                            .toLowerCase();

                    const nip =
                        String(item.nip ?? '')
                            .toLowerCase();

                    return (
                        nama.includes(query) ||
                        nip.includes(query)
                    );

                })
                .slice(0, 8);


        results.innerHTML = '';


        data.forEach(item => {

            const button =
                document.createElement('button');

            button.type = 'button';

            button.className = 'result';


            const name =
                document.createElement('span');

            name.className = 'result-name';

            name.textContent =
                item.name;


            const info =
                document.createElement('span');

            info.className = 'result-info';

            info.textContent =
                `${item.nip} · ${item.jabatan} · ${item.unit_kerja ?? '-'}`;


            button.appendChild(name);

            button.appendChild(info);


            button.addEventListener(
                'click',
                function () {

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
                    |--------------------------------------------------------------------------
                    | Animasi setelah pegawai dipilih
                    |--------------------------------------------------------------------------
                    */

                    [
                        nipInput,
                        namaInput,
                        jabatanInput,
                        unitKerjaInput
                    ].forEach(input => {

                        input.animate(
                            [
                                {
                                    transform: 'scale(.98)',
                                    backgroundColor: '#fff1d7'
                                },
                                {
                                    transform: 'scale(1)',
                                    backgroundColor: '#f1f6f3'
                                }
                            ],
                            {
                                duration: 450,
                                easing: 'ease-out'
                            }
                        );

                    });

                }
            );


            results.appendChild(button);

        });

    }


    searchInput.addEventListener(
        'input',
        function () {

            tampilkanPegawai(
                this.value
            );

        }
    );


    /* =========================================================
       CLICK OUTSIDE SEARCH
    ========================================================= */

    document.addEventListener(
        'click',
        function (event) {

            if (
                !searchInput.contains(event.target) &&
                !results.contains(event.target)
            ) {

                results.innerHTML = '';

            }

        }
    );


    /* =========================================================
       TANGGAL
    ========================================================= */

    const tanggalMulai =
        document.getElementById('tanggal_mulai');

    const tanggalSelesai =
        document.getElementById('tanggal_selesai');


    tanggalMulai.addEventListener(
        'change',
        function () {

            if (this.value) {

                tanggalSelesai.min =
                    this.value;

            }

        }
    );


    /* =========================================================
       VALIDASI FILE
    ========================================================= */

    const lampiran =
        document.getElementById('lampiran');


    lampiran.addEventListener(
        'change',
        function () {

            const file =
                this.files[0];


            if (!file) {
                return;
            }


            const maxSize =
                2 * 1024 * 1024;


            if (
                file.type !==
                'application/pdf'
            ) {

                alert(
                    'Lampiran harus berupa file PDF.'
                );

                this.value = '';

                return;

            }


            if (
                file.size > maxSize
            ) {

                alert(
                    'Ukuran file maksimal 2 MB.'
                );

                this.value = '';

                return;

            }

        }
    );


    /* =========================================================
       SUBMIT ANIMATION
    ========================================================= */

    const form =
        document.querySelector('form');

    const submitBtn =
        document.getElementById('submitBtn');


    form.addEventListener(
        'submit',
        function () {

            submitBtn.disabled = true;

            submitBtn.style.opacity = '.78';

            submitBtn.innerHTML = `

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
                        opacity=".25"
                    ></circle>

                    <path
                        d="M21 12a9 9 0 0 1-9 9"
                    ></path>

                </svg>

                <span>
                    Mengirim Pengajuan...
                </span>

            `;

        }
    );

</script>

</body>

</html>