<?php

use JetBrains\PhpStorm\ArrayShape;

session_start();
require '../functions.php';

function ramal($data)
{
    global $conn;
    $nama_barang = $data['nama_barang'];
    $bulan_penjualan = $data['bulan_penjualan'];
    $tahun_penjualan = $data['tahun_penjualan'];
    $tgl_peramalan = $tahun_penjualan . "-" . $bulan_penjualan;
    $tgl_dibuat = date("Y-m-d");

    $tahun_bulan_awal_row_x3 = date("m", strtotime('-3 month', strtotime($tgl_peramalan)));
    $tahun_bulan_akhir_row_x1 = date("m", strtotime('-1 month', strtotime($tgl_peramalan)));

    // Jumlah Pengeluaran Berdasarkan Bulan yang akan di Ramal
    $jumlah_pengeluaran = mysqli_query($conn, "SELECT SUM(jumlah_barang) as total from tb_penjualan WHERE bulan_penjualan = $bulan_penjualan AND tahun_penjualan = $tahun_penjualan");
    $data = mysqli_fetch_assoc($jumlah_pengeluaran);

    // Total Penjualan
    $totPenjulaan = $data["total"];

    // View Pengeluaran
    $no_wma = 1;
    $viewPengeluaran = array();
    $viewPengeluaran = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE bulan_penjualan = $tahun_bulan_akhir_row_x1 ");
    while ($pengeluaran = mysqli_fetch_assoc($viewPengeluaran)) {
        $data[] = $pengeluaran["jumlah_barang"] * $no_wma++;
    }
    $total = array_sum($data);

    $total_wma = round($total / 6, 1, 2);
    $error = $totPenjulaan - $total_wma;
    $mad = abs($error);
    $mse = pow($error, 2);

    $query = "INSERT INTO tb_peramalan
				VALUES 
				('','$nama_barang','$bulan_penjualan','$tahun_penjualan','$totPenjulaan','$total_wma','$error','$mad','$mse','$tgl_dibuat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["ramal"])) {

    if (ramal($_POST) > 0) {
        $_SESSION['status'] = "Peramalan Barang";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diproses";
        header("Location: ../hasil-peramalan.php");
    } else {
        $_SESSION['status'] = "Peramalan Barang";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diproses";
        header("Location: ../hasil-peramalan.php");
    }
}
