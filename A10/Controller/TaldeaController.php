<?php
session_start();

require_once __DIR__ . '/../Klaseak/DB.php';
require_once __DIR__ . '/../Klaseak/Taldea.php';

$db = new DB();
$db->konektatu();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['update_puntuak']) && isset($_POST['id'])) {
        $id = $db->getKonexioa()->real_escape_string($_POST['id']);
        $puntuak = $db->getKonexioa()->real_escape_string($_POST['update_puntuak']);
        $sql = "UPDATE taldea SET puntuak = '$puntuak' WHERE id = '$id'";
        $db->getKonexioa()->query($sql);
        header("Location: ../index.php");
        exit();
    }

    if (isset($_POST['delete_taldea'], $_POST['id']) && $_POST['delete_taldea'] === 'delete_taldea') {
        $id = $db->getKonexioa()->real_escape_string($_POST['id']);
        $sql = "DELETE FROM taldea WHERE id = '$id'";
        $db->getKonexioa()->query($sql);
        header("Location: ../index.php");
        exit();
    }

    if (isset($_POST['accion']) && $_POST['accion'] === 'insert_taldea') {
        $izena = $db->getKonexioa()->real_escape_string($_POST['izena']);
        $puntuak = $db->getKonexioa()->real_escape_string($_POST['puntuak']);
        $sql = "INSERT INTO taldea (izena, puntuak) VALUES ('$izena', '$puntuak')";
        $db->getKonexioa()->query($sql);
        header("Location: ../index.php");
        exit();
    }

    if (isset($_POST['accion']) && $_POST['accion'] === 'set_gogokoena') {
        $_SESSION['talde_gogokoena'] = $_POST['izena'] ?? '';
        echo "<script>
                window.location.href = '../index.php';
              </script>";
        exit();
    }
}

$taldeaDB = new Taldea($db);
$taldeak = $taldeaDB->getAll();
?>