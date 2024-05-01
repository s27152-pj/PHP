<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zad1</title>
</head>
<body>
<form action="" method="GET">
    <input type="date" name="dataU" id="dataU">
    <button type="submit">WYŚLIJ</button>
</form>

<?php
if (isset($_GET['dataU'])) {
    $dataU = strtotime($_GET['dataU']);

    function dzien($dataU)
    {
        $dzien = date('l', $dataU);
        return $dzien;
    }

    function wiek($dataU)
    {
        $wiek = date('Y') - date('Y', $dataU);
        return $wiek;
    }

    function dni($dataU)
    {
        $now = date('Y');
        $next = date('Y-m-d', $now . '-' . date('m-d', strtotime($dataU)));
        if ($next >= $now) {
            $birthday = date('Y') . '-' . date('m-d', $dataU);
        } else {
            $birthday = (date('Y') + 1) . '-' . date('m-d', $dataU);
        }
        $dni = (strtotime($birthday) - strtotime($now)) / (60 * 60 * 24);
        return $dni;
    }

    $dzien = dzien($dataU);
    $wiek = wiek($dataU);
    $dni = dni($dataU);
    echo "Urodziny masz w: $dzien<br>";
    echo "Masz $wiek lat<br>";
    echo "Urodziny masz za tyle dni: $dni<br>";
}
?>
</body>
</html>
