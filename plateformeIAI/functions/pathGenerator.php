<?php
require 'saveDocument.php';

function photoPath($file, $user_id, $concoursId, $username, $type)
{
    $uploadDirectory = "C:/wamp/www/pages/app/uploads/{$type}/";

    $originalFileName = $file['name'];

    //Recuperer l'extension du fichier
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    $newFileName = "{$user_id}_{$concoursId}_{$username}_{$type}.{$extension}";

    $targetPath = $uploadDirectory . $newFileName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {

        return $targetPath;

    } else {

        return null;

    }
}



function filePath($conn, $file, $user_id, $concoursId, $username, $type, $candidat_id)
{
    $uploadDirectory = "C:/wamp/www/pages/app/uploads/{$type}/";

    $originalFileName = $file['name'];

    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    $newFileName = "{$user_id}_{$concoursId}_{$username}_{$type}.{$extension}";

    $targetPath = $uploadDirectory . $newFileName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {

        saveDocument($conn, $newFileName, $type, $targetPath, $candidat_id);

        return true;

    } else {

        return false;

    }
}

?>