<?php
require '../../helpers/db_config.php';
require '../../functions/pathGenerator.php';
require '../../functions/saveCandidature.php';
session_start();    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenoms"];
    $email = $_POST["email"];
    $adresse = $_POST["adresse"];
    $date_naissance = $_POST["date_naissance"];
    $sexe = $_POST["sexe"];
    $nationalite = $_POST["nationalite"];
    $annee_bac = $_POST["annee_bac"];
    $serie = $_POST["serie"];

    if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
        $concoursId = $_SESSION['concoursId'];
        $user_id = $_SESSION['user_id'];
        $username= $_SESSION['username'];

        $photo_url = photoPath($_FILES["photo"], $user_id, $concoursId, $username, "photos");

        global $host, $dbname, $dbusername, $dbpassword;
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = saveCandidature($conn, $nom, $prenom, $photo_url, $date_naissance, $sexe, $nationalite, $adresse, $email, $annee_bac, $serie, $concoursId, $user_id);
            
            $candidat_id = $result;
            
            $is_Naissance_uploaded = filePath($conn, $_FILES["copie_naissance"], $user_id, $concoursId, $username, "naissances", $candidat_id);
            $is_Nationalite_uploaded = filePath($conn, $_FILES["copie_nationalite"], $user_id, $concoursId, $username, "nationalites", $candidat_id);
            $is_attestationBac_uploaded = filePath($conn, $_FILES["attestation_bac"], $user_id, $concoursId, $username, "attestations", $candidat_id);
            $conn = null;
            header("Location: ../consulter.php");
        } catch (PDOException $e) {

            $error = $e->getMessage();
    
            return array(
                'status' => false,
                'message' => 'Erreur d\'enregistrement !'
            );
    
        } finally {
            $conn = null;
        }
    }

}


?>