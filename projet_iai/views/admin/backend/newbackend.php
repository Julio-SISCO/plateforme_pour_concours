<?php
session_start();
require_once '../../../functions/newConcours.php';
require_once '../../../helpers/checkSessionData.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libelle = $_POST["libelle"];
    $dateDebut = $_POST["debut"];
    $dateFin = $_POST["fin"];
    $dateDebutInsc = $_POST["debutinsc"];
    $dateFinInsc = $_POST["fininsc"];
    createNewConcours($libelle, $dateDebut, $dateFin, $dateDebutInsc, $dateFinInsc);
}

