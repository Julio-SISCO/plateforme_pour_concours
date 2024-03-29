<?php
require __DIR__ . '/../helpers/db_config.php';

function updateConcours($concoursId, $libelle, $dateDebut, $dateFin, $dateDebutInsc, $dateFinInsc)
{
    global $host, $dbname, $dbusername, $dbpassword;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $updateQuery = "UPDATE concours SET libelle = :libelle, debut = :dateDebut, fin = :dateFin, debut_inscription = :dateDebutInsc, fin_inscription = :dateFinInsc WHERE id = :concours_id";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':concours_id', $concoursId);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->bindParam(':dateDebutInsc', $dateDebutInsc);
        $stmt->bindParam(':dateFinInsc', $dateFinInsc);
        $stmt->execute();
        if (initConcoursInfos()) {
            header("Location: ../details.php");
        }
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
            exit();
        }
    }
}

function updatePeriod($concoursId, $dateDebutInscription, $dateFinInscription)
{
    global $host, $dbname, $dbusername, $dbpassword;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $updateQuery = "UPDATE concours SET debut_inscription = :dateDebutInscription, fin_inscription = :dateFinInscription WHERE id = :concours_id";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':concours_id', $concoursId);
        $stmt->bindParam(':dateDebutInscription', $dateDebutInscription);
        $stmt->bindParam(':dateFinInscription', $dateFinInscription);
        $stmt->execute();
        if (initConcoursInfos()) {
            header("Location: ../details.php");
        }

    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
            exit();
        }
    }
}


function updateDate($concoursId, $dateDebut, $dateFin)
{
    global $host, $dbname, $dbusername, $dbpassword;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $updateQuery = "UPDATE concours SET debut = :dateDebut, fin = :dateFin WHERE id = :concours_id";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':concours_id', $concoursId);
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->execute();
        if (initConcoursInfos()) {
            header("Location: ../details.php");
        }
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
            exit();
        }
    }
}
