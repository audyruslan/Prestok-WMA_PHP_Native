<?php
session_start();
require '../functions.php';

$id = $_GET["id"];

if (hapus_barang($id) > 0) {
    $_SESSION['status'] = "Data Barang";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil DiHapus!";
      header("Location: ../data-barang.php");
} else {
    $_SESSION['status'] = "Data Barang";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal DiHapus!";
      header("Location: ../data-barang.php");
}