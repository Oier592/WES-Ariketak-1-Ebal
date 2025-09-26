<?php
class Ikaslea
{
    public $izena;
    public $notak;

    function bataz_bestekoa()
    {
        $totala = 0;
        foreach ($this->notak as $nota) {
            $totala += $nota;
        }
        return $totala / count($this->notak);
    }

    function erakutsi_notak()
    {
        foreach ($this->notak as $asignatura => $nota) {
            echo $asignatura . ": " . $nota . "<br>";
        }
    }
}
?>