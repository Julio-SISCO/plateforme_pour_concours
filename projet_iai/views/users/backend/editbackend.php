<?php
require '../../../helpers/db_config.php';
require '../../../functions/updateCandidature.php';
require '../../../functions/updateDocument.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $prenoms = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $naissance = $_POST['date_naissance'];
    $serie = $_POST['serie'];
    $bac = $_POST['annee_bac'];
    $nationalite = $_POST['nationalite'];
    $id = $_POST["id"];

    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        updateCandidature($conn, $id, $nom, $prenoms, $naissance, $sexe, $nationalite, $bac, $serie);


        
        if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
            $concoursId = $_SESSION['concoursId'];
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];

            if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
             
                updatePhoto($conn, $id, $_FILES["photo"], $user_id, $concoursId, $username, 'photos');
            }

            if (isset($_FILES["copie_naissance"]) && $_FILES["copie_naissance"]["error"] == UPLOAD_ERR_OK) {
                updateDocument($conn, $id, $_FILES["copie_naissance"], $user_id, $concoursId, $username, "naissances");
            }

            if (isset($_FILES["copie_nationalite"]) && $_FILES["copie_nationalite"]["error"] == UPLOAD_ERR_OK) {
                updateDocument($conn, $id, $_FILES["copie_nationalite"], $user_id, $concoursId, $username, "nationalites");
            }

            if (isset($_FILES["attestation_bac"]) && $_FILES["attestation_bac"]["error"] == UPLOAD_ERR_OK) {
                updateDocument($conn, $id, $_FILES["attestation_bac"], $user_id, $concoursId, $username, "attestations");
            }
             header('Location: ../consulter.php');
        }



    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
