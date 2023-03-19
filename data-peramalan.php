<?php
$title = "Data Barang - Prestok";
$menu = "Data Barang";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <h5 class="card-title"><i class="bx bx-table"></i> Tabel Peramalan</h5>
                <form action="peramalan/proses.php" method="POST">
                    <div class="row">
                        <!-- Data Barang -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <select class="form-control" name="nama_barang" id="nama_barang">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM tb_penjualan");
                                    while ($barang = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $barang["id"]; ?>"><?= $barang["nama_barang"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div><!-- End Data Barang -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bulan_penjualan">Bulan</label>
                                <select class="form-control" name="bulan_penjualan" id="bulan_penjualan">
                                    <option value="">--Pilih Bulan--</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun_penjualan">Tahun</label>
                                <select class="form-control" name="tahun_penjualan" id="tahun_penjualan">
                                    <option value="">Pilih Tahun</option>
                                    <?php
                                    $tahun_sekarang = date("Y");
                                    for ($i = $tahun_sekarang - 5; $i <= $tahun_sekarang; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="ramal" class="btn btn-primary mt-3">Proses Peramalan
                        Barang</button>
                </form>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require 'layouts/footer.php'; ?>