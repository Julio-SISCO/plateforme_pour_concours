<?php
if ($_SERVE["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $prenoms = $_POST['prenoms'];
    $sexe = $_POST['genre'];
    $naissance = $_POST['naissance'];
    $serie = $_POST['serie'];
    $bac = $_POST['bac'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $nationalite = $_POST['nationalite'];


    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        updateCandidature($conn, $id, $nom, $prenoms, $sexe, $naissance, $serie, $bac, $adresse, $email, $nationalite, $photo);
        
        if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
            $concoursId = $_SESSION['concoursId'];
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];

            updateDocument($_FILES["photo"], $user_id, $concoursId, $username, 'photos');
            updateDocument($_FILES["copie_naissance"], $user_id, $concoursId, $username, "naissances");
            updateDocument($_FILES["copie_nationalite"], $user_id, $concoursId, $username, "nationalites");
            updateDocument($_FILES["attestation_bac"], $user_id, $concoursId, $username, "attestations");
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


}

?>