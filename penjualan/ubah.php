<?php
session_start();
require '../functions.php';

function ubah($data)
{
  global $conn;
  $id = $data["id"];
  $kode_barang = $data['kode_barang'];
  $bulan_penjualan = $data['bulan_penjualan'];
  $tahun_penjualan = $data['tahun_penjualan'];
  $jumlah_penjualan = $data['jumlah_penjualan'];

  $query = "UPDATE tb_penjualan SET
				kode_barang = '$kode_barang',
				bulan_penjualan = '$bulan_penjualan',
				tahun_penjualan = '$tahun_penjualan',
				jumlah_penjualan = '$jumlah_penjualan'
        WHERE penjualan_id = $id
			";

  mysqli_query($conn, $query);


  return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

  // cek apakah data berhasil diubah atau tidak
  if (ubah($_POST) > 0) {
    $_SESSION['status'] = "Data Penjualan Barang";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil Diubah";
    header("Location: ../data-penjualan.php");
  } else {
    $_SESSION['status'] = "Data Penjualan Barang";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal Diubah";
    header("Location: ../data-penjualan.php");
  }
}
