<?php
require_once 'redirectors.php';
require_once 'checkstatus.php';
function checkAuthentication()
{
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {

        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

        header("Location: ../Auth/login.php");

        exit();

    }
    

}

function is_logged_in()
{
    if (isset($_SESSION["user_id"]) && isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}
?>