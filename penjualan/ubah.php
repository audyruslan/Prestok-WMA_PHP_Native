<?php
session_start();
require '../functions.php';

function ubah($data)
{
  global $conn;
  $id = $data["id"];
  $kode_barang = $data['kode_barang'];
  $nama_barang = $data['nama_barang'];
  $bulan_penjualan = $data['bulan_penjualan'];
  $tahun_penjualan = $data['tahun_penjualan'];
  $getBulanTahun = $data['bulan_tahun'];
  $bulan_tahun = date("Y-m-01", strtotime($getBulanTahun));

  $query = "UPDATE tb_penjualan SET
				kode_barang = '$kode_barang',
				nama_barang = '$nama_barang',
				bulan_penjualan = '$bulan_penjualan',
				tahun_penjualan = '$tahun_penjualan'
        WHERE id = $id
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