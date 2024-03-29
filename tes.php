<?php
function hitung_at($St_1, $S_t2, $S_t3)
{
    $at = 3 * $St_1 - 3 * $S_t2 + $S_t3;
    return $at;
}

function hitung_bt($alpha, $St_1, $S_t2, $S_t3)
{
    $bt = $alpha / (2 * pow((1 - $alpha), 2)) * ((6 - 5 * $alpha) * $St_1 - (10 - 8 * $alpha) * $S_t2 + (4 - 3 * $alpha) * $S_t3);
    return $bt;
}

function hitung_ct($alpha, $St_1, $S_t2, $S_t3)
{
    $ct = pow($alpha, 2) / (1 - pow($alpha, 2)) * ($St_1 - 2 * $S_t2 + $S_t3);
    return $ct;
}

// Contoh penggunaan
$alpha = 0.1;
$St_1 = 7.00; // Nilai S't
$S_t2 = 2.50; // Nilai S''t
$S_t3 = 2.05; // Nilai S'''t

$at = hitung_at($St_1, $S_t2, $S_t3);
$bt = hitung_bt($alpha, $St_1, $S_t2, $S_t3);
$ct = hitung_ct($alpha, $St_1, $S_t2, $S_t3);

echo "Nilai at: " . $at . "<br>";
echo "Nilai bt: " . $bt . "<br>";
echo "Nilai ct: " . $ct . "<br>";