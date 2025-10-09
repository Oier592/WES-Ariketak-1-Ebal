<?php
require_once __DIR__ . '/../Klaseak/DB.php';

$db = new DB();
$db->konektatu();
$conn = $db->getKonexioa();

// Recoger el id enviado por GET
$id = $_GET['id'] ?? null;

$izena = 'Talde ezezaguna'; // valor por defecto

if ($id) {
    $id = $conn->real_escape_string($id);

    // Obtener nombre del equipo
    $result = $conn->query("SELECT izena FROM taldea WHERE id = '$id'");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $izena = $row['izena'];
    }

    // Aquí podrías hacer más consultas, por ejemplo traer participantes
    // $partaideak = $conn->query("SELECT * FROM partaideak WHERE taldea_id = '$id'");
}
?>
