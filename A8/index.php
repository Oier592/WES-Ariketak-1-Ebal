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
    require_once "klaseak/IkasleaA1.php";

    $notak = [
        "WES" => 7,
        "DIW" => 8,
        "DAW" => 5,
        "WEC" => 7,
        "EIE" => 9
    ];

    $nora = new IkasleaA1();
    $nora->izena = "Ane";
    $nora->notak = $notak;

    $nora->erakutsi_notak();
    ?>

    <h2>Ariketa 8.2</h2>
    <?php
    require_once "klaseak/produktua.php";

    $produktua = new Produktua();
    $produktua->izenburua = '1984';
    $produktua->prezioa = 20;

    $produktua->aukeratu(2);
    ?>

    <h2>Ariketa 8.3</h2>
    <?php
    require_once "klaseak/Liburua.php";
    require_once "klaseak/LiburuKatalogoa.php";

    $liburu1 = new Liburua("Harry Potter", "J.K. Rowling");
    $liburu2 = new Liburua("The Hobbit", "J.R.R. Tolkien");
    $liburu3 = new Liburua("To Kill a Mockingbird", "Harper Lee");

    $katalogoa = new LiburuKatalogoa();
    $katalogoa->gehituLiburua($liburu1);
    $katalogoa->gehituLiburua($liburu2);
    $katalogoa->gehituLiburua($liburu3);

    $katalogoa->inprimatuLiburuak();
    ?>

    <h2>Ariketa 8.4</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="izena">Izena:</label>
        <input type="text" id="izena" name="izena" required><br><br>

        <label for="abizenak">Abizenak:</label>
        <input type="text" id="abizenak" name="abizenak" required><br><br>

        <label for="zeregina">Zeregina:</label>
        <select id="zeregina" name="zeregina">
            <option value="ikaslea">Ikaslea</option>
            <option value="irakaslea">Irakaslea</option>
        </select><br><br>

        <input type="submit" value="Bidali">
    </form>

    <hr>

    <?php
    require_once "klaseak/Pertsona.php";
    $mezua = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["zeregina"])) {
        $izena = htmlspecialchars($_POST["izena"] ?? '');
        $abizenak = htmlspecialchars($_POST["abizenak"] ?? '');
        $zeregina = $_POST["zeregina"];

        if ($zeregina === "ikaslea") {
            $pertsona = new Ikaslea($izena, $abizenak, $zeregina);
        } else {
            $pertsona = new Irakaslea($izena, $abizenak, $zeregina);
        }

        echo "<h3>Emaitza:</h3>";
        $pertsona->aurkeztu();
    }
    ?>

    <h2>Ariketa 8.5</h2>
    <?php
    require_once "Interfazeak/Animaliak.php";
    $mezua = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["animalia"])) {
        $animalia = $_POST["animalia"];

        if ($animalia === "txakurra") {
            $obj = new Txakurra();
            $mezua = $obj->esan();
        } elseif ($animalia === "katua") {
            $obj = new Katua();
            $mezua = $obj->esan();
        }
    }

    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <select name="animalia">
            <option value="">-- Aukeratu --</option>
            <option value="txakurra">Txakurra</option>
            <option value="katua">Katua</option>
        </select>
        <button type="submit">Bidali</button>
    </form>

    <?php if (!empty($mezua)): ?>
        <h3>Emaitza: <?php echo $mezua; ?></h3>
    <?php endif; ?>
    <?php

    ?>

</body>