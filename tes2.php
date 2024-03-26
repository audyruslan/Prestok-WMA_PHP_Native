<?php
// Data penjualan
$data = [
    'Januari' => 2,
    'Februari' => 52,
    'Maret' => 47,
    'April' => 44,
    'Mei' => 38,
    'Juni' => 36,
    'Juli' => 36,
    'Agustus' => 51,
    'September' => 41,
    'Oktober' => 52,
    'November' => 54,
    'Desember' => 51,
];

// Nilai alpha
$alpha = 0.1;

// Inisialisasi variabel untuk peramalan
$level = reset($data);
$trend = 0;
$seasonal = 0;
$at = 0;
$bt = 0;
$ct = 0;
$forecast_data = [];

// Header tabel
echo "<h3>Tabel 2. Perhitungan Forecasting dengan nilai alpha 0,1</h3>";
echo "<table border='1'>
        <tr>
            <th>Periode</th>
            <th>Data Penjualan</th>
            <th>S’t</th>
            <th>S’’t</th>
            <th>S’’’t</th>
            <th>at</th>
            <th>bt</th>
            <th>ct</th>
            <th>Forecast</th>
        </tr>";

// Loop untuk melakukan peramalan
foreach ($data as $bulan => $nilai) {
    // Perhitungan level
    $temp_level = $level;
    $level = $alpha * ($nilai - $seasonal) + (1 - $alpha) * ($temp_level + $trend);

    // Perhitungan trend
    $trend = $alpha * ($level - $temp_level) + (1 - $alpha) * $trend;

    // Perhitungan seasonal
    $seasonal = $alpha * ($nilai - $level) + (1 - $alpha) * $seasonal;

    // Perhitungan S''t
    $seasonal2 = $alpha * $seasonal + (1 - $alpha) * ($temp_level + $trend);
    // Perhitungan S'''t
    $seasonal3 = $alpha * $seasonal2 + (1 - $alpha) * $trend;

    // Perhitungan at, bt, ct
    $at = $alpha * ($nilai - $seasonal) + (1 - $alpha) * $at;
    $bt = $alpha * ($level - $temp_level) + (1 - $alpha) * $bt;
    $ct = $alpha * $seasonal3 + (1 - $alpha) * $ct;

    // Peramalan
    $ramalan = $level + $trend + $seasonal3;
    $forecast_data[] = $ramalan;

    // Menampilkan hasil peramalan
    echo "<tr>
            <td>$bulan</td>
            <td>$nilai</td>
            <td>" . number_format($level, 2, ',', '.') . "</td>
            <td>" . number_format($seasonal2, 2, ',', '.') . "</td>
            <td>" . number_format($seasonal3, 2, ',', '.') . "</td>
            <td>" . number_format($at, 2, ',', '.') . "</td>
            <td>" . number_format($bt, 2, ',', '.') . "</td>
            <td>" . number_format($ct, 2, ',', '.') . "</td>
            <td>" . number_format($ramalan, 2, ',', '.') . "</td>
          </tr>";
}

// Penutup tabel
echo "</table>";