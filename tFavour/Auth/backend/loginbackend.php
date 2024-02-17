<?php
require '../../functions/logger.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    UserConnexion($username, $password);
    
}
?>