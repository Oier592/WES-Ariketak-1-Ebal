<!DOCTYPE html>
<html lang="eu">

</html>
<style>
    table,
    th,
    td {
        border: 1px solid;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>Ariketa 5</title>
</head>

<body>
    <h1>Ariketak 5</h1>
    <h2>Ariketa 5.1</h2>
    <?php
    $liburuak = [
        [
            "izena" => "Harry Potter",
            "autorea" => "J.K. Rowling"
        ],
        [
            "izena" => "Game of Thrones",
            "autorea" => "George R.R. Martin"
        ],
        [
            "izena" => "The Hobbit",
            "autorea" => "J.R.R. Tolkien"
        ]
    ];

    echo "<table>";
    echo "<tr>
        <th>Izena</th>
        <th>Autorea</th>
      </tr>";

    foreach ($liburuak as $liburua) {
        echo "<tr>";
        echo "<td>" . $liburua["izena"] . "</td>";
        echo "<td>" . $liburua["autorea"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>

    <hr>

    <h2>Ariketa 5.2</h2>
    <?php
    $ikasleak = [
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

    echo "<table>";
    echo "<tr>
        <th>Izena</th>
        <th>Nota</th>
      </tr>";

    for ($x = 0; $x < count($ikasleak); $x++) {
        echo "<tr>";
        echo "<td>" . $ikasleak[$x]["ikaslea"] . "</td>";
        echo "<td>" . $ikasleak[$x]["nota"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    $kantitatea = count($ikasleak);
    $zbk = 0;
    foreach ($ikasleak as $ikasle) {
        $zbk += $ikasle["nota"];
    }

    $batazb = $zbk / $kantitatea;
    echo "<p> Batazbesteko nota: $batazb."
        ?>
    <hr>

    <h2>Ariketa 5.3</h2>
    <?php
    $ikasleak2 = [
        [
            "ikaslea" => "Jon",
            "nota" => 8
        ],
        [
            "ikaslea" => "Ane",
            "nota" => 6
        ],
        [
            "ikaslea" => "Markel",
            "nota" => 3
        ]
    ];

    echo "<table>";
    echo "<tr>
        <th>Izena</th>
        <th>Nota</th>
      </tr>";

    foreach ($ikasleak2 as $ikasle2) {
        echo "<tr>";
        echo "<td>" . $ikasle2["ikaslea"] . "</td>";

        echo "<td>";
        if ($ikasle2["nota"] < 5) {
            echo "Txarra";
        } else if ($ikasle2["nota"] < 7) {
            echo "Ona";
        } else if ($ikasle2["nota"] > 7) {
            echo "Oso ona";
        } else {
            echo "?";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <hr>

    <h2>Ariketa 5.4</h2>
    <?php
    $ikasleak3 = [
        [
            "izena" => "Jon",
            "abizena" => "Jon abizena",
            "telefonoa" => "Jon telefonoa",
            "adina" => 20
        ],
        [
            "izena" => "Ane",
            "abizena" => "Ane abizena",
            "telefonoa" => "Ane telefonoa",
            "adina" => 21
        ],
        [
            "izena" => "Markel",
            "abizena" => "Markel abizena",
            "telefonoa" => "Markel telefonoa",
            "adina" => 22
        ]
    ];

    echo "<table>";
    echo "<tr><th>Izena</th><th>Abizena</th><th>Telefonoa</th><th>Adina</th></tr>";

    foreach ($ikasleak3 as $ikaslea3) {
        echo "<tr>";
        echo "<td>" . $ikaslea3["izena"] . "</td>";
        echo "<td>" . $ikaslea3["abizena"] . "</td>";
        echo "<td>" . $ikaslea3["telefonoa"] . "</td>";
        echo "<td>" . $ikaslea3["adina"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</tr>";

    ?>
    <hr>
    <h2>Ariketa 5.5</h2>
    <?php

    $ikasleak4 = [
        [
            "izena" => "Jon",
            "abizenak" => [
                "abizena1" => "Jon abizena1",
                "abizena2" => "Jon abizena2"
            ],
            "telefonoak" => [
                "telefono1" => "Jon telefono1",
                "telefonoa2" => "Jon telefono1"
            ],
            "adina" => 20,
            "moduluak" => [
                "PSP" => "Jon PSP",
                "AD" => "Jon AD",
                "PMDM" => "Jon PMDM"
            ],
        ],
        [
            "izena" => "Ane",
            "abizenak" => [
                "abizena1" => "Ane abizena1",
                "abizena2" => "Ane abizena2"
            ],
            "telefonoak" => [
                "telefono1" => "Ane telefono1",
                "telefonoa2" => "Ane telefono1"
            ],
            "adina" => 21,
            "moduluak" => [
                "PSP" => "Ane PSP",
                "AD" => "Ane AD",
                "PMDM" => "Ane PMDM"
            ],
        ],
        [
            "izena" => "Markel",
            "abizenak" => [
                "abizena1" => "Markel abizena1",
                "abizena2" => "Markel abizena2"
            ],
            "telefonoak" => [
                "telefono1" => "Markel telefono1",
                "telefonoa2" => "Markel telefono1"
            ],
            "adina" => 22,
            "moduluak" => [
                "PSP" => "Markel PSP",
                "AD" => "Markel AD",
                "PMDM" => "Markel PMDM"
            ],
        ],
    ];

    echo "<table>";
    echo "<tr><th>Izena</th><th>Abizena (1)</th><th>Abizena (2)</th><th>Telefonoa (1)</th><th>Telefonoa (2)</th><th>Adina</th><th>PSP</th><th>AD</th><th>PMDM</th></tr>";
    foreach ($ikasleak4 as $ikaslea) {
        echo "<tr>";
        echo "<td>" . $ikaslea["izena"] . "</td>";

        foreach ($ikaslea["abizenak"] as $ikabizenak) {
            echo "<td>" . $ikabizenak . "</td>";
        }

        foreach ($ikaslea["telefonoak"] as $iktelefonoak) {
            echo "<td>" . $iktelefonoak . "</td>";
        }

        echo "<td>" . $ikaslea["adina"] . "</td>";

        foreach ($ikaslea["moduluak"] as $ikmoduluak) {
            echo "<td>" . $ikmoduluak . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";


    ?>
    <hr>