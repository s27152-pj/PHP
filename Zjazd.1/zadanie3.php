<?php

function fib($n) {
    $sequence = [0, 1];
    for ($i = 2; $i <= $n; $i++) {
        $sequence[$i] = $sequence[$i - 1] + $sequence[$i - 2];
    }
    return $sequence;
}

function Odd($a) {
    $number = 1;
    foreach ($a as $element) {
        if ($element % 2 != 0) {
            echo $number . "; " . $element . "\n";
            $number++;
        }
    }
}

$n = 5;
$a = fib($n);
Odd($a);

?>