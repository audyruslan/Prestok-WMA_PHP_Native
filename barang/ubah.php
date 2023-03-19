<?php
session_start();
require '../functions.php';

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $kode_barang = $data['kode_barang'];
    $nama_barang = $data['nama_barang'];

    $query = "UPDATE tb_barang SET
				kode_barang = '$kode_barang',
				nama_barang = '$nama_barang'
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
        $_SESSION['status'] = "Data Barang";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diubah";
      header("Location: ../data-barang.php");
    } else {
        $_SESSION['status'] = "Data Barang";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diubah";
      header("Location: ../data-barang.php");
    }
}