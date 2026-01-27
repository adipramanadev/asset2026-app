<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitur - {{ config('app.name') }} | Sistem Manajemen Aset Modern</title>

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

        /* Page Header */
        .page-header {
            padding: 3rem 0;
            text-align: center;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.125rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        @media (min-width: 1024px) {
            .page-header h1 {
                font-size: 3rem;
            }
        }

        /* Features Grid */
        .features-section {
            padding: 3rem 0;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        @media (min-width: 768px) {
            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .feature-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .feature-card {
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            border-color: var(--border-hover);
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--primary);
            color: var(--bg-white);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            font-size: 0.925rem;
            color: var(--text-secondary);
            padding: 0.5rem 0;
            padding-left: 1.75rem;
            position: relative;
        }

        .feature-list li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--success);
            font-weight: 600;
        }

        /* Detailed Section */
        .detailed-section {
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2.5rem;
            margin-bottom: 2rem;
        }

        .detailed-section h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .detail-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .detail-item {
            padding: 1.5rem;
            background: var(--bg-light);
            border-radius: 10px;
        }

        .detail-item h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .detail-item p {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        /* CTA Section */
        .cta-section {
            background: var(--primary);
            color: var(--bg-white);
            padding: 3rem 2rem;
            border-radius: 16px;
            text-align: center;
            margin: 3rem 0;
        }

        .cta-section h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        @media (min-width: 640px) {
            .cta-buttons {
                flex-direction: row;
            }
        }

        .btn-large {
            padding: 0.875rem 1.75rem;
            font-size: 1rem;
        }

        .btn-cta {
            background: var(--bg-white);
            color: var(--primary);
        }

        .btn-cta:hover {
            background: var(--bg-light);
        }

        /* Footer */
        footer {
            padding: 3rem 0;
            margin-top: 3rem;
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
                            <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Fitur Lengkap {{ config('app.name') }}</h1>
            <p>Semua yang Anda butuhkan untuk mengelola aset organisasi dengan efisien dan transparan</p>
        </div>
    </section>

    <!-- Main Features -->
    <section class="features-section">
        <div class="container">
            <div class="feature-grid">
                <!-- Katalog & Kategori -->
                <div class="feature-card">
                    <div class="feature-icon">#</div>
                    <h3>Katalog & Kategori</h3>
                    <p>Organisir aset dengan struktur yang jelas dan terukur</p>
                    <ul class="feature-list">
                        <li>Kategori dan sub-kategori unlimited</li>
                        <li>Label dan tagging otomatis</li>
                        <li>Status tracking real-time</li>
                        <li>Deskripsi detail dan spesifikasi</li>
                    </ul>
                </div>

                <!-- Audit Trail -->
                <div class="feature-card">
                    <div class="feature-icon">📋</div>
                    <h3>Audit Trail</h3>
                    <p>Pencatatan lengkap setiap perubahan data aset</p>
                    <ul class="feature-list">
                        <li>Log lengkap perubahan</li>
                        <li>Informasi user & timestamp</li>
                        <li>Riwayat nilai aset</li>
                        <li>Tracking mutasi & pemindahan</li>
                    </ul>
                </div>

                <!-- Peminjaman & Mutasi -->
                <div class="feature-card">
                    <div class="feature-icon">↔️</div>
                    <h3>Peminjaman & Mutasi</h3>
                    <p>Kelola alur pinjam-kembali dan perubahan lokasi</p>
                    <ul class="feature-list">
                        <li>Request peminjaman terstruktur</li>
                        <li>Persetujuan & approval workflow</li>
                        <li>Tracking peminjam & durasi</li>
                        <li>Reminder otomatis jatuh tempo</li>
                    </ul>
                </div>

                <!-- Laporan Instan -->
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Laporan Instan</h3>
                    <p>Ringkasan dan analisis data terupdate setiap saat</p>
                    <ul class="feature-list">
                        <li>Total nilai aset realtime</li>
                        <li>Statistik kondisi & utilisasi</li>
                        <li>Export ke Excel & PDF</li>
                        <li>Dashboard visual & charts</li>
                    </ul>
                </div>

                <!-- Multi-User & Role -->
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <h3>Multi-User & Role</h3>
                    <p>Kontrol akses berbasis peran untuk keamanan maksimal</p>
                    <ul class="feature-list">
                        <li>Admin, Manager, User roles</li>
                        <li>Permission-based access</li>
                        <li>Department & divisi terpisah</li>
                        <li>Session tracking & security</li>
                    </ul>
                </div>

                <!-- Perawatan & Maintenance -->
                <div class="feature-card">
                    <div class="feature-icon">🔧</div>
                    <h3>Perawatan & Maintenance</h3>
                    <p>Jadwalkan dan pantau pemeliharaan aset</p>
                    <ul class="feature-list">
                        <li>Schedule maintenance berkala</li>
                        <li>History perawatan lengkap</li>
                        <li>Cost tracking per aset</li>
                        <li>Alert maintenance due</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Features -->
    <section class="features-section">
        <div class="container">
            <div class="detailed-section">
                <h2>Fitur Advanced</h2>
                <div class="detail-grid">
                    <div class="detail-item">
                        <h4>📍 Multi-Lokasi</h4>
                        <p>Kelola aset di berbagai lokasi/kantor dengan sinkronisasi real-time dan laporan per lokasi.</p>
                    </div>
                    <div class="detail-item">
                        <h4>💰 Manajemen Nilai Aset</h4>
                        <p>Tracking nilai aset, depresiasi otomatis, dan reporting sesuai standar akuntansi.</p>
                    </div>
                    <div class="detail-item">
                        <h4>📱 Responsive Design</h4>
                        <p>Akses dari desktop, tablet, atau smartphone dengan tampilan yang optimal.</p>
                    </div>
                    <div class="detail-item">
                        <h4>🔐 Data Security</h4>
                        <p>Enkripsi data, backup otomatis, dan compliance dengan standar keamanan.</p>
                    </div>
                    <div class="detail-item">
                        <h4>⚡ Real-time Sync</h4>
                        <p>Update data otomatis tanpa perlu refresh manual, teknologi terkini.</p>
                    </div>
                    <div class="detail-item">
                        <h4>🎯 Custom Reports</h4>
                        <p>Buat laporan custom sesuai kebutuhan dan jadwalkan pengiriman otomatis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section>
        <div class="container">
            <div class="cta-section">
                <h2>Siap Kelola Aset dengan Lebih Baik?</h2>
                <p>Bergabunglah dengan puluhan organisasi yang telah mempercayai sistem ini</p>
                <div class="cta-buttons">
                    @auth
                        <a href="{{ route('home') }}" class="btn btn-cta btn-large">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-cta btn-large">
                            Login Sekarang
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-cta btn-large">
                            Daftar Gratis
                        </a>
                    @endauth
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
                    <a href="/" class="footer-link">Home</a>
                    <a href="#" class="footer-link">Dokumentasi</a>
                    <a href="#" class="footer-link">Support</a>
                    <a href="#" class="footer-link">Privacy</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
