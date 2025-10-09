<?php
require 'TaldeaController.php';
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
        </tr>

        <?php foreach ($taldeak as $talde): ?>
            <tr>
                <td><?= htmlspecialchars($talde['id']) ?></td>
                <td><?= htmlspecialchars($talde['izena']) ?></td>
                <td>
                    <form action="TaldeaController.php" method="post">
                        <input type="number" name="update_puntuak" value="<?= htmlspecialchars($talde['puntuak']) ?>"
                            style="width:50px;">
                        <input type="hidden" name="id" value="<?= $talde['id'] ?>">
                        <button type="submit">Aldatu</button>
                    </form>
                </td>
                <td>
                    <form action="TaldeaController.php" method="post">
                        <input type="hidden" name="id" value="<?= $talde['id'] ?>">
                        <input type="hidden" name="delete_taldea" value="delete_taldea">
                        <button type="submit"
                            onclick=>Ezabatu</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>