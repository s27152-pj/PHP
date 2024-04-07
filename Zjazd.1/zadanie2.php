<?php

$start = 1; 
$end = 100; 

for ($i = $start; $i <= $end; $i++) {
    if ($i === 1) {
        continue;
    }
    $isPrime = true;
    for ($j = 2; $j < $i; $j++) {
        if ($i % $j === 0) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime) {
        echo $i . "\n";
    }

echo "Liczby pierwsze w zakresie od $start do $end = :\n";

?>