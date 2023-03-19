<?php
session_start();
require '../functions.php';

function import($data)
{
    global $conn;
    $kode_barang = $data['kode_barang'];

    $query = "INSERT INTO tb_barang
				VALUES 
				('','$kode_barang','$nama_barang')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["import"])) {

    if (import($_POST) > 0) {
        $_SESSION['status'] = "Data Barang";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../data-barang.php");
    } else {
        $_SESSION['status'] = "Data Barang";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../data-barang.php");
    }
}
