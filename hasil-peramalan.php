<?php
$title = "Hasil Peramalan - Prestok";
$menu = "Hasil Peramalan";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Hasil Peramalan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Hasil Peramalan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="filter">
                        <a href="data-peramalan.php" class="btn btn-primary btn-sm">Buat Peramalan Baru</a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><i class="bx bx-table"></i> Tabel Hasil Peramalan</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered border-primary">
                                    <tr>
                                        <th width="25%">Hasil Weight Moving Average (WMA)</th>
                                        <td width="3%">:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Error</th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Mean Absolute Deviation (MAD)</th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Mean Square Error (MSE)</th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Peramalan Pengeluaran Bulan</th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Rekomendasi</th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"><i class="bx bx-table"></i> Tabel Hasil Peramalan</h5>

                        <table class="table table-borderless" id="barangTable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Bulan Peramalan</th>
                                    <th scope="col">Tahun Peramalan</th>
                                    <th scope="col">Total Pengeluaran</th>
                                    <th scope="col">Total WMA</th>
                                    <th scope="col">Error</th>
                                    <th scope="col">MAD</th>
                                    <th scope="col">MSE</th>
                                    <th scope="col">Tanggal Peramalan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_peramalan");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>

                                    <tr>
                                        <th scope="row"><?= $no; ?>.</th>
                                        <td><?= $row["bulan_peramalan"]; ?></td>
                                        <td><?= $row["tahun_peramalan"]; ?></td>
                                        <td><?= $row["total_pengeluaran"]; ?></td>
                                        <td><?= $row["total_wma"]; ?></td>
                                        <td><?= $row["total_error"]; ?></td>
                                        <td><?= $row["total_mad"]; ?></td>
                                        <td><?= $row["total_mse"]; ?></td>
                                        <?php $tgl_dibuat = $row["tgl_create"]; ?>
                                        <td><?= tgl_indo($tgl_dibuat); ?></td>
                                        <td>
                                            <a class="btn btn-danger btn-sm hapus_peramalan" href="peramalan/hapus.php?id=<?= $row["id"]; ?>"><i class="bx bxs-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                <?php
                                    $no++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main><!-- End #main -->
<?php require 'layouts/footer.php'; ?>