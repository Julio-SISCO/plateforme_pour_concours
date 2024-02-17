<?php
session_start();
require_once '../../../functions/updateConcours.php';
require_once '../../../helpers/checkSessionData.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $concoursId = $_POST["idc"];
    $dateDebutInsc = $_POST["debutinsc"];
    $dateFinInsc = $_POST["fininsc"];
    updatePeriod($concoursId, $dateDebutInsc, $dateFinInsc);
}

