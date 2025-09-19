<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <title>Ariketa 6</title>
</head>

<style>
    table,
    th,
    td {
        border: 1px solid;
    }
</style>

<body>
    <h1>Ariketak 6</h1>

    <h2>Ariketa 6.1</h2>
    <?php

    function array_gehitu($a)
    {
        $batura = 0;
        foreach ($a as $zbk) {
            $batura += $zbk;
        }
        return $batura;
    }

    $zbk_array = array(4, 8, 15, 16, 23, 42);
    $emaitza = array_gehitu($zbk_array);

    echo "Batura $emaitza.";
    ?>
    <hr>


    <h2>Ariketa 6.2</h2>
    <?php
    function array_konbinatu($a, $b)
    {
        return array_merge($a, $b);
    }

    $arr1 = [1, 2, 3];
    $arr2 = [4, 5, 6];

    $emaitza = array_konbinatu($arr1, $arr2);

    echo "<table>";
    echo "<tr>";
    foreach ($emaitza as $x) {
        echo "<td>$x</td>";
    }
    echo "</tr>";
    echo "</table>";

    ?>
    <hr>

    <h2>Ariketa 6.3</h2>
    <?php

    function array_multidimentsionalak_bistaratu($a)
    {
        echo "<table>";
        echo "<tr>";
        foreach ($a as $x) {
            echo "<td>" . $x["ikaslea"] . "</td>";
            echo "<td>" . $x["nota"] . "</td><tr>";
        }

        echo "</table>";
        echo "</tr>";
    }
    $array3 = [
        [
            "ikaslea" => "Jon",
            "nota" => 8
        ],
        [
            "ikaslea" => "Ane",
            "nota" => 9
        ],
        [
            "ikaslea" => "Markel",
            "nota" => 7
        ]
    ];

    array_multidimentsionalak_bistaratu($array3);
    ?>
    <hr>

    <h2>Ariketa 6.4</h2>
    <?php

    function faktorialaKalkulatu($zenbaki)
    {
        $biderketak = [];
        $emaitza = 1;

        for ($i = 1; $i <= $zenbaki; $i++) {
            $emaitza *= $i;
            $biderketak[] = $emaitza;
        }
        return [$emaitza, $biderketak];
    }
    $ausazkoZenbaki = rand(1, 10);
    list($faktoriala, $biderketak) = faktorialaKalkulatu($ausazkoZenbaki);

    // HTML zerrenda sortu
    echo "<h3>Ausazko zenbakia: $ausazkoZenbaki</h3>";
    echo "<p>Faktoriala: $faktoriala</p>";
    echo "<ul>";
    foreach ($biderketak as $index => $biderketa) {
        echo "<li>* " . ($index + 1) . ": $biderketa</li>";
    }
    echo "</ul>";

    ?>
    <hr>