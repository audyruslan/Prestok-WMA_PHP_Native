<?php
session_start();
require '../functions.php';

function tambah($data)
{
    global $conn;
    $kode_barang = $data['kode_barang'];
    $getBulanTahun = $data['bulan_tahun'];
    $bulan = substr($getBulanTahun, 5, 2);
    $tahun_penjualan = substr($getBulanTahun, 0, 4);
    $jumlah_barang = $data['jumlah_barang'];

    $bulan_penjualan = getBulan($bulan);

    $query = "INSERT INTO tb_penjualan
				VALUES 
				('','$kode_barang','$bulan_penjualan','$tahun_penjualan','$jumlah_barang')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah($_POST) > 0) {
        $_SESSION['status'] = "Data Penjualan Barang";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Ditambahkan";
        header("Location: ../data-penjualan.php");
    } else {
        $_SESSION['status'] = "Data Penjualan Barang";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Ditambahkan";
        header("Location: ../data-penjualan.php");
    }
}
