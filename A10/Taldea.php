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

    public function create($izena, $puntuak)
    {
        $stmt = $this->db->getKonexioa()->prepare(
            "INSERT INTO taldea (izena, puntuak) VALUES (?, ?)"
        );

        if (!$stmt) {
            echo "Errorea sortzerakoan: " . $this->db->getKonexioa()->error;
            return false;
        }

        $stmt->bind_param("si", $izena, $puntuak);
        $emaitza = $stmt->execute();
        $stmt->close();

        return $emaitza;
    }

    public function delete($id)
    {
        $stmt = $this->db->getKonexioa()->prepare(
            "DELETE FROM taldea WHERE id = ?"
        );

        if (!$stmt) {
            echo "Errorea ezabatzerakoan: " . $this->db->getKonexioa()->error;
            return false;
        }

        $stmt->bind_param("i", $id);
        $emaitza = $stmt->execute();
        $stmt->close();

        return $emaitza;
    }

    public function update($id, $izena, $puntuak)
    {
        $stmt = $this->db->getKonexioa()->prepare(
            "UPDATE taldea SET izena = ?, puntuak = ? WHERE id = ?"
        );

        if (!$stmt) {
            echo "Errorea eguneratzerakoan: " . $this->db->getKonexioa()->error;
            return false;
        }

        $stmt->bind_param("sii", $izena, $puntuak, $id);
        $emaitza = $stmt->execute();
        $stmt->close();

        return $emaitza;
    }
}
?>