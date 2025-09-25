<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <title>Ariketa 7</title>
</head>

<body>
    <form action="" method="post">
        Izena: <input type="text" name="izena"><br>
        Abizena: <input type="text" name="abizena"><br>
        Alokatutako liburua: <input type="text" name="alokatutako_liburua"><br>
        Emaila: <input type="text" name="emaila"><br>
        Alokera data: <input type="date" name="alokera_data"><br>
        NAN zenbakia: <input type="text" name="nan"><br>
        <input type="submit">
    </form>
    <?php
    require_once "process.php";
    ?>
</body>

</html>