<?php
abstract class Pertsona
{
    protected $izena;
    protected $abizenak;
    protected $zeregina;

    public function __construct($izena, $abizenak, $zeregina)
    {
        $this->izena = $izena;
        $this->abizenak = $abizenak;
        $this->zeregina = $zeregina;
    }

    abstract public function aurkeztu();
}

class Ikaslea extends Pertsona
{
    public function aurkeztu()
    {
        echo "Ni ikaslea naiz: {$this->izena} {$this->abizenak}.<br>";
    }
}

class Irakaslea extends Pertsona
{
    public function aurkeztu()
    {
        echo "Ni irakaslea naiz: {$this->izena} {$this->abizenak}.<br>";
    }
}
?>