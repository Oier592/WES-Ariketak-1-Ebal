<?php
session_start();
require_once __DIR__ . '/../Klaseak/DB.php';
require_once __DIR__ . '/../Klaseak/Taldea.php';

// Datu basea kudeatzeko beharrezkoa den konexioa lortzen du.
$db = new DB();
$db->konektatu();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Talde baten puntuak eguneratzeko.
    if (isset($_POST['update_puntuak']) && isset($_POST['id'])) {
        $id = $db->getKonexioa()->real_escape_string($_POST['id']);
        $puntuak = $db->getKonexioa()->real_escape_string($_POST['update_puntuak']);
        $sql = "UPDATE taldea SET puntuak = '$puntuak' WHERE id = '$id'";
        $db->getKonexioa()->query($sql);
        header("Location: ../index.php");
        exit();
    }

    // Talde bat ezabatzeko.
    if (isset($_POST['delete_taldea'], $_POST['id']) && $_POST['delete_taldea'] === 'delete_taldea') {
        $id = $db->getKonexioa()->real_escape_string($_POST['id']);
        $sql = "DELETE FROM taldea WHERE id = '$id'";
        $db->getKonexioa()->query($sql);
        header("Location: ../index.php");
        exit();
    }

    // Talde bat sortzeko.
    if (isset($_POST['accion']) && $_POST['accion'] === 'insert_taldea') {
        $izena = $db->getKonexioa()->real_escape_string($_POST['izena']);
        $puntuak = $db->getKonexioa()->real_escape_string($_POST['puntuak']);
        $sql = "INSERT INTO taldea (izena, puntuak) VALUES ('$izena', '$puntuak')";
        $db->getKonexioa()->query($sql);
        header("Location: ../index.php");
        exit();
    }

    // Talde baten id-a cookian gordetzeko.
    if (isset($_POST['accion']) && $_POST['accion'] === 'set_gogokoena') {
        $_SESSION['talde_gogokoena'] = $_POST['id'] ?? '';
        echo "<script>
                window.location.href = '../index.php';
              </script>";
        exit();
    }

    // Aurrek funztioan forde dugun cookia-ren informazioa kontsultazen du, eta informazioa gordeta egotekotan, bistaratzen du (gordetzen den informazioa taldearen id-a da, eta bistaratzen duena taldearen izena da, datu baseari kontsulta bat egiten diolako).
    if (isset($_SESSION['talde_gogokoena'])) {
        $idFav = $_SESSION['talde_gogokoena'];
        $taldeFav = $taldeaDB->getById($idFav);
        if ($taldeFav) {

            if (isset($_SESSION['talde_gogokoena'])) {
                $taldeFav = $taldeaDB->getById($_SESSION['talde_gogokoena']);
                if ($taldeFav) {
                    echo '<p>Zure talde gogokoena: ' . htmlspecialchars($taldeFav['izena']) . '</p>';
                }
            }
        }
    }
}

$taldeaDB = new Taldea($db);
$taldeak = $taldeaDB->getAll();
?>