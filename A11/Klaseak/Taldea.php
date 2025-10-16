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

    // Obtener datos del equipo
    $sql = "SELECT * FROM taldea WHERE id = '$id' LIMIT 1";
    $result = $this->db->getKonexioa()->query($sql);

    if (!$result || $result->num_rows === 0) {
        return null;
    }

    $taldea = $result->fetch_assoc();

    // Obtener todos los participantes del equipo
    $sql2 = "SELECT * FROM partaideak WHERE taldea_id = '$id'";
    $result2 = $this->db->getKonexioa()->query($sql2);

    $partaideak = [];
    if ($result2 && $result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $partaideak[] = $row;
        }
    }

    // Añadir participantes al array del equipo
    $taldea['partaideak'] = $partaideak;

    return $taldea;
}



    public function insert($izena, $puntuak)
    {
        $izena = $this->db->getKonexioa()->real_escape_string($izena);
        $puntuak = intval($puntuak);

        $sql = "INSERT INTO taldea (izena, puntuak) VALUES ('$izena', $puntuak)";
        $result = $this->db->getKonexioa()->query($sql);

        if ($result) {
            return $this->db->getKonexioa()->insert_id;
        } else {
            return null;
        }
    }

    public function updatePuntuak($id, $puntuak)
    {
        $id = $this->db->getKonexioa()->real_escape_string($id);
        $puntuak = $this->db->getKonexioa()->real_escape_string($puntuak);
        $sql = "UPDATE taldea SET puntuak = '$puntuak' WHERE id = '$id'";

        $result = $this->db->getKonexioa()->query($sql);

        if ($result) {
            // Devuelve true si la consulta fue correcta, aunque affected_rows sea 0
            return true;
        } else {
            // Devuelve false si hay error
            return false;
        }
    }


    public function delete($id)
    {
        $id = $this->db->getKonexioa()->real_escape_string($id);
        $sql = "DELETE FROM taldea WHERE id = '$id'";

        $result = $this->db->getKonexioa()->query($sql);

        if ($result) {
            return true; // Consulta correcta, aunque no se haya borrado nada
        } else {
            return false; // Error real
        }
    }
}