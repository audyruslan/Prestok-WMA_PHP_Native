<?php
$title = "Profile - MindChecker";
$menu = "Profile";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';

if (isset($_POST["ubah_password"])) {

    // Mengambil Data Password dari form inputan
    $username = $_POST["username"];
    $password_lama = $_POST["password_lama"];
    $password_baru = $_POST["password_baru"];
    $konfirmasi_password = $_POST["konfirmasi_password"];

    // Ambil Data User dari database berdasarkan SESSION username
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password_lama, $row["password"])) {

        // Jika Password Baru = Konfirmasi Password
        if ($password_baru == $konfirmasi_password) {
            // enkripsi password
            $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
            $query = "UPDATE tb_user SET password = '$password_baru' WHERE username = '$username' ";
            mysqli_query($conn, $query);

            // Tampilkan modal jika password Berhasil Diubah!
            $_SESSION['status'] = "Password Baru";
            $_SESSION['status_icon'] = "success";
            $_SESSION['status_info'] = "Berhasil Diubah!";
        } else {
            // Tampilkan pesan Error jika Konfirmasi Password Salah!
            $_SESSION['error'] = "<strong>Konfirmasi Password Salah!</strong>";
        }
    } else {
        // Tampilkan pesan Error jika Password Lama Salah!
        $_SESSION['error'] = "<strong>Password Lama Salah!</strong>";
    }

    $error = true;
}
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="admin/<?= $admin["img_dir"]; ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $admin["nama_lengkap"]; ?></h2>
                        <h3>Administrator</h3>
                        <div class="social-links mt-2">
                            <a href="https://www.facebook.com/banuasoftware" target="_blank" class="facebook"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/banua_software/" target="_blank" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=6289522815496&text=Assalamualaikum%20Hai, Kak%20Saya%20ingin%20Buat%20Aplikasi%20%20Mohon%20informasi%20Detailnya?."
                                target="_blank" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                            <a href="https://www.tiktok.com/@banua_software" target="_blank" class="tiktok"><i
                                    class="bi bi-tiktok"></i></a>
                            <a href="https://www.youtube.com/channel/UChI2HGKYV8ySc_Kqs1Kd7-w" target="_blank"
                                class="youtube"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item active">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-admin">Administrator</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Ubah Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active pt-3" id="profile-admin">

                                <!-- Basic Modal -->
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#tambahModal"> Tambah Admin
                                </button>

                                <div class="modal fade" id="tambahModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data Gejala</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="admin/tambah.php" method="post" class="needs-validation"
                                                novalidate>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="nama_lengkap" name="nama_lengkap"
                                                                    autocomplete="off" placeholder="Nama Lengkap">
                                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                                <div class="invalid-feedback">
                                                                    Nama Lengkap Tidak Boleh Kosong.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="username"
                                                                    name="username" autocomplete="off"
                                                                    placeholder="Username">
                                                                <label for="username">Username</label>
                                                                <div class="invalid-feedback">
                                                                    Username Tidak Boleh Kosong.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-floating">

                                                                <input type="password" class="form-control"
                                                                    id="password" name="password" autocomplete="off"
                                                                    placeholder="Password">
                                                                <label for="password">Password</label>
                                                                <div class="invalid-feedback">
                                                                    Password Tidak Boleh Kosong.
                                                                </div>
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
                                <!-- End Basic Modal-->
                                <table class="table table-borderless gejalatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Nama lengkap</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_user");
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                        ?>

                                        <tr>
                                            <td>
                                                <img class="rounded" src="admin/<?= $row["img_dir"]; ?>" width="50">
                                            </td>
                                            <td><?= $row["nama_lengkap"]; ?></td>
                                            <td><?= $row["username"]; ?></td>
                                            <td>
                                                <a class="btn btn-danger btn-sm hapus_admin"
                                                    href="admin/hapus.php?id=<?= $row["id"]; ?>"><i
                                                        class="bx bxs-trash-alt"></i></a>
                                            </td>
                                        </tr>

                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>


                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <?php if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    <?= $_SESSION['error'];  ?>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php unset($_SESSION['error']); ?>
                                <?php } ?>
                                <!-- Change Password Form -->
                                <form method="POST">
                                    <input type="hidden" name="username" value="<?= $_SESSION["username"]; ?>">
                                    <div class="row mb-3">
                                        <label for="password_lama" class="col-md-4 col-lg-3 col-form-label">Password
                                            Lama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password_lama" type="password" class="form-control"
                                                id="password_lama" placeholder="Masukkan Password Lama">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password_baru" class="col-md-4 col-lg-3 col-form-label">Password
                                            Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password_baru" type="password" class="form-control"
                                                id="password_baru" placeholder="Masukkan Password Baru">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="konfirmasi_password"
                                            class="col-md-4 col-lg-3 col-form-label">Konfirmasi
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="konfirmasi_password" type="password" class="form-control"
                                                id="konfirmasi_password" placeholder="Konfirmasi Password">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="ubah_password" class="btn btn-primary">Ubah
                                            Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require 'layouts/footer.php'; ?>