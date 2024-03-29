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

                            <!-- Tambah Modal -->
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">
                                <i class="bx bx-plus-medical"></i> Tambah Data
                            </button>

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
                                                        <select class="form-control" name="kode_barang"
                                                            id="kode_barang">
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
                                                            <label for="bulan_tahun">Bulan & Tahun Barang</label>
                                                            <input type="month" class="form-control" name="bulan_tahun"
                                                                id="bulan_tahun" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="jumlah_barang">Jumlah Barang</label>
                                                            <input type="number" class="form-control"
                                                                name="jumlah_barang" id="jumlah_barang"
                                                                placeholder="Jumlah Barang" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="tambah"
                                                    class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-borderless" id="barangTable">
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
                                                            ON tb_penjualan.kode_barang = tb_barang.kode_barang ORDER BY penjualan_id ASC");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>

                                <tr>
                                    <th scope="row"><?= $no; ?>.</th>
                                    <td><?= $row["nama_barang"]; ?></td>
                                    <td><?= $row["bulan_penjualan"]; ?></td>
                                    <td><?= $row["tahun_penjualan"]; ?></td>
                                    <td><?= $row["jumlah_penjualan"]; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm ubah" class="btn btn-primary mb-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#ubahModal<?= $row["penjualan_id"]; ?>"><i
                                                class="bx bxs-edit"></i> </a>
                                        <a class="btn btn-danger btn-sm hapus_penjualan"
                                            href="penjualan/hapus.php?id=<?= $row["penjualan_id"]; ?>"><i
                                                class="bx bxs-trash-alt"></i></a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="ubahModal<?= $row["penjualan_id"]; ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Data Penjualan Barang</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="penjualan/ubah.php" method="post" class="needs-validation"
                                                novalidate>
                                                <input type="hidden" name="id" value="<?= $row["penjualan_id"]; ?>">
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="kode_barang"
                                                                    name="kode_barang"
                                                                    value="<?= $row["kode_barang"]; ?>"
                                                                    autocomplete="off" placeholder="Kode barang"
                                                                    required readonly>
                                                                <label for="kode_barang">Kode Barang</label>
                                                                <div class="invalid-feedback">
                                                                    Kode Barang Tidak Boleh Kosong.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="nama_barang"
                                                                    name="nama_barang"
                                                                    value="<?= $row["nama_barang"]; ?>"
                                                                    autocomplete="off" placeholder="Nama barang"
                                                                    required>
                                                                <label for="nama_barang">Nama Barang</label>
                                                                <div class="invalid-feedback">
                                                                    Nama Barang Tidak Boleh Kosong.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="number" class="form-control"
                                                                    id="jumlah_penjualan" name="jumlah_penjualan"
                                                                    value="<?= $row["jumlah_penjualan"]; ?>"
                                                                    autocomplete="off" placeholder="Jumlah Penjualan"
                                                                    required>
                                                                <label for="jumlah_penjualan">Jumlah Penjualan</label>
                                                                <div class="invalid-feedback">
                                                                    Jumlah Penjualan Tidak Boleh Kosong.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="bulan_penjualan">Bulan</label>
                                                                <select class="form-control" name="bulan_penjualan"
                                                                    id="bulan_penjualan">
                                                                    <option value="">--Pilih Bulan--</option>
                                                                    <option value="Januari"
                                                                        <?php if ($row["bulan_penjualan"] == "Januari") echo "selected"; ?>>
                                                                        Januari</option>
                                                                    <option value="Februari"
                                                                        <?php if ($row["bulan_penjualan"] == "Februari") echo "selected"; ?>>
                                                                        Februari</option>
                                                                    <option value="Maret"
                                                                        <?php if ($row["bulan_penjualan"] == "Maret") echo "selected"; ?>>
                                                                        Maret</option>
                                                                    <option value="April"
                                                                        <?php if ($row["bulan_penjualan"] == "April") echo "selected"; ?>>
                                                                        April</option>
                                                                    <option value="Mei"
                                                                        <?php if ($row["bulan_penjualan"] == "Mei") echo "selected"; ?>>
                                                                        Mei</option>
                                                                    <option value="Juni"
                                                                        <?php if ($row["bulan_penjualan"] == "Juni") echo "selected"; ?>>
                                                                        Juni</option>
                                                                    <option value="Juli"
                                                                        <?php if ($row["bulan_penjualan"] == "Juli") echo "selected"; ?>>
                                                                        Juli</option>
                                                                    <option value="Agustus"
                                                                        <?php if ($row["bulan_penjualan"] == "Agustus") echo "selected"; ?>>
                                                                        Agustus</option>
                                                                    <option value="September"
                                                                        <?php if ($row["bulan_penjualan"] == "September") echo "selected"; ?>>
                                                                        September</option>
                                                                    <option value="Oktober"
                                                                        <?php if ($row["bulan_penjualan"] == "Oktober") echo "selected"; ?>>
                                                                        Oktober</option>
                                                                    <option value="November"
                                                                        <?php if ($row["bulan_penjualan"] == "November") echo "selected"; ?>>
                                                                        November</option>
                                                                    <option value="Desember"
                                                                        <?php if ($row["bulan_penjualan"] == "Desember") echo "selected"; ?>>
                                                                        Desember</option>
                                                                </select>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="tahun_penjualan">Bulan</label>
                                                                <select class="form-control" name="tahun_penjualan"
                                                                    id="tahun_penjualan">
                                                                    <option value="">Pilih Tahun</option>
                                                                    <?php
                                                                        $tahun_sekarang = date("Y");
                                                                        for ($i = $tahun_sekarang - 5; $i <= $tahun_sekarang; $i++) {
                                                                            echo "<option value='" . $i . "'";
                                                                            if ($row["tahun_penjualan"] == $i) {
                                                                                echo " selected";
                                                                            }
                                                                            echo ">" . $i . "</option>";
                                                                        }
                                                                        ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="ubah"
                                                        class="btn btn-success">Ubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    $no++;
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>
    </section>

</main><!-- End #main -->
<?php require 'layouts/footer.php'; ?>