**Sistem Informasi Konter HP Azwa**

Aplikasi berbasis web sederhana menggunakan PHP untuk mengelola inventaris produk, memantau ketersediaan stok barang secara real-time, serta menghitung total nilai aset gudang di konter HP.

**Struktur File Project**
Project ini terdiri dari tiga file, yakni:
1. tampilkan.php — Halaman antarmuka (UI) utama yang merender tabel daftar produk serta menampilkan kalkulasi total nilai aset.
2. katalog_hp.php — Berisi array data produk sementara yang menyimpan informasi lengkap (ID, nama, kategori, harga, stok, dan deskripsi).
3. functions.php — Berisi fungsi pendukung untuk menghitung total nilai seluruh stok (hitungTotalNilaiStok) dan logika peringatan otomatis untuk stok kritis (cekStatusStok).

**Fitur Utama**
1. Tabel Inventaris Produk: Menampilkan detail barang secara terstruktur dan rapi.
2. Indikator Stok Kritis: Baris pada tabel otomatis berubah warna menjadi merah muda (#ffcccc) dan menampilkan label (Stok Kritis!) jika stok kurang dari 3 unit.
3. Kalkulasi Otomatis Aset: Menghitung total keseluruhan nilai aset barang berdasarkan perkalian harga dan stok secara dinamis.

**Cara Menjalankan Project**
1. Pastikan server lokal PHP (seperti XAMPP, Laragon, atau PHP Built-in Server) sudah terinstal di komputer.
2. Simpan ketiga file tersebut (functions.php, katalog_hp.php, dan tampilkan.php) ke dalam satu folder yang sama di direktori server lokal (misalnya di htdocs/konter-hp).
3. Buka browser dan akses file utamanya melalui URL:
http://localhost/konter-hp/tampilkan.php

