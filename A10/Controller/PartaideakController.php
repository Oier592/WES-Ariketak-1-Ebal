<?php
require_once __DIR__ . '/../Klaseak/DB.php';
require_once __DIR__ . '/../Klaseak/Partaideak.php';

// Datu basea kudeatzeko beharrezkoa den konexioa lortzen du.
$db = new DB();
$db->konektatu();

// URL-tik pasatuko zaio taldearen id-a.
$talde_id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (isset($_GET['id'])) {
    $talde_id = (int) $_GET['id'];
}

// Funtzio hau partaide bat txertatzen du.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'insert_partaidea') {
        $izena = $db->getKonexioa()->real_escape_string($_POST['izena']);
        $herrialdea = $db->getKonexioa()->real_escape_string($_POST['herrialdea']);

        if ($talde_id !== null) {
            $sql = "INSERT INTO partaideak (izena, herrialdea, taldea_id) VALUES ('$izena', '$herrialdea', $talde_id)";
            $db->getKonexioa()->query($sql);

            header("Location: ../Partaideak_Orria.php?id=$talde_id");
            exit();
        } else {
            echo "ERROREA: Taldea ID ez da existitzen.";
            exit();
        }
    }
}

// Honek, takde baten partaide gutziak lortu baino lehen, taldearen id-a existitzen delaz ziurtatzen da, orria ez apurtzeko.
$partaideak = [];
if ($talde_id !== null) {
    $partaideakDB = new Partaideak($db);
    $partaideak = $partaideakDB->getAll($talde_id);
}

?>