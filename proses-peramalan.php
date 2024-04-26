<?php
$title = "Proses Peramalan - Prestok";
$menu = "Proses Peramalan";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pilih Barang Yang Ingin Dilakukan Peramalan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Proses Peramalan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bx bx-table"></i> Tabel Data Barang</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group mt-3 mb-3">
                                <label for="nama_barang">Data Barang</label>
                                <select class="form-control" name="nama_barang" id="nama_barang">
                                    <option value="">--Pilih Barang--</option>
                                    <?php
                                    $sqlBarang = mysqli_query($conn, "SELECT * FROM tb_barang");
                                    while ($barang = mysqli_fetch_assoc($sqlBarang)) {
                                    ?>
                                    <option value="<?= $barang["kode_barang"]; ?>"><?= $barang["nama_barang"]; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="konstanta">Konstanta</label>
                                <input type="number" class="form-control" name="konstanta" id="konstanta"
                                    placeholder="Konstanta" autocomplete="off">
                            </div>

                            <div class="mt-3">
                                <button type="button" class="btn btn-primary float-end" id="proses"
                                    name="proses">Proses</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="cardHasilPeramalan" class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bx bx-table"></i> Hasil Peramalan</h5>
                    </div>

                    <div class="card-body p-4">
                        <div id="hasilPeramalan"></div>

                        <table class="table table-borderless" id="barangTable">
                            <thead>
                                <tr>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Jumlah Penjualan</th>
                                    <th scope="col">S'</th>
                                    <th scope="col">S''</th>
                                    <th scope="col">S'''</th>
                                    <th scope="col">a</th>
                                    <th scope="col">b</th>
                                    <th scope="col">c</th>
                                    <th scope="col">Forecast</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="cardGrafik" class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bx bx-table"></i> Grafik Chart</h5>
                    </div>

                    <div class="card-body p-4">
                        <h5 class="card-title">Line Chart</h5>
                        <canvas id="lineChart" style="max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main><!-- End #main -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    var btnProses = document.getElementById('proses');
    btnProses.addEventListener('click', function() {
        var namaBarang = document.getElementById('nama_barang').value;
        var konstanta = document.getElementById('konstanta').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'peramalan/proses.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);

                //  Tampilkan data peramalan di chart
                var labels = response.data_penjualan.map(function(data) {
                    return data.bulan_penjualan;
                });
                var dataPeramalan = response.hasil_peramalan.map(function(data) {
                    return data !== undefined ? data : 0;
                });

                console.log(dataPeramalan);

                var lineChart = new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Line Chart',
                            data: dataPeramalan,
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

                // Tampilan informasi peramalan di hasilPeramalan
                $('#hasilPeramalan').html('<p>Konstanta yang digunakan: ' + response.konstanta +
                    '</p>');
                $('#hasilPeramalan').append('<p>Periode yang diramal: ' + response.periode +
                    ' bulan</p>');

                var tbody = $('#barangTable tbody');
                tbody.empty();

                for (var i = 0; i < response.data_penjualan.length; i++) {
                    var row = '<tr>';
                    row += '<td>' + response.data_penjualan[i]['bulan_penjualan'] + '</td>';
                    row += '<td>' + response.data_penjualan[i]['tahun_penjualan'] + '</td>';
                    row += '<td>' + response.data_penjualan[i]['jumlah_penjualan'] + '</td>';

                    for (var j = 0; j < 7; j++) {
                        row += '<td>' + (response.hasil_peramalan[i * 7 + j] !== undefined ?
                            response.hasil_peramalan[i * 7 + j] : 0) + '</td>';
                    }

                    row += '</tr>';
                    tbody.append(row);
                }

                // Tampilkan Card Hasil Peramalan dan Card Grafik
                document.getElementById('cardHasilPeramalan').style.display = 'block';
                document.getElementById('cardGrafik').style.display = 'block';
            } else {
                console.error(xhr.responseText);
            }
        };
        xhr.send('nama_barang=' + namaBarang + '&konstanta=' + konstanta);
    });
});
</script>


<?php require 'layouts/footer.php'; ?>