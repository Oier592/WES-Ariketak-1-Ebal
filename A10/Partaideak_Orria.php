<?php
require_once __DIR__ . '/Controller/PartaideakController.php';
require_once __DIR__ . '/Controller/TaldeaController.php';

$partaideak = [];

if (isset($_GET['id'])) {
    $talde_id = $_GET['id'];

    // Aurretik pasatu zaion id-tik, taldearen informazioa lortzen du.
    $talde = $taldeaDB->getById($talde_id);
    $izena = $talde ? $talde['izena'] : 'Talde ezezaguna';

    // Orain, taldearen partaideen informazioa lortzen du.
    $partaideakDB = new Partaideak($db);
    $partaideak = $partaideakDB->getAll($talde_id);
} else {
    $izena = 'Talde ezezaguna';
}

?>

<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($izena) ?> - Partaideak</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <h2><?= htmlspecialchars($izena) ?> - Partaideak</h2>

    <!-- Taula honetan orain lortu dugun arrayaren informazioa taulan bistaratuko da. -->
    <table>
        <tr>
            <th>ID</th>
            <th>Izena</th>
            <th>Herrialdea</th>
        </tr>

        <?php foreach ($partaideak as $partaide): ?>
            <tr>
                <td><?= htmlspecialchars($partaide['id']) ?></td>
                <td><?= htmlspecialchars($partaide['izena']) ?></td>
                <td><?= htmlspecialchars($partaide['herrialdea']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Formulario hau bistaratu den taldean beste taldekide bat txertatzeko egingo da. -->
    <h2>Gehitu partaidea</h2>
    <form action="Controller/PartaideakController.php?id=<?= htmlspecialchars($talde_id) ?>" method="post">
        <div>
            <label for="izena">Izena:</label>
            <input type="text" id="izena" name="izena" required>
        </div>
        <div>
            <label for="herrialdea">Herrialdea:</label>
            <input type="text" id="herrialdea" name="herrialdea" required>
        </div>
        <div>
            <input type="hidden" id="talde_id" name="talde_id" required>
        </div>
        <div>
            <button type="submit" name="accion" value="insert_partaidea">Sortu</button>
        </div>
    </form>

    <!-- Index orrira bueltatzeko botoia. -->
    <div style="margin-top: 20px;">
        <a href="index.php" style="text-decoration: none;">
            <button type="button">Itzuli</button>
        </a>
    </div>
</body>

</html>