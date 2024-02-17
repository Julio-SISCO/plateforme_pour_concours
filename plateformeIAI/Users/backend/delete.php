<?php
require '../../helpers/db_config.php';
require '../../functions/deleteCandidature.php';
session_start();    
global $host, $dbname, $dbusername, $dbpassword;

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $concoursId = $_SESSION['concoursId'];
    $user_id = $_SESSION['user_id'];
echo'1';
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = deleteCandidature($conn, $concoursId, $user_id);
        if($result['status']){
            header('Location: ../home.php');
        }


    } catch (PDOException $e) {
        $error = $e->getMessage();
        $result = array(
            'status' => false,
            'message' => 'Erreur d\'enregistrement !'
        );
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }

    // Vous pouvez maintenant utiliser $result comme nécessaire, par exemple, le retourner en tant que réponse JSON
    header('Content-Type: application/json');
    echo json_encode($result);
}
?>
