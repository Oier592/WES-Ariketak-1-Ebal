<?php
require_once __DIR__ . '/../Klaseak/DB.php';
require_once __DIR__ . '/../Klaseak/Taldea.php';

$db = new DB();
$db->konektatu();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $puntuak = $_POST['puntuak'];

    // Movidas para asegurarnos de que no hay inyecciones SQL
    $id = $db->getKonexioa()->real_escape_string($id);
    $puntuak = $db->getKonexioa()->real_escape_string($puntuak);

    // if eguneratu
    if (isset($_POST['update_puntuak'])) {
        $puntuak = $_POST['update_puntuak'];
        $puntuak = $db->getKonexioa()->real_escape_string($puntuak);

        $sql = "UPDATE taldea SET puntuak = '$puntuak' WHERE id = '$id'";
        $db->getKonexioa()->query($sql);

        // else if ezabatu
    } elseif ($_POST['delete_taldea'] === 'delete_taldea') {
        $sql = "DELETE FROM taldea WHERE id = '$id'";
        $db->getKonexioa()->query($sql);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Insertar nuevo equipo
        if (isset($_POST['accion']) && $_POST['accion'] === 'insert_taldea') {
            $izena = $db->getKonexioa()->real_escape_string($_POST['izena']);
            $puntuak = $db->getKonexioa()->real_escape_string($_POST['puntuak']);

            $sql = "INSERT INTO taldea (izena, puntuak) VALUES ('$izena', '$puntuak')";
            $db->getKonexioa()->query($sql);

            header("Location: index.php");
            exit();
        }
    }


    // Después de cualquier acción, redirigir
    header("Location: index.php");
    exit();
}

// Ahora sí, cargamos los datos
$taldeaDB = new Taldea($db);
$taldeak = $taldeaDB->getAll();
?>