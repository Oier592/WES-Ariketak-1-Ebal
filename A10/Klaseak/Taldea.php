<?php
class Taldea
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $emaitza = $this->db->getKonexioa()->query("SELECT * FROM taldea");
        if (!$emaitza) {
            echo 'ERROREA: Ezin izan dira taldeak eskuratu.';
            die();
        }

        $taldea = [];
        if ($emaitza->num_rows > 0) {
            while ($row = $emaitza->fetch_assoc()) {
                $taldea[] = $row;
            }
        }
        return $taldea;
    }
}