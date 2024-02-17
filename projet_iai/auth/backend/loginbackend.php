<?php
session_start();
require '../../functions/login_fonction.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $_SESSION['errormessage'] = "";
    UserConnexion($username, $password);
    
}
