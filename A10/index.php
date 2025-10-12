<?php
require_once __DIR__ . '/Controller/TaldeaController.php';
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
            border: 1px solid;
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

        <!-- Talde guztien informazioa bistaratuko da.-->
        <?php foreach ($taldeak as $talde): ?>
            <tr>
                <td><?= htmlspecialchars($talde['id']) ?></td>
                <td>
                    <a href="Partaideak_Orria.php?id=<?= $talde['id'] ?>">
                        <?= htmlspecialchars($talde['izena']) ?>
                    </a>

                </td>
                <td>
                    <!-- Talde bakoitzak, puntuazioaren alboan puntuazio hau eguneratuko duen botoia izango du. -->
                    <form action="Controller/TaldeaController.php" method="post">

                        <input type="number" name="update_puntuak" value="<?= htmlspecialchars($talde['puntuak']) ?>"
                            style="width:50px;">
                        <input type="hidden" name="id" value="<?= $talde['id'] ?>">
                        <button type="submit">Aldatu</button>
                    </form>

                </td>
                <td>
                    <!-- Talde bat ezabatzeko botoia. -->
                    <form action="Controller/TaldeaController.php" method="post">
                        <input type="hidden" name="id" value="<?= $talde['id'] ?>">
                        <input type="hidden" name="delete_taldea" value="delete_taldea">
                        <button type="submit" onclick=>Ezabatu</button>
                    </form>
                </td>

                <td>
                    <!-- Taldearen id-a cookian gordetzeko botoia. -->
                    <form action="Controller/TaldeaController.php" method="post">
                        <input type="hidden" name="accion" value="set_gogokoena">
                        <input type="hidden" name="id" value="<?= $talde['id'] ?>">
                        <input type="hidden" name="izena" value="<?= htmlspecialchars($talde['izena']) ?>">
                        <button type="submit">Gogokoena</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Taldearen gogokoenaren id-tik (cookian dagoena) izena bistaratzeko egin behar den kontsulta. -->
    <?php if (isset($_SESSION['talde_gogokoena'])): ?>
        <?php
        if (isset($_SESSION['talde_gogokoena'])) {
            $taldeFav = $taldeaDB->getById($_SESSION['talde_gogokoena']);
            if ($taldeFav) {
                echo '<p><strong>Zure talde gogokoena:</strong> ' . htmlspecialchars($taldeFav['izena']) . '</p>';
            }
        }
        ?>
    <?php endif; ?>

    <!-- Talde berri bat gehitzeko beharrezkoak diren formulario eta botoia. -->
    <h2>Gehitu taldea</h2>
    <form action="Controller/TaldeaController.php" method="post">
        <div>
            <label for="izena">Izena:</label>
            <input type="text" id="izena" name="izena" required>
        </div>
        <div>
            <label for="puntuak">Puntuak:</label>
            <input type="number" id="puntuak" name="puntuak" required>
        </div>
        <div>
            <button type="submit" name="accion" value="insert_taldea">Sortu</button>
        </div>
    </form>
</body>

</html>