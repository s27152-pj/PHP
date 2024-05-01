<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zad3</title>
</head>
<body>
<form action="" method="get">
    <label for="n">Podaj liczbę całkowitą:</label>
    <input type="number" name="n" id="n">
    <button type="submit">Oblicz</button>
</form>

<?php
function silnia_i($n)
{
    $result = 1;
    for ($i = $n; $i > 1; $i--) {
        $result *= $i;
    }
    return $result;
}

function silnia_r($n)
{
    if ($n <= 1) {
        return 1;
    } else {
        return $n * silnia_r($n - 1);
    }
}

if (isset($_GET['n']) && is_numeric($_GET['n']) && $_GET['n'] >= 0) {
    $n = $_GET['n'];

    $startIteracyjna = microtime(true);
    $wynikIteracyjna = silnia_i($n);
    $koniecIteracyjna = microtime(true);
    $czasIteracyjna = number_format($koniecIteracyjna - $startIteracyjna, 10);

    $startRekurencyjna = microtime(true);
    $wynikRekurencyjna = silnia_r($n);
    $koniecRekurencyjna = microtime(true);
    $czasRekurencyjna = number_format($koniecRekurencyjna - $startRekurencyjna, 10);

    $szybszaFunkcja = ($czasIteracyjna < $czasRekurencyjna) ? "iteracyjna" : "rekurencyjna";
    $roznicaCzasu = abs($czasRekurencyjna - $czasIteracyjna);

    echo "Czas obliczeń silni (iteracyjnie): $czasIteracyjna sekund";
    echo "Czas obliczeń silni (rekurencyjnie): $czasRekurencyjna sekund";
    echo "Szybsza funkcja: $szybszaFunkcja</p>";
    echo "Różnica czasu: " . number_format($roznicaCzasu, 10) . " sekund";
} elseif (isset($_GET['n'])) {
    echo "Podaj poprawną wartość liczbową większą lub równą zero.";
}
?>
</body>
</html>