<?php
require_once "helpers.php";

$erroreak = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $erroreak = formularioaZuzendu($_POST);

    if (count($erroreak) === 0) {
        echo "<p style='color:green;'>Bidalita.</p>";
    } else {
        echo "<ul style='color:red;'>";
        foreach ($erroreak as $x) {
            echo "<li>$x</li>";
        }
        echo "</ul>";
    }
}
?>