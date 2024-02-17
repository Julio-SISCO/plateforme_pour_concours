<?php
require '../../helpers/db_config.php';


function countAll()
{
    global $host, $dbname, $dbusername, $dbpassword;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour compter le nombre total de candidatures
        $query = "SELECT COUNT(*) as total FROM candidatures";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $totalCandidatures = isset($result['total']) ? $result['total'] : 0;

        return $totalCandidatures;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {

        $conn = null;

    }
}

function countBySexe()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour compter le nombre total de candidatures par sexe
        $query = "SELECT COUNT(*) as total, genre FROM candidatures GROUP BY genre";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }

}

function countByNationalite()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour compter le nombre total de candidatures par nationalité
        $query = "SELECT COUNT(*) as total, nationalite FROM candidatures GROUP BY nationalite";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }



}

function countBySerie()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour compter le nombre total de candidatures par série
        $query = "SELECT COUNT(*) as total, serie FROM candidatures GROUP BY serie";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;


    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}

?>