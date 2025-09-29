<?php
class Produktua
{
    public $izenburua;
    public $prezioa;

    function pantailaratu($kop)
    {
        $p_Finala = $kop * $this->prezioa;
        echo "Izenburua: {$this->izenburua}, prezio finala: $p_Finala";
    }

    function aukeratu($kop)
    {
        $this->pantailaratu($kop);
    }
}
?>