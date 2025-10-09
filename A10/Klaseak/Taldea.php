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

    public function getById($id)
    {
        $id = $this->db->getKonexioa()->real_escape_string($id);
        $sql = "SELECT izena FROM taldea WHERE id = '$id' LIMIT 1";
        $result = $this->db->getKonexioa()->query($sql);
        return $result->fetch_assoc() ?: null;
    }
}