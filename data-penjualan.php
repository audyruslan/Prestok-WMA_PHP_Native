<?php
$title = "Data Penjualan - Prestok";
$menu = "Data Penjualan";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Penjualan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Data Penjualan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">

                <div class="card recent-sales overflow-auto">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><i class="bx bx-table"></i> Tabel Data Penjualan Barang</h3>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!-- Tambah Modal -->
                        <div class="modal fade" id="tambahModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Penjualan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="penjualan/tambah.php" method="post" class="needs-validation"
                                        novalidate>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="kode_barang">Data Barang</label>
                                                    <select class="form-control" name="kode_barang" id="kode_barang">
                                                        <option value="">--Pilih Barang--</option>
                                                        <?php
                                                        $sqlBarang = mysqli_query($conn, "SELECT * FROM tb_barang");
                                                        while ($barang = mysqli_fetch_assoc($sqlBarang)) {
                                                        ?>
                                                        <option value="<?= $barang["kode_barang"]; ?>">
                                                            <?= $barang["nama_barang"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="bulan_tahun">Bulan & Tahun
                                                            Barang</label>
                                                        <input type="month" class="form-control" name="bulan_tahun"
                                                            id="bulan_tahun" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="jumlah_barang">Jumlah Barang</label>
                                                        <input type="number" class="form-control" name="jumlah_barang"
                                                            id="jumlah_barang" placeholder="Jumlah Barang" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php
                        $sqlDataBarang = mysqli_query($conn, "SELECT * FROM tb_barang");
                        while ($barang = mysqli_fetch_assoc($sqlDataBarang)) {
                        ?>
                        <div class="accordion" id="barang_<?= $barang["kode_barang"]; ?>">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne_<?= $barang["kode_barang"]; ?>"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <?= $barang["nama_barang"]; ?>
                                    </button>
                                </h2>
                                <div id="collapseOne_<?= $barang["kode_barang"]; ?>" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne"
                                    data-bs-parent="#barang_<?= $barang["kode_barang"]; ?>">
                                    <div class="accordion-body">

                                        <!-- Tambah Modal -->
                                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                            data-bs-target="#tambahModal">
                                            <i class="bx bx-plus-medical"></i> Tambah Data
                                        </button>

                                        <table class="table table-bordered text-center" id="barangTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Bulan Penjualan</th>
                                                    <th scope="col">Tahun Penjualan</th>
                                                    <th scope="col">Jumlah Penjualan</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($conn, "SELECT * FROM tb_penjualan
                                                            JOIN tb_barang
                                                            ON tb_penjualan.kode_barang = tb_barang.kode_barang
                                                            WHERE tb_barang.kode_barang = '" . $barang["kode_barang"] . "' ORDER BY penjualan_id ASC");
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                <tr>
                                                    <th scope="row"><?= $no; ?>.</th>
                                                    <td><?= $row["nama_barang"]; ?></td>
                                                    <td><?= $row["bulan_penjualan"]; ?></td>
                                                    <td><?= $row["tahun_penjualan"]; ?></td>
                                                    <td><?= $row["jumlah_penjualan"]; ?></td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm ubah" data-bs-toggle="modal"
                                                            data-bs-target="#ubahModal<?= $row["penjualan_id"]; ?>"><i
                                                                class="bx bxs-edit"></i></a>
                                                        <a class="btn btn-danger btn-sm hapus_penjualan"
                                                            href="penjualan/hapus.php?id=<?= $row["penjualan_id"]; ?>"><i
                                                                class="bx bxs-trash-alt"></i></a>
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

                        <?php
                        }
                        ?>


                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>
    </section>

</main><!-- End #main -->
<?php require 'layouts/footer.php'; ?>