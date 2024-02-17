<?php
function updateDocument($file, $user_id, $concoursId, $username, $type)
{

    $uploadDirectory = "C:/wamp/www/pages/app/uploads/{$type}/";

    $originalFileName = $file['name'];

    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    $newFileName = "{$user_id}_{$concoursId}_{$username}_{$type}.{$extension}";

    $targetPath = $uploadDirectory . $newFileName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        
        return true;

    } else {

        return false;
    }

}
?>