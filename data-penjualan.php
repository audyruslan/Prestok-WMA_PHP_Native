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

                <!-- Tambah Modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <i class="bx bx-plus-medical"></i> Tambah Data
                </button>

                <!-- Import Modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class='bx bx-import'></i> Import Data
                </button>

                <div class="modal fade" id="tambahModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Penjualan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="penjualan/tambah.php" method="post" class="needs-validation" novalidate>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" autocomplete="off" value="<?= $autocode; ?>" placeholder="Kode Barang" readonly>
                                                <label for="kode_barang">Kode Barang</label>
                                                <div class="invalid-feedback">
                                                    Kode Barang Tidak Boleh Kosong.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="nama_barang" name="nama_barang" autocomplete="off" placeholder="Nama Barang" cols="30" rows="10" required></textarea>
                                                <label for="nama_barang">Nama Barang</label>
                                                <div class="invalid-feedback">
                                                    Nama Barang Tidak Boleh Kosong.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="month" class="form-control" name="bulan_tahun" id="bulan_tahun" required>
                                                <label for="bulan_tahun">Bulan & Tahun Barang</label>
                                                <div class="invalid-feedback">
                                                    Bulan Barang Tidak Boleh Kosong.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang" placeholder="Jumlah Barang" required>
                                                <label for="jumlah_barang">Jumlah Barang</label>
                                                <div class="invalid-feedback">
                                                    Jumlah Barang Tidak Boleh Kosong.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Import Modal-->

                <div class="modal fade" id="importModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Import Data Penjualan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="penjualan/import.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="inputNumber" class="col-form-label">File Import</label>
                                            <input class="form-control" type="file" id="formFile" accept=".xls,.xlsx">
                                            <span class="text-danger">Masukkan Data .xls atau .xlsx</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="import" class="btn btn-success">Import Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Tambah Modal-->

                <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                        <h5 class="card-title"><i class="bx bx-table"></i> Tabel Data Penjualan Barang</h5>

                        <table class="table table-borderless" id="barangTable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Bulan Penjualan</th>
                                    <th scope="col">Tahun Penjualan</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_penjualan");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>

                                    <tr>
                                        <th scope="row"><?= $no; ?>.</th>
                                        <td><?= $row["kode_barang"]; ?></td>
                                        <td><?= $row["nama_barang"]; ?></td>
                                        <td><?= $row["bulan_penjualan"]; ?></td>
                                        <td><?= $row["tahun_penjualan"]; ?></td>
                                        <td><?= $row["jumlah_barang"]; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm ubah" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $row["kode_barang"]; ?>"><i class="bx bxs-edit"></i> </a>
                                            <a class="btn btn-danger btn-sm hapus_penjualan" href="penjualan/hapus.php?id=<?= $row["id"]; ?>"><i class="bx bxs-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="ubahModal<?= $row["kode_barang"]; ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Data Penjualan Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="penjualan/ubah.php" method="post" class="needs-validation" novalidate>
                                                    <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                                                    <div class="modal-body">
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= $row["kode_barang"]; ?>" autocomplete="off" placeholder="Kode barang" required readonly>
                                                                    <label for="kode_barang">Kode Barang</label>
                                                                    <div class="invalid-feedback">
                                                                        Kode Barang Tidak Boleh Kosong.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $row["nama_barang"]; ?>" autocomplete="off" placeholder="Nama barang" required>
                                                                    <label for="nama_barang">Nama Barang</label>
                                                                    <div class="invalid-feedback">
                                                                        Nama Barang Tidak Boleh Kosong.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
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
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="tahun_penjualan">Bulan</label>
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
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
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