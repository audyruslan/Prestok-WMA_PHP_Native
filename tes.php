<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_prestok");

// Ambil bulan yang akan diprediksi dari parameter GET
$bulan = "Maret";

// Query untuk mengambil data penjualan barang
$query = "SELECT bulan_penjualan, jumlah_barang FROM tb_penjualan WHERE bulan_penjualan = '$bulan'";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dijalankan atau tidak
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

// Inisialisasi bobot
$w1 = 0.5;
$w2 = 0.3;
$w3 = 0.2;

// Inisialisasi variabel penampung
$jumlah_brang = array();
$tanggal = array();
$jumlah_hari = 0;

// Ambil nilai penjualan barang dari hasil query dan masukkan ke dalam array
while ($row = mysqli_fetch_array($result)) {
    $jumlah_brang[] = $row['jumlah_barang'];
    $tanggal[] = $row['bulan_penjualan'];
    $jumlah_hari++;
}

// Hitung nilai ramalan dengan rumus WMA
$ramalan = 0;
for ($i = 0; $i < $jumlah_hari; $i++) {
    $ramalan += ($w1 * $jumlah_brang[$i]) + ($w2 * $jumlah_brang[$i + 1]) + ($w3 * $jumlah_brang[$i + 2]);
}
$ramalan /= $jumlah_hari;

// Tampilkan nilai ramalan
echo "Ramalan jumlah penjualan barang untuk bulan " . date('m', strtotime('2023-' . $bulan . '-01')) . " adalah: " . $ramalan;
