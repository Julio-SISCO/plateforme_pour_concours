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

            header("Location: ../Users/index.php");
        }
    } else {
        header("Location: ../Admin/index.php");
    }
}


function adminRedirection()
{
    if (is_admin()) {
        header("Location: ../Admin/index.php");
    } 
}
function userRedirection()
{
    if (!is_admin()) {
        header("Location: ../Users/index.php");
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
            header("Location: ../Users/index.php");
            exit();
        }
    }
}
?>