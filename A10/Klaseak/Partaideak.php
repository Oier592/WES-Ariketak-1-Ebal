<?php
class Partaideak
{
    private $db;

    // Datu basean ezer egin baino lehen, konecioa lortu behar da.
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Talde baten partaide guztiak lortzeko erabiliko den kontsulta.
    public function getAll($talde_id)
    {
        $emaitza = $this->db->getKonexioa()->query("SELECT * FROM partaideak where taldea_id = $talde_id");
        if (!$emaitza) {
            echo 'ERROREA: Ezin izan dira partaideak eskuratu.';
            die();
        }

        $partaideak = [];
        if ($emaitza->num_rows > 0) {
            while ($row = $emaitza->fetch_assoc()) {
                $partaideak[] = $row;
            }
        }
        return $partaideak;
    }

    // Partaide konkretu bat lortzeko erabiliko den kontsulta.
    public function getById($id)
    {
        $id = $this->db->getKonexioa()->real_escape_string($id);
        $sql = "SELECT izena FROM partaideak WHERE id = '$id' LIMIT 1";
        $result = $this->db->getKonexioa()->query($sql);
        return $result->fetch_assoc() ?: null;
    }
}