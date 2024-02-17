<?php

require '../helpers/db_config.php';

function getCandidatesList()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM candidatures";
        $stmt = $conn->query($query);
        $candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $candidates;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        return array();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}


function getCandidatesByGender($gender)
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM candidatures WHERE genre = :gender";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':gender', $gender);
        $stmt->execute();

        $candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $candidates;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        return array();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}
function getDistinctByGender()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT DISTINCT genre FROM candidatures";
        $stmt = $conn->query($query);
        $genres = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $genres;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        return array();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}


function getCandidatesByNationality($nationality)
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM candidatures WHERE nationalite = :nationality";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nationality', $nationality);
        $stmt->execute();

        $candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $candidates;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        return array();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}



function getDistinctNationalities()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT DISTINCT nationalite FROM candidatures";
        $stmt = $conn->query($query);
        $nationalities = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $nationalities;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        return array();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}

function getDuplicateCandidates()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM candidatures WHERE user_id IN (
            SELECT user_id FROM candidatures GROUP BY user_id HAVING COUNT(*) > 1
        )";
        $stmt = $conn->query($query);
        $duplicateCandidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $duplicateCandidates;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        return array();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}

function getCandidatesWithoutDocuments()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM candidatures WHERE id NOT IN (SELECT DISTINCT candidature_id FROM documents)";
        $stmt = $conn->query($query);
        $candidatesWithoutDocuments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $candidatesWithoutDocuments;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        return array();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}

function getDocuments($candidatureId)
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM documents WHERE candidature_id = :candidature_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':candidature_id', $candidatureId);
        $stmt->execute();

        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $documents;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        return array();
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}

?>