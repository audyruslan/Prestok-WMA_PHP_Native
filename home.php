<?php
$title = "Dashboard - Prestok";
$menu = "Dashboard";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Barang</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class='bx bxs-package'></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $totBarang; ?></h6>
                                        <span class="text-muted small pt-2 ps-1">Total Barang</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Penjualan</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class='bx bx-line-chart'></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $totPenjualan; ?></h6>
                                        <span class="text-muted small pt-2 ps-1">Total Penjualan</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Peramalan</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class='bx bxs-analyse'></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $totPeramalan; ?></h6>
                                        <span class="text-muted small pt-2 ps-1">Total Peramalan</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Administrator</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $totAdmin; ?></h6>
                                        <span class="text-muted small pt-2 ps-1">Administrator</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->


                </div>
            </div><!-- End Left side columns -->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Line Chart</h5>

                        <!-- Line Chart -->
                        <canvas id="lineChart" style="max-height: 400px;"></canvas>
                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#lineChart'), {
                                type: 'line',
                                data: {
                                    labels: ['January', 'February', 'March', 'April', 'May', 'June',
                                        'July'
                                    ],
                                    datasets: [{
                                        label: 'Line Chart',
                                        data: [65, 59, 80, 81, 56, 55, 40],
                                        fill: false,
                                        borderColor: 'rgb(75, 192, 192)',
                                        tension: 0.1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                        </script>
                        <!-- End Line CHart -->

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bar CHart</h5>

                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#barChart'), {
                                type: 'bar',
                                data: {
                                    labels: ['January', 'February', 'March', 'April', 'May', 'June',
                                        'July'
                                    ],
                                    datasets: [{
                                        label: 'Bar Chart',
                                        data: [65, 59, 80, 81, 56, 55, 40],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                        </script>
                        <!-- End Bar CHart -->

                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
<?php
require 'layouts/footer.php'; ?>