<!DOCTYPE html>
<html lang="eu">

</html>

<head>
    <meta charset="UTF-8">
    <title>Ariketa 2</title>
</head>

<body>
    <h1>Ariketak 2</h1>

    <h2>Ariketa 2.1</h2>
    <?php
    $eguna = date("N");

    if ($eguna == "1") {
        echo "Astelehena";
    } else if ($eguna == "2") {
        echo "Asteartea";
    } else if ($eguna == "3") {
        echo "Azteazkena";
    } else if ($eguna == "4") {
        echo "Osteguna";
    } else if ($eguna == "5") {
        echo "Ostirala";
    } else if ($eguna == "6") {
        echo "Larunbata";
    } else if ($eguna == "7") {
        echo "Igandea";
    }

    ?>

    <hr>

    <h2>Ariketa 2.2</h2>
    <?php
    $nota = "F";

    ?>

    <?php

    switch ($nota) {
        case "F":
            echo "oso gutxi";
            break;
        case "D":
            echo "gutxi";
            break;
        case "C":
            echo "nahiko";
            break;
        case "B":
            echo "ondo";
            break;
        case "A":
            echo "oso ondo";
            break;
        default:
            echo "Kalifikazioa sartu.";
    }

    ?>
    <hr>

    <h2>Ariketa 2.3</h2>

    <?php
    $zbk = rand(0, 30);

    if ($zbk >= 0 && $zbk <= 10) {
        echo "0-10 artean dago.";
    } else if ($zbk > 10 && $zbk <= 20) {
        echo "10-20 artean dago.";
    } else if ($zbk > 20 && $zbk <= 30) {
        echo "20-30 artean dago.";
    } else {
        echo "Zenbakiak beste balio bat du.";
    }
    ?>
</body>