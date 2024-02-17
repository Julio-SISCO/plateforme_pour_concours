<?php
require '../../helpers/db_config.php';
require '../../functions/saveAccount.php';
global $host, $dbname, $dbusername, $dbpassword;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cfpassword = $_POST["cfpassword"];

    if ($password == $cfpassword) {
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = UserRegistration($conn, $username, $password);

            if ($result['status'] == true) {

                header("Location: ../index.php");

            } 
        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();

            return false;
        }

    } else {
        return $message = 'Erreur d\'enregistrement !';
    }
}



?>