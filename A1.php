<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <title>Ariketa 1</title>
</head>

<body>
    <h1>Ariketak 1</h1>

    <h2>Ariketa 1.1</h2>
    <?php

    // Zenbaki motako aldagai bat sortu dut, eta echo bitartez mezu bat inprimatu dut zenbakiarekin.
    
    $zenbaki = 01;
    echo "Zenbakia $zenbaki da.";
    ?>
    <hr>

    <h2>Ariketa 1.2</h2>
    <?php

    // Balioa aldagaia zenbaki bat denez, if / esle funtzioan beste zenbaki batekin konparatuko dut.
    // Horren arabera, funtzioaren bitartez, mezu bat bistaratuko da.
    
    $balioa = 7;
    if ($balioa < 10) {
        echo "Zenbakia txikia da.";
    } else {
        echo "Zenbakia handia da.";
    }
    ?>

    <hr>

    <h2>Ariketa 1.3</h2>
    <?php

    // Aurreko ariketa bezala da, soilik konparaketa aldatzen da.
    
    $erosketa = 12;
    if ($erosketa > 10) {
        echo "Erosketa: $erosketa. >10";
    } else {
        echo "Erosketa:  $erosketa. <10";
    }
    ?>

    <hr>

    <h2>Ariketa 1.4</h2>
    <?php

    // Aurreko ariketa bezala da, soilik konparaketa aldatzen da (berriz ere).
    
    $pina_input = 1235;
    $pina = 1234;

    if ($pina_input === $pina) {
        echo "PINa zuzena da.";
    } else {
        echo "PINa okerra da.";
    }
    ?>

    <hr>

    <h2>Ariketa 1.5</h2>
    <?php

    // Bi aldagai sortuko ditut: Bata testu motakoa eta bestea zenbaki motakoa.
    // Ondoren, zenbaki bat esleituko diot eta horren arabera, mezu bat bistaratuko da.
    
    $adina = 17;
    $baimendutako_mezua = "";

    if ($adina >= 18) {
        $baimendutako_mezua = "Gure lokalera sartu zaitezke";
    } else {
        $baimendutako_mezua = "Ezin zara sartu";
    }

    echo "Adina: $adina <br>";
    echo "Mezua: $baimendutako_mezua";
    ?>
</body>

</html>