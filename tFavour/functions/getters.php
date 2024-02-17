<?php


function getCandidature()
{
    global $host, $dbname, $dbusername, $dbpassword;
    $candidatureData = [];

    if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id'])) {
        $concoursId = $_SESSION['concoursId'];
        $user_id = $_SESSION['user_id'];

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM candidatures WHERE concours_id = :concours_id AND user_id = :user_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':concours_id', $concoursId);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            $candidatureData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($candidatureData) {
                $candidature_id = $candidatureData['id'];

                $query2 = "SELECT * FROM documents WHERE candidature_id = :candidature_id";
                $stmt = $conn->prepare($query2);
                $stmt->bindParam(':candidature_id', $candidature_id);
                $stmt->execute();

                $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Ajouter les documents au tableau $candidatureData en fonction de leur type
                foreach ($documents as $doc) {
                    $candidatureData['documents'][$doc['type']] = $doc;
                }
            }
        } catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
        } finally {

            $conn = null;
        }
    }

    return $candidatureData;
}

function getCandidatesList()
{
    global $host, $dbname, $dbusername, $dbpassword;

    if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id'])) {
        $concoursId = $_SESSION['concoursId'];
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM candidatures WHERE concours_id = :concours_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':concours_id', $concoursId);
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
}


function getCandidatesByGender($gender)
{
    global $host, $dbname, $dbusername, $dbpassword;


    if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id'])) {
        $concoursId = $_SESSION['concoursId'];
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM candidatures WHERE genre = :gender AND  concours_id = :concours_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':concours_id', $concoursId);
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
}
function getDistinctByGender()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT DISTINCT genre FROM candidatures";
        $stmt = $conn->prepare($query);
        $stmt->execute();
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

    if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id'])) {
        $concoursId = $_SESSION['concoursId'];
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM candidatures WHERE nationalite = :nationality AND  concours_id = :concours_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nationality', $nationality);
            $stmt->bindParam(':concours_id', $concoursId);
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
}


function getDistinctNationalities()
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT DISTINCT nationalite FROM candidatures";
        $stmt = $conn->prepare($query);
        $stmt->execute();
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

    if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id'])) {
        $concoursId = $_SESSION['concoursId'];
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM candidatures WHERE user_id IN (
            SELECT user_id FROM candidatures GROUP BY user_id HAVING COUNT(*) > 1
        ) AND  concours_id = :concours_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':concours_id', $concoursId);
            $stmt->execute();
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
}

function getCandidatesWithoutDocuments()
{
    global $host, $dbname, $dbusername, $dbpassword;

    if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id'])) {
        $concoursId = $_SESSION['concoursId'];
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM candidatures WHERE id NOT IN (SELECT DISTINCT candidature_id FROM documents) AND  concours_id = :concours_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':concours_id', $concoursId);
            $stmt->execute();
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

function getStatsByNationalite()
{
    global $host, $dbname, $dbusername, $dbpassword;

    if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id'])) {
        $concoursId = $_SESSION['concoursId'];
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT nationalite, COUNT(*) AS count FROM candidatures WHERE  concours_id = :concours_id GROUP BY nationalite";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':concours_id', $concoursId);
            $stmt->execute();
            $stats = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $statsNationalite = $stats;

            // Créer un tableau pour stocker les statistiques dans le format souhaité
            $formattedStats = array();

            foreach ($statsNationalite as $result) {
                $formattedStats[$result['nationalite']] = $result['count'];
            }

            // Convertir le tableau associatif en JSON pour le rendre accessible côté client
            $jsonStats = json_encode($formattedStats);
            return $jsonStats;
        } catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
            return array();
        } finally {
            $conn = null;
        }
    }
}
