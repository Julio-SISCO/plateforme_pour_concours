

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Concours</title>
</head>

<body>
    <?php
    require '../helpers/checkSessionData.php';
    session_start();
    $concoursId = $_SESSION['concoursId'];
    $debut = $_SESSION['dateDebut'];
    $fin = $_SESSION['dateFin'];
    $debut_inscription = $_SESSION['dateDebutInscription'];
    $fin_inscription = $_SESSION['dateFinInscription'];
    $libelle = $_SESSION['libelle'];

    echo '
        <form action="backend/editconcoursbackend.php" method="post">
            <input type="hidden" name="concours_id" value="' . $concoursId . '">
            <label for="libelle">Libellé :</label>
            <input type="text" name="libelle" value="' . $libelle . '" required><br>';

    if (isSameDate($debut, $fin)) {
        echo '
            <label for="debut">Date Concours :</label>
            <input type="date" name="debut" value="' . $debut . '" required><br>
        ';
    } else {

        echo '
            <label for="debut">Début Concours :</label>
            <input type="date" name="debut" value="' . $debut_inscription . '" required><br>

            <label for="fin">Fin Concours :</label>
            <input type="date" name="fin" value="' . $fin_inscription . '" required><br>    ';
    }
    echo '
            <label for="debut">Date de Début Inscription :</label>
            <input type="date" name="debut" value="' . $debut_inscription . '" required><br>

            <label for="fin">Date de Fin Inscription :</label>
            <input type="date" name="fin" value="' . $fin_inscription . '" required><br>


            <button type="submit">Modifier</button>
        </form>
    ';
    ?>
</body>

</html>