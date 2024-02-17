<?php
require '../../functions/updateConcours.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $concoursId = $_POST["concours_id"];
    $dateDebutInscription = $_POST["debut_inscription"];
    $dateFinInscription = $_POST["fin_inscription"];

    updatePeriod($concoursId, $dateDebutInscription, $dateFinInscription);
}
?>
