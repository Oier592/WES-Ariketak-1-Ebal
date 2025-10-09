<?php
require_once __DIR__ . '/../Controller/PartaideakController.php';
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($izena) ?> - Partaideak</title>
    <style>
        table, th, td {
            border: 1px solid #555;
            border-collapse: collapse;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2><?= htmlspecialchars($izena) ?> - Partaideak</h2>

    <!-- Aquí podrías mostrar la lista de participantes usando $partaideak -->
</body>
</html>
