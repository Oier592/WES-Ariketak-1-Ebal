<?php
require 'DB.php';
require 'Taldea.php';

$db = new DB();
$db->konektatu();

$taldeaDB = new Taldea($db);
$taldeak = $taldeaDB->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        $id = (int)$_POST['id'];
        $taldeaDB->delete($id);

        header("Location: index.php");
        exit;
    }
}
?>