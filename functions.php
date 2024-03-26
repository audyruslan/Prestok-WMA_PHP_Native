<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_prestok");

// Hapus Data Barang
function hapus_barang($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_barang WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Penjualan Barang
function hapus_penjualan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_penjualan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Peramalan
function hapus_peramalan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_peramalan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Admin
function hapus_admin($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_user WHERE username = '$id'");
    return mysqli_affected_rows($conn);
}

function upload_gambar()
{
    $namaFile = $_FILES['gambar']['name'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmpName, '../assets/img/barang/' . $namaFile);

    return $namaFile;
}

function avatar($character)
{
    $path = "image/" . time() . ".png";
    $image = imagecreate(200, 200);
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);
    $textcolor = imagecolorallocate($image, 255, 255, 255);

    $font = dirname(__FILE__) . "/assets/font/arial.ttf";

    imagettftext($image, 100, 0, 55, 150, $textcolor, $font, $character);
    imagepng($image, $path);
    imagedestroy($image);
    return $path;
}

// Kode Data Barang (BRG)
$sql = mysqli_query($conn, "SELECT max(kode_barang) as maxID from tb_barang");
$data = mysqli_fetch_array($sql);

$code = $data['maxID'];
$urutan = (int) substr($code, 3, 3);
$urutan++;

$ket = "BRG";
$autocode = $ket . sprintf("%03s", $urutan);

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function getBulan($angka_bulan)
{
    switch ($angka_bulan) {
        case '01':
            return 'Januari';
        case '02':
            return 'Februari';
        case '03':
            return 'Maret';
        case '04':
            return 'April';
        case '05':
            return 'Mei';
        case '06':
            return 'Juni';
        case '07':
            return 'Juli';
        case '08':
            return 'Agustus';
        case '09':
            return 'September';
        case '10':
            return 'Oktober';
        case '11':
            return 'November';
        case '12':
            return 'Desember';
        default:
            return 'Bulan tidak valid';
    }
}
