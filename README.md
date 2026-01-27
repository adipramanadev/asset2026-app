# {{ config('app.name') }} - Sistem Manajemen Aset Modern

Solusi modern untuk mengelola inventaris aset perusahaan dengan transparan, efisien, dan terukur. Satu sistem untuk katalog, lokasi, peminjaman, perawatan, hingga laporan audit-ready.

## 🎯 Fitur Utama

### 📋 Katalog & Kategori
- Struktur aset jelas dengan kategori dan sub-kategori unlimited
- Label dan tagging otomatis untuk organisasi data
- Status tracking real-time untuk setiap aset
- Deskripsi detail dan spesifikasi lengkap

### 📊 Audit Trail
- Riwayat perubahan tercatat lengkap: siapa, kapan, dan apa yang diubah
- Log tracking untuk setiap modifikasi data
- Informasi user dan timestamp pada setiap transaksi
- Compliance dengan standar audit internal dan eksternal

### ↔️ Peminjaman & Mutasi
- Alur pinjam-kembali yang sistematis dan terstruktur
- Request peminjaman dengan persetujuan workflow
- Tracking peminjam dan durasi peminjaman
- Reminder otomatis untuk keperluan pengembalian aset
- Perpindahan lokasi yang terdokumentasi

### 📈 Laporan Instan
- Dashboard ringkasan dengan update real-time
- Total nilai aset dan statistik kondisi
- Export ke format Excel dan PDF
- Custom reports sesuai kebutuhan
- Visual charts dan analytics

### 👥 Multi-User & Role-Based Access
- Admin, Manager, dan User roles dengan permission berbeda
- Department dan divisi terpisah untuk organisasi skala besar
- Session tracking dan security audit
- Access control berbasis peran (RBAC)

### 🔧 Perawatan & Maintenance
- Schedule maintenance berkala untuk setiap aset
- History perawatan lengkap dan terstruktur
- Cost tracking untuk monitoring pengeluaran maintenance
- Alert otomatis saat maintenance jatuh tempo

### 📍 Multi-Lokasi
- Kelola aset di berbagai lokasi/kantor
- Sinkronisasi real-time antar lokasi
- Laporan per lokasi untuk visibility selengkap-lengkapnya

### 💰 Manajemen Nilai Aset
- Tracking nilai aset dan depresiasi otomatis
- Reporting sesuai standar akuntansi
- Perubahan nilai tercatat dan terawdit

## 🚀 Quick Start

### Requirements
- PHP 8.0 atau lebih tinggi
- Laravel 10.x
- MySQL 5.7 atau PostgreSQL 10+
- Composer

### Installation

1. Clone repository
```bash
git clone <repository-url>
cd asset2026-app
```

2. Install dependencies
```bash
composer install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Database setup
```bash
php artisan migrate
php artisan db:seed
```

5. Jalankan application
```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

## 📖 Penggunaan

### Login & Register
- Kunjungi homepage untuk registrasi akun baru
- Login dengan email dan password
- Sistem otomatis mengarahkan ke dashboard sesuai role

### Dashboard
Dashboard menampilkan:
- Ringkasan total aset
- Aset dalam peminjaman
- Aktivitas terbaru
- Kondisi aset (visual chart)

### Manajemen Aset
1. Akses menu **Aset Inventory**
2. **Create** - Tambah aset baru dengan kategori, lokasi, dan detail
3. **View** - Lihat history dan detail aset
4. **Edit** - Update informasi aset
5. **Delete** - Hapus aset (dengan audit log)

### Peminjaman Aset
1. Buka menu **Peminjaman**
2. **Request** - Buat request peminjaman dengan durasi
3. **Approve** - Manager approve/reject request
4. **Return** - Catat pengembalian aset
5. **History** - Lihat riwayat peminjaman per user/aset

### Perawatan Aset
1. Akses **Maintenance Schedule**
2. Buat jadwal perawatan berkala
3. Track history perawatan dan biaya
4. Alert notifikasi untuk maintenance due

### Laporan
- **Asset Report** - Overview semua aset dengan filter
- **Depreciation Report** - Analisa penyusutan nilai
- **Loan Report** - Tracking peminjaman aktif & completed
- **Maintenance Report** - Riwayat dan cost analysis
- Export ke Excel/PDF untuk presentasi

## 🔐 Keamanan

- Enkripsi password dengan bcrypt
- CSRF protection untuk form submission
- SQL injection prevention dengan prepared statements
- XSS protection
- Rate limiting untuk login attempts
- Session management yang aman
- Backup otomatis terencana

## 📱 Responsive Design

Aplikasi responsive dan dapat diakses dari:
- Desktop (Chrome, Firefox, Safari, Edge)
- Tablet (iPad, Android Tablet)
- Smartphone (iOS, Android)

## 🛠️ Konfigurasi

Edit file `.env` untuk konfigurasi:
```env
APP_NAME="{{ config('app.name') }}"
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=asset2026
DB_USERNAME=root
DB_PASSWORD=
```

## 📞 Support

- **Dokumentasi**: [Link Dokumentasi]
- **Email Support**: support@asset2026.com
- **Issue Tracker**: [GitHub Issues]

## 📄 License

Proprietary - Semua hak cipta dilindungi.

## 👨‍💼 Tim Developer

Dikembangkan untuk solusi manajemen aset enterprise yang scalable dan reliable.

---

**Versi**: 1.0.0  
**Last Updated**: {{ date('Y-m-d') }}

