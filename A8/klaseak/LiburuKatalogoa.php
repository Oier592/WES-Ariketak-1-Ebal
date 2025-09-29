<?php
class LiburuKatalogoa
{
    public $liburuak = [];

    function gehituLiburua(Liburua $liburu)
    {
        $this->liburuak[] = $liburu;
    }

    function inprimatuLiburuak()
    {
        if (empty($this->liburuak)) {
            echo "Ez dago libururik katalogoan.<br>";
            return;
        }

        foreach ($this->liburuak as $liburu) {
            echo "$liburu->izena (Egilea: $liburu->egilea) <br>";
        }
    }
}
?>