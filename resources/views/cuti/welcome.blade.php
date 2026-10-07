<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portal Cuti Digital - TALNGATI</title>

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
           DECORATIVE CIRCLES
        ========================================================= */

        .ambient-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        .orb-one {
            width: 290px;
            height: 290px;

            right: -125px;
            top: 175px;

            background: #c9ebe1;
            opacity: 0.85;
        }

        .orb-two {
            width: 210px;
            height: 210px;

            left: -115px;
            bottom: 90px;

            background: #f7dda0;
            opacity: 0.75;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            position: relative;
            z-index: 5;

            width: 100%;

            background: rgba(248, 252, 251, 0.96);

            border-bottom: 1px solid #d7ebe8;

            backdrop-filter: blur(8px);
        }

        .header-inner {
            width: min(1080px, calc(100% - 40px));

            margin: 0 auto;

            min-height: 72px;

            display: flex;
            align-items: center;
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

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #315c4b;
            color: white;

            flex-shrink: 0;
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
            letter-spacing: -0.3px;
        }

        .brand-subtitle {
            display: block;

            margin-top: 3px;

            font-size: 9px;
            line-height: 1;

            font-weight: 500;

            letter-spacing: 1.4px;

            color: #7d8a82;

            text-transform: uppercase;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            position: relative;
            z-index: 1;

            width: min(1080px, calc(100% - 40px));

            margin: 0 auto;

            padding: 70px 0 65px;
        }

        .hero {
            display: grid;

            grid-template-columns: 1.1fr 0.9fr;

            align-items: center;

            gap: 70px;
        }


        /* =========================================================
           HERO LEFT
        ========================================================= */

        .hero-content {
            animation: fadeUp 0.6s ease-out both;
        }

        .eyebrow {
            margin-bottom: 20px;

            font-size: 14px;
            font-weight: 700;

            color: #2f8064;
        }

        .hero-title {
            max-width: 600px;

            font-size: clamp(42px, 5vw, 64px);

            line-height: 1.08;

            letter-spacing: -2.5px;

            font-weight: 800;

            color: #173f3a;
        }

        .hero-description {
            max-width: 510px;

            margin-top: 24px;

            font-size: 17px;

            line-height: 1.8;

            color: #60756b;
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .hero-actions {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-top: 32px;
        }

        .btn {
            min-height: 52px;

            padding: 0 20px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 10px;

            border-radius: 10px;

            font-size: 15px;
            font-weight: 800;

            transition:
                transform 0.2s ease,
                background 0.2s ease,
                box-shadow 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #e39b3b;

            color: #173f3a;

            box-shadow: 0 5px 12px rgba(227, 155, 59, 0.15);
        }

        .btn-primary:hover {
            background: #efad4c;
        }

        .btn-secondary {
            background: transparent;

            color: #267052;

            border: 1px solid #c8d9d0;
        }

        .btn-secondary:hover {
            background: #e6f1eb;
        }

        .btn-icon {
            width: 17px;
            height: 17px;

            flex-shrink: 0;
        }


        /* =========================================================
           SERVICE CARD
        ========================================================= */

        .service-card {
            position: relative;

            background: rgba(255, 255, 255, 0.96);

            border: 1px solid #d7ebe8;

            border-radius: 16px;

            padding: 26px;

            box-shadow:
                0 20px 45px rgba(38, 122, 112, 0.10);

            animation: cardIn 0.7s 0.1s ease-out both;
        }

        .service-header {
            display: flex;

            align-items: flex-start;
            justify-content: space-between;

            gap: 15px;

            padding-bottom: 20px;

            border-bottom: 1px solid #ece6de;
        }

        .service-label {
            font-size: 11px;

            font-weight: 800;

            letter-spacing: 1.6px;

            color: #9aa49c;

            text-transform: uppercase;
        }

        .service-title {
            margin-top: 5px;

            font-size: 25px;

            line-height: 1.25;

            font-weight: 800;

            color: #26352f;
        }

        .calendar-icon {
            width: 24px;
            height: 24px;

            color: #315c4b;

            flex-shrink: 0;
        }


        /* =========================================================
           INFO CARDS
        ========================================================= */

        .info-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;

            padding: 20px 0;
        }

        .info-card {
            min-height: 125px;

            padding: 16px;

            background: #fbfcf9;

            border: 1px solid #e3e9e1;

            border-radius: 10px;
        }

        .info-icon {
            width: 23px;
            height: 23px;

            margin-bottom: 12px;

            color: #315c4b;
        }

        .info-title {
            font-size: 14px;

            font-weight: 800;

            color: #26352f;
        }

        .info-text {
            margin-top: 5px;

            font-size: 12px;

            line-height: 1.5;

            color: #7d8a82;
        }


        /* =========================================================
           SERVICE NOTE
        ========================================================= */

        .service-note {
            padding: 14px 16px;

            border-radius: 10px;

            background: #e8f5f1;

            color: #39716a;

            font-size: 14px;

            line-height: 1.7;

            font-weight: 600;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            position: relative;
            z-index: 2;

            width: min(1080px, calc(100% - 40px));

            margin: 0 auto;

            padding: 0 0 25px;

            color: #789087;

            font-size: 13px;

            line-height: 1.6;
        }


        /* =========================================================
           ANIMATION
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
                transform: translateY(18px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 900px) {

            .main {
                padding-top: 55px;
            }

            .hero {
                grid-template-columns: 1fr;

                gap: 45px;

                max-width: 680px;

                margin: 0 auto;
            }

            .hero-content {
                text-align: left;
            }

            .hero-title {
                max-width: 580px;
            }

            .hero-description {
                max-width: 550px;
            }

            .service-card {
                max-width: 500px;
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 600px) {

            .header-inner {
                width: calc(100% - 40px);

                min-height: 72px;
            }

            .main {
                width: calc(100% - 40px);

                padding: 56px 0 58px;
            }

            .hero {
                gap: 40px;
            }

            .eyebrow {
                margin-bottom: 21px;

                font-size: 13px;
            }

            .hero-title {
                font-size: 38px;

                line-height: 1.17;

                letter-spacing: -1.5px;
            }

            .hero-description {
                margin-top: 22px;

                font-size: 16px;

                line-height: 1.75;
            }

            .hero-actions {
                flex-direction: column;

                align-items: stretch;

                gap: 12px;

                margin-top: 30px;
            }

            .btn {
                width: 100%;

                min-height: 52px;
            }

            .service-card {
                padding: 21px;

                border-radius: 15px;
            }

            .service-title {
                font-size: 24px;

                max-width: 190px;
            }

            .info-grid {
                gap: 10px;
            }

            .info-card {
                min-height: 126px;

                padding: 15px;
            }

            .service-note {
                font-size: 13px;

                line-height: 1.8;
            }

            .footer {
                width: calc(100% - 40px);

                padding-bottom: 25px;

                font-size: 13px;
            }

            .orb-one {
                width: 250px;
                height: 250px;

                right: -130px;
                top: 175px;
            }

            .orb-two {
                width: 190px;
                height: 190px;

                left: -115px;
                bottom: 80px;
            }
        }


        /* =========================================================
           VERY SMALL PHONE
        ========================================================= */

        @media (max-width: 380px) {

            .hero-title {
                font-size: 35px;
            }

            .service-card {
                padding: 18px;
            }

            .info-card {
                padding: 13px;
            }

            .info-title {
                font-size: 13px;
            }

            .info-text {
                font-size: 11px;
            }
        }


        /* =========================================================
           REDUCE MOTION
        ========================================================= */

        @media (prefers-reduced-motion: reduce) {

            .hero-content,
            .service-card {
                animation: none;
            }

            .btn {
                transition: none;
            }
        }

    </style>
