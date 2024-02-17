<?php
require '../../../helpers/db_config.php';
require '../../../functions/deleteCandidature.php';

session_start();

global $host, $dbname, $dbusername, $dbpassword;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
        
        $concoursId = $_SESSION['concoursId'];
        $user_id = $_SESSION['user_id'];

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = deleteCandidature($conn, $concoursId, $user_id);

            http_response_code($result['status'] ? 200 : 500);

            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            $result = array(
                'status' => false,
                'message' => 'Erreur d\'enregistrement !'
            );

            http_response_code(500);

            header('Content-Type: application/json');
            echo json_encode($result);
        } finally {
            if (isset($conn)) {
                $conn = null;
            }
        }
    }
}
?>
