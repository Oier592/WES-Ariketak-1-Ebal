<?php
    require 'klaseak/DB.php';
    require 'klaseak/Erabiltzailea.php';

    // Datu-basearekin erabiltzaileak kudeatzeko objektuak sortu.
    $db = new DB();
    $db->konektatu();
    $erabiltzaileDB = new Erabiltzailea($db);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DB Adibidea</title>
    </head>
    <body>
        <h1>DB Adibidea</h1>
        <?php if (isset($_GET['sortutaOk'])) { ?>
            <span style="color: green;"><?php echo $_GET['izena']; ?> erabiltzailea sortu da.</span><br><br>
        <?php } ?>
        <h2>Danak</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Izena</th>
                <th></th>
            </tr>
            <?php foreach ($erabiltzaileDB->getAll() as $erabiltzailea) { ?>
            <tr>
                <td><?= $erabiltzailea['id'] ?></td>
                <td><?= $erabiltzailea['izena'] ?></td>
                <td>
                    <form action="erabiltzaileak-controller.php" method="POST" onsubmit="return confirm('Ezabatu erabiltzailea?');">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $erabiltzailea['id'] ?>">
                        <button type="submit">Ezabatu</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <h2></h2>
        <form method="post" action="erabiltzaileak-controller.php">
            <label for="izena">Izena:</label>
            <input type="text" id="izena" name="izena">
            <br><br>
            <input type="submit" value="Sortu">
        </form>
        <?php if(!empty($_GET['id'])) { ?>
            <h2>Erabiltzaile <?= $_GET['id'] ?></h2>
            <ul>
                <?php 
                    // $erabiltzailea = $erabiltzaileDB->getEzSegurua($_GET['id']);
                    $erabiltzailea = $erabiltzaileDB->get($_GET['id']);
                    echo "<li>ID: ".$erabiltzailea['id'].'</li>';
                    echo "<li>Izena: ".$erabiltzailea['izena'].'</li>';
                ?>
            </ul>
        <?php } ?>
    </body>
</html>
