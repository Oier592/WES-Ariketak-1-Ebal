<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <title>Ariketa 4</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid;
    }
</style>

<body>
    <h1>Ariketak 4</h1>
    <h2>Ariketa 4.1</h2>

    <?php
    $zenbakiak = [];
    for ($x = 0; $x < 5; $x++) {
        $zenbakiak[] = rand(1, 100);
    }

    // Preparar tabla
    echo "<table>";
    echo "<tr>";
    for ($x = 1; $x <= count($zenbakiak); $x++) {
        echo "<th>$x. zenbakia</th>";
    }
    echo "</tr>";

    // For
    echo "<tr>";
    for ($i = 0; $i < count($zenbakiak); $i++) {
        echo "<td>" . $zenbakiak[$i] . "</td>";
    }
    echo "</tr>";

    // Batura
    echo "<td colspan = 5> <b> Batura: " . array_sum($zenbakiak) . "</b> </td>";

    echo "</table>";
    ?>
    <hr>

    <h2>Ariketa 4.2</h2>

    <?php
    $herrialdeak = array("EH", "Frantzia", "Alemania", "Italia");
    sort($herrialdeak);

    echo "<table>";
    echo "<tr>";
    for ($x = 1; $x <= count($herrialdeak); $x++) {
        echo "<th>$x. herrialdea</th>";
    }
    echo "</tr>";

    echo "<tr>";
    for ($x = 0; $x < count($herrialdeak); $x++) {
        echo "<td>" . $herrialdeak[$x] . "</td>";
    }
    echo "</tr>";

    echo "</table>";
    ?>
    <hr>

    <h2>Ariketa 4.3</h2>

    <?php
    for ($x = 0; $x < 6; $x++) {
        $zenbakiak2[] = rand(1, 100);
    }

    echo "<table>";
    echo "<tr>";
    echo "<th>Zenbakia</th>";
    echo "<th>Bakoitia</th>";
    echo "</tr>";

    echo "<tr>";
    foreach ($zenbakiak2 as $zenbakia) {
        if ($zenbakia % 2 == 0) {
            echo "<th> $zenbakia </th> <th> BAI </th> <tr>";
        } else {
            echo "<th> $zenbakia </th> <th> EZ </th> <tr>";
        }
    }

    echo "</tr>";
    echo "</table>";
    ?>
    <hr>

</body>