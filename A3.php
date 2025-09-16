<!DOCTYPE html>
<html lang="eu">

</html>

<head>
    <meta charset="UTF-8">
    <title>Ariketa 3</title>
</head>

<body>
    <h1>Ariketak 3</h1>
    <h2>Ariketa 3.1</h2>

    <?php
    $x = 0;
    $zbk = 0;
    $cont = 10;

    while ($cont > 0) {
        $zbk = rand(1, 10);
        $x = $x + $zbk;
        $cont--;
    }

    echo "10 ausazko zenbakien batura: $x";
    ?>

    <hr>
    <h2>Ariketa 3.2</h2>

    <?php
    $zbk2 = 1;
    for ($x = 1; $x < 5; $x++) {
        $zbk2 = $zbk2 + ($zbk2 * $x);
    }

    echo "5eko biderketa emaitza da: $zbk2";
    ?>

    <hr>
    <h2>Ariketa 3.3</h2>

    <?php
    $zbk3 = 0;
    do {
        $zbk3 = $zbk3 + 3;
        echo "$zbk3 ";
    } while ($zbk3 < 30);
    ?>

    <hr>
    <h2>Ariketa 3.4</h2>

    <?php
    $herrialdeak = array("EH", "Frantzia", "Alemania", "Italia");
    foreach ($herrialdeak as $herria) {
        echo $herria . "<br>";
    }
    ?>

    <hr>
    <h2>Ariketa 3.5</h2>

    <?php
    $kontadorea = 0;

    for ($x = 2; $x <= 100; $x++) {
        $primoa_da = true;

        for ($y = 2; $y <= sqrt($x); $y++) {
            if ($x % $y == 0) {
                $primoa_da = false;
                break;
            }
        }

        if ($primoa_da) {
            echo "$x ";
            $kontadorea++;
        }
    }

    echo "<br>Kopurua: $kontadorea";
    ?>
</body>