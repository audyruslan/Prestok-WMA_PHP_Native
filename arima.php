<?php
$title = "Peramalan ARIMA - Prestok";
$menu = "Algoritma ARIMA";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Algorritma ARIMA</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Algorritma ARIMA</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <h5 class="card-title"><i class="bx bx-table"></i> Tabel Peramalan Algoritma WMA</h5>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require 'layouts/footer.php'; ?>