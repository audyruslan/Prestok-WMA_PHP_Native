<?php
$title = "Tentang Kami - MindChecker";
$menu = "About";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
?>
<main id="main" class="main">

    <section class="section profile">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/apple-touch-icon.png" width="120" alt="Profile" class="rounded">
                        <h2>Prestok</h2>
                        <h3 class="text-center mt-2">Peramalan Stok Barang Menggunakan Metode Triple Exponential
                            Smoothing (TES)</h3>

                        <div class="d-flex justify-content-around mt-5">
                            <div class="ps-4 text-center">
                                <h5><?= $admin["nama_lengkap"]; ?></h5>
                                <span class="text-muted">Pengguna Sistem</span>
                            </div>
                            <div class="ps-4 text-center">
                                <h5>Wirdayanti, S.T.,M.Eng</h5>
                                <span class="text-muted">Dosen Pembimbing</span>
                            </div>
                            <div class="ps-4 text-center">
                                <h5>Teknik Informatika</h5>
                                <span class="text-muted">Universitas Tadulako</span>
                            </div>
                        </div>

                        <p class="text-right m-5">Prestok adalah sebuah aplikasi yang bertujuan untuk membantu
                            pengguna dalam melakukan prediksi atau perkiraan mengenai harga barang di masa yang
                            akan datang. Aplikasi ini menggunakan Metode Triple Exponential Smoothing (TES) dan analisis
                            data untuk memproses informasi harga dari periode waktu sebelumnya dan memberikan prediksi
                            harga untuk periode waktu yang akan datang. <br><br>

                            Aplikasi ini dapat digunakan oleh berbagai jenis pengguna, seperti pedagang, investor, atau
                            konsumen yang ingin membeli barang dengan harga yang lebih baik. Pengguna dapat mencari dan
                            memilih barang yang ingin diprediksi harganya, kemudian aplikasi akan menampilkan informasi
                            mengenai tren harga barang tersebut serta prediksi harga di masa depan. <br><br>

                            Selain itu, aplikasi kami juga menyediakan fitur notifikasi atau pemberitahuan ketika harga
                            barang yang dipilih telah mencapai harga yang diinginkan oleh pengguna. Hal ini memudahkan
                            pengguna dalam mengawasi pergerakan harga barang dan dapat segera melakukan tindakan yang
                            diperlukan. <br><br>

                            Dengan aplikasi kami, pengguna dapat memperoleh informasi dan prediksi harga barang dengan
                            lebih mudah dan cepat, sehingga dapat membantu pengambilan keputusan yang lebih baik dalam
                            berbagai situasi bisnis atau pembelian barang.</p>


                    </div>
                </div>

            </div>

        </div>
    </section>

</main><!-- End #main -->
<?php require 'layouts/footer.php'; ?>