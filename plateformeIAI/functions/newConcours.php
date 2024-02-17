<?php

require '../helpers/db_config.php';

function createNewConcours($libelle, $dateDebut, $dateFin, $dateDebutInscription, $dateFinInscription)
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Désactiver tous les concours existants
        $disableAllConcoursQuery = "UPDATE concours SET is_active = false";
        $conn->exec($disableAllConcoursQuery);

        // Insérer le nouveau concours
        $insertConcoursQuery = "INSERT INTO concours (libelle, debut, fin, debut_inscription, fin_inscription, is_active) 
                                VALUES (:libelle, :dateDebut, :dateFin, :dateDebutInscription, :dateFinInscription, true)";
        $stmt = $conn->prepare($insertConcoursQuery);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->bindParam(':dateDebutInscription', $dateDebutInscription);
        $stmt->bindParam(':dateFinInscription', $dateFinInscription);
        $stmt->execute();

        echo "Nouveau concours enregistré avec succès !";
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
            exit();
        }
    }
}

// Utilisation
createNewConcours('Concours 2023', '2023-01-01', '2023-02-01', '2022-12-01', '2022-12-31');

?>
