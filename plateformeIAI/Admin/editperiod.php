<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Période d'Inscription</title>
</head>
<body>
    <?php
    
    require '../helpers/checkSessionData.php';
    session_start();
    $concoursId = $_SESSION['concoursId'];
    $debut = $_SESSION['dateDebut'];
    $debut_inscription = $_SESSION['dateDebutInscription'];
    $fin_inscription = $_SESSION['dateFinInscription'];

    
    echo '
            <form action="backend/editperiodbackend.php" method="post">
                <input type="hidden" name="concours_id" value="' . $concoursId . '">

                <label for="debut_inscription">Date de Début d\'Inscription :</label>
                <input type="date" name="debut_inscription" value="' . $debut_inscription . '" required><br>

                <label for="fin_inscription">Date de Fin d\'Inscription :</label>
                <input type="date" name="fin_inscription" value="' . $fin_inscription . '" required><br>

                <button type="submit">Modifier la Période d\'Inscription</button>
            </form>
        ';
    ?>
</body>
</html>
