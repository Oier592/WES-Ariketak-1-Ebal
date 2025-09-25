<?php
function formularioaZuzendu($datuak)
{
    $erroreak = [];

    if (strpos($datuak["emaila"], "@") === false) {
        $erroreak[] = "Emailak '@' izan behar du.";
    }

    if (empty($datuak["alokera_data"])) {
        $erroreak[] = "Alokera data ez da zuzena.";
    }

    if (empty($datuak["nan"])) {
        $erroreak[] = "NAN-a sartu behar da.";
    }

    if (!balidatuNAN($datuak["nan"])) {
        $letraOna = NANLetraAtera($datuak["nan"]);
        $erroreak[] = "NAN okerra da, hau da letra ona: $letraOna";
    }

    return $erroreak;
}

function balidatuNAN($nan)
{
    $letra = strtoupper(substr($nan, -1));
    $letraOna = NANLetraAtera($nan);
    return $letra === $letraOna; // true / false
}

function NANLetraAtera($nan)
{
    $nan = trim(strtoupper($nan));
    $letrak = "TRWAGMYFPDXBNJZSQVHLCKE";

    if (strlen($nan) < 2) {
        return false;
    }

    $zenbakiak = substr($nan, 0, -1);
    $letraOnaIndizea = intval($zenbakiak) % 23;
    return $letrak[$letraOnaIndizea];
}
?>