<?php
session_start();
require_once '../../../functions/updateConcours.php';
require_once '../../../helpers/checkSessionData.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $concoursId = $_POST["idc"];
    $dateDebut = $_POST["debut"];
    $dateFin = $_POST["fin"];
    updateDate($concoursId, $dateDebut, $dateFin);
}

