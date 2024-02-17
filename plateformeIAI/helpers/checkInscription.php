<?php
require 'db_config.php';
require 'checkSessionData.php';

function checkInscription()
{ 
    global $host, $dbname, $dbusername, $dbpassword;

    if (checkConcours()) {
        
        $concoursId = $_SESSION['concoursId'];
        $user_id = $_SESSION['user_id'];

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM candidatures WHERE concours_id = :concours_id AND user_id = :user_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':concours_id', $concoursId);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return ($result !== false); // Renvoie true si la candidature existe, sinon false
        } catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
        } finally {
            $pdo = null;
        }
    }

    return false;
}
?>
