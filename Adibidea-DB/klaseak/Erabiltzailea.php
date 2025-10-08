<?php
class Erabiltzailea
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $emaitza = $this->db->getKonexioa()->query("SELECT * FROM erabiltzaileak");
        if (!$emaitza) {
            echo 'ERROREA: Ezin izan dira datuak eskuratu.';
            die();
        }
        $erabiltzaileak = [];

        if ($emaitza->num_rows > 0) {
            while ($row = $emaitza->fetch_assoc()) {
                $erabiltzaileak[] = $row;
            }
        }
        return $erabiltzaileak;
    }

    public function get($userId)
    {
        $stmt = $this->db->getKonexioa()->prepare("SELECT * FROM erabiltzaileak WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $emaitza = $stmt->get_result();
        $stmt->close();

        $e = NULL;
        if ($emaitza->num_rows > 0) {
            $e = $emaitza->fetch_assoc();
        }
        return $e;
    }
    public function create($izena)
    {
        $stmt = $this->db->getKonexioa()->prepare("INSERT INTO erabiltzaileak (izena) VALUES (?)");
        $i = $izena;
        $stmt->bind_param("s", $i);
        $emaitza = $stmt->execute();
        $stmt->close();
        return $emaitza;
    }
    public function delete($id)
    {
        $stmt = $this->db->getKonexioa()->prepare("DELETE FROM erabiltzaileak WHERE id = ?");
        $stmt->bind_param("i", $i);
        $i = $id;
        $emaitza = $stmt->execute();
        $stmt->close();
        return $emaitza;
    }
    public function getEzSegurua($userId)
    {
        $emaitza = $this->db->getKonexioa()->query("SELECT * FROM erabiltzaileak WHERE id = " . $userId);
        $e = NULL;
        if ($emaitza->num_rows > 0) {
            $e = $emaitza->fetch_assoc();
        }
        return $e;
    }
}
