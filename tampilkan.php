<?php
// index.php
require_once 'katalog_hp.php';
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Konter HP</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .badge { font-weight: bold; }
    </style>
</head>
<body>

    <h2>Daftar Produk Konter HP Gemilang</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
            <!-- Menerapkan logika warna jika stok < 3 -->
            <tr style="<?php echo cekStatusStok($p['stok']); ?>">
                <td><?php echo $p['id']; ?></td>
                <td><?php echo $p['nama']; ?></td>
                <td><?php echo $p['kategori']; ?></td>
                <td>Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></td>
                <td>
                    <?php echo $p['stok']; ?>
                    <?php if ($p['stok'] < 3) echo '<span class="badge"> (Stok Kritis!)</span>'; ?>
                </td>
                <td><?php echo $p['deskripsi']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Total Nilai Aset Barang di Konter: 
        Rp <?php echo number_format(hitungTotalNilaiStok($products), 0, ',', '.'); ?>
    </h3>

</body>
</html>