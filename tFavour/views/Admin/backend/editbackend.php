<?php
session_start();
require_once '../../../functions/updateConcours.php';
require_once '../../../helpers/checkSessionData.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $concoursId = $_POST["idc"];
    $libelle = $_POST["libelle"];
    $dateDebut = $_POST["debut"];
    $dateFin = $_POST["fin"];
    $dateDebutInsc = $_POST["debutinsc"];
    $dateFinInsc = $_POST["fininsc"];
    updateConcours($concoursId, $libelle, $dateDebut, $dateFin, $dateDebutInsc, $dateFinInsc);
}

