<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <title>Ariketa 8</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid;
    }
</style>

<body>
    <h1>Ariketa 8</h1>
    <h2>Ariketa 8.1</h2>


    <?php
    require_once "klaseak/Ikaslea.php";

    $notak = [
        "WES" => 7,
        "DIW" => 8,
        "DAW" => 5,
        "WEC" => 7,
        "EIE" => 9
    ];

    $nora = new Ikaslea();
    $nora->izena = "Ane";
    $nora->notak = $notak;

    $nora->erakutsi_notak();
    ?>


</body>