</head>


<body>

    <div class="page">

        <!-- =====================================================
             DECORATIVE BACKGROUND
        ====================================================== -->

        <span class="ambient-orb orb-one"></span>
        <span class="ambient-orb orb-two"></span>


        <!-- =====================================================
             HEADER
        ====================================================== -->

        <header class="header">

            <div class="header-inner">

                <a href="{{ url('/') }}" class="brand" aria-label="TALNGATI Beranda">

                    <span class="brand-icon">

                        <!-- Leaf Icon -->
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
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


        <!-- =====================================================
             MAIN CONTENT
        ====================================================== -->

        <main class="main">

            <section class="hero">


                <!-- =================================================
                     LEFT / HERO
                ================================================== -->

                <div class="hero-content">

                    <p class="eyebrow">
                        Layanan Pengajuan Cuti Online
                    </p>


                    <h1 class="hero-title">
                        Cuti lebih mudah, kerja lebih tenang.
                    </h1>


                    <p class="hero-description">
                        Ajukan dan pantau cuti Anda melalui satu portal resmi
                        Dinas Lingkungan Hidup.
                    </p>


                    <!-- BUTTONS -->

                    <div class="hero-actions">

                        <!-- Mulai Pengajuan -->

                        <a
                            href="{{ route('cuti.public.create') }}"
                            class="btn btn-primary"
                        >

                            <span>
                                Mulai Pengajuan Cuti
                            </span>

                            <!-- Arrow -->

                            <svg
                                class="btn-icon"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>

                        </a>


                        <!-- Lihat Status -->

                        <a
                            href="{{ route('cuti.public.status') }}"
                            class="btn btn-secondary"
                        >

                            <!-- Search -->

                            <svg
                                class="btn-icon"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="m20 20-4-4"></path>
                            </svg>

                            <span>
                                Lihat Status
                            </span>

                        </a>

                    </div>

                </div>


                <!-- =================================================
                     RIGHT / SERVICE CARD
                ================================================== -->

                <div class="service-card">

                    <!-- CARD HEADER -->

                    <div class="service-header">

                        <div>

                            <p class="service-label">
                                Ringkasan Layanan
                            </p>

                            <h2 class="service-title">
                                Praktis dan jelas
                            </h2>

                        </div>


                        <!-- Calendar -->

                        <svg
                            class="calendar-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <rect
                                width="18"
                                height="18"
                                x="3"
                                y="4"
                                rx="2"
                            ></rect>

                            <line
                                x1="16"
                                x2="16"
                                y1="2"
                                y2="6"
                            ></line>

                            <line
                                x1="8"
                                x2="8"
                                y1="2"
                                y2="6"
                            ></line>

                            <line
                                x1="3"
                                x2="21"
                                y1="10"
                                y2="10"
                            ></line>

                            <path d="M8 14h.01"></path>
                            <path d="M12 14h.01"></path>
                            <path d="M16 14h.01"></path>
                            <path d="M8 18h.01"></path>
                            <path d="M12 18h.01"></path>
                            <path d="M16 18h.01"></path>
                        </svg>

                    </div>


                    <!-- INFO CARDS -->

                    <div class="info-grid">


                        <!-- AJUKAN -->

                        <div class="info-card">

                            <!-- File Icon -->

                            <svg
                                class="info-icon"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <path d="M14 2v6h6"></path>
                                <path d="M8 13h8"></path>
                                <path d="M8 17h5"></path>
                            </svg>


                            <p class="info-title">
                                Ajukan
                            </p>

                            <p class="info-text">
                                Kapan saja
                            </p>

                        </div>


                        <!-- PANTAU -->

                        <div class="info-card">

                            <!-- Check Circle -->

                            <svg
                                class="info-icon"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                ></circle>

                                <path d="m8.5 12 2.3 2.3 4.7-5"></path>
                            </svg>


                            <p class="info-title">
                                Pantau
                            </p>

                            <p class="info-text">
                                Status terkini
                            </p>

                        </div>

                    </div>


                    <!-- NOTE -->

                    <p class="service-note">
                        Administrasi cuti yang lebih tertata dalam satu tempat.
                    </p>

                </div>

            </section>

        </main>


        <!-- =====================================================
             FOOTER
        ====================================================== -->

        <footer class="footer">

            <p>
                © 2026 Dinas Lingkungan Hidup · TALNGATI
            </p>

        </footer>

    </div>

</body>

</html>