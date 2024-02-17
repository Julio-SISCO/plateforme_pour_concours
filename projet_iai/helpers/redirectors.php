<?php
require 'checkstatus.php';

function defaultRedirection()
{
    if (!is_admin()) {
        if (isset($_SESSION['redirect_url'])) {

            $redirect_url = $_SESSION['redirect_url'];

            unset($_SESSION['redirect_url']);

            header("Location: $redirect_url");

            exit();
        } else {

            header("Location: ../../views/users/index.php");
        }
    } else {
        header("Location: ../../views/admin/index.php");
    }
}


function adminRedirection()
{
    if (is_admin()) {
        header("Location: ../views/admin/index.php");
    } 
}

function userRedirection()
{
    if (!is_admin()) {
        header("Location: ../views/users/index.php");
    }
}

function isRegisteredRedirection()
{
    if (checkInscription()) {
        if (isset($_SESSION['redirect_url'])) {

            $redirect_url = $_SESSION['redirect_url'];

            unset($_SESSION['redirect_url']);

            header("Location: $redirect_url");

            exit();
        } else {
            header("Location: ../views/users/index.php");
            exit();
        }
    }
}

?>