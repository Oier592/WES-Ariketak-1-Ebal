<?php
require_once __DIR__ . '/../Klaseak/DB.php';

$db = new DB();
$db->konektatu();
$conn = $db->getKonexioa();

$id = $_GET['id'] ?? null;

$izena = 'A';

if ($id) {
    $id = $conn->real_escape_string($id);

    $result = $conn->query("SELECT izena FROM taldea WHERE id = '$id'");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $izena = $row['izena'];
    }
}
?>