<?php


function is_admin()
{
    $status = $_SESSION['status'];

    if ($status) {
        return true;
    }

    return false;
}

?>