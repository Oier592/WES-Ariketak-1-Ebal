<?php
require 'klaseak/DB.php';
require 'klaseak/Erabiltzailea.php';

// Datu-basearekin erabiltzaileak kudeatzeko objektuak sortu.
$db = new DB();
$db->konektatu();
$erabiltzaileaDB = new Erabiltzailea($db);

// Erroreak kudeatzeko aldagaiak.
$izenaErr = "";
$izena = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //
    // DELETE: Ezabatu botoia sakatu da.
    // 
    if(isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
        if($erabiltzaileaDB->delete($_POST['id'])) {
            header("Location: index.php?ezabatutaOk=true");
            exit();
        }
        else {
            header("Location: index.php?error=1");
            exit();
        }
    }
    else {
        // 
        // POST: Ez badugu zehaztu "_method" atributua, POST normal bat da, taldea sortzeko.
        //
        if (empty($_POST["izena"])) {
            $izenaErr = "Izena derrigorrezkoa da.";
        } else {
            $izena = htmlspecialchars($_POST["izena"]);
        }
    
        // Ez da balidazio errorerik egon.
        if (empty($izenaErr)) {
            if($erabiltzaileaDB->create($_POST['izena'])){
                header("Location: index.php?sortutaOk=true&izena=".$izena);
                exit();
            }
            else {
                header("Location: index.php?error=1");
                exit();
            }
        }
        else {
            // Itzuli formulariora errore mezuekin URL-an (horrela $_GET aldagai superglobalean egongo dira atzigarri).
            header("Location: index.php?izenaErr=$izenaErr");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
