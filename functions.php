<?php
// functions.php

// Fungsi untuk menghitung total nilai aset gudang (Harga * Stok semua produk)
function hitungTotalNilaiStok($data_produk) {
    $total = 0;
    foreach ($data_produk as $item) {
        $total += $item['harga'] * $item['stok'];
    }
    return $total;
}

// Fungsi untuk menentukan warna baris tabel jika stok kritis
function cekStatusStok($stok) {
    if ($stok < 3) {
        return "background-color: #ffcccc; color: #a00;"; // Warna merah muda untuk peringatan
    }
    return "";
}
?>