<?php
session_start();
require '../functions.php';

function tambah($data)
{
    global $conn;
    $kode_barang = $data['kode_barang'];
    $nama_barang = $data['nama_barang'];
    $getBulanTahun = $data['bulan_tahun'];
    $bulan_tahun = tgl_indo($getBulanTahun);
    $jumlah_barang = $data['jumlah_barang'];

    $query = "INSERT INTO tb_barang
				VALUES 
				('','$kode_barang','$nama_barang','$bulan_tahun','$jumlah_barang')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah($_POST) > 0) {
        $_SESSION['status'] = "Data Barang";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Ditambahkan";
        header("Location: ../data-barang.php");
    } else {
        $_SESSION['status'] = "Data Barang";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Ditambahkan";
        header("Location: ../data-barang.php");
    }
}
