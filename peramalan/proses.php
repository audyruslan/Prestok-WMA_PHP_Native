<?php
require '../functions.php';

$nama_barang = "BRG001";
$konstanta = 0.1;

$sqlPenjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE kode_barang='$nama_barang' ORDER BY penjualan_id ASC");
$dataPenjualan = [];
while ($penjualan = mysqli_fetch_assoc($sqlPenjualan)) {
    $dataPenjualan[] = $penjualan;
}

$alpha = $konstanta;
$hasilPeramalan = [];
$m = 1;

for ($i = 0; $i < count($dataPenjualan); $i++) {
    if ($i == 0) {
        $S = $dataPenjualan[$i]['jumlah_penjualan'];
        $S2 = $dataPenjualan[$i]['jumlah_penjualan'];
        $S3 = $dataPenjualan[$i]['jumlah_penjualan'];
    } else {
        $S = $alpha * $dataPenjualan[$i]['jumlah_penjualan'] + (1 - $alpha) * ($S);
        $S2 = $alpha * $S + (1 - $alpha) * $S2;
        $S3 = $alpha * $S2 + (1 - $alpha) * $S3;
    }

    $at = 3 * $S - 3 * $S2 + $S3;
    $bt = $alpha / (2 * pow((1 - $alpha), 2)) * ((6 - 5 * $alpha) * $S - 2 * (5 - 4 * $alpha) * $S2 + (4 - 3 * $alpha) * $S3);
    $ct = pow($alpha, 2) / (1 - pow($alpha, 2)) * ($S - 2 * $S2 + $S3);


    $hasilPeramalan[] = number_format($S, 2, '.', '');
    $hasilPeramalan[] = number_format($S2, 2, '.', '');
    $hasilPeramalan[] = number_format($S3, 2, '.', '');
    $hasilPeramalan[] = number_format($at, 2, '.', '');
    $hasilPeramalan[] = number_format($bt, 2, '.', '');
    $hasilPeramalan[] = number_format($ct, 2, '.', '');
}


$ft = $at + $bt + (0.5 * ($ct * pow($m, 2)));
$hasilPeramalan[] = number_format($ft, 2, '.', '');

$response = [
    'konstanta' => $konstanta,
    'periode' => count($dataPenjualan),
    'data_penjualan' => $dataPenjualan,
    'hasil_peramalan' => $hasilPeramalan
];

header('Content-Type: application/json');
echo json_encode($response);
