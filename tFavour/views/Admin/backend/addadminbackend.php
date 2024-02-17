<?php
session_start();
require '../../../functions/saveAccount.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cfpassword = $_POST["cfpassword"];

    if ($password === $cfpassword) {
        AdminRegistration($username, $password);
    } else {
        $_SESSION['errormessage'] = "Les mots de passe ne correspondent pas !";
        
        header('Location: ../addadmin.php');
        exit();
    }
}

