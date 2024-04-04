<?php
session_start();
require 'functions.php';
if (isset($_SESSION["login"])) {
  $user = $_SESSION["username"];
  $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$user'");
  $admin = mysqli_fetch_assoc($query);
} else {
  header("Location: login.php");
  exit;
}

//Total Data Barang
$totBarang = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_barang"));
//Total Data Penjualan
$totPenjualan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_penjualan"));
//Total Data Peramalan
$totPeramalan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_peramalan"));
//Total Data Admin
$totAdmin = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
    #cardHasilPeramalan,
    #cardGrafik {
        display: none;
    }
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>