<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Sistem Manajemen Aset Modern</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #111827;
            --primary-dark: #1f2937;
            --accent: #3b82f6;
            --success: #10b981;
            --warning: #f59e0b;
            --bg-light: #f9fafb;
            --bg-white: #ffffff;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --border: #e5e7eb;
            --border-hover: #d1d5db;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --primary: #f9fafb;
                --primary-dark: #e5e7eb;
                --bg-light: #0f172a;
                --bg-white: #1e293b;
                --text-primary: #f1f5f9;
                --text-secondary: #cbd5e1;
                --text-muted: #94a3b8;
                --border: #334155;
                --border-hover: #475569;
            }
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--bg-light);
            color: var(--text-primary);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Header */
        header {
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.9);
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(12px);
        }

        @media (prefers-color-scheme: dark) {
            header {
                background: rgba(30, 41, 59, 0.9);
            }
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo {
            width: 42px;
            height: 42px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--bg-white);
            font-size: 1rem;
        }

        .logo-text h1 {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.2;
        }

        .logo-text p {
            font-size: 0.8125rem;
            color: var(--text-muted);
        }

        nav {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--bg-white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            border-color: var(--border);
            color: var(--text-primary);
        }

        .btn-outline:hover {
            border-color: var(--border-hover);
            background: var(--bg-white);
        }

        .btn-ghost {
            color: var(--text-secondary);
        }

        .btn-ghost:hover {
            color: var(--text-primary);
            background: var(--bg-light);
        }

        /* Hero */
        .hero {
            padding: 5rem 0;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
            align-items: center;
        }

        @media (min-width: 1024px) {
            .hero {
                padding: 7rem 0;
            }

            .hero-grid {
                grid-template-columns: 1.1fr 0.9fr;
                gap: 4rem;
            }
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 999px;
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: var(--success);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 1024px) {
            h1 {
                font-size: 3.5rem;
            }
        }

        .subtitle {
            font-size: 1.125rem;
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        /* Features */
        .features-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        @media (min-width: 640px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .feature-card {
            padding: 1.25rem;
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            gap: 1rem;
        }

        .feature-card:hover {
            border-color: var(--border-hover);
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            background: var(--primary);
            color: var(--bg-white);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.125rem;
        }

        .feature-content h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.375rem;
        }

        .feature-content p {
            font-size: 0.875rem;
            color: var(--text-secondary);
            line-height: 1.5;
        }

        /* CTA */
        .cta-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 640px) {
            .cta-group {
                flex-direction: row;
            }
        }

        .btn-large {
            padding: 0.875rem 1.75rem;
            font-size: 1rem;
        }

        .cta-note {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        /* Preview */
        .preview-wrapper {
            position: relative;
            padding: 1rem 0;
        }

        .preview-bg {
            position: absolute;
            inset: -2rem;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(147, 51, 234, 0.08) 100%);
            border-radius: 2rem;
            filter: blur(40px);
            opacity: 0.7;
        }

        .preview-card {
            position: relative;
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .preview-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border);
            background: var(--bg-light);
        }

        .window-controls {
            display: flex;
            gap: 0.5rem;
        }

        .window-control {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .control-red {
            background: #ef4444;
        }

        .control-yellow {
            background: #f59e0b;
        }

        .control-green {
            background: #10b981;
        }

        .preview-title {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .preview-content {
            padding: 1.5rem;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .section-header h4 {
            font-size: 0.9375rem;
            font-weight: 600;
        }

        .section-subtitle {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .preview-filter {
            padding: 0.375rem 0.875rem;
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.875rem;
            margin-bottom: 1.25rem;
        }

        .stat-card {
            padding: 1.125rem;
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 0.375rem;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .stat-change {
            font-size: 0.75rem;
        }

        .positive {
            color: var(--success);
        }

        .warning {
            color: var(--warning);
        }

        .activity-box {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.125rem;
            margin-bottom: 1.25rem;
        }

        .activity-title {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 0.875rem;
        }

        .activity-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.625rem 0;
            font-size: 0.875rem;
        }

        .activity-item:not(:last-child) {
            border-bottom: 1px solid var(--border);
        }

        .activity-time {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .chart-box {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.125rem;
        }

        .chart-title {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 0.875rem;
        }

        .chart {
            display: flex;
            gap: 0.625rem;
            align-items: flex-end;
            height: 80px;
        }

        .chart-bar {
            flex: 1;
            background: var(--primary);
            border-radius: 4px;
            opacity: 0.75;
            transition: all 0.3s ease;
        }

        .chart-bar:hover {
            opacity: 1;
            transform: scaleY(1.05);
        }

        .floating-badge {
            position: absolute;
            bottom: -1.75rem;
            left: 1.5rem;
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 0.875rem 1.125rem;
            box-shadow: var(--shadow-lg);
            z-index: 10;
        }

        .floating-badge-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 0.25rem;
        }

        .floating-badge-text {
            font-size: 0.875rem;
            font-weight: 600;
        }

        /* Footer */
        footer {
            padding: 3rem 0;
            margin-top: 5rem;
            border-top: 1px solid var(--border);
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            align-items: flex-start;
        }

        @media (min-width: 640px) {
            .footer-content {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        .footer-text {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-link {
            font-size: 0.875rem;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-link:hover {
            color: var(--text-primary);
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade {
            animation: fadeInUp 0.6s ease-out backwards;
        }

        .animate-delay-1 {
            animation-delay: 0.1s;
        }

        .animate-delay-2 {
            animation-delay: 0.2s;
        }

        .animate-delay-3 {
            animation-delay: 0.3s;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <div class="logo">AM</div>
                    <div class="logo-text">
                        <h1>{{ config('app.name') }}</h1>
                        
                    </div>
                </div>

                @if (Route::has('login'))
                    <nav>
                        @auth
                            <a href="{{ url('/admin/home') }}" class="btn btn-outline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-ghost">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-grid">
                <!-- Left Content -->
                <div>
                    <div class="badge animate-fade">
                        <span class="status-dot"></span>
                        Real-time tracking • Audit-ready • Multi lokasi
                    </div>

                    <h1 class="animate-fade animate-delay-1">
                        Kelola aset perusahaan dengan rapi, cepat, dan elegan
                    </h1>

                    <p class="subtitle animate-fade animate-delay-2">
                        Satu sistem untuk inventaris, kategori, lokasi, peminjaman, perawatan, hingga laporan.
                        Minim drama, maksimal kontrol.
                    </p>

                    <!-- Features -->
                    <div class="features-grid animate-fade animate-delay-2">
                        <div class="feature-card">
                            <div class="feature-icon">#</div>
                            <div class="feature-content">
                                <h3>Katalog & Kategori</h3>
                                <p>Struktur aset jelas dengan kategori, sub-kategori, label, dan status</p>
                            </div>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon">✓</div>
                            <div class="feature-content">
                                <h3>Audit Trail</h3>
                                <p>Riwayat perubahan tercatat: siapa, kapan, dan apa yang diubah</p>
                            </div>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon">↔</div>
                            <div class="feature-content">
                                <h3>Peminjaman & Mutasi</h3>
                                <p>Alur pinjam-kembali dan perpindahan lokasi yang sistematis</p>
                            </div>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon">📊</div>
                            <div class="feature-content">
                                <h3>Laporan Instan</h3>
                                <p>Ringkasan nilai aset dan utilisasi dalam hitungan detik</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="cta-group animate-fade animate-delay-3">
                        @auth
                            <a href="{{ route('home') }}" class="btn btn-primary btn-large">
                                Buka Dashboard →
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-large">
                                Mulai Sekarang →
                            </a>
                        @endauth
                        <a href="#fitur" class="btn btn-outline btn-large">
                            Lihat Fitur
                        </a>
                    </div>

                    <p class="cta-note animate-fade animate-delay-3">
                        ✨ Aman • Cepat • Siap scaling • Cocok untuk perusahaan multi divisi
                    </p>
                </div>

                <!-- Right Preview -->
                <div class="preview-wrapper animate-fade animate-delay-2">
                    <div class="preview-bg"></div>

                    <div class="preview-card">
                        <div class="preview-header">
                            <div class="window-controls">
                                <span class="window-control control-red"></span>
                                <span class="window-control control-yellow"></span>
                                <span class="window-control control-green"></span>
                            </div>
                            <span class="preview-title">Dashboard Preview</span>
                        </div>

                        <div class="preview-content">
                            <!-- Section Header -->
                            <div class="section-header">
                                <div>
                                    <h4>Ringkasan Aset</h4>
                                    <div class="section-subtitle">Update real-time</div>
                                </div>
                                <div class="preview-filter">Januari</div>
                            </div>

                            <!-- Stats Grid -->
                            <div class="stats-grid">
                                <div class="stat-card">
                                    <div class="stat-label">Total Aset</div>
                                    <div class="stat-value">1.248</div>
                                    <div class="stat-change positive">+4.2%</div>
                                </div>
                                <div class="stat-card">
                                    <div class="stat-label">Dalam Peminjaman</div>
                                    <div class="stat-value">86</div>
                                    <div class="stat-change warning">butuh follow-up</div>
                                </div>
                            </div>

                            <!-- Activity List -->
                            <div class="activity-box">
                                <div class="activity-title">Aktivitas Terbaru</div>
                                <div class="activity-item">
                                    <span>Mutasi • Laptop Dell Latitude</span>
                                    <span class="activity-time">2 jam</span>
                                </div>
                                <div class="activity-item">
                                    <span>Peminjaman • Proyektor Epson</span>
                                    <span class="activity-time">5 jam</span>
                                </div>
                                <div class="activity-item">
                                    <span>Maintenance • AC Ruang Meeting</span>
                                    <span class="activity-time">1 hari</span>
                                </div>
                            </div>

                            <!-- Chart -->
                            <div class="chart-box">
                                <div class="chart-title">Kondisi Aset</div>
                                <div class="chart">
                                    <div class="chart-bar" style="height: 85%;"></div>
                                    <div class="chart-bar" style="height: 60%;"></div>
                                    <div class="chart-bar" style="height: 75%;"></div>
                                    <div class="chart-bar" style="height: 45%;"></div>
                                    <div class="chart-bar" style="height: 55%;"></div>
                                    <div class="chart-bar" style="height: 35%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="floating-badge">
                        <div class="floating-badge-label">Siap pakai</div>
                        <div class="floating-badge-text">Role-based Access • Export Laporan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-text">
                    © {{ date('Y') }} {{ config('app.name') }} • Sistem Manajemen Aset
                </div>
                <div class="footer-links">
                    <a href="#" class="footer-link">Dokumentasi</a>
                    <a href="#" class="footer-link">Support</a>
                    <a href="#" class="footer-link">Privacy</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
