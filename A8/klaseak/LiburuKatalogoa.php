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
        foreach ($this->liburuak as $liburu) {
            echo "$liburu->izena (Egilea: $liburu->egilea) <br>";
        }
    }
}
?>