<?php
require 'Taldea_Controller.php';
?>

<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <title>Taldeak</title>
    <style>
        table,
        th,
        td {
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
    <h2>Sailkapena</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Izena</th>
            <th>Puntuak</th>
            <th></th>
        </tr>

        <?php foreach ($taldeak as $talde): ?>
            <tr>
                <td><?= htmlspecialchars($talde['id']) ?></td>
                <td><?= htmlspecialchars($talde['izena']) ?></td>
                <td><?= htmlspecialchars($talde['puntuak']) ?>
                    <button type="submit" onclick="">
                        Aldatu
                    </button>
                </td>
                <td>
                    <form action="Taldea_Controller.php" method="POST" style="display:inline;">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $talde['id'] ?>">
                        <button type="submit" onclick="">
                            Ezabatu
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>