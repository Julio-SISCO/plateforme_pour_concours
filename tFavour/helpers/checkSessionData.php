<?php
require 'db_config.php';

function initConcoursInfos()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM concours WHERE is_active = true";
        $stmt = $pdo->query($query);

        $concours = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($concours) { 
            $_SESSION['concoursId'] = $concours['id'];
            $_SESSION['libelle'] = $concours['libelle'];
            $_SESSION['dateDebut'] = $concours['debut'];
            $_SESSION['dateFin'] = $concours['fin'];
            $_SESSION['dateDebutInscription'] = $concours['debut_inscription'];
            $_SESSION['dateFinInscription'] = $concours['fin_inscription'];
        }
        return true;
    } catch (PDOException $e) {
        echo "Erreur d'authentification : " . $e->getMessage();
    } finally {
        $pdo = null;
    }
}



function checkConcours()
{
    if (
        !isset($_SESSION["concoursId"]) ||
        !isset($_SESSION["libelle"]) ||
        !isset($_SESSION["dateDebut"]) ||
        !isset($_SESSION["dateFin"]) ||
        !isset($_SESSION["dateDebutInscription"]) ||
        !isset($_SESSION["dateFinInscription"])
    ) {
        initConcoursInfos();
    }
    return true;
}

function isSameDate()
{
    if (isset($_SESSION["dateDebut"]) && isset($_SESSION["dateFin"])) {
        if ($_SESSION["dateDebut"] === $_SESSION["dateFin"]) {
            return true;
        }
    }
    return false;
}
