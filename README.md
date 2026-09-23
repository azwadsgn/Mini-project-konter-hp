**Blueprint Arsitektur Konseptual: Sistem Informasi Inventaris Konter HP Azwa**


**1. Ringkasan Eksekutif & Tujuan Perancangan**
Dokumen ini mendokumentasikan arsitektur perangkat lunak berbasis web untuk mengelola dan menyajikan data inventaris produk pada Konter HP Azwa. Sistem dibangun dengan menerapkan pola pemisahan tanggung jawab (Separation of Concerns / SoC) yang terbagi ke dalam tiga tingkatan (3-Tier Architecture) sederhana untuk memisahkan antara data mentah, pemrosesan logika, dan visualisasi antarmuka.

**2. Pemetaan Alur & Arsitektur Perangkat Lunak**
a. Data Layer (products.php): Berfungsi sebagai penyimpan struktur data katalog perangkat & aksesori.   
b. Processing Layer (functions.php): Menyediakan fungsi kalkulasi finansial inventaris dan penentuan gaya kondisional visual. 
c. Presentation Layer (index.php): Mengagregasi data dan logika, lalu merender antarmuka tabel berbasis HTML.

**3. Detail & Spesifikasi Komponen Berkas**
A. Data Layer (products.php)
  Peran Sistem: Menyimpan seluruh entitas barang yang dijual di konter secara statis dalam memori saat aplikasi dijalankan.
  -Tipe Data: Array asosiatif bertingkat (Multidimensional Associative Array) yang disimpan dalam variabel $products.
  -Atribut Entitas Produk:
  1) id (String): Identifikasi unik entitas barang (contoh: "P001", "P002").
  2) nama (String): Nama/seri perangkat atau barang (contoh: "Samsung Galaxy A54").
  3) kategori (String): Klasifikasi produk (Smartphone, Aksesoris, Kartu Perdana).
  4) harga (Integer): Nilai jual produk dalam satuan mata uang Rupiah.
  5) stok (Integer): Jumlah ketersediaan unit di konter.
  6) deskripsi (String): Detail spesifikasi ringkas produk.

B. Processing Layer (functions.php)
  Peran Sistem: Tempat terpusat untuk logika operasional bisnis, kalkulasi nilai aset, dan penanganan aturan tampilan
  peringatan.
  Spesifikasi Fungsi:
  1) hitungTotalNilaiStok($data_produk)
     -Parameter: $data_produk (Array multidimensi dari Data Layer).
     -Mekanisme: Melakukan iterasi perulangan (foreach) untuk mengalikan atribut harga dengan stok pada tiap item, kemudian
     diakumulasikan ke variabel $total.
     -Nilai Kembalian: Besaran angka nominal total seluruh aset barang.
  2) cekStatusStok($stok)
     -Parameter: $stok (Integer kuantitas barang).
     -Mekanisme: Memeriksa pengkondisian evaluasi jika kuantitas kurang dari 3 unit ($stok < 3).
     -Nilai Kembalian: String format inline CSS background-color: #ffcccc; color: #a00; untuk memberikan penanda visual
     merah jika terdeteksi kritis, atau string kosong jika stok aman.

C. Presentation Layer (index.php)
  Peran Sistem: Mengelola user interface (UI), menggabungkan komponen layer lain, dan menyajikan informasi inventaris kepada   pengguna.
  Mekanisme Eksekusi & Alur Rendering:
  1) Inklusi Modul: Memanggil berkas data dan fungsi di bagian paling atas dokumen menggunakan instruksi require_once
     (products.php dan functions.php).
  2) Konstruksi Tabel: Menyusun struktur tabel HTML (<table>, <thead>, <tbody>) dengan penataan gaya khusus CSS pada header
     (#75ff95).
  3) Iterasi & Format Baris (foreach):
     -Melakukan iterasi terhadap variabel array $products.
     -Menyisipkan atribut style inline hasil pemanggilan cekStatusStok($p['stok']) pada elemen <tr>.
     -Menformat tampilan angka harga menggunakan fungsi number_format() dengan pemisah ribuan titik.
     -Menambahkan elemen indikator teks <span class="badge"> (Stok Kritis!)</span> secara kondisional jika jumlah stok di
     bawah 3.
  4) Penyajian Ringkasan Aset: Menampilkan total nilai keseluruhan barang di bagian bawah tabel dengan memanggil fungsi
     hitungTotalNilaiStok($products) yang diformat ke dalam Rupiah.
   
