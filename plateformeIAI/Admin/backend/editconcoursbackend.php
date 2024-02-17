<?php
require '../../functions/updateConcours.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $concoursId = $_POST["concours_id"];
    $libelle = $_POST["libelle"];
    $dateDebut = $_POST["debut"];
    $dateFin = $_POST["fin"];

    updateConcours($concoursId, $libelle, $dateDebut, $dateFin);
}
?>